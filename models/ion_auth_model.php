<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Model
* 
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*          
* Added Awesomeness: Phil Sturgeon 
* 
* Location: http://github.com/benedmunds/CodeIgniter-Ion-Auth
*          
* Created:  10.01.2009 
* 
* Description:  Modified auth system based on redux_auth with extensive customization.  This is basically what Redux Auth 2 should be.  Original redux license is below.
* Original Author name has been kept but that does not mean that the method has not been modified.
* 
* Requirements: PHP5 or above
* 
*/

/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
 

class Ion_auth_model extends Model
{
	/**
	 * Holds an array of tables used
	 *
	 * @var string
	 **/
	public $tables = array();
	
	/**
	 * activation code
	 *
	 * @var string
	 **/
	public $activation_code;
	
	/**
	 * forgotten password key
	 *
	 * @var string
	 **/
	public $forgotten_password_code;
	
	/**
	 * new password
	 *
	 * @var string
	 **/
	public $new_password;
	
	/**
	 * Identity
	 *
	 * @var string
	 **/
	public $identity;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->config('ion_auth');
		$this->tables  = $this->config->item('tables');
		$this->columns = $this->config->item('columns');
		
		$this->identity_column = $this->config->item('identity');
	    $this->salt_length     = $this->config->item('salt_length');
	    $this->meta_join       = $this->config->item('join');
	}
	
	/**
	 * Misc functions
	 * 
	 * Hash password : Hashes the password to be stored in the database.
     * Hash password db : This function takes a password and validates it
     * against an entry in the users table.
     * Salt : Generates a random salt value.
	 *
	 * @author Mathew
	 */
	 
	/**
	 * Hashes the password to be stored in the database.
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function hash_password($password)
	{
	    if (empty($password))
	    {
	    	return FALSE;
	    }
	    
	    $salt = $this->salt();
		
		return  $salt . substr(sha1($salt . $password), 0, -$this->salt_length);		
	}
	
	/**
	 * This function takes a password and validates it
     * against an entry in the users table.
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function hash_password_db($identity, $password)
	{
	   if (empty($identity) || empty($password))
	   {
	        return false;
	   }
	   
	   $query = $this->db->select('password')
						 ->where($this->identity_column, $identity)
						 ->where($this->ion_auth->_extra_where)
						 ->limit(1)
						 ->get($this->tables['users']);
            
        $result = $query->row();
        
		if ($query->num_rows() !== 1)
		{
		    return false;
		}
		    
		$salt = substr($result->password, 0, $this->salt_length);

		$password = $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
        
		return $password;
	}
	
	/**
	 * Generates a random salt value.
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function salt()
	{
		return substr(md5(uniqid(rand(), true)), 0, $this->salt_length);
	}
    
	/**
	 * Activation functions
	 * 
     * Activate : Validates and removes activation code.
     * Deactivae : Updates a users row with an activation code.
	 *
	 * @author Mathew
	 */
	
	/**
	 * activate
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function activate($id, $code = false)
	{	    
	    if ($code != false) 
	    {  	   
		    $query = $this->db->select($this->identity_column)
				        	  ->where('activation_code', $code)
				        	  ->limit(1)
				        	  ->get($this->tables['users']);
	                	      
			$result = $query->row();
	        
			if ($query->num_rows() !== 1)
			{
				return false;
			}
		    
			$identity = $result->{$this->identity_column};
			
			$data = array('activation_code' => '',
						  'active'          => 1
						 );
	        
			$this->db->where($this->ion_auth->_extra_where);
			$this->db->update($this->tables['users'], $data, array($this->identity_column => $identity));
	    }
	    else //must be called by an admin to activate without a code
	    {
	    	if (!$this->ion_auth->is_admin()) 
	    	{
	    		return false;
	    	}
			$data = array('activation_code' => '',
						  'active'          => 1
						 );
		   
			$this->db->where($this->ion_auth->_extra_where);
			$this->db->update($this->tables['users'], $data, array('id' => $id));
	    }
		
		return $this->db->affected_rows() == 1;
	}
	
	
	/**
	 * Deactivate
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function deactivate($id = 0)
	{
	    if (empty($id))
	    {
	        return FALSE;
	    }
	    
		$activation_code       = sha1(md5(microtime()));
		$this->activation_code = $activation_code;
		
		$data = array('activation_code' => $activation_code,
					  'active'          => 0,
					 );
        
		$this->db->where($this->ion_auth->_extra_where);
		$this->db->update($this->tables['users'], $data, array('id' => $id));
		
		return $this->db->affected_rows() == 1;
	}

	/**
	 * change password
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function change_password($identity, $old, $new)
	{
	    $query  = $this->db->select('password')
						   ->where($this->identity_column, $identity)
						   ->where($this->ion_auth->_extra_where)
						   ->limit(1)
						   ->get($this->tables['users']);
                    	   
	    $result = $query->row();

	    $db_password = $result->password; 
	    $old         = $this->hash_password_db($identity, $old);
	    $new         = $this->hash_password($new);

	    if ($db_password === $old)
	    {
	        $data = array('password' => $new);
	        
	        $this->db->where($this->ion_auth->_extra_where);
	        $this->db->update($this->tables['users'], $data, array($this->identity_column => $identity));
	        
	        return $this->db->affected_rows() == 1;
	    }
	    
	    return false;
	}
	
	/**
	 * Checks username
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function username_check($username = '')
	{
	    if (empty($username))
	    {
	        return false;
	    }
		   
	    return $this->db->where('username', $username)
				    	->where($this->ion_auth->_extra_where)
						->count_all_results($this->tables['users']) > 0;
	}
	
	/**
	 * Checks email
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function email_check($email = '')
	{
	    if (empty($email))
	    {
	        return false;
	    }
		   
	    return $this->db->where('email', $email)
			    	->where($this->ion_auth->_extra_where)
					->count_all_results($this->tables['users']) > 0;
	}
	
	/**
	 * Identity check
	 *
	 * @return bool
	 * @author Mathew
	 **/
	protected function identity_check($identity = '')
	{
	    if (empty($identity))
	    {
	        return FALSE;
	    }
	    
	    return $this->db->where($this->identity_column, $identity)
				    	->where($this->ion_auth->_extra_where)
						->count_all_results($this->tables['users']) > 0;
	}

	/**
	 * Insert a forgotten password key.
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function forgotten_password($email = '')
	{
	    if (empty($email))
	    {
	        return FALSE;
	    }
	    
		$key = $this->hash_password(microtime().$email);
			
		$this->forgotten_password_code = $key;
		
		$this->db->where($this->ion_auth->_extra_where);
		   
		$this->db->update($this->tables['users'], array('forgotten_password_code' => $key), array('email' => $email));
		
		return $this->db->affected_rows() == 1;
	}
	
	/**
	 * Forgotten Password Complete
	 *
	 * @return string
	 * @author Mathew
	 **/
	public function forgotten_password_complete($code)
	{
	    if (empty($code))
	    {
	        return FALSE;
	    }
	    
		$this->db->where($this->ion_auth->_extra_where);
		   
	   	$this->db->where('forgotten_password_code', $code);

	   	if ($this->db->count_all_results($this->tables['users']) > 0) 
        {
        	$password = $this->salt();
		    
            $data = array('password'                => $this->hash_password($password),
                		  'forgotten_password_code' => '0',
                		  'active'                  => 1,
            			 );
            
			$this->db->where($this->ion_auth->_extra_where);
		   
            $this->db->update($this->tables['users'], $data, array('forgotten_password_code' => $code));

            return $password;
        }
        
        return false;
	}

	/**
	 * profile
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function profile($identity = '')
	{ 
	    if (empty($identity))
	    {
	        return false;
	    }
	    
		$this->db->select('u.id, u.username, u.password, u.email, u.activation_code, u.forgotten_password_code, u.ip_address, g.name AS `group`');

		if (!empty($this->columns))
        {
            foreach ($this->columns as $field)
            {
                $this->db->select('m.' . $field);
            }
        }

		$this->db->join($this->tables['meta'] . ' m', 'u.id = m.'.$this->meta_join, 'left');
		$this->db->join($this->tables['groups'] . ' g', 'u.group_id = g.id', 'left');
		
		if (strlen($identity) === 40)
	    {
	        $this->db->where('u.forgotten_password_code', $identity);
	    }
	    else
	    {
	        $this->db->where('u.'.$this->identity_column, $identity);
	    }
	    
		$this->db->where($this->ion_auth->_extra_where);
		   
		$this->db->limit(1);
		$i = $this->db->get($this->tables['users'] .' u');
		
		return ($i->num_rows > 0) ? $i->row() : false;
	}

	/**
	 * Basic functionality
	 * 
	 * Register
	 * Login
	 *
	 * @author Mathew
	 */
	
	/**
	 * register
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function register($username, $password, $email, $additional_data = false, $group_name = false)
	{
	    if (empty($username) || empty($password) || empty($email) || $this->username_check($username) || $this->email_check($email))
	    {
	        return false;
	    }
	    
        // Group ID
        if(empty($group_name))
        {
        	$group_name = $this->config->item('default_group');
        }
        
	    $group_id = $this->db->select('id')
					    	 ->where('name', $group_name)
					    	 ->get($this->tables['groups'])
					    	 ->row()
					    	 ->id;

	    // IP Address
        $ip_address = $this->input->ip_address();
	    
		$password = $this->hash_password($password);
		
        // Users table.
		$data = array('username'   => $username, 
					  'password'   => $password, 
  					  'email'      => $email,
					  'group_id'   => $group_id,
					  'ip_address' => $ip_address,
					  'active'     => 1,
					 );
		  
		$this->db->insert($this->tables['users'], array_merge($data, $this->ion_auth->_extra_set));
        
		// Meta table.
		$id = $this->db->insert_id();
		
		$data = array($this->meta_join => $id);
		
		if (!empty($this->columns))
	    {
	        foreach ($this->columns as $input)
	        {
	        	if (is_array($additional_data) && isset($additional_data[$input])) 
	        	{
	        		$data[$input] = $additional_data[$input];	
	        	}
	        	else 
	        	{
	            	$data[$input] = $this->input->post($input);
	        	}
	        }
	    }
        
		$this->db->insert($this->tables['meta'], $data);
		
		return ($this->db->affected_rows() > 0) ? $id : false;
	}
	
	/**
	 * login
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function login($identity, $password)
	{
	    if (empty($identity) || empty($password) || !$this->identity_check($identity))
	    {
	        return false;
	    }
	    
	    $query = $this->db->select($this->identity_column.', id, password, activation_code, group_id')
						  ->where($this->identity_column, $identity)
						  ->where($this->ion_auth->_extra_where)
						  ->limit(1)
						  ->get($this->tables['users']);
	    
        $result = $query->row();
        
        if ($query->num_rows() == 1)
        {
            $password = $this->hash_password_db($identity, $password);
            
            if (!empty($result->activation_code)) 
            {
            	return false;
            }
            
    		if ($result->password === $password)
    		{
    		    $this->session->set_userdata($this->identity_column,  $result->{$this->identity_column});
    		    $this->session->set_userdata('id',  $result->id); //kept for backwards compatibility
    		    $this->session->set_userdata('user_id',  $result->id); //everyone likes to overwrite id so we'll use user_id
    		    $this->session->set_userdata('group_id',  $result->group_id);
    		    
    		    $group_row = $this->db->select('name')->where('id', $result->group_id)->get($this->tables['groups'])->row();
	    
    		    $this->session->set_userdata('group',  $group_row->name);
    		    return true;
    		}
        }
        
		return false;		
	}
	
	/**
	 * get_users
	 *
	 * @return object Users
	 * @author Ben Edmunds
	 **/
	public function get_users($group_name = false)
	{
		$this->db->select('u.id, u.username, u.email, u.ip_address, u.active, g.name AS `group`, g.description AS group_description');

		if (!empty($this->columns))
        {
            foreach ($this->columns as $field)
            {
                $this->db->select('m.' . $field);
            }
        }
        
		$this->db->join($this->tables['meta'] . ' m', 'u.id = m.'.$this->meta_join, 'left');
		$this->db->join($this->tables['groups'] . ' g', 'u.group_id = g.id', 'left');

		if(!empty($group_name))
		{
	    	$this->db->where('g.name', $group_name);
		}
		
		$this->db->where($this->ion_auth->_extra_where);
		   
		return $this->db->get($this->tables['users'] .' u');
	}
	
	/**
	 * get_active_users
	 *
	 * @return object
	 * @author Ben Edmunds
	 **/
	public function get_active_users($group_name = false)
	{
	    $this->db->select('u.id, u.username, u.email, u.ip_address, u.active, g.name AS `group`, g.description AS group_description');

		if (!empty($this->columns))
        {
            foreach ($this->columns as $field)
            {
                $this->db->select('m.' . $field);
            }
        }
        
		$this->db->join($this->tables['meta'] . ' m', 'u.id = m.'.$this->meta_join, 'left');
		$this->db->join($this->tables['groups'] . ' g', 'u.group_id = g.id', 'left');
		
		if(!empty($group_name))
		{
	    	$this->db->where('g.name', $group_name);
		}
		
		return $this->db->where('u.active', 1)
						->where($this->ion_auth->_extra_where)
						->get($this->tables['users'] .' u');
	}
	
	/**
	 * get_user
	 *
	 * @return object
	 * @author Phil Sturgeon <- liar -Ben
	 **/
	public function get_user($id = false)
	{
		//if no id was passed use the current users id
		if (empty($id)) 
		{
			$id = $this->session->userdata('user_id');
		}
		
	    $this->db->select('u.id, u.username, u.password, u.email, u.activation_code, u.forgotten_password_code, u.ip_address, u.active, g.name AS `group`, g.description AS group_description');

		if (!empty($this->columns))
        {
            foreach ($this->columns as $field)
            {
                $this->db->select('m.' . $field);
            }
        }
        
		return $this->db->join($this->tables['meta'] . ' m', 'u.id = m.'.$this->meta_join, 'left')
						->join($this->tables['groups'] . ' g', 'u.group_id = g.id', 'left')
						->where('u.id', $id)
						->where($this->ion_auth->_extra_where)
						->limit(1)
						->get($this->tables['users'] .' u');
	}
	
	/**
	 * get_users_group
	 *
	 * @return object
	 * @author Ben Edmunds
	 **/
	public function get_users_group($id=false)
	{
		//if no id was passed use the current users id
		if (!$id) 
		{
			$id = $this->session->userdata('user_id');
		}
		
	    $query = $this->db->select('group_id')
						  ->where('id', $id)
						  ->get($this->tables['users']);

		$user = $query->row();
		
		return $this->db->select('name, description')
						->where('id', $user->group_id)
						->get($this->tables['groups'])
						->row();
	}
	

	/**
	 * update_user
	 *
	 * @return bool
	 * @author Phil Sturgeon
	 **/
	public function update_user($id, $data)
	{
		$this->db->trans_begin();
		
		if (!empty($this->columns))
	    {
			// 'user_id' = $id
			$this->db->where($this->meta_join, $id);
			
	        foreach ($this->columns as $field)
	        {
	        	if (is_array($data) && isset($data[$field])) 
	        	{
	            	$this->db->set($field, $data[$field]);
	            	unset($data[$field]);
	        	}
	        }

	        $this->db->update($this->tables['meta']);
	    }

	    if(array_key_exists('password', $data))
		{
			$data['password'] = $this->hash_password($data['password']);
		}

		$this->db->where($this->ion_auth->_extra_where);

		$this->db->update($this->tables['users'], $data, array('id' => $id));
        
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    return false;
		}
		
		else
		{
		    $this->db->trans_commit();
		    return true;
		}
	}
	

	/**
	 * update_user
	 *
	 * @return bool
	 * @author Phil Sturgeon
	 **/
	public function delete_user($id)
	{
		$this->db->trans_begin();
		
		$this->db->delete($this->tables['meta'], array($this->meta_join => $id));
		$this->db->delete($this->tables['users'], array('id' => $id));
		
		if ($this->db->trans_status() === false)
		{
		    $this->db->trans_rollback();
		    return false;
		}
		else
		{
		    $this->db->trans_commit();
		    return true;
		}

	}
	
}