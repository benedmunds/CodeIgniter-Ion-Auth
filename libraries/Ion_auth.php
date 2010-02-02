<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth
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
 
class Ion_auth
{
	/**
	 * CodeIgniter global
	 *
	 * @var string
	 **/
	protected $ci;

	/**
	 * account status ('not_activated', etc ...)
	 *
	 * @var string
	 **/
	protected $status;

	/**
	 * extra where
	 *
	 * @var array
	 **/
	public $_extra_where = array();

	/**
	 * extra set
	 *
	 * @var array
	 **/
	public $_extra_set = array();

	/**
	 * __construct
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->config('ion_auth');
		$email = $this->ci->config->item('email');
		$this->ci->load->library('email', $email);
		$this->ci->load->model('ion_auth_model');
	}
	
	/**
	 * Activate user.
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function activate($id, $code=false)
	{
		return $this->ci->ion_auth_model->activate($id, $code);
	}
	
	/**
	 * Deactivate user.
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function deactivate($id)
	{
	    return $this->ci->ion_auth_model->deactivate($id);
	}
	
	/**
	 * Change password.
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function change_password($identity, $old, $new)
	{
        return $this->ci->ion_auth_model->change_password($identity, $old, $new);
	}

	/**
	 * forgotten password feature
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function forgotten_password($email)
	{
		if ( $this->ci->ion_auth_model->forgotten_password($email) ) 
		{
			// Get user information.
			$profile = $this->ci->ion_auth_model->profile($email);

			$data = array(
				'identity'                => $profile->{$this->ci->config->item('identity')},
				'forgotten_password_code' => $profile->forgotten_password_code
			);

			$message = $this->ci->load->view($this->ci->config->item('email_templates').$this->ci->config->item('email_forgot_password'), $data, true);
			$this->ci->email->clear();
			$config['mailtype'] = "html";
			$this->ci->email->initialize($config);
			$this->ci->email->set_newline("\r\n");
			$this->ci->email->from($this->ci->config->item('admin_email'), $this->ci->config->item('site_title'));
			$this->ci->email->to($profile->email);
			$this->ci->email->subject($this->ci->config->item('site_title') . ' - Forgotten Password Verification');
			$this->ci->email->message($message);
			return $this->ci->email->send();
		}
		else 
		{
			return FALSE;
		}
	}
	
	/**
	 * forgotten_password_complete
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function forgotten_password_complete($code)
	{
	    $identity     = $this->ci->config->item('identity');
	    $profile      = $this->ci->ion_auth_model->profile($code);
		$new_password = $this->ci->ion_auth_model->forgotten_password_complete($code);

		if ($new_password) 
		{
			$data = array(
				'identity'     => $profile->{$identity},
				'new_password' => $new_password
			);
            
			$message = $this->ci->load->view($this->ci->config->item('email_templates').$this->ci->config->item('email_forgot_password_complete'), $data, true);
				
			$this->ci->email->clear();
			$config['mailtype'] = "html";
			$this->ci->email->initialize($config);
			$this->ci->email->set_newline("\r\n");
			$this->ci->email->from($this->ci->config->item('admin_email'), $this->ci->config->item('site_title'));
			$this->ci->email->to($profile->email);
			$this->ci->email->subject($this->ci->config->item('site_title') . ' - New Password');
			$this->ci->email->message($message);

			return $this->ci->email->send();
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * register
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function register($username, $password, $email, $additional_data, $group_name = false) //need to test email activation
	{
	    $email_activation = $this->ci->config->item('email_activation');
	    $email_folder     = $this->ci->config->item('email_templates');

		if (!$email_activation)
		{
			return $this->ci->ion_auth_model->register($username, $password, $email, $additional_data, $group_name);
		}
		else
		{
			$register = $this->ci->ion_auth_model->register($username, $password, $email, $additional_data, $group_name);
            
			if (!$register) 
			{ 
				return FALSE; 
			}

			$deactivate = $this->ci->ion_auth_model->deactivate($username);

			if (!$deactivate) 
			{ 
				return FALSE; 
			}

			$activation_code = $this->ci->ion_auth_model->activation_code;

			$data = array('username'   => $username,
        				  'password'   => $password,
        				  'email'      => $email,
        				  'activation' => $activation_code);
            
			$message = $this->ci->load->view($email_folder.'activation', $data, true);
            
			$this->ci->email->clear();
			$config['mailtype'] = "html";
			$this->ci->email->initialize($config);
			$this->ci->email->set_newline("\r\n");
			$this->ci->email->from($this->ci->config->item('admin_email'), $this->ci->config->item('site_title'));
			$this->ci->email->to($email);
			$this->ci->email->subject($this->ci->config->item('site_title') . ' - Account Activation');
			$this->ci->email->message($message);
			
			return $this->ci->email->send();
		}
	}
	
	/**
	 * login
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function login($identity, $password)
	{
		return $this->ci->ion_auth_model->login($identity, $password);
	}
	
	/**
	 * logout
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function logout()
	{
	    $identity = $this->ci->config->item('identity');
	    $this->ci->session->unset_userdata($identity);
	    $this->ci->session->unset_userdata('group');
	    $this->ci->session->unset_userdata('id');
	    $this->ci->session->unset_userdata('user_id');
		$this->ci->session->sess_destroy();
	}
	
	/**
	 * logged_in
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function logged_in()
	{
	    $identity = $this->ci->config->item('identity');
		return (bool) $this->ci->session->userdata($identity);
	}
	
	/**
	 * is_admin
	 *
	 * @return bool
	 * @author Ben Edmunds
	 **/
	public function is_admin()
	{
	    $admin_group = $this->ci->config->item('admin_group');
	    $user_group  = $this->ci->session->userdata('group');
	    return $user_group == $admin_group;
	}
	
	/**
	 * is_group
	 *
	 * @return bool
	 * @author Phil Sturgeon
	 **/
	public function is_group($check_group)
	{
	    $user_group = $this->ci->session->userdata('group');
	    
	    if(is_array($check_group))
	    {
	    	return $user_group == $check_group;
	    }
	    
	    else
	    {
	    	return in_array($user_group, $check_group);
	    }
	}
	
	
	/**
	 * Profile
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function profile()
	{
	    $session  = $this->ci->config->item('identity');
	    $identity = $this->ci->session->userdata($session);
	    return $this->ci->ion_auth_model->profile($identity);
	}
	
	/**
	 * Get Users
	 *
	 * @return object Users
	 * @author Ben Edmunds
	 **/
	public function get_users($group_name = false)
	{
	    return $this->ci->ion_auth_model->get_users($group_name)->result();
	}
	
	/**
	 * Get Users Array
	 *
	 * @return array Users
	 * @author Ben Edmunds
	 **/
	public function get_users_array($group_name = false)
	{
	    return $this->ci->ion_auth_model->get_users($group_name)->result_array();
	}
	
	/**
	 * Get Active Users
	 *
	 * @return object Users
	 * @author Ben Edmunds
	 **/
	public function get_active_users($group_name = false)
	{
	    return $this->ci->ion_auth_model->get_active_users($group_name)->result();
	}
	
	/**
	 * Get Active Users Array
	 *
	 * @return object Users
	 * @author Ben Edmunds
	 **/
	public function get_active_users_array($group_name = false)
	{
	    return $this->ci->ion_auth_model->get_active_users($group_name)->result_array();
	}
	
	/**
	 * Get User
	 *
	 * @return object User
	 * @author Ben Edmunds
	 **/
	public function get_user($id=false)
	{
	    return $this->ci->ion_auth_model->get_user($id)->row();
	}
	
	/**
	 * Get User as Array
	 *
	 * @return array User
	 * @author Ben Edmunds
	 **/
	public function get_user_array($id=false)
	{
	    return $this->ci->ion_auth_model->get_user($id)->row_array();
	}

	
	/**
	 * Get Users Group
	 *
	 * @return object Group
	 * @author Ben Edmunds
	 **/
	public function get_users_group($id=false)
	{
	    return $this->ci->ion_auth_model->get_users_group($id);
	}


	/**
	 * update_user
	 *
	 * @return void
	 * @author Phil Sturgeon
	 **/
	public function update_user($id, $data)
	{
		 return $this->ci->ion_auth_model->update_user($id, $data);
	}

	
	/**
	 * update_user
	 *
	 * @return void
	 * @author Phil Sturgeon
	 **/
	public function delete_user($id)
	{
		 return $this->ci->ion_auth_model->delete_user($id);
	}
	
	
	/**
	 * extra_where
	 * 
	 * Crazy function that allows extra where field to be used for user fetching/unique checking etc.
	 * Basically this allows users to be unique based on one other thing than the identifier which is helpful
	 * for sites using multiple domains on a single database.
	 *
	 * @return void
	 * @author Phil Sturgeon
	 **/
	public function extra_where($field, $value)
	{
		$this->_extra_where = array($field => $value);
	}
	
	/**
	 * extra_set
	 *
	 * Set your extra field for registration
	 *
	 * @return void
	 * @author Phil Sturgeon
	 **/
	public function extra_set($field, $value)
	{
		$this->_extra_set = array($field => $value);
	}
	
}