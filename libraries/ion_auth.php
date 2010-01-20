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
 
class ion_auth
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
	public function activate($code)
	{
		return $this->ci->ion_auth_model->activate($code);
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
		$forgotten_password = $this->ci->ion_auth_model->forgotten_password($email);
		
		if ($forgotten_password) 
		{
			// Get user information.
			$profile = $this->ci->ion_auth_model->profile($email);

			$data = array('identity'                => $profile->{$this->ci->config->item('identity')},
    			          'forgotten_password_code' => $profile->forgotten_password_code);
                
			$message = $this->ci->load->view($this->ci->config->item('email_templates').$this->ci->config->item('email_forgot_password'), $data, true);
				
			$this->ci->email->clear();
			$config['mail_type'] = "html";
			$this->ci->email->initialize($config);
			$this->ci->email->set_newline("\r\n");
			$this->ci->email->from("admin@".$this->ci->config->item('site_title'), $this->ci->config->item('site_title'));
			$this->ci->email->to($profile->email);
			$this->ci->email->subject($this->ci->config->item('site_title') . ' Email Verification (Forgotten Password)');
			$this->ci->email->message($message);
			return $this->ci->email->send();
		}
		else 
		{
			return false;
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
			$data = array('identity'     => $profile->{$identity},
				          'new_password' => $new_password);
            
			$message = $this->ci->load->view($this->ci->config->item('email_templates').$this->ci->config->item('email_forgot_password_complete'), $data, true);
				
			$this->ci->email->clear();
			$this->ci->email->set_newline("\r\n");
			$this->ci->email->from("admin@".$this->ci->config->item('site_title'), $this->ci->config->item('site_title'));
			$this->ci->email->to($profile->email);
			$this->ci->email->subject($this->ci->config->item('site_title') . ' - New Password');
			$this->ci->email->message($message);
			return $new_password; //debug
			return $this->ci->email->send();
		}
		else
		{
			return false;
		}
	}

	/**
	 * register
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function register($username, $password, $email)
	{
	    $email_activation = $this->ci->config->item('email_activation');
	    $email_folder     = $this->ci->config->item('email_templates');

		if (!$email_activation)
		{
			return $this->ci->ion_auth_model->register($username, $password, $email);
		}
		else
		{
			$register = $this->ci->ion_auth_model->register($username, $password, $email);
            
			if (!$register) { return false; }

			$deactivate = $this->ci->ion_auth_model->deactivate($username);

			if (!$deactivate) { return false; }

			$activation_code = $this->ci->ion_auth_model->activation_code;

			$data = array('username'   => $username,
        				  'password'   => $password,
        				  'email'      => $email,
        				  'activation' => $activation_code);
            
			$message = $this->ci->load->view($email_folder.'activation', $data, true);
            
			$this->ci->email->clear();
			$this->ci->email->set_newline("\r\n");
			$this->ci->email->from("admin@".$this->ci->config->item('site_title'), $this->ci->config->item('site_title'));
			$this->ci->email->to($email);
			$this->ci->email->subject('Email Activation (Registration)');
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
		$this->ci->session->sess_destroy();
	}
	
	/**
	 * logged_in
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function logged_in()
	{
	    $identity = $this->ci->config->item('identity');
		return ($this->ci->session->userdata($identity)) ? true : false;
	}
	
	/**
	 * is_admin
	 *
	 * @return void
	 * @author Ben Edmunds
	 **/
	public function is_admin()
	{
	    $admin_group = $this->ci->config->item('admin_group');
	    $user_group  = $this->ci->session->userdata('group');
	    return ($user_group == $admin_group) ? true : false;
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
	public function get_users()
	{
	    return $this->ci->ion_auth_model->get_users();
	}
	
	/**
	 * Get Users Array
	 *
	 * @return array Users
	 * @author Ben Edmunds
	 **/
	public function get_users_array()
	{
	    return $this->ci->ion_auth_model->get_users_array();
	}
	
	/**
	 * Get Active Users
	 *
	 * @return object Users
	 * @author Ben Edmunds
	 **/
	public function get_active_users()
	{
	    return $this->ci->ion_auth_model->get_active_users();
	}
	
	/**
	 * Get Active Users Array
	 *
	 * @return object Users
	 * @author Ben Edmunds
	 **/
	public function get_active_users_array()
	{
	    return $this->ci->ion_auth_model->get_active_users_array();
	}
	
	/**
	 * Get User
	 *
	 * @return object User
	 * @author Ben Edmunds
	 **/
	public function get_user($id=false)
	{
	    return $this->ci->ion_auth_model->get_user($id);
	}
	
	/**
	 * Get User as Array
	 *
	 * @return array User
	 * @author Ben Edmunds
	 **/
	public function get_user_array($id=false)
	{
	    return $this->ci->ion_auth_model->get_user_array($id);
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
	
}
