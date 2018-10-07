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
 * Requirements: PHP7.1 or above
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
	public $_cacheUserInGroup;

	/**
	 * @var \CodeIgniter\Email\Email
	 */
	protected $email;

	/**
	 * __construct
	 *
	 * @author Ben
	 */
	public function __construct()
	{
		// Check compat first
		$this->checkCompatibility();

		$this->config = config('IonAuth\\Config\\IonAuth');

		$this->email = \Config\Services::email();
		//$this->lang->load('ion_auth');
		//$this->load->helper(['cookie', 'language','url']);

		//$this->session = \Config\Services::session();   //$this->load->library('session');

		$this->ionAuthModel = new \IonAuth\Models\IonAuthModel();

		$this->_cacheUserInGroup =& $this->ionAuthModel->_cacheUserInGroup;

		$emailConfig = $this->config->emailConfig;

		if ($this->config->useCiEmail && isset($emailConfig) && is_array($emailConfig))
		{
			$this->email->initialize($emailConfig);
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

				if (!$this->config->useCiEmail)
				{
					$this->setMessage('forgot_password_successful');
					return $data;
				}
				else
				{
					$message = $this->load->view($this->config->emailTemplates . $this->config->emailForgotPassword, $data, true);
					$this->email->clear();
					$this->email->from($this->config->adminEmail, $this->config->siteTitle);
					$this->email->to($user->email);
					$this->email->subject($this->config->siteTitle . ' - ' . $this->lang->line('email_forgotten_password_subject'));
					$this->email->message($message);

					if ($this->email->send())
					{
						$this->setMessage('forgot_password_successful');
						return true;
					}
				}
			}
		}

		$this->setError('forgot_password_unsuccessful');
		return false;
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
			return false;
		}
		else
		{
			if ($this->config->forgotPasswordExpiration > 0)
			{
				//Make sure it isn't expired
				$expiration = $this->config->forgotPasswordExpiration;
				if (time() - $user->forgotten_password_time > $expiration)
				{
					//it has expired
					$identity = $user->{$this->config->identity};
					$this->ionAuthModel->clearForgottenPasswordCode($identity);
					$this->setError('password_change_unsuccessful');
					return false;
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
	 *                        completed; or an array of activation details if CI e-mail validation is enabled; or false
	 *                        if the operation failed.
	 * @author Mathew
	 */
	public function register($identity, $password, $email, $additional_data = [], $group_ids = [])
	{
		$this->ionAuthModel->triggerEvents('pre_account_creation');

		$emailActivation = $this->config->emailActivation;

		$id = $this->ionAuthModel->register($identity, $password, $email, $additional_data, $group_ids);

		if (!$emailActivation)
		{
			if ($id !== false)
			{
				$this->setMessage('account_creation_successful');
				$this->ionAuthModel->triggerEvents(['post_account_creation', 'post_account_creation_successful']);
				return $id;
			}
			else
			{
				$this->setError('account_creation_unsuccessful');
				$this->ionAuthModel->triggerEvents(['post_account_creation', 'post_account_creation_unsuccessful']);
				return false;
			}
		}
		else
		{
			if (! $id)
			{
				$this->setError('account_creation_unsuccessful');
				return false;
			}

			// deactivate so the user much follow the activation flow
			$deactivate = $this->ionAuthModel->deactivate($id);

			// the deactivate method call adds a message, here we need to clear that
			$this->ionAuthModel->clearMessages();

			if (! $deactivate)
			{
				$this->setError('deactivate_unsuccessful');
				$this->ionAuthModel->triggerEvents(['post_account_creation', 'post_account_creation_unsuccessful']);
				return false;
			}

			$activationCode = $this->ionAuthModel->activation_code;
			$identity       = $this->config->identity;
			$user           = $this->ionAuthModel->user($id)->row();

			$data = [
				'identity'   => $user->{$identity},
				'id'         => $user->id,
				'email'      => $email,
				'activation' => $activationCode,
			];
			if (! $this->config->useCiEmail)
			{
				$this->ionAuthModel->triggerEvents(['post_account_creation', 'post_account_creation_successful', 'activation_email_successful']);
				$this->setMessage('activation_email_successful');
				return $data;
			}
			else
			{
				$message = $this->load->view($this->config->emailTemplates . $this->config->emailActivate, $data, true);

				$this->email->clear();
				$this->email->from($this->config->adminEmail, $this->config->siteTitle);
				$this->email->to($email);
				$this->email->subject($this->config->siteTitle . ' - ' . $this->lang->line('emailActivation_subject'));
				$this->email->message($message);

				if ($this->email->send() === true)
				{
					$this->ionAuthModel->triggerEvents(['post_account_creation', 'post_account_creation_successful', 'activation_email_successful']);
					$this->setMessage('activation_email_successful');
					return $id;
				}

			}

			$this->ionAuthModel->triggerEvents(['post_account_creation', 'post_account_creation_unsuccessful', 'activation_email_unsuccessful']);
			$this->setError('activation_email_unsuccessful');
			return false;
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
		delete_cookie($this->config->rememberCookieName);

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
		$this->session->sess_regenerate(true);

		$this->setMessage('logout_successful');
		return true;
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
		if (!$recheck && get_cookie($this->config->rememberCookieName))
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
	public function isAdmin($id = false)
	{
		$this->ionAuthModel->triggerEvents('is_admin');

		$adminGroup = $this->config->adminGroup;

		return $this->ionAuthModel->inGroup($adminGroup, $id);
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
