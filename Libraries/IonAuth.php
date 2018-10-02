<?php namespace IonAuth\Libraries;

/**
 * Name:    Ion Auth
 * Author:  Ben Edmunds
 *           ben.edmunds@gmail.com
 *           @benedmunds
 *
 * Added Awesomeness: Phil Sturgeon
 *
 * Created:  10.01.2009
 *
 * Description:  Modified auth system based on redux_auth with extensive customization. This is basically what Redux Auth 2 should be.
 * Original Author name has been kept but that does not mean that the method has not been modified.
 *
 * Requirements: PHP5.6 or above
 *
 * @package    CodeIgniter-Ion-Auth
 * @author     Ben Edmunds
 * @link       http://github.com/benedmunds/CodeIgniter-Ion-Auth
 * @filesource
 */

/**
 * Class IonAuth
 */
class IonAuth
{
	private $config;

	/**
	 *
	 * @var \IonAuth\Models\IonAuthModel
	 */
	private $ionAuthModel;

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
	public $_extra_where = [];

	/**
	 * extra set
	 *
	 * @var array
	 **/
	public $_extra_set = [];

	/**
	 * caching of users and their groups
	 *
	 * @var array
	 **/
	public $_cache_user_in_group;

	/**
	 * __construct
	 *
	 * @author Ben
	 */
	public function __construct()
	{
		// Check compat first
		$this->checkCompatibility();

		$this->config = new \Config\IonAuth();

		//$this->load->library(['email']);
		//$this->lang->load('ion_auth');
		//$this->load->helper(['cookie', 'language','url']);

		//$this->session = \Config\Services::session();   //$this->load->library('session');

		$this->ionAuthModel = new \IonAuth\Models\IonAuthModel();

		$this->_cache_user_in_group =& $this->ionAuthModel->_cache_user_in_group;

		$email_config = $this->config->email_config;

		if ($this->config->use_ci_email && isset($email_config) && is_array($email_config))
		{
			$this->email->initialize($email_config);
		}

		$this->ionAuthModel->triggerEvents('library_constructor');
	}

	/**
	 * __call
	 *
	 * Acts as a simple way to call model methods without loads of stupid alias'
	 *
	 * @param string $method
	 * @param array  $arguments
	 *
	 * @return mixed
	 * @throws Exception
	 */
	public function __call($method, $arguments)
	{
		if (!method_exists( $this->ionAuthModel, $method) )
		{
			throw new \Exception('Undefined method Ion_auth::' . $method . '() called');
		}
		if($method == 'create_user')
		{
			return call_user_func_array([$this, 'register'], $arguments);
		}
		if($method=='update_user')
		{
			return call_user_func_array([$this, 'update'], $arguments);
		}
		return call_user_func_array( [$this->ionAuthModel, $method], $arguments);
	}

	/**
	 * __get
	 *
	 * Enables the use of CI super-global without having to define an extra variable.
	 *
	 * I can't remember where I first saw this, so thank you if you are the original author. -Militis
	 *
	 * @param    string $var
	 *
	 * @return    mixed
	 */
	public function __get($var)
	{
		return get_instance()->$var;
	}

	/**
	 * Forgotten password feature
	 *
	 * @param string $identity
	 *
	 * @return array|bool
	 * @author Mathew
	 */
	public function forgottenPassword($identity)
	{
		// Retrieve user information
		$user = $this->where($this->ionAuthModel->identity_column, $identity)
					 ->where('active', 1)
					 ->users()->row();

		if ($user)
		{
			// Generate code
			$code = $this->ionAuthModel->forgottenPassword($identity);

			if ($code)
			{
				$data = [
					'identity' => $identity,
					'forgotten_password_code' => $code
				];

				if (!$this->config->use_ci_email)
				{
					$this->setMessage('forgot_password_successful');
					return $data;
				}
				else
				{
					$message = $this->load->view($this->config->email_templates . $this->config->email_forgot_password, $data, TRUE);
					$this->email->clear();
					$this->email->from($this->config->admin_email, $this->config->site_title);
					$this->email->to($user->email);
					$this->email->subject($this->config->site_title . ' - ' . $this->lang->line('email_forgotten_password_subject'));
					$this->email->message($message);

					if ($this->email->send())
					{
						$this->setMessage('forgot_password_successful');
						return TRUE;
					}
				}
			}
		}

		$this->setError('forgot_password_unsuccessful');
		return FALSE;
	}

	/**
	 * forgotten_password_check
	 *
	 * @param string $code
	 *
	 * @return object|bool
	 * @author Michael
	 */
	public function forgottenPasswordCheck($code)
	{
		$user = $this->ionAuthModel->getUserByForgottenPasswordCode($code);

		if (!is_object($user))
		{
			$this->setError('password_change_unsuccessful');
			return FALSE;
		}
		else
		{
			if ($this->config->forgot_password_expiration > 0)
			{
				//Make sure it isn't expired
				$expiration = $this->config->forgot_password_expiration;
				if (time() - $user->forgotten_password_time > $expiration)
				{
					//it has expired
					$identity = $user->{$this->config->identity};
					$this->ionAuthModel->clearForgottenPasswordCode($identity);
					$this->setError('password_change_unsuccessful');
					return FALSE;
				}
			}
			return $user;
		}
	}

	/**
	 * register
	 *
	 * @param string $identity
	 * @param string $password
	 * @param string $email
	 * @param array  $additional_data
	 * @param array  $group_ids
	 *
	 * @return int|array|bool The new user's ID if e-mail activation is disabled or Ion-Auth e-mail activation was
	 *                        completed; or an array of activation details if CI e-mail validation is enabled; or FALSE
	 *                        if the operation failed.
	 * @author Mathew
	 */
	public function register($identity, $password, $email, $additional_data = [], $group_ids = [])
	{
		$this->ionAuthModel->triggerEvents('pre_account_creation');

		$email_activation = $this->config->email_activation;

		$id = $this->ionAuthModel->register($identity, $password, $email, $additional_data, $group_ids);

		if (!$email_activation)
		{
			if ($id !== FALSE)
			{
				$this->setMessage('account_creation_successful');
				$this->ionAuthModel->triggerEvents(['post_account_creation', 'post_account_creation_successful']);
				return $id;
			}
			else
			{
				$this->setError('account_creation_unsuccessful');
				$this->ionAuthModel->triggerEvents(['post_account_creation', 'post_account_creation_unsuccessful']);
				return FALSE;
			}
		}
		else
		{
			if (!$id)
			{
				$this->setError('account_creation_unsuccessful');
				return FALSE;
			}

			// deactivate so the user much follow the activation flow
			$deactivate = $this->ionAuthModel->deactivate($id);

			// the deactivate method call adds a message, here we need to clear that
			$this->ionAuthModel->clearMessages();

			if (!$deactivate)
			{
				$this->setError('deactivate_unsuccessful');
				$this->ionAuthModel->triggerEvents(['post_account_creation', 'post_account_creation_unsuccessful']);
				return FALSE;
			}

			$activation_code = $this->ionAuthModel->activation_code;
			$identity        = $this->config->identity;
			$user            = $this->ionAuthModel->user($id)->row();

			$data = [
				'identity'   => $user->{$identity},
				'id'         => $user->id,
				'email'      => $email,
				'activation' => $activation_code,
			];
			if(!$this->config->use_ci_email)
			{
				$this->ionAuthModel->triggerEvents(['post_account_creation', 'post_account_creation_successful', 'activation_email_successful']);
				$this->setMessage('activation_email_successful');
				return $data;
			}
			else
			{
				$message = $this->load->view($this->config->email_templates . $this->config->email_activate, $data, true);

				$this->email->clear();
				$this->email->from($this->config->admin_email, $this->config->site_title);
				$this->email->to($email);
				$this->email->subject($this->config->site_title . ' - ' . $this->lang->line('email_activation_subject'));
				$this->email->message($message);

				if ($this->email->send() === TRUE)
				{
					$this->ionAuthModel->triggerEvents(['post_account_creation', 'post_account_creation_successful', 'activation_email_successful']);
					$this->setMessage('activation_email_successful');
					return $id;
				}

			}

			$this->ionAuthModel->triggerEvents(['post_account_creation', 'post_account_creation_unsuccessful', 'activation_email_unsuccessful']);
			$this->setError('activation_email_unsuccessful');
			return FALSE;
		}
	}

	/**
	 * Logout
	 *
	 * @return true
	 * @author Mathew
	 **/
	public function logout()
	{
		$this->ionAuthModel->triggerEvents('logout');

		$identity = $this->config->identity;

		$this->session->unset_userdata([$identity, 'id', 'user_id']);

		// delete the remember me cookies if they exist
		delete_cookie($this->config->remember_cookie_name);

		// Clear all codes
		$this->ionAuthModel->clearForgottenPasswordCode($identity);
		$this->ionAuthModel->clearRememberCode($identity);

		// Destroy the session
		$this->session->sess_destroy();

		// Recreate the session
		if (version_compare(PHP_VERSION, '7.0.0') >= 0)
		{
			session_start();
		}
		$this->session->sess_regenerate(TRUE);

		$this->setMessage('logout_successful');
		return TRUE;
	}

	/**
	 * Auto logs-in the user if they are remembered
	 * @return bool Whether the user is logged in
	 * @author Mathew
	 **/
	public function loggedIn()
	{
		$this->ionAuthModel->triggerEvents('logged_in');

		$recheck = $this->ionAuthModel->recheckSession();

		// auto-login the user if they are remembered
		if (!$recheck && get_cookie($this->config->remember_cookie_name))
		{
			$recheck = $this->ionAuthModel->loginRememberedUser();
		}

		return $recheck;
	}

	/**
	 * @return int|null The user's ID from the session user data or NULL if not found
	 * @author jrmadsen67
	 **/
	public function getUserId()
	{
		$user_id = $this->session->userdata('user_id');
		if (!empty($user_id))
		{
			return $user_id;
		}
		return NULL;
	}

	/**
	 * @param int|string|bool $id
	 *
	 * @return bool Whether the user is an administrator
	 * @author Ben Edmunds
	 */
	public function isAdmin($id = FALSE)
	{
		$this->ionAuthModel->triggerEvents('is_admin');

		$admin_group = $this->config->admin_group;

		return $this->ionAuthModel->inGroup($admin_group, $id);
	}

	/**
	 * Check the compatibility with the server
	 *
	 * Script will die in case of error
	 */
	protected function checkCompatibility()
	{
        /*
		// PHP password_* function sanity check
		if (!function_exists('password_hash') || !function_exists('password_verify'))
		{
			show_error("PHP function password_hash or password_verify not found. " .
				"Are you using CI 2 and PHP < 5.5? " .
				"Please upgrade to CI 3, or PHP >= 5.5 " .
				"or use password_compat (https://github.com/ircmaxell/password_compat).");
		}
         */

        /*
		// Sanity check for CI2
		if (substr(CI_VERSION, 0, 1) === '2')
		{
			show_error("Ion Auth 3 requires CodeIgniter 3. Update to CI 3 or downgrade to Ion Auth 2.");
		}
         * 
         */

        /*
		// Compatibility check for CSPRNG
		// See functions used in Ion_auth_model::_randomToken()
		if (!function_exists('random_bytes') && !function_exists('mcrypt_create_iv') && !function_exists('openssl_random_pseudo_bytes'))
		{
			show_error("No CSPRNG functions to generate random enough token. " .
				"Please update to PHP 7 or use random_compat (https://github.com/paragonie/random_compat).");
		}
         * 
         */
	}

}
