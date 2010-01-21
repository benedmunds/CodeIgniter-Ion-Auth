<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Model
* 
* Author:  Ben Edmunds
* 		   ben.edmunds@gmail.com
*          @benedmunds
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
		
		$this->identity_column     = $this->config->item('identity');
	    $this->salt_length         = $this->config->item('salt_length');
	    $this->meta_join           = $this->config->item('join');
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
	 * @return string
	 * @author Mathew
	 **/
	public function hash_password($password = false)
	{
	    if ($password === false)
	    {
	    	return false;
	    }
	    
	    $salt = $this->salt();
		
		return  $salt . substr(sha1($salt . $password), 0, -$this->salt_length);		
	}
	
	/**
	 * This function takes a password and validates it
     * against an entry in the users table.
	 *
	 * @return string
	 * @author Mathew
	 **/
	public function hash_password_db($identity = false, $password = false)
	{
	   if ($identity === false || $password === false)
	   {
	        return false;
	   }
	   
	   $query  = $this->db->select('password')
       	             	  ->where($this->identity_column, $identity)
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
	 * @return string
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
	 * @return bool
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
			    return false;
		    
			$identity = $result->{$this->identity_column};
			
			$data = array('activation_code' => '');
	        
			$this->db->update($this->tables['users'], $data, array($this->identity_column => $identity));
	    }
	    else 
	    {
			$data = array('activation_code' => '',
						  'active'          => 1,
						 );
	        
			$this->db->update($this->tables['users'], $data, array('id' => $id));
	    }
		
		return $this->db->affected_rows() == 1;
	}
	
	
	/**
	 * Deactivate
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function deactivate($id = false)
	{
	    if ($id === false)
	    {
	        return false;
	    }
	    
		$activation_code       = sha1(md5(microtime()));
		$this->activation_code = $activation_code;
		
		$data = array('activation_code' => $activation_code,
					  'active'          => 0,);
        
		$this->db->update($this->tables['users'], $data, array('id' => $id));
		
		return $this->db->affected_rows() == 1;
	}

	/**
	 * change password
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function change_password($identity = false, $old = false, $new = false)
	{
	    if ($identity === false || $old === false || $new === false)
	    {
	        return false;
	    }
	    
	    $query  = $this->db->select('password')
                    	   ->where($this->identity_column, $identity)
                    	   ->limit(1)
                    	   ->get($this->tables['users']);
                    	   
	    $result = $query->row();

	    $db_password = $result->password; 
	    $old         = $this->hash_password_db($identity, $old);
	    $new         = $this->hash_password($new);

	    if ($db_password === $old)
	    {
	        $data = array('password' => $new);
	        
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
	public function username_check($username = false)
	{
	    if ($username === false)
	    {
	        return false;
	    }
	    
	    $query = $this->db->select('id')
                           ->where('username', $username)
                           ->limit(1)
                           ->get($this->tables['users']);
		
		if ($query->num_rows() == 1)
		{
			return true;
		}
		
		return false;
	}
	
	/**
	 * Checks email
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function email_check($email = false)
	{
	    if ($email === false)
	    {
	        return false;
	    }
	    
	    $query = $this->db->select('id')
                           ->where('email', $email)
                           ->limit(1)
                           ->get($this->tables['users']);
		
		if ($query->num_rows() == 1)
		{
			return true;
		}
		
		return false;
	}
	
	/**
	 * Identity check
	 *
	 * @return bool
	 * @author Mathew
	 **/
	protected function identity_check($identity = false)
	{
	    if ($identity === false)
	    {
	        return false;
	    }
	    
	    $query = $this->db->select('id')
                           ->where($this->identity_column, $identity)
                           ->limit(1)
                           ->get($this->tables['users']);
		
		if ($query->num_rows() == 1)
		{
			return true;
		}
		
		return false;
	}

	/**
	 * Insert a forgotten password key
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function forgotten_password($email = false)
	{
	    if ($email === false)
	    {
	        return false;
	    }
	    
	    $query = $this->db->select('forgotten_password_code')
                    	   ->where('email', $email)
                    	   ->limit(1)
                    	   ->get($this->tables['users']);
            
        $result = $query->row();

		$key = $this->hash_password(microtime().$email);
			
		$this->forgotten_password_code = $key;
		
		$this->db->update($this->tables['users'], array('forgotten_password_code' => $key), array('email' => $email));
		
		return ($this->db->affected_rows() == 1) ? true : false;
	}
	
	/**
	 * Forgotten Password Complete
	 *
	 * @return string
	 * @author Mathew
	 **/
	public function forgotten_password_complete($code = false)
	{
	    if (!$code)
	    {
	        return false;
	    }
	    
	    $query = $this->db->select('id')
                    	   ->where('forgotten_password_code', $code)
                           ->limit(1)
                    	   ->get($this->tables['users']);
        
        $result = $query->row();
        
        if ($query->num_rows() > 0) 
        {
        	$password   = $this->salt();
		    
            $data = array('password'                => $this->hash_password($password),
                          'forgotten_password_code' => '0',
                          'active'                  => 1);
            
            $this->db->update($this->tables['users'], $data, array('forgotten_password_code' => $code));

            return $password;
        }
        
        return false;
	}

	/**
	 * profile
	 *
	 * @return object
	 * @author Mathew
	 **/
	public function profile($identity = false)
	{ 
	    if ($identity === false)
	    {
	        return false;
	    }
	    
		$this->db->select($this->tables['users'].'.id, '.
						  $this->tables['users'].'.username, ' .
						  $this->tables['users'].'.password, '.
						  $this->tables['users'].'.email, '.
						  $this->tables['users'].'.activation_code, '.
						  $this->tables['users'].'.forgotten_password_code , '.
						  $this->tables['users'].'.ip_address, '.
						  $this->tables['groups'].'.name AS `group`');
		
		if (!empty($this->columns))
		{
		    foreach ($this->columns as $value)
    		{
    			$this->db->select($this->tables['meta'].'.'.$value);
    		}
		}
		
		$this->db->from($this->tables['users']);
		$this->db->join($this->tables['meta'], $this->tables['users'].'.id = '.$this->tables['meta'].'.'.$this->meta_join, 'left');
		$this->db->join($this->tables['groups'], $this->tables['users'].'.group_id = '.$this->tables['groups'].'.id', 'left');
		
		if (strlen($identity) === 40)
	    {
	        $this->db->where($this->tables['users'].'.forgotten_password_code', $identity);
	    }
	    else
	    {
	        $this->db->where($this->tables['users'].'.'.$this->identity_column, $identity);
	    }
	    
		$this->db->limit(1);
		$i = $this->db->get();
		
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
	public function register($username = false, $password = false, $email = false, $additional_data = false, $group_name = false)
	{
	    if ($username === false || $password === false || $email === false || $this->username_check($username) || $this->email_check($email))
	    {
	        return false;
	    }
	    
        // Group ID
        if($group_name === false)
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
					  'active'     => 1);
		  
		$this->db->insert($this->tables['users'], $data);
        
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
		
		return $this->db->affected_rows() > 0;
	}
	
	/**
	 * login
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function login($identity = false, $password = false)
	{
	    if ($identity === false || $password === false || $this->identity_check($identity) == false)
	    {
	        return false;
	    }
	    
	    $query = $this->db->select($this->identity_column.', id, password, activation_code, group_id')
                    	   ->where($this->identity_column, $identity)
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
    		    $groupQuery   = $this->db->select('name')->where('id', $result->group_id)->get($this->tables['groups']);
	    		$groupResult  = $groupQuery->row();
	    
    		    $this->session->set_userdata('group',  $groupResult->name);
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
	public function get_users()
	{
	    $this->db->select($this->tables['users'].'.id, '.
						  $this->tables['users'].'.username, ' .
						  $this->tables['users'].'.password, '.
						  $this->tables['users'].'.email, '.
						  $this->tables['users'].'.activation_code, '.
						  $this->tables['users'].'.forgotten_password_code , '.
						  $this->tables['users'].'.ip_address, '.
						  $this->tables['users'].'.active, '.
						  $this->tables['groups'].'.name AS group_name, '.
						  $this->tables['groups'].'.description AS group_description');
		
		if (!empty($this->columns))
		{
		    foreach ($this->columns as $value)
    		{
    			$this->db->select($this->tables['meta'].'.'.$value);
    		}
		}
		
		$this->db->join($this->tables['meta'], $this->tables['users'].'.id = '.$this->tables['meta'].'.'.$this->meta_join, 'left');
		$this->db->join($this->tables['groups'], $this->tables['users'].'.group_id = '.$this->tables['groups'].'.id', 'left');

		$query = $this->db->get($this->tables['users']);
		return $query->result();
	}
	
	/**
	 * get_users_array
	 *
	 * @return array Users
	 * @author Ben Edmunds
	 **/
	public function get_users_array()
	{
	    $this->db->select($this->tables['users'].'.id, '.
						  $this->tables['users'].'.username, ' .
						  $this->tables['users'].'.password, '.
						  $this->tables['users'].'.email, '.
						  $this->tables['users'].'.activation_code, '.
						  $this->tables['users'].'.forgotten_password_code , '.
						  $this->tables['users'].'.ip_address, '.
						  $this->tables['users'].'.active, '.
						  $this->tables['groups'].'.name AS group_name, '.
						  $this->tables['groups'].'.description AS group_description');
		
		if (!empty($this->columns))
		{
		    foreach ($this->columns as $value)
    		{
    			$this->db->select($this->tables['meta'].'.'.$value);
    		}
		}
		
		$this->db->join($this->tables['meta'], $this->tables['users'].'.id = '.$this->tables['meta'].'.'.$this->meta_join, 'left');
		$this->db->join($this->tables['groups'], $this->tables['users'].'.group_id = '.$this->tables['groups'].'.id', 'left');

		$query = $this->db->get($this->tables['users']);
		return $query->result_array();
	}
	
	/**
	 * get_active_users
	 *
	 * @return object
	 * @author Ben Edmunds
	 **/
	public function get_active_users()
	{
	    $this->db->select($this->tables['users'].'.id, '.
						  $this->tables['users'].'.username, ' .
						  $this->tables['users'].'.password, '.
						  $this->tables['users'].'.email, '.
						  $this->tables['users'].'.activation_code, '.
						  $this->tables['users'].'.forgotten_password_code , '.
						  $this->tables['users'].'.ip_address, '.
						  $this->tables['users'].'.active, '.
						  $this->tables['groups'].'.name AS group_name, '.
						  $this->tables['groups'].'.description AS group_description');
		
		if (!empty($this->columns))
		{
		    foreach ($this->columns as $value)
    		{
    			$this->db->select($this->tables['meta'].'.'.$value);
    		}
		}
		
		$this->db->join($this->tables['meta'], $this->tables['users'].'.id = '.$this->tables['meta'].'.'.$this->meta_join, 'left');
		$this->db->join($this->tables['groups'], $this->tables['users'].'.group_id = '.$this->tables['groups'].'.id', 'left');
		
		$this->db->where($this->tables['users']. '.active, 1');

		$query = $this->db->get($this->tables['users']);
		return $query->result();
	}
	
	/**
	 * get_active_users_array
	 *
	 * @return array
	 * @author Ben Edmunds
	 **/
	public function get_active_users_array()
	{
	    $this->db->select($this->tables['users'].'.id, '.
						  $this->tables['users'].'.username, ' .
						  $this->tables['users'].'.password, '.
						  $this->tables['users'].'.email, '.
						  $this->tables['users'].'.activation_code, '.
						  $this->tables['users'].'.forgotten_password_code , '.
						  $this->tables['users'].'.ip_address, '.
						  $this->tables['users'].'.active, '.
						  $this->tables['groups'].'.name AS group_name, '.
						  $this->tables['groups'].'.description AS group_description');
		
		if (!empty($this->columns))
		{
		    foreach ($this->columns as $value)
    		{
    			$this->db->select($this->tables['meta'].'.'.$value);
    		}
		}
		
		$this->db->join($this->tables['meta'], $this->tables['users'].'.id = '.$this->tables['meta'].'.'.$this->meta_join, 'left');
		$this->db->join($this->tables['groups'], $this->tables['users'].'.group_id = '.$this->tables['groups'].'.id', 'left');
		
		$this->db->where($this->tables['users']. '.active, 1');

		$query = $this->db->get($this->tables['users']);
		return $query->result_array();
	}
	
	/**
	 * get_user
	 *
	 * @return object
	 * @author Ben Edmunds
	 **/
	public function get_user($id=false)
	{
		//if no id was passed use the current users id
		if (!$id) 
		{
			$id = $this->ci->session->userdata('user_id');
		}
		
	    $this->db->select($this->tables['users'].'.id, '.
						  $this->tables['users'].'.username, ' .
						  $this->tables['users'].'.password, '.
						  $this->tables['users'].'.email, '.
						  $this->tables['users'].'.activation_code, '.
						  $this->tables['users'].'.forgotten_password_code , '.
						  $this->tables['users'].'.ip_address, '.
						  $this->tables['users'].'.active, '.
						  $this->tables['groups'].'.name AS group_name, '.
						  $this->tables['groups'].'.description AS group_description');
		
		if (!empty($this->columns))
		{
		    foreach ($this->columns as $value)
    		{
    			$this->db->select($this->tables['meta'].'.'.$value);
    		}
		}
		
		$query = $this->db->join($this->tables['meta'], $this->tables['users'].'.id = '.$this->tables['meta'].'.'.$this->meta_join, 'left')
				 	  	  ->join($this->tables['groups'], $this->tables['users'].'.group_id = '.$this->tables['groups'].'.id', 'left')
				 	  	  ->where($this->tables['users'].'.id', $id)
	    		 	  	  ->limit(1)
		 			  	  ->get($this->tables['users']);
		
		return $query->row();
	}
	
	/**
	 * get_user_array
	 *
	 * @return array User
	 * @author Ben Edmunds
	 **/
	public function get_user_array($id=false)
	{
		//if no id was passed use the current users id
		if (!$id) 
		{
			$id = $this->ci->session->userdata('user_id');
		}
		
	    $this->db->select($this->tables['users'].'.id, '.
						  $this->tables['users'].'.username, ' .
						  $this->tables['users'].'.password, '.
						  $this->tables['users'].'.email, '.
						  $this->tables['users'].'.activation_code, '.
						  $this->tables['users'].'.forgotten_password_code , '.
						  $this->tables['users'].'.ip_address, '.
						  $this->tables['users'].'.active, '.
						  $this->tables['groups'].'.name AS group_name, '.
						  $this->tables['groups'].'.description AS group_description');
		
		if (!empty($this->columns))
		{
		    foreach ($this->columns as $value)
    		{
    			$this->db->select($this->tables['meta'].'.'.$value);
    		}
		}
		
		$query = $this->db->join($this->tables['meta'], $this->tables['users'].'.id = '.$this->tables['meta'].'.'.$this->meta_join, 'left')
				 	  	  ->join($this->tables['groups'], $this->tables['users'].'.group_id = '.$this->tables['groups'].'.id', 'left')
				 	  	  ->where($this->tables['users'].'.id', $id)
	    		 	  	  ->limit(1)
		 			  	  ->get($this->tables['users']);
		
		return $query->row_array();
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
			$id = $this->ci->session->userdata('user_id');
		}
		
	    $userQuery    = $this->db->select('group_id')
	    				         ->where('id', $id)
                    	         ->get($this->tables['users']);

		$user         = $userQuery->row_array();
		
		$groupQuery   = $this->db->select('name, description')
	    				         ->where('id', $user['group_id'])
                    	         ->get($this->tables['groups']);
                    	         
        return $groupQuery->row();
	}
}