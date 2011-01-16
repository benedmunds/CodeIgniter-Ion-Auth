<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Model
*
* Author:  Ben Edmunds
* 		   ben.edmunds@gmail.com
*	  	   @benedmunds
*
* Added Awesomeness: Phil Sturgeon
*
* Location: http://github.com/benedmunds/CodeIgniter-Ion-Auth
*
* Created:  10.01.2009
*
* Description:  Modified auth system based on redux_auth with extensive customization.  This is basically what Redux Auth 2 should be.
* Original Author name has been kept but that does not mean that the method has not been modified.
*
* Requirements: PHP5 or above
*
*/

//  CI 2.0 Compatibility
if(!class_exists('CI_Model')) { class CI_Model extends Model {} }


class Ion_auth_model extends CI_Model
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

	public $_where = array();

	public $_limit = NULL;

	public $_offset = NULL;

	public $_order_by = NULL;

	public $_order = NULL;

	protected $response = NULL;
	

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->config('ion_auth', TRUE);
		$this->load->helper('cookie');
		$this->load->helper('date');
		$this->load->library('session');

		$this->tables  = $this->config->item('tables', 'ion_auth');
		$this->columns = $this->config->item('columns', 'ion_auth');

		$this->identity_column = $this->config->item('identity', 'ion_auth');
		$this->store_salt      = $this->config->item('store_salt', 'ion_auth');
		$this->salt_length     = $this->config->item('salt_length', 'ion_auth');
		$this->meta_join       = $this->config->item('join', 'ion_auth');
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
	public function hash_password($password, $salt=false)
	{
	    if (empty($password))
	    {
	    	return FALSE;
	    }

	    if ($this->store_salt && $salt)
	    {
		    return  sha1($password . $salt);
	    }
	    else
	    {
		$salt = $this->salt();
		return  $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
	    }
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
		return FALSE;
	   }

	   $query = $this->db->select('password')
			     ->select('salt')
			     ->where($this->identity_column, $identity)
			     ->where($this->ion_auth->_extra_where)
			     ->limit(1)
			     ->get($this->tables['users']);

	    $result = $query->row();

	    if ($query->num_rows() !== 1)
	    {
		return FALSE;
	    }

	    if ($this->store_salt)
	    {
		return sha1($password . $result->salt);
	    }
	    else
	    {
		$salt = substr($result->password, 0, $this->salt_length);

		return $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
	    }
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
			return FALSE;
		}

		$identity = $result->{$this->identity_column};

		$data = array(
			    'activation_code' => '',
			    'active'	  => 1
			     );

		$this->db->where($this->ion_auth->_extra_where);
		$this->db->update($this->tables['users'], $data, array($this->identity_column => $identity));
	    }
	    else
	    {
		$data = array(
			    'activation_code' => '',
			    'active' => 1
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

	    $data = array(
		    'activation_code' => $activation_code,
		    'active'	  => 0
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
	    $query = $this->db->select('password, salt')
			      ->where($this->identity_column, $identity)
			      ->where($this->ion_auth->_extra_where)
			      ->limit(1)
			      ->get($this->tables['users']);

	    $result = $query->row();

	    $db_password = $result->password;
	    $old	 = $this->hash_password_db($identity, $old);
	    $new	 = $this->hash_password($new, $result->salt);

	    if ($db_password === $old)
	    {
	    	//store the new password and reset the remember code so all remembered instances have to re-login
		$data = array(
			    'password' => $new,
			    'remember_code' => '',
			     );

		$this->db->where($this->ion_auth->_extra_where);
		$this->db->update($this->tables['users'], $data, array($this->identity_column => $identity));

		return $this->db->affected_rows() == 1;
	    }

	    return FALSE;
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
		return FALSE;
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
		return FALSE;
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
	public function forgotten_password_complete($code, $salt=FALSE)
	{
	    if (empty($code))
	    {
		return FALSE;
	    }

	    $this->db->where('forgotten_password_code', $code);

	    if ($this->db->count_all_results($this->tables['users']) > 0)
	    {
		$password = $this->salt();

		$data = array(
			    'password'			=> $this->hash_password($password, $salt),
			    'forgotten_password_code'   => '0',
			    'active'			=> 1,
			     );

		$this->db->update($this->tables['users'], $data, array('forgotten_password_code' => $code));

		return $password;
	    }

	    return FALSE;
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
	public function register($username, $password, $email, $additional_data = false, $groups = array())
	{
	    if ($this->identity_column == 'email' && $this->email_check($email))
	    {
			$this->ion_auth->set_error('account_creation_duplicate_email');
			return FALSE;
	    }
	    elseif ($this->identity_column == 'username' && $this->username_check($username))
	    {
			$this->ion_auth->set_error('account_creation_duplicate_username');
			return FALSE;
	    }

	    // If username is taken, use username1 or username2, etc.
	    if ($this->identity_column != 'username')
	    {
			for($i = 0; $this->username_check($username); $i++)
			{
				if($i > 0)
				{
				$username .= $i;
				}
			}
	    }


	    // IP Address
	    $ip_address = $this->input->ip_address();
	    $salt       = $this->store_salt ? $this->salt() : FALSE;
	    $password	= $this->hash_password($password, $salt);

	    // Users table.
	    $data = array(
			'username'   => $username,
			'password'   => $password,
			'email'      => $email,
			'ip_address' => $ip_address,
			'created_on' => now(),
			'last_login' => now(),
			'active'     => 1
			 );

	    if ($this->store_salt)
	    {
			$data['salt'] = $salt;
	    }

	    if($this->ion_auth->_extra_set)
	    {
			$this->db->set($this->ion_auth->_extra_set);
	    }

	    $this->db->insert($this->tables['users'], $data);

	    $id = $this->db->insert_id();


		if (!empty($groups))
		{
			//add to groups
			foreach ($groups as $group)
			{
				$this->add_to_group($group, $id);
			}
		}


	    // Meta table.
	    $data = array($this->meta_join => $id);

	    if (!empty($this->columns))
	    {
			foreach ($this->columns as $input)
			{
				if (is_array($additional_data) && isset($additional_data[$input]))
				{
					$data[$input] = $additional_data[$input];
				}
				elseif ($this->input->post($input))
				{
					$data[$input] = $this->input->post($input);
				}
			}
	    }

	    $this->db->insert($this->tables['meta'], $data);

	    return $this->db->affected_rows() > 0 ? $id : false;
	}

	/**
	 * login
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function login($identity, $password, $remember=FALSE)
	{
	    if (empty($identity) || empty($password) || !$this->identity_check($identity))
	    {
		return FALSE;
	    }

	    $query = $this->db->select($this->identity_column.', id, password, group_id')
			      ->where($this->identity_column, $identity)
			      ->where('active', 1)
			      ->where($this->ion_auth->_extra_where)
			      ->limit(1)
			      ->get($this->tables['users']);

	    $result = $query->row();

	    if ($query->num_rows() == 1)
	    {
			$password = $this->hash_password_db($identity, $password);

			if ($result->password === $password)
			{
				$this->update_last_login($result->id);

				$session_data = array(
							$this->identity_column => $result->{$this->identity_column},
							'id'                   => $result->id, //kept for backwards compatibility
							'user_id'              => $result->id, //everyone likes to overwrite id so we'll use user_id
						 );

				$this->session->set_userdata($session_data);

				if ($remember && $this->config->item('remember_users', 'ion_auth'))
				{
					$this->remember_user($result->id);
				}

				return TRUE;
			}
	    }

	    return FALSE;
	}

	public function limit($limit)
	{
		$this->_limit = $limit;
	}
	public function offset($offset)
	{
		$this->_offset = $offset;
	}

	public function where($where, $value=NULL)
	{
		if (isset($value))
			$this->_where[] = array($where => $value);
		elseif (is_array($where))
			$this->_where[] = $where;
	}

	public function order_by($by, $order='desc')
	{
		$this->_order_by = $by;
		$this->_order    = $order;
	}

	public function row()
	{
		return $this->response->row();
	}

	public function row_array()
	{
		return $this->response->row_array();
	}

	public function result()
	{
		return $this->response->result();
	}

	public function result_array()
	{
		return $this->response->result_array();
	}


	/**
	 * users
	 *
	 * @return object Users
	 * @author Ben Edmunds
	 **/
	public function users()
	{
	    $this->db->select(array(
					$this->tables['users'].'.*',
				   ));

	    if (!empty($this->columns))
	    {
			foreach ($this->columns as $field)
			{
				$this->db->select($this->tables['meta'].'.'. $field);
			}
	    }

	    $this->db->join($this->tables['meta'], $this->tables['users'].'.id = '.$this->tables['meta'].'.'.$this->meta_join, 'left');

		
	    if (isset($this->ion_auth->_extra_where))
	    {
			$this->db->where($this->ion_auth->_extra_where);
	    }

		//run each where that was passed
		if (isset($this->_where))
	    {
			foreach ($this->_where as $where)
				$this->db->where($where);

			unset($this->_where);
	    }


		if (isset($this->_limit) && isset($this->_offset))
		{
			$this->db->limit($this->_limit, $this->_offset);

			unset($this->_limit);
			unset($this->_offset);
		}

		//set the order
		if (isset($this->_order_by) && isset($this->_order))
	    {
			$this->db->order_by($this->_order_by, $this->_order);
	    }
		

	    $this->response = $this->db->get($this->tables['users']);

		return $this;
	}


	/**
	 * user
	 *
	 * @return object
	 * @author Ben Edmunds
	 **/
	public function user($id = NULL)
	{
	    $this->response = $this->limit(1)->users();

		return $this;
	}

	public function current()
	{
	    $this->where('id', $this->session->userdata('user_id'));

		return $this;
	}

	/**
	 * get_users_groups
	 *
	 * @return array
	 * @author Ben Edmunds
	 **/
	public function get_users_groups($id=false)
	{
		//if no id was passed use the current users id
		$id || $id = $this->session->userdata('user_id');

		return $this->db->select($this->tables['users_groups'].'.group_id as id, '.$this->tables['groups'].'.name, '.$this->tables['groups'].'.description')
						->where($this->tables['users_groups'].'.user_id', $id)
						->join($this->tables['groups'], $this->tables['users_groups'].'.group_id='.$this->tables['groups'].'.id')
						->get($this->tables['users_groups'])
						->result();
	}


	/**
	 * add_to_group
	 *
	 * @return bool
	 * @author Ben Edmunds
	 **/
	public function add_to_group($group_id, $user_id=false)
	{
		//if no id was passed use the current users id
		$user_id || $user_id = $this->session->userdata('user_id');

		return $this->db->insert($this->tables['users_groups'], array('group_id' => (int)$group_id, 'user_id' => (int)$user_id));
	}

	/**
	 * remove_from_group
	 *
	 * @return bool
	 * @author Ben Edmunds
	 **/
	public function remove_from_group($group_id, $user_id=false)
	{
		//if no id was passed use the current users id
		$user_id || $user_id = $this->session->userdata('user_id');

		return $this->db->delete($this->tables['users_groups'], array('group_id' => (int)$group_id, 'user_id' => (int)$user_id));
	}

	/**
	 * groups
	 *
	 * @return object
	 * @author Ben Edmunds
	 **/
	public function groups()
  	{
		//run each where that was passed
		if (isset($this->_where))
	    {
			foreach ($this->_where as $where)
				$this->db->where($where);

			unset($this->_where);
	    }


		if (isset($this->_limit) && isset($this->_offset))
		{
			$this->db->limit($this->_limit, $this->_offset);

			unset($this->_limit);
			unset($this->_offset);
		}

		//set the order
		if (isset($this->_order_by) && isset($this->_order))
	    {
			$this->db->order_by($this->_order_by, $this->_order);
	    }

    	$this->response = $this->db->get($this->tables['groups']);

		return $this;
  	}

	/**
	 * group
	 *
	 * @return object
	 * @author Ben Edmunds
	 **/
	public function group()
  	{
		$this->limit(1);

		return $this->groups();
  	}


	/**
	 * update_user
	 *
	 * @return bool
	 * @author Phil Sturgeon
	 **/
	public function update($data)
	{
	    $user = $this->user()->row();

	    $this->db->trans_begin();

	    if (array_key_exists($this->identity_column, $data) && $this->identity_check($data[$this->identity_column]) && $user->{$this->identity_column} !== $data[$this->identity_column])
	    {
			$this->ion_auth->set_error('account_creation_duplicate_'.$this->identity_column);
			return FALSE;
	    }

	    if (!empty($this->columns))
	    {
			//filter the data passed by the columns in the config
			$meta_fields = array();
			foreach ($this->columns as $field)
			{
				if (is_array($data) && isset($data[$field]))
				{
					$meta_fields[$field] = $data[$field];
					unset($data[$field]);
				}
			}

			//update the meta data
			if (count($meta_fields) > 0)
			{
				// 'user_id' = $id
				$this->db->where($this->meta_join, $user->id);
				$this->db->set($meta_fields);
				$this->db->update($this->tables['meta']);
			}
	    }

	    if (array_key_exists('username', $data) || array_key_exists('password', $data) || array_key_exists('email', $data))
	    {
			if (array_key_exists('password', $data))
			{
				$data['password'] = $this->hash_password($data['password'], $user->salt);
			}

			$this->db->where($this->ion_auth->_extra_where);

			$this->db->update($this->tables['users'], $data, array('id' => $user->id));
	    }

	    if ($this->db->trans_status() === FALSE)
	    {
			$this->db->trans_rollback();
			return FALSE;
	    }

	    $this->db->trans_commit();
		
	    return TRUE;
	}


	/**
	 * delete_user
	 *
	 * @return bool
	 * @author Phil Sturgeon
	 **/
	public function delete_user($id)
	{
	    $this->db->trans_begin();

	    $this->db->delete($this->tables['meta'], array($this->meta_join => $id));
	    $this->db->delete($this->tables['users'], array('id' => $id));

	    if ($this->db->trans_status() === FALSE)
	    {
		$this->db->trans_rollback();
		return FALSE;
	    }

	    $this->db->trans_commit();
	    return TRUE;
	}


	/**
	 * update_last_login
	 *
	 * @return bool
	 * @author Ben Edmunds
	 **/
	public function update_last_login($id)
	{
	    $this->load->helper('date');

	    if (isset($this->ion_auth->_extra_where))
	    {
		$this->db->where($this->ion_auth->_extra_where);
	    }

	    $this->db->update($this->tables['users'], array('last_login' => now()), array('id' => $id));

	    return $this->db->affected_rows() == 1;
	}


	/**
	 * set_lang
	 *
	 * @return bool
	 * @author Ben Edmunds
	 **/
	public function set_lang($lang = 'en')
	{
	    set_cookie(array(
			'name'   => 'lang_code',
			'value'  => $lang,
			'expire' => $this->config->item('user_expire', 'ion_auth') + time()
			    ));

	    return TRUE;
	}

	/**
	 * login_remembed_user
	 *
	 * @return bool
	 * @author Ben Edmunds
	 **/
	public function login_remembered_user()
	{
	    //check for valid data
	    if (!get_cookie('identity') || !get_cookie('remember_code') || !$this->identity_check(get_cookie('identity')))
	    {
		    return FALSE;
	    }

	    //get the user
	    if (isset($this->ion_auth->_extra_where))
	    {
		$this->db->where($this->ion_auth->_extra_where);
	    }

	    $query = $this->db->select($this->identity_column.', id')
			      ->where($this->identity_column, get_cookie('identity'))
			      ->where('remember_code', get_cookie('remember_code'))
			      ->limit(1)
			      ->get($this->tables['users']);

	    //if the user was found, sign them in
	    if ($query->num_rows() == 1)
	    {
		$user = $query->row();

		$this->update_last_login($user->id);

		$session_data = array(
				    $this->identity_column => $user->{$this->identity_column},
				    'id'                   => $user->id, //kept for backwards compatibility
				    'user_id'              => $user->id, //everyone likes to overwrite id so we'll use user_id
				     );

		$this->session->set_userdata($session_data);


		//extend the users cookies if the option is enabled
		if ($this->config->item('user_extend_on_login', 'ion_auth'))
		{
		    $this->remember_user($user->id);
		}

		return TRUE;
	    }

	    return FALSE;
	}

	/**
	 * remember_user
	 *
	 * @return bool
	 * @author Ben Edmunds
	 **/
	private function remember_user($id)
	{
	    if (!$id)
	    {
		return FALSE;
	    }

	    $user = $this->get_user($id)->row();

	    $salt = sha1($user->password);

	    $this->db->update($this->tables['users'], array('remember_code' => $salt), array('id' => $id));

	    if ($this->db->affected_rows() > -1)
	    {
		set_cookie(array(
			    'name'   => 'identity',
			    'value'  => $user->{$this->identity_column},
			    'expire' => $this->config->item('user_expire', 'ion_auth'),
				));

		set_cookie(array(
			    'name'   => 'remember_code',
			    'value'  => $salt,
			    'expire' => $this->config->item('user_expire', 'ion_auth'),
				));

		return TRUE;
	    }

	    return FALSE;
	}
}
