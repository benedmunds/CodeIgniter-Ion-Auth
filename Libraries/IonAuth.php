<?php
namespace IonAuth\Libraries;

/**
 * Name:    Ion Auth
 *
 * Created:  10.01.2009
 *
 * Description:  Modified auth system based on redux_auth with extensive customization.
 *               This is basically what Redux Auth 2 should be.
 * Original Author name has been kept but that does not mean that the method has not been modified.
 *
 * Requirements: PHP7.2 or above
 *
 * @package    CodeIgniter-Ion-Auth
 * @author     Ben Edmunds <ben.edmunds@gmail.com>
 * @author     Phil Sturgeon
 * @author     Benoit VRIGNAUD <benoit.vrignaud@zaclys.net>
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link       http://github.com/benedmunds/CodeIgniter-Ion-Auth
 * @filesource
 */

/**
 * This class is the IonAuth library.
 */
class IonAuth
{
	/**
	 * Configuration
	 *
	 * @var \IonAuth\Config\IonAuth
	 */
	protected $config;

	/**
	 * IonAuth model
	 *
	 * @var \IonAuth\Models\IonAuthModel
	 */
	protected $ionAuthModel;

	/**
	 * Email class
	 *
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

		$this->config = config('IonAuth');

		$this->email = \Config\Services::email();
		helper('cookie');

		$this->session = session();

		$this->ionAuthModel = new \IonAuth\Models\IonAuthModel();

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
	 * @param string $method    Method to call
	 * @param array  $arguments Method arguments
	 *
	 * @return mixed
	 * @throws Exception When $method is undefined.
	 */
	public function __call(string $method, array $arguments)
	{
		if (! method_exists( $this->ionAuthModel, $method))
		{
			throw new \Exception('Undefined method Ion_auth::' . $method . '() called');
		}
		if ($method === 'create_user')
		{
			return call_user_func_array([$this, 'register'], $arguments);
		}
		if ($method === 'update_user')
		{
			return call_user_func_array([$this, 'update'], $arguments);
		}
		return call_user_func_array([$this->ionAuthModel, $method], $arguments);
	}

	/**
	 * Forgotten password feature
	 *
	 * @param string $identity Identity
	 *
	 * @return array|boolean
	 * @author Mathew
	 */
	public function forgottenPassword(string $identity)
	{
		// Retrieve user information
		$user = $this->where($this->ionAuthModel->identityColumn, $identity)
					 ->where('active', 1)
					 ->users()->row();

		if ($user)
		{
			// Generate code
			$code = $this->ionAuthModel->forgottenPassword($identity);

			if ($code)
			{
				$data = [
					'identity'              => $identity,
					'forgottenPasswordCode' => $code,
				];

				if (! $this->config->useCiEmail)
				{
					$this->setMessage('IonAuth.forgot_password_successful');
					return $data;
				}
				else
				{
					$message = view($this->config->emailTemplates . $this->config->emailForgotPassword, $data);
					$this->email->clear();
					$this->email->setFrom($this->config->adminEmail, $this->config->siteTitle);
					$this->email->setTo($user->email);
					$this->email->setSubject($this->config->siteTitle . ' - ' . lang('IonAuth.email_forgotten_password_subject'));
					$this->email->setMessage($message);
					if ($this->email->send())
					{
						$this->setMessage('IonAuth.forgot_password_successful');
						return true;
					}
				}
			}
		}

		$this->setError('IonAuth.forgot_password_unsuccessful');
		return false;
	}

	/**
	 * Forgotten password check
	 *
	 * @param string $code Code
	 *
	 * @return object|boolean
	 * @author Michael
	 */
	public function forgottenPasswordCheck(string $code)
	{
		$user = $this->ionAuthModel->getUserByForgottenPasswordCode($code);

		if (! is_object($user))
		{
			$this->setError('IonAuth.password_change_unsuccessful');
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
					$this->setError('IonAuth.password_change_unsuccessful');
					return false;
				}
			}
			return $user;
		}
	}

	/**
	 * Register
	 *
	 * @param string $identity       Identity
	 * @param string $password       Password
	 * @param string $email          Email
	 * @param array  $additionalData Additional data
	 * @param array  $groupIds       Groups id
	 *
	 * @return integer|array|boolean The new user's ID if e-mail activation is disabled or Ion-Auth e-mail activation
	 *                               was completed;
	 *                               or an array of activation details if CI e-mail validation is enabled; or false
	 *                               if the operation failed.
	 * @author Mathew
	 */
	public function register(string $identity, string $password, string $email, array $additionalData = [], array $groupIds = [])
	{
		$this->ionAuthModel->triggerEvents('pre_account_creation');

		$emailActivation = $this->config->emailActivation;

		$id = $this->ionAuthModel->register($identity, $password, $email, $additionalData, $groupIds);

		if (! $emailActivation)
		{
			if ($id !== false)
			{
				$this->setMessage('IonAuth.account_creation_successful');
				$this->ionAuthModel->triggerEvents(['post_account_creation', 'post_account_creation_successful']);
				return $id;
			}
			else
			{
				$this->setError('IonAuth.account_creation_unsuccessful');
				$this->ionAuthModel->triggerEvents(['post_account_creation', 'post_account_creation_unsuccessful']);
				return false;
			}
		}
		else
		{
			if (! $id)
			{
				$this->setError('IonAuth.account_creation_unsuccessful');
				return false;
			}

			// deactivate so the user must follow the activation flow
			$deactivate = $this->ionAuthModel->deactivate($id);

			// the deactivate method call adds a message, here we need to clear that
			$this->ionAuthModel->clearMessages();

			if (! $deactivate)
			{
				$this->setError('IonAuth.deactivate_unsuccessful');
				$this->ionAuthModel->triggerEvents(['post_account_creation', 'post_account_creation_unsuccessful']);
				return false;
			}

			$activationCode = $this->ionAuthModel->activationCode;
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
				$this->setMessage('IonAuth.activation_email_successful');
				return $data;
			}
			else
			{
				$message = view($this->config->emailTemplates . $this->config->emailActivate, $data);

				$this->email->clear();
				$this->email->setFrom($this->config->adminEmail, $this->config->siteTitle);
				$this->email->setTo($email);
				$this->email->setSubject($this->config->siteTitle . ' - ' . lang('IonAuth.emailActivation_subject'));
				$this->email->setMessage($message);

				if ($this->email->send() === true)
				{
					$this->ionAuthModel->triggerEvents(['post_account_creation', 'post_account_creation_successful', 'activation_email_successful']);
					$this->setMessage('IonAuth.activation_email_successful');
					return $id;
				}
			}

			$this->ionAuthModel->triggerEvents(['post_account_creation', 'post_account_creation_unsuccessful', 'activation_email_unsuccessful']);
			$this->setError('IonAuth.activation_email_unsuccessful');
			return false;
		}
	}

	/**
	 * Logout
	 *
	 * @return true
	 * @author Mathew
	 */
	public function logout(): bool
	{
		$this->ionAuthModel->triggerEvents('logout');

		$identity = $this->config->identity;

		$this->session->remove([$identity, 'id', 'user_id']);

		// delete the remember me cookies if they exist
		delete_cookie($this->config->rememberCookieName);

		// Clear all codes
		$this->ionAuthModel->clearForgottenPasswordCode($identity);
		$this->ionAuthModel->clearRememberCode($identity);

		// Destroy the session
		$this->session->destroy();

		// Recreate the session
		session_start();

		session_regenerate_id(true);

		$this->setMessage('IonAuth.logout_successful');
		return true;
	}

	/**
	 * Auto logs-in the user if they are remembered
	 *
	 * @author Mathew
	 *
	 * @return boolean Whether the user is logged in
	 */
	public function loggedIn(): bool
	{
		$this->ionAuthModel->triggerEvents('logged_in');

		$recheck = $this->ionAuthModel->recheckSession();

		// auto-login the user if they are remembered
		if (! $recheck && get_cookie($this->config->rememberCookieName))
		{
			$recheck = $this->ionAuthModel->loginRememberedUser();
		}

		return $recheck;
	}

	/**
	 * Get user id
	 *
	 * @return integer|null The user's ID from the session user data or NULL if not found
	 * @author jrmadsen67
	 **/
	public function getUserId()
	{
		$userId = $this->session->get('user_id');
		if (! empty($userId))
		{
			return $userId;
		}
		return null;
	}

	/**
	 * Check to see if the currently logged in user is an admin.
	 *
	 * @param integer $id User id
	 *
	 * @return boolean Whether the user is an administrator
	 * @author Ben Edmunds
	 */
	public function isAdmin(int $id=0): bool
	{
		$this->ionAuthModel->triggerEvents('is_admin');

		$adminGroup = $this->config->adminGroup;

		return $this->loggedIn() && $this->ionAuthModel->inGroup($adminGroup, $id);
	}

	/**
	 * Check the compatibility with the server
	 *
	 * Script will die in case of error
	 *
	 * @return void
	 */
	protected function checkCompatibility()
	{
		// I think we can remove this method

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
		// Compatibility check for CSPRNG
		// See functions used in Ion_auth_model::randomToken()
		if (!function_exists('random_bytes') && !function_exists('mcrypt_create_iv') && !function_exists('openssl_random_pseudo_bytes'))
		{
			show_error("No CSPRNG functions to generate random enough token. " .
				"Please update to PHP 7 or use random_compat (https://github.com/paragonie/random_compat).");
		}
		*/
	}

}
