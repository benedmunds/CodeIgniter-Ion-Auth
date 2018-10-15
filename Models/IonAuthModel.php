<?php namespace IonAuth\Models;

/**
 * Name:    Ion Auth Model
 * Author:  Ben Edmunds
 *           ben.edmunds@gmail.com
 * @benedmunds
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

use \CodeIgniter\Database\ConnectionInterface;

/**
 * Class IonAuthModel
 *
 * @property Ion_auth $ion_auth The Ion_auth library
 */
class IonAuthModel
{
	/**
	 * Max cookie lifetime constant
	 */
	const MAX_COOKIE_LIFETIME = 63072000; // 2 years = 60*60*24*365*2 = 63072000 seconds;

	/**
	 * Max password size constant
	 */
	const MAX_PASSWORD_SIZE_BYTES = 4096;

	/**
	 * @var Config\IonAuth
	 */
	private $config;

	/**
	 * @var \CodeIgniter\Session\Session
	 */
	private $session;

	/**
	 * Holds an array of tables used
	 *
	 * @var array
	 */
	public $tables = [];

	/**
	 * Activation code
	 *
	 * @var string
	 */
	public $activation_code;

	/**
	 * Forgotten password key
	 *
	 * @var string
	 */
	public $forgotten_password_code;

	/**
	 * new password
	 *
	 * @var string
	 */
	public $new_password;

	/**
	 * Identity
	 *
	 * @var string
	 */
	public $identity;

	/**
	 * Where
	 *
	 * @var array
	 */
	public $_ion_where = [];

	/**
	 * Select
	 *
	 * @var array
	 */
	public $_ion_select = [];

	/**
	 * Like
	 *
	 * @var array
	 */
	public $_ion_like = [];

	/**
	 * Limit
	 *
	 * @var string
	 */
	public $_ion_limit = NULL;

	/**
	 * Offset
	 *
	 * @var string
	 */
	public $_ion_offset = NULL;

	/**
	 * Order By
	 *
	 * @var string
	 */
	public $_ion_order_by = NULL;

	/**
	 * Order
	 *
	 * @var string
	 */
	public $_ion_order = NULL;

	/**
	 * Hooks
	 *
	 * @var object
	 */
	protected $_ion_hooks;

	/**
	 * Response
	 *
	 * @var \CodeIgniter\Database\ResultInterface
	 */
	protected $response = null;

	/**
	 * Message (uses lang file)
	 *
	 * @var string
	 */
	protected $messages;

	/**
	 * Error message (uses lang file)
	 *
	 * @var string
	 */
	protected $errors;

	/**
	 * Error start delimiter
	 *
	 * @var string
	 */
	protected $errorStartDelimiter;

	/**
	 * Error end delimiter
	 *
	 * @var string
	 */
	protected $errorEndDelimiter;

	/**
	 * Caching of users and their groups
	 *
	 * @var array
	 */
	public $_cacheUserInGroup = [];

	/**
	 * Caching of groups
	 *
	 * @var array
	 */
	protected $_cache_groups = [];

	/**
	 * Database object
	 *
	 * @var ConnectionInterface
	 */
	protected $db;

	public function __construct()
	{
		$this->config = config('IonAuth\\Config\\IonAuth');
		helper(['cookie', 'date']);
		$this->session = \Config\Services::session();

		// initialize the database
		$groupName = $this->config->databaseGroupName;
		if (empty($groupName))
		{
			// By default, use CI's db that should be already loaded
			$this->db = \Config\Database::connect();
		}
		else
		{
			// For specific group name, open a new specific connection
			$this->db = \Config\Database::connect($this->config->databaseGroupName);
		}

		// initialize db tables data
		$this->tables = $this->config->tables;

		// initialize data
		$this->identity_column = $this->config->identity;
		$this->join            = $this->config->join;

		// initialize hash method options (Bcrypt)
		$this->hashMethod = $this->config->hashMethod;

		// initialize messages and error
		$this->messages   = [];
		$this->errors     = [];
		$delimitersSource = $this->config->delimitersSource;

		// load the error delimeters either from the config file or use what's been supplied to form validation
		if ($delimitersSource === 'form_validation')
		{
			// load in delimiters from form_validation
			// to keep this simple we'll load the value using reflection since these properties are protected
			$this->load->library('form_validation');
			$form_validation_class = new ReflectionClass("CI_Form_validation");

			$error_prefix = $form_validation_class->getProperty("_error_prefix");
			$error_prefix->setAccessible(TRUE);
			$this->errorStartDelimiter = $error_prefix->getValue($this->form_validation);
			$this->messageStartDelimiter = $this->errorStartDelimiter;

			$error_suffix = $form_validation_class->getProperty("_error_suffix");
			$error_suffix->setAccessible(TRUE);
			$this->errorEndDelimiter = $error_suffix->getValue($this->form_validation);
			$this->messageEndDelimiter = $this->errorEndDelimiter;
		}
		else
		{
			// use delimiters from config
			$this->messageStartDelimiter = $this->config->messageStartDelimiter;
			$this->messageEndDelimiter = $this->config->messageEndDelimiter;
			$this->errorStartDelimiter = $this->config->errorStartDelimiter;
			$this->errorEndDelimiter = $this->config->errorEndDelimiter;
		}

		// initialize our hooks object
		$this->_ion_hooks = new \stdClass();

		$this->triggerEvents('model_constructor');
	}

	/**
	 * Getter to the DB connection used by Ion Auth
	 * May prove useful for debugging
	 *
	 * @return object
	 */
	public function db()
	{
		return $this->db;
	}

	/**
	 * Hashes the password to be stored in the database.
	 *
	 * @param string $password
	 * @param string $identity
	 *
	 * @return false|string
	 * @author Mathew
	 */
	public function hashPassword($password, $identity = null)
	{
		// Check for empty password, or password containing null char, or password above limit
		// Null char may pose issue: http://php.net/manual/en/function.password-hash.php#118603
		// Long password may pose DOS issue (note: strlen gives size in bytes and not in multibyte symbol)
		if (empty($password) || strpos($password, "\0") !== false ||
			strlen($password) > self::MAX_PASSWORD_SIZE_BYTES)
		{
			return false;
		}

		$algo = $this->_getHashAlgo();
		$params = $this->_getHashParameters($identity);

		if ($algo !== false && $params !== false)
		{
			return password_hash($password, $algo, $params);
		}

		return false;
	}

	/**
	 * This function takes a password and validates it
	 * against an entry in the users table.
	 *
	 * @param string	$password
	 * @param string	$hashPasswordDb
	 * @param string	$identity			optional @deprecated only for BC SHA1
	 *
	 * @return boolean
	 * @author Mathew
	 */
	public function verifyPassword(string $password, string $hashPasswordDb, $identity = null): bool
	{
		// Check for empty id or password, or password containing null char, or password above limit
		// Null char may pose issue: http://php.net/manual/en/function.password-hash.php#118603
		// Long password may pose DOS issue (note: strlen gives size in bytes and not in multibyte symbol)
		if (empty($password) || empty($hashPasswordDb) || strpos($password, "\0") !== false
			|| strlen($password) > self::MAX_PASSWORD_SIZE_BYTES)
		{
			return false;
		}

		// password_hash always starts with $
		if (strpos($hashPasswordDb, '$') === 0)
		{
			return password_verify($password, $hashPasswordDb);
		}
		else
		{
			// Handle legacy SHA1 @TODO to delete in later revision
			return $this->_passwordVerifySha1Legacy($identity, $password, $hashPasswordDb);
		}
	}

	/**
	 * Check if password needs to be rehashed
	 * If true, then rehash and update it in DB
	 *
	 * @param string $hash
	 * @param string $identity
	 * @param string $password
	 *
	 */
	public function rehashPasswordIfNeeded($hash, $identity, $password)
	{
		$algo = $this->_getHashAlgo();
		$params = $this->_getHashParameters($identity);

		if ($algo !== false && $params !== false)
		{
			if (password_needs_rehash($hash, $algo, $params))
			{
				if ($this->_setPasswordDb($identity, $password))
				{
					$this->triggerEvents(['rehash_password', 'rehash_password_successful']);
				}
				else
				{
					$this->triggerEvents(['rehash_password', 'rehash_password_unsuccessful']);
				}
			}
		}
	}

	/**
	 * Validates and removes activation code.
	 *
	 * @param int|string $id
	 * @param bool       $code		if omitted, simply activate the user without check
	 *
	 * @return bool
	 * @author Mathew
	 */
	public function activate($id, $code = false)
	{
		$this->triggerEvents('pre_activate');

		$token = $this->_retrieveSelectorValidatorCouple($code);

		if ($token !== false)
		{
			// A token was provided, we need to check it

			$query = $this->db->select([$this->identity_column, 'activation_code'])
			                  ->where('activation_selector', $token->selector)
			                  ->where('id', $id)
			                  ->limit(1)
			                  ->get($this->tables['users']);

			if ($query->numRows() === 1)
			{
				$user = $query->row();

				if ($this->verifyPassword($token->validator, $user->activation_code))
				{
					$data = [
						'activation_selector' => NULL,
						'activation_code' => NULL,
						'active'          => 1
					];

					$this->triggerEvents('extra_where');
					$this->db->update($this->tables['users'], $data, ['id' => $id]);
					return TRUE;
				}
			}
		}
		else
		{
			// A token was NOT provided, simply activate the user

			$data = [
				'activation_selector' => NULL,
				'activation_code' => NULL,
				'active'          => 1
			];

			$this->triggerEvents('extra_where');
			$this->db->table($this->tables['users'])->update($data, ['id' => $id]);

			if ($this->db->affectedRows() === 1)
			{
				$this->triggerEvents(['post_activate', 'post_activate_successful']);
				$this->setMessage('activate_successful');
				return TRUE;
			}
		}

		$this->triggerEvents(['post_activate', 'post_activate_unsuccessful']);
		$this->setError('IonAuth.activate_unsuccessful');
		return false;
	}

	/**
	 * Updates a users row with an activation code.
	 *
	 * @param int|string|null $id
	 *
	 * @return bool
	 * @author Mathew
	 */
	public function deactivate($id = NULL)
	{
		$this->triggerEvents('deactivate');

		if (!isset($id))
		{
			$this->setError('IonAuth.deactivate_unsuccessful');
			return false;
		}
		else if ((new \App\Libraries\IonAuth())->logged_in() && $this->user()->row()->id == $id)
		{
			$this->setError('IonAuth.deactivate_current_user_unsuccessful');
			return false;
		}

		$token = $this->_generateSelectorValidatorCouple(20, 40);
		$this->activation_code = $token->user_code;

		$data = [
			'activation_selector' => $token->selector,
			'activation_code' => $token->validator_hashed,
			'active'          => 0
		];

		$this->triggerEvents('extra_where');
		$this->db->table($this->tables['users'])->update($data, ['id' => $id]);

		$return = $this->db->affectedRows() == 1;
		if ($return)
		{
			$this->setMessage('deactivate_successful');
		}
		else
		{
			$this->setError('IonAuth.deactivate_unsuccessful');
		}

		return $return;
	}

	/**
	 * Clear the forgotten password code for a user
	 *
	 * @param string $identity
	 *
	 * @return bool Success
	 */
	public function clearForgottenPasswordCode($identity): bool
	{

		if (empty($identity))
		{
			return false;
		}

		$data = [
			'forgotten_password_selector' => NULL,
			'forgotten_password_code' => NULL,
			'forgotten_password_time' => NULL
		];

		//$this->db->update($this->tables['users'], $data, [$this->identity_column => $identity]);
		$builder = $this->db->table($this->tables['users']);
		return $builder->update($data, [$this->identity_column => $identity]);

		//return TRUE;
	}

	/**
	 * Clear the remember code for a user
	 *
	 * @param string $identity
	 *
	 * @return bool Success
	 */
	public function clearRememberCode($identity): bool
	{

		if (empty($identity))
		{
			return false;
		}

		$data = [
			'remember_selector' => NULL,
			'remember_code' => NULL
		];

		//$this->db->update($this->tables['users'], $data, [$this->identity_column => $identity]);
		$builder = $this->db->table($this->tables['users']);
		return $builder->update($data, [$this->identity_column => $identity]);

		//return TRUE;
	}

	/**
	 * Reset password
	 *
	 * @param    string $identity
	 * @param    string $new
	 *
	 * @return bool
	 * @author Mathew
	 */
	public function resetPassword($identity, $new) {
		$this->triggerEvents('pre_change_password');

		if (!$this->identityCheck($identity)) {
			$this->triggerEvents(['post_change_password', 'post_change_password_unsuccessful']);
			return false;
		}

		$return = $this->_setPasswordDb($identity, $new);

		if ($return)
		{
			$this->triggerEvents(['post_change_password', 'post_change_password_successful']);
			$this->setMessage('password_change_successful');
		}
		else
		{
			$this->triggerEvents(['post_change_password', 'post_change_password_unsuccessful']);
			$this->setError('IonAuth.password_change_unsuccessful');
		}

		return $return;
	}

	/**
	 * Change password
	 *
	 * @param    string $identity
	 * @param    string $old
	 * @param    string $new
	 *
	 * @return bool
	 * @author Mathew
	 */
	public function changePassword($identity, $old, $new)
	{
		$this->triggerEvents('pre_change_password');

		$this->triggerEvents('extra_where');

		$query = $this->db->select('id, password')
		                  ->where($this->identity_column, $identity)
		                  ->limit(1)
		                  ->orderBy('id', 'desc')
		                  ->get($this->tables['users']);

		if ($query->numRows() !== 1)
		{
			$this->triggerEvents(['post_change_password', 'post_change_password_unsuccessful']);
			$this->setError('IonAuth.password_change_unsuccessful');
			return false;
		}

		$user = $query->row();

		if ($this->verifyPassword($old, $user->password, $identity))
		{
			$result = $this->_setPasswordDb($identity, $new);

			if ($result)
			{
				$this->triggerEvents(['post_change_password', 'post_change_password_successful']);
				$this->setMessage('password_change_successful');
			}
			else
			{
				$this->triggerEvents(['post_change_password', 'post_change_password_unsuccessful']);
				$this->setError('IonAuth.password_change_unsuccessful');
			}

			return $result;
		}

		$this->setError('IonAuth.password_change_unsuccessful');
		return FALSE;
	}

	/**
	 * Checks username
	 *
	 * @param string $username
	 *
	 * @return bool
	 * @author Mathew
	 */
	public function usernameCheck($username = '')
	{
		$this->triggerEvents('username_check');

		if (empty($username))
		{
			return FALSE;
		}

		$this->triggerEvents('extra_where');

		return $this->db->where('username', $username)
						->limit(1)
						->count_all_results($this->tables['users']) > 0;
	}

	/**
	 * Checks email to see if the email is already registered.
	 *
	 * @param string $email Email to check
	 *
	 * @return boolean true if the user is registered false if the user is not registered.
	 * @author Mathew
	 */
	public function emailCheck(string $email = ''): bool
	{
		$this->triggerEvents('emailCheck');

		if (empty($email))
		{
			return false;
		}

		$this->triggerEvents('extra_where');

		return $this->db->table($this->tables['users'])
						->where('email', $email)
						->limit(1)
						->countAllResults() > 0;
	}

	/**
	 * Identity check
	 *
	 * @param $identity string
	 *
	 * @return bool
	 * @author Mathew
	 */
	public function identityCheck($identity = '')
	{
		$this->triggerEvents('identity_check');

		if (empty($identity))
		{
			return FALSE;
		}

		$builder = $this->db->table($this->tables['users']);
		return $builder->where($this->identity_column, $identity)
					   ->limit(1)
					   ->countAllResults() > 0;
	}

	/**
	 * Get user ID from identity
	 *
	 * @param $identity string
	 *
	 * @return bool|int
	 */
	public function getUserIdFromIdentity($identity = '')
	{
		if (empty($identity))
		{
			return FALSE;
		}

		$builder = $this->db->table($this->tables['users']);
		$query = $builder->select('id')
						 ->where($this->identity_column, $identity)
						 ->limit(1)
						 ->get();

		$user = $query->getRow();

		if (count($user) !== 1)
		{
			return FALSE;
		}

		return $user->id;
	}

	/**
	 * Insert a forgotten password key.
	 *
	 * @param    string $identity
	 *
	 * @return    bool|string
	 * @author  Mathew
	 * @updated Ryan
	 */
	public function forgottenPassword($identity)
	{
		if (empty($identity))
		{
			$this->triggerEvents(['post_forgotten_password', 'post_forgotten_password_unsuccessful']);
			return FALSE;
		}

		// Generate random token: smaller size because it will be in the URL
		$token = $this->_generateSelectorValidatorCouple(20, 80);

		$update = [
			'forgotten_password_selector' => $token->selector,
			'forgotten_password_code' => $token->validator_hashed,
			'forgotten_password_time' => time(),
		];

		$this->triggerEvents('extra_where');
		$this->db->table($this->tables['users'])->update($update, [$this->identity_column => $identity]);

		if ($this->db->affectedRows() === 1)
		{
			$this->triggerEvents(['post_forgotten_password', 'post_forgotten_password_successful']);
			return $token->user_code;
		}
		else
		{
			$this->triggerEvents(['post_forgotten_password', 'post_forgotten_password_unsuccessful']);
			return false;
		}
	}

	/**
	 * Get a user from a forgotten password key.
	 *
	 * @param    string $user_code
	 *
	 * @return    bool|object
	 * @author  Mathew
	 * @updated Ryan
	 */
	public function getUserByForgottenPasswordCode($user_code)
	{
		// Retrieve the token object from the code
		$token = $this->_retrieveSelectorValidatorCouple($user_code);

		// Retrieve the user according to this selector
		$user = $this->where('forgotten_password_selector', $token->selector)->users()->row();

		if ($user)
		{
			// Check the hash against the validator
			if ($this->verifyPassword($token->validator, $user->forgotten_password_code))
			{
				return $user;
			}
		}

		return FALSE;
	}

	/**
	 * Register
	 *
	 * @param    string $identity
	 * @param    string $password
	 * @param    string $email
	 * @param    array  $additional_data
	 * @param    array  $groups
	 *
	 * @return    bool
	 * @author    Mathew
	 */
	public function register($identity, $password, $email, $additional_data = [], $groups = [])
	{
		$this->triggerEvents('pre_register');

		$manualActivation = $this->config->manualActivation;

		if ($this->identityCheck($identity))
		{
			$this->setError('IonAuth.account_creation_duplicate_identity');
			return false;
		}
		else if (!$this->config->defaultGroup && empty($groups))
		{
			$this->setError('IonAuth.account_creation_missing_defaultGroup');
			return false;
		}

		// check if the default set in config exists in database
		$query = $this->db->table($this->tables['groups'])->where(['name' => $this->config->defaultGroup], 1)->get()->getRow();
		if (!isset($query->id) && empty($groups))
		{
			$this->setError('IonAuth.account_creation_invalid_defaultGroup');
			return false;
		}

		// capture default group details
		$defaultGroup = $query;

		// IP Address
		$ip_address = \Config\Services::request()->getIPAddress();

		// Do not pass $identity as user is not known yet so there is no need
		$password = $this->hashPassword($password);

		if ($password === false)
		{
			$this->setError('account_creation_unsuccessful');
			return false;
		}

		// Users table.
		$data = [
			$this->identity_column => $identity,
			'username' => $identity,
			'password' => $password,
			'email' => $email,
			'ip_address' => $ip_address,
			'created_on' => time(),
			'active' => ($manualActivation === false ? 1 : 0)
		];

		// filter out any data passed that doesnt have a matching column in the users table
		// and merge the set user data and the additional data
		$user_data = array_merge($this->_filterData($this->tables['users'], $additional_data), $data);

		$this->triggerEvents('extra_set');

		$this->db->table($this->tables['users'])->insert($user_data);

		$id = $this->db->insertId($this->tables['users'] . '_id_seq');

		// add in groups array if it doesn't exists and stop adding into default group if default group ids are set
		if (isset($defaultGroup->id) && empty($groups))
		{
			$groups[] = $defaultGroup->id;
		}

		if (!empty($groups))
		{
			// add to groups
			foreach ($groups as $group)
			{
				$this->addToGroup($group, $id);
			}
		}

		$this->triggerEvents('post_register');

		return (isset($id)) ? $id : false;
	}

	/**
	 * Login
	 *
	 * @param string  $identity
	 * @param string  $password
	 * @param boolean $remember
	 *
	 * @return boolean
	 * @author Mathew
	 */
	public function login(string $identity, string $password, bool $remember = false): bool
	{
		$this->triggerEvents('pre_login');

		if (empty($identity) || empty($password))
		{
			$this->setError('IonAuth.login_unsuccessful');
			return false;
		}

		$this->triggerEvents('extra_where');
		$query = $this->db->table($this->tables['users'])
						  ->select($this->identity_column . ', email, id, password, active, last_login')
						  ->where($this->identity_column, $identity)
						  ->limit(1)
						  ->orderBy('id', 'desc')
						  ->get();

		if ($this->isMaxLoginAttemptsExceeded($identity))
		{
			// Hash something anyway, just to take up time
			$this->hashPassword($password);

			$this->triggerEvents('post_login_unsuccessful');
			$this->setError('IonAuth.login_timeout');

			return false;
		}

		$rows = $query->getResult();
		//if ($query->numRows() === 1)
		if (count($rows) === 1)
		{
			//$user = $query->row();
			$user = $query->getRow();

			if ($this->verifyPassword($password, $user->password, $identity))
			{
				if ($user->active == 0)
				{
					$this->triggerEvents('post_login_unsuccessful');
					$this->setError('IonAuth.login_unsuccessful_not_active');

					return false;
				}

				$this->setSession($user);

				$this->updateLastLogin($user->id);

				$this->clearLoginAttempts($identity);
				$this->clearForgottenPasswordCode($identity);

				if ($this->config->rememberUsers)
				{
					if ($remember)
					{
						$this->rememberUser($identity);
					}
					else
					{
						$this->clearRememberCode($identity);
					}
				}

				// Rehash if needed
				$this->rehashPasswordIfNeeded($user->password, $identity, $password);

				// Regenerate the session (for security purpose: to avoid session fixation)
				$this->session->regenerate(false);

				$this->triggerEvents(['post_login', 'post_login_successful']);
				$this->setMessage('login_successful');

				return true;
			}
		}

		// Hash something anyway, just to take up time
		$this->hashPassword($password);

		$this->increaseLoginAttempts($identity);

		$this->triggerEvents('post_login_unsuccessful');
		$this->setError('IonAuth.login_unsuccessful');

		return false;
	}

	/**
	 * Verifies if the session should be rechecked according to the configuration item recheckTimer. If it does, then
	 * it will check if the user is still active
	 * @return bool
	 */
	public function recheckSession()
	{
		$recheck = (NULL !== $this->config->recheckTimer) ? $this->config->recheckTimer : 0;

		if ($recheck !== 0)
		{
			$last_login = $this->session->get('last_check');
			if ($last_login + $recheck < time())
			{
				$query = $this->db->select('id')
								  ->where([
									  $this->identity_column => $this->session->get('identity'),
									  'active' => '1'
								  ])
								  ->limit(1)
								  ->orderBy('id', 'desc')
								  ->get($this->tables['users']);
				if ($query->numRows() === 1)
				{
					$this->session->set_userdata('last_check', time());
				}
				else
				{
					$this->triggerEvents('logout');

					$identity = $this->config->identity;

					$this->session->unset_userdata([$identity, 'id', 'user_id']);

					return false;
				}
			}
		}

		return (bool)session('identity');
	}

	/**
	 * is_max_login_attempts_exceeded
	 * Based on code from Tank Auth, by Ilya Konyukhov (https://github.com/ilkon/Tank-Auth)
	 *
	 * @param string      $identity   user's identity
	 * @param string|null $ip_address IP address
	 *                                Only used if trackLoginIpAddress is set to TRUE.
	 *                                If NULL (default value), the current IP address is used.
	 *                                Use getLastAttemptIp($identity) to retrieve a user's last IP
	 *
	 * @return boolean
	 */
	public function isMaxLoginAttemptsExceeded($identity, $ip_address = NULL)
	{
		if ($this->config->trackLoginAttempts)
		{
			$max_attempts = $this->config->maximumLoginAttempts;
			if ($max_attempts > 0)
			{
				$attempts = $this->getAttemptsNum($identity, $ip_address);
				return $attempts >= $max_attempts;
			}
		}
		return false;
	}

	/**
	 * Get number of login attempts for the given IP-address or identity
	 * Based on code from Tank Auth, by Ilya Konyukhov (https://github.com/ilkon/Tank-Auth)
	 *
	 * @param string      $identity   User's identity
	 * @param string|null $ip_address IP address
	 *                                Only used if trackLoginIpAddress is set to TRUE.
	 *                                If NULL (default value), the current IP address is used.
	 *                                Use getLastAttemptIp($identity) to retrieve a user's last IP
	 *
	 * @return int
	 */
	public function getAttemptsNum($identity, $ip_address = NULL): int
	{
		if ($this->config->trackLoginAttempts)
		{
			$builder = $this->db->table($this->tables['login_attempts']);
			//$builder->select('1', false);
			$builder->where('login', $identity);
			if ($this->config->trackLoginIpAddress)
			{
				if (!isset($ip_address))
				{
					$ip_address = \Config\Services::request()->getIPAddress();
				}
				$builder->where('ip_address', $ip_address);
			}
			$builder->where('time >', time() - $this->config->lockoutTime, false);
			//$qres = $builder->get();
			return $builder->countAllResults();
		}
		return 0;
	}

	/**
	 * Get the last time a login attempt occurred from given identity
	 *
	 * @param string      $identity   User's identity
	 * @param string|null $ip_address IP address
	 *                                Only used if trackLoginIpAddress is set to TRUE.
	 *                                If NULL (default value), the current IP address is used.
	 *                                Use getLastAttemptIp($identity) to retrieve a user's last IP
	 *
	 * @return int The time of the last login attempt for a given IP-address or identity
	 */
	public function getLastAttemptTime($identity, $ip_address = NULL)
	{
		if ($this->config->trackLoginAttempts)
		{
			$this->db->select('time');
			$this->db->where('login', $identity);
			if ($this->config->trackLoginIpAddress)
			{
				if (!isset($ip_address))
				{
					$ip_address = \Config\Services::request()->getIPAddress();
				}
				$this->db->where('ip_address', $ip_address);
			}
			$this->db->orderBy('id', 'desc');
			$qres = $this->db->get($this->tables['login_attempts'], 1);

			if ($qres->numRows() > 0)
			{
				return $qres->row()->time;
			}
		}

		return 0;
	}

	/**
	 * Get the IP address of the last time a login attempt occurred from given identity
	 *
	 * @param string $identity User's identity
	 *
	 * @return string
	 */
	public function getLastAttemptIp($identity)
	{
		if ($this->config->trackLoginAttempts && $this->config->trackLoginIpAddress)
		{
			$this->db->select('ip_address');
			$this->db->where('login', $identity);
			$this->db->orderBy('id', 'desc');
			$qres = $this->db->get($this->tables['login_attempts'], 1);

			if ($qres->numRows() > 0)
			{
				return $qres->row()->ip_address;
			}
		}

		return '';
	}

	/**
	 * Based on code from Tank Auth, by Ilya Konyukhov (https://github.com/ilkon/Tank-Auth)
	 *
	 * Note: the current IP address will be used if trackLoginIpAddress config value is TRUE
	 *
	 * @param string $identity User's identity
	 *
	 * @return bool
	 */
	public function increaseLoginAttempts($identity)
	{
		if ($this->config->trackLoginAttempts)
		{
			$data = ['ip_address' => '', 'login' => $identity, 'time' => time()];
			if ($this->config->trackLoginIpAddress)
			{
				$data['ip_address'] = \Config\Services::request()->getIPAddress();
			}
			$builder = $this->db->table($this->tables['login_attempts']);
			return $builder->insert($data);
		}
		return false;
	}

	/**
	 * Clear login attempts
	 * Based on code from Tank Auth, by Ilya Konyukhov (https://github.com/ilkon/Tank-Auth)
	 *
	 * @param string      $identity                User's identity
	 * @param integer     $oldAttemptsAxpirePeriod In seconds, any attempts older than this value will be removed.
	 *                                                It is used for regularly purging the attempts table.
	 *                                                (for security reason, minimum value is lockoutTime config value)
	 * @param string|null $ipAddress               IP address
	 *                                                Only used if track_login_ipAddress is set to TRUE.
	 *                                                If NULL (default value), the current IP address is used.
	 *                                                Use getLastAttemptIp($identity) to retrieve a user's last IP
	 *
	 * @return boolean
	 */
	public function clearLoginAttempts(string $identity, int $oldAttemptsAxpirePeriod = 86400, $ipAddress = null): bool
	{
		if ($this->config->trackLoginAttempts)
		{
			// Make sure $oldAttemptsAxpirePeriod is at least equals to lockoutTime
			$oldAttemptsAxpirePeriod = max($oldAttemptsAxpirePeriod, $this->config->lockoutTime);

			$builder = $this->db->table($this->tables['login_attempts']);
			$builder->where('login', $identity);
			if ($this->config->trackLoginIpAddress)
			{
				if (! isset($ipAddress))
				{
					$ipAddress = \Config\Services::request()->getIPAddress();
				}
				$builder->where('ip_address', $ipAddress);
			}
			// Purge obsolete login attempts
			$builder->orWhere('time <', time() - $oldAttemptsAxpirePeriod, false);

			return $builder->delete() === false ? false: true;
		}
		return false;
	}

	/**
	 * @param int $limit
	 *
	 * @return static
	 */
	public function limit($limit)
	{
		$this->triggerEvents('limit');
		$this->_ion_limit = $limit;

		return $this;
	}

	/**
	 * @param int $offset
	 *
	 * @return static
	 */
	public function offset($offset)
	{
		$this->triggerEvents('offset');
		$this->_ion_offset = $offset;

		return $this;
	}

	/**
	 * @param array|string $where
	 * @param null|string  $value
	 *
	 * @return static
	 */
	public function where($where, $value = NULL)
	{
		$this->triggerEvents('where');

		if (!is_array($where))
		{
			$where = [$where => $value];
		}

		array_push($this->_ion_where, $where);

		return $this;
	}

	/**
	 * @param string      $like
	 * @param string|null $value
	 * @param string      $position
	 *
	 * @return static
	 */
	public function like($like, $value = NULL, $position = 'both')
	{
		$this->triggerEvents('like');

		array_push($this->_ion_like, [
			'like'     => $like,
			'value'    => $value,
			'position' => $position
		]);

		return $this;
	}

	/**
	 * @param array|string $select
	 *
	 * @return static
	 */
	public function select($select)
	{
		$this->triggerEvents('select');

		$this->_ion_select[] = $select;

		return $this;
	}

	/**
	 * @param string $by
	 * @param string $order
	 *
	 * @return static
	 */
	public function orderBy($by, $order='desc')
	{
		$this->triggerEvents('order_by');

		$this->_ion_order_by = $by;
		$this->_ion_order    = $order;

		return $this;
	}

	/**
	 * @return object|mixed
	 */
	public function row()
	{
		$this->triggerEvents('row');

		$row = $this->response->getRow();

		return $row;
	}

	/**
	 * @return array|mixed
	 */
	public function rowArray()
	{
		$this->triggerEvents(['row', 'row_array']);

		$row = $this->response->rowArray();

		return $row;
	}

	/**
	 * @return mixed
	 */
	public function result()
	{
		$this->triggerEvents('result');

		return $this->response->getResult();
	}

	/**
	 * @return array|mixed
	 */
	public function resultArray()
	{
		$this->triggerEvents(['result', 'result_array']);

		$result = $this->response->getResultArray();

		return $result;
	}

	/**
	 * @return int
	 */
	public function numRows()
	{
		$this->triggerEvents(['num_rows']);

		$result = $this->response->numRows();

		return $result;
	}

	/**
	 * users
	 *
	 * @param array|null $groups
	 *
	 * @return static
	 * @author Ben Edmunds
	 */
	public function users($groups = NULL)
	{
		$this->triggerEvents('users');

		$builder = $this->db->table($this->tables['users']);

		if (isset($this->_ion_select) && !empty($this->_ion_select))
		{
			foreach ($this->_ion_select as $select)
			{
				$builder->select($select);
			}

			$this->_ion_select = [];
		}
		else
		{
			// default selects
			$builder->select([
				$this->tables['users'].'.*',
				$this->tables['users'].'.id as id',
				$this->tables['users'].'.id as user_id'
			]);
		}

		// filter by group id(s) if passed
		if (isset($groups))
		{
			// build an array if only one group was passed
			if (!is_array($groups))
			{
				$groups = [$groups];
			}

			// join and then run a where_in against the group ids
			if (isset($groups) && !empty($groups))
			{
				$builder->distinct();
				$builder->join(
					$this->tables['users_groups'],
					$this->tables['users_groups'].'.'.$this->join['users'].'='.$this->tables['users'].'.id',
					'inner'
				);
			}

			// verify if group name or group id was used and create and put elements in different arrays
			$group_ids = [];
			$groupNames = [];
			foreach($groups as $group)
			{
				if(is_numeric($group)) $group_ids[] = $group;
				else $groupNames[] = $group;
			}
			$or_where_in = (!empty($group_ids) && !empty($groupNames)) ? 'or_where_in' : 'where_in';
			// if group name was used we do one more join with groups
			if(!empty($groupNames))
			{
				$builder->join($this->tables['groups'], $this->tables['users_groups'] . '.' . $this->join['groups'] . ' = ' . $this->tables['groups'] . '.id', 'inner');
				$builder->where_in($this->tables['groups'] . '.name', $groupNames);
			}
			if(!empty($group_ids))
			{
				$builder->{$or_where_in}($this->tables['users_groups'].'.'.$this->join['groups'], $group_ids);
			}
		}

		$this->triggerEvents('extra_where');

		// run each where that was passed
		if (isset($this->_ion_where) && !empty($this->_ion_where))
		{
			foreach ($this->_ion_where as $where)
			{
				$builder->where($where);
			}

			$this->_ion_where = [];
		}

		if (isset($this->_ion_like) && !empty($this->_ion_like))
		{
			foreach ($this->_ion_like as $like)
			{
				$builder->or_like($like['like'], $like['value'], $like['position']);
			}

			$this->_ion_like = [];
		}

		if (isset($this->_ion_limit) && isset($this->_ion_offset))
		{
			$builder->limit($this->_ion_limit, $this->_ion_offset);

			$this->_ion_limit  = NULL;
			$this->_ion_offset = NULL;
		}
		else if (isset($this->_ion_limit))
		{
			$builder->limit($this->_ion_limit);

			$this->_ion_limit  = NULL;
		}

		// set the order
		if (isset($this->_ion_order_by) && isset($this->_ion_order))
		{
			$builder->orderBy($this->_ion_order_by, $this->_ion_order);

			$this->_ion_order    = NULL;
			$this->_ion_order_by = NULL;
		}

		$this->response = $builder->get();

		return $this;
	}

	/**
	 * user
	 *
	 * @param int|string|null $id
	 *
	 * @return static
	 * @author Ben Edmunds
	 */
	public function user($id = NULL)
	{
		$this->triggerEvents('user');

		// if no id was passed use the current users id
		$id = isset($id) ? $id : $this->session->get('user_id');

		$this->limit(1);
		$this->orderBy($this->tables['users'].'.id', 'desc');
		$this->where($this->tables['users'].'.id', $id);

		$this->users();

		return $this;
	}

	/**
	 * get_users_groups
	 *
	 * @param int|string|bool $id
	 *
	 * @return \CodeIgniter\Database\ResultInterface
	 * @author Ben Edmunds
	 */
	public function getUsersGroups($id = false)
	{
		$this->triggerEvents('get_users_group');

		// if no id was passed use the current users id
		$id || $id = $this->session->get('user_id');

        $builder = $this->db->table($this->tables['users_groups']);
		return $builder->select($this->tables['users_groups'].'.'.$this->join['groups'].' as id, '.$this->tables['groups'].'.name, '.$this->tables['groups'].'.description')
		                ->where($this->tables['users_groups'].'.'.$this->join['users'], $id)
		                ->join($this->tables['groups'], $this->tables['users_groups'].'.'.$this->join['groups'].'='.$this->tables['groups'].'.id')
		                ->get();
	}

	/**
	 * @param int|string|array $check_group group(s) to check
	 * @param int|string|bool  $id          user id
	 * @param bool             $check_all   check if all groups is present, or any of the groups
	 *
	 * @return bool Whether the/all user(s) with the given ID(s) is/are in the given group
	 * @author Phil Sturgeon
	 **/
	public function inGroup($check_group, $id = false, $check_all = false)
	{
		$this->triggerEvents('in_group');

		$id || $id = $this->session->get('user_id');

		if (!is_array($check_group))
		{
			$check_group = [$check_group];
		}

		if (isset($this->_cacheUserInGroup[$id]))
		{
			$groups_array = $this->_cacheUserInGroup[$id];
		}
		else
		{
            $users_groups = $this->getUsersGroups($id)->getResult();
			$groups_array = [];
			foreach ($users_groups as $group)
			{
				$groups_array[$group->id] = $group->name;
			}
			$this->_cacheUserInGroup[$id] = $groups_array;
		}
		foreach ($check_group as $key => $value)
		{
			$groups = (is_numeric($value)) ? array_keys($groups_array) : $groups_array;

			/**
			 * if !all (default), in_array
			 * if all, !in_array
			 */
			if (in_array($value, $groups) xor $check_all)
			{
				/**
				 * if !all (default), true
				 * if all, false
				 */
				return !$check_all;
			}
		}

		/**
		 * if !all (default), false
		 * if all, true
		 */
		return $check_all;
	}

	/**
	 * add_to_group
	 *
	 * @param array|int|float|string $group_ids
	 * @param bool|int|float|string  $user_id
	 *
	 * @return int
	 * @author Ben Edmunds
	 */
	public function addToGroup($group_ids, $user_id = false)
	{
		$this->triggerEvents('add_to_group');

		// if no id was passed use the current users id
		$user_id || $user_id = $this->session->get('user_id');

		if(!is_array($group_ids))
		{
			$group_ids = [$group_ids];
		}

		$return = 0;

		// Then insert each into the database
		foreach ($group_ids as $group_id)
		{
			// Cast to float to support bigint data type
			if ($this->db->table($this->tables['users_groups'])->insert([
																	$this->join['groups'] => (float)$group_id,
																	$this->join['users']  => (float)$user_id  ]))
			{
				if (isset($this->_cache_groups[$group_id]))
				{
					$groupName = $this->_cache_groups[$group_id];
				}
				else
				{
					$group = $this->group($group_id)->result();
					$groupName = $group[0]->name;
					$this->_cache_groups[$group_id] = $groupName;
				}
				$this->_cacheUserInGroup[$user_id][$group_id] = $groupName;

				// Return the number of groups added
				$return++;
			}
		}

		return $return;
	}

	/**
	 * remove_from_group
	 *
	 * @param array|int|float|string|bool $group_ids
	 * @param int|float|string|bool $user_id
	 *
	 * @return bool
	 * @author Ben Edmunds
	 */
	public function removeFromGroup($group_ids = false, $user_id = false)
	{
		$this->triggerEvents('remove_from_group');

		// user id is required
		if (empty($user_id))
		{
			return false;
		}

		$builder = $this->db->table($this->tables['users_groups']);

		// if group id(s) are passed remove user from the group(s)
		if (!empty($group_ids))
		{
			if (!is_array($group_ids))
			{
				$group_ids = [$group_ids];
			}

			foreach ($group_ids as $group_id)
			{
				// Cast to float to support bigint data type
				/*
				$this->db->delete(
					$this->tables['users_groups'],
					[$this->join['groups'] => (float)$group_id, $this->join['users'] => (float)$user_id]
				);
				*/
				$builder->delete([$this->join['groups'] => (float)$group_id, $this->join['users'] => (float)$user_id]);
				if (isset($this->_cacheUserInGroup[$user_id]) && isset($this->_cacheUserInGroup[$user_id][$group_id]))
				{
					unset($this->_cacheUserInGroup[$user_id][$group_id]);
				}
			}

			$return = TRUE;
		}
		// otherwise remove user from all groups
		else
		{
			// Cast to float to support bigint data type
			//if ($return = $this->db->delete($this->tables['users_groups'], [$this->join['users'] => (float)$user_id]))
			if ($return = $builder->delete([$this->join['users'] => (float)$user_id]))
			{
				$this->_cacheUserInGroup[$user_id] = [];
			}
		}
		return $return;
	}

	/**
	 * groups
	 *
	 * @return static
	 * @author Ben Edmunds
	 */
	public function groups()
	{
		$this->triggerEvents('groups');

		$builder = $this->db->table($this->tables['groups']);

		// run each where that was passed
		if (isset($this->_ion_where) && !empty($this->_ion_where))
		{
			foreach ($this->_ion_where as $where)
			{
				$builder->where($where);
			}
			$this->_ion_where = [];
		}

		if (isset($this->_ion_limit) && isset($this->_ion_offset))
		{
			$builder->limit($this->_ion_limit, $this->_ion_offset);

			$this->_ion_limit  = NULL;
			$this->_ion_offset = NULL;
		}
		else if (isset($this->_ion_limit))
		{
			$builder->limit($this->_ion_limit);

			$this->_ion_limit  = NULL;
		}

		// set the order
		if (isset($this->_ion_order_by) && isset($this->_ion_order))
		{
			$builder->orderBy($this->_ion_order_by, $this->_ion_order);
		}

		$this->response = $builder->get();

		return $this;
	}

	/**
	 * group
	 *
	 * @param int|string|null $id
	 *
	 * @return static
	 * @author Ben Edmunds
	 */
	public function group($id = NULL)
	{
		$this->triggerEvents('group');

		if (isset($id))
		{
			$this->where($this->tables['groups'].'.id', $id);
		}

		$this->limit(1);
		$this->orderBy('id', 'desc');

		return $this->groups();
	}

	/**
	 * update
	 *
	 * @param int|string $id
	 * @param array      $data
	 *
	 * @return bool
	 * @author Phil Sturgeon
	 */
	public function update($id, $data)
	{
		$this->triggerEvents('pre_update_user');

		$user = $this->user($id)->row();

		$this->db->transBegin();

		if (array_key_exists($this->identity_column, $data) && $this->identityCheck($data[$this->identity_column]) && $user->{$this->identity_column} !== $data[$this->identity_column])
		{
			$this->db->transRollback();
			$this->setError('IonAuth.account_creation_duplicate_identity');

			$this->triggerEvents(['post_update_user', 'post_update_user_unsuccessful']);
			$this->setError('IonAuth.update_unsuccessful');

			return false;
		}

		// Filter the data passed
		$data = $this->_filterData($this->tables['users'], $data);

		if (array_key_exists($this->identity_column, $data) || array_key_exists('password', $data) || array_key_exists('email', $data))
		{
			if (array_key_exists('password', $data))
			{
				if( ! empty($data['password']))
				{
					$data['password'] = $this->hashPassword($data['password'], $user->{$this->identity_column});
					if ($data['password'] === false)
					{
						$this->db->trans_rollback();
						$this->triggerEvents(['post_update_user', 'post_update_user_unsuccessful']);
						$this->setError('IonAuth.update_unsuccessful');

						return false;
					}
				}
				else
				{
					// unset password so it doesn't effect database entry if no password passed
					unset($data['password']);
				}
			}
		}

		$this->triggerEvents('extra_where');
		$this->db->table($this->tables['users'])->update($data, ['id' => $user->id]);

		if ($this->db->transStatus() === false)
		{
			$this->db->transRollback();

			$this->triggerEvents(['post_update_user', 'post_update_user_unsuccessful']);
			$this->setError('IonAuth.update_unsuccessful');
			return false;
		}

		$this->db->transCommit();

		$this->triggerEvents(['post_update_user', 'post_update_user_successful']);
		$this->setMessage('update_successful');
		return TRUE;
	}

	/**
	 * delete_user
	 *
	 * @param int|string $id
	 *
	 * @return bool
	 * @author Phil Sturgeon
	 */
	public function deleteUser($id)
	{
		$this->triggerEvents('pre_delete_user');

		$this->db->trans_begin();

		// remove user from groups
		$this->removeFromGroup(NULL, $id);

		// delete user from users table should be placed after remove from group
		$this->db->delete($this->tables['users'], ['id' => $id]);

		if ($this->db->trans_status() === false)
		{
			$this->db->trans_rollback();
			$this->triggerEvents(['post_delete_user', 'post_delete_user_unsuccessful']);
			$this->setError('IonAuth.delete_unsuccessful');
			return false;
		}

		$this->db->trans_commit();

		$this->triggerEvents(['post_delete_user', 'post_delete_user_successful']);
		$this->setMessage('delete_successful');
		return TRUE;
	}

	/**
	 * update_last_login
	 *
	 * @param int|string $id
	 *
	 * @return bool
	 * @author Ben Edmunds
	 */
	public function updateLastLogin($id): bool
	{
		$this->triggerEvents('update_last_login');

		$this->triggerEvents('extra_where');

        $this->db->table($this->tables['users'])->update(['last_login' => time()], ['id' => $id]);

		return $this->db->affectedRows() == 1;
	}

	/**
	 * set_lang
	 *
	 * @param string $lang
	 *
	 * @return bool
	 * @author Ben Edmunds
	 */
	public function setLang($lang = 'en')
	{
		$this->triggerEvents('set_lang');

		// if the userExpire is set to zero we'll set the expiration two years from now.
		if($this->config->userExpire === 0)
		{
			$expire = self::MAX_COOKIE_LIFETIME;
		}
		// otherwise use what is set
		else
		{
			$expire = $this->config->userExpire;
		}

		set_cookie([
			'name'   => 'lang_code',
			'value'  => $lang,
			'expire' => $expire
		]);

		return TRUE;
	}

	/**
	 * set_session
	 *
	 * @param object $user
	 *
	 * @return bool
	 * @author jrmadsen67
	 */
	public function setSession($user): bool
	{
		$this->triggerEvents('pre_set_session');

		$session_data = [
		    'identity'             => $user->{$this->identity_column},
		    $this->identity_column => $user->{$this->identity_column},
		    'email'                => $user->email,
		    'user_id'              => $user->id, //everyone likes to overwrite id so we'll use user_id
		    'old_last_login'       => $user->last_login,
		    'last_check'           => time(),
		];

		//$this->session->set_userdata($session_data);
        $this->session->set($session_data);

		$this->triggerEvents('post_set_session');

		return TRUE;
	}

	/**
	 * Set a user to be remembered
	 *
	 * Implemented as described in
	 * https://paragonie.com/blog/2015/04/secure-authentication-php-with-long-term-persistence
	 *
	 * @param string $identity
	 *
	 * @return bool
	 * @author Ben Edmunds
	 */
	public function rememberUser($identity)
	{
		$this->triggerEvents('pre_remember_user');

		if (!$identity)
		{
			return false;
		}

		// Generate random tokens
		$token = $this->_generateSelectorValidatorCouple();

		if ($token->validator_hashed)
		{
			$this->db->table('users')->update(['remember_selector' => $token->selector,
								  			   'remember_code' => $token->validator_hashed ],
											   [$this->identity_column => $identity]);

			if ($this->db->affectedRows() > -1)
			{
				// if the userExpire is set to zero we'll set the expiration two years from now.
				if($this->config->userExpire === 0)
				{
					$expire = self::MAX_COOKIE_LIFETIME;
				}
				// otherwise use what is set
				else
				{
					$expire = $this->config->userExpire;
				}

				set_cookie([
					'name'   => $this->config->rememberCookieName,
					'value'  => $token->user_code,
					'expire' => $expire
				]);

				$this->triggerEvents(['post_remember_user', 'remember_user_successful']);
				return TRUE;
			}
		}

		$this->triggerEvents(['post_remember_user', 'remember_user_unsuccessful']);
		return false;
	}

	/**
	 * Login automatically a user with the "Remember me" feature
	 * Implemented as described in
	 * https://paragonie.com/blog/2015/04/secure-authentication-php-with-long-term-persistence
	 *
	 * @return bool
	 * @author Ben Edmunds
	 */
	public function loginRememberedUser()
	{
		$this->triggerEvents('pre_login_remembered_user');

		// Retrieve token from cookie
		$remember_cookie = get_cookie($this->config->rememberCookieName);
		$token = $this->_retrieveSelectorValidatorCouple($remember_cookie);

		if ($token === false)
		{
			$this->triggerEvents(['post_login_remembered_user', 'post_login_remembered_user_unsuccessful']);
			return false;
		}

		// get the user with the selector
		$this->triggerEvents('extra_where');
		$query = $this->db->table($this->tables['users'])
						  ->select($this->identity_column . ', id, email, remember_code, last_login')
						  ->where('remember_selector', $token->selector)
						  ->where('active', 1)
						  ->limit(1)
						  ->get();

		// Check that we got the user
		if ($query->numRows() === 1)
		{
			// Retrieve the information
			$user = $query->row();

			// Check the code against the validator
			$identity = $user->{$this->identity_column};
			if ($this->verifyPassword($token->validator, $user->remember_code, $identity))
			{
				$this->updateLastLogin($user->id);

				$this->setSession($user);

				$this->clearForgottenPasswordCode($identity);

				// extend the users cookies if the option is enabled
				if ($this->config->userExtendonLogin)
				{
					$this->rememberUser($identity);
				}

				// Regenerate the session (for security purpose: to avoid session fixation)
				$this->session->sess_regenerate(false);

				$this->triggerEvents(['post_login_remembered_user', 'post_login_remembered_user_successful']);
				return TRUE;
			}
		}
		delete_cookie($this->config->rememberCookieName);

		$this->triggerEvents(['post_login_remembered_user', 'post_login_remembered_user_unsuccessful']);
		return false;
	}


	/**
	 * create_group
	 *
	 * @param string|bool $groupName
	 * @param string      $group_description
	 * @param array       $additional_data
	 *
	 * @return int|bool The ID of the inserted group, or false on failure
	 * @author aditya menon
	 */
	public function createGroup($groupName = false, $group_description = '', $additional_data = [])
	{
		// bail if the group name was not passed
		if(!$groupName)
		{
			$this->setError('IonAuth.groupName_required');
			return false;
		}

		// bail if the group name already exists
		$existing_group = $this->db->table($this->tables['groups'])->where(['name' => $groupName])->countAllResults();
		if($existing_group !== 0)
		{
			$this->setError('IonAuth.group_already_exists');
			return false;
		}

		$data = ['name'=>$groupName,'description'=>$group_description];

		// filter out any data passed that doesnt have a matching column in the groups table
		// and merge the set group data and the additional data
		if (!empty($additional_data)) $data = array_merge($this->_filterData($this->tables['groups'], $additional_data), $data);

		$this->triggerEvents('extra_group_set');

		// insert the new group
		$this->db->table($this->tables['groups'])->insert($data);
		$group_id = $this->db->insertId($this->tables['groups'] . '_id_seq');

		// report success
		$this->setMessage('group_creation_successful');
		// return the brand new group id
		return $group_id;
	}

	/**
	 * update_group
	 *
	 * @param int|string|bool $group_id
	 * @param string|bool     $groupName
	 * @param array    $additional_data
	 *
	 * @return bool
	 * @author aditya menon
	 */
	public function updateGroup($group_id = false, $groupName = false, $additional_data = []): bool
	{
		if (empty($group_id))
		{
			return false;
		}

		$data = [];

		if (!empty($groupName))
		{
			// we are changing the name, so do some checks

			// bail if the group name already exists
			$existing_group = $this->db->table($this->tables['groups'])->getWhere(['name' => $groupName])->getRow();
			if (isset($existing_group->id) && $existing_group->id != $group_id)
			{
				$this->setError('IonAuth.group_already_exists');
				return false;
			}

			$data['name'] = $groupName;
		}

		// restrict change of name of the admin group
		$group = $this->db->table($this->tables['groups'])->getWhere(['id' => $group_id])->getRow();
		if ($this->config->adminGroup === $group->name && $groupName !== $group->name)
		{
			$this->setError('IonAuth.groupName_admin_not_alter');
			return false;
		}

		// filter out any data passed that doesnt have a matching column in the groups table
		// and merge the set group data and the additional data
		if (!empty($additional_data))
		{
			$data = array_merge($this->_filterData($this->tables['groups'], $additional_data), $data);
		}

		$this->db->table($this->tables['groups'])->update($data, ['id' => $group_id]);

		$this->setMessage('group_update_successful');

		return TRUE;
	}

	/**
	 * delete_group
	 *
	 * @param int|string|bool $group_id
	 *
	 * @return bool
	 * @author aditya menon
	 */
	public function deleteGroup($group_id = false)
	{
		// bail if mandatory param not set
		if(!$group_id || empty($group_id))
		{
			return false;
		}
		$group = $this->group($group_id)->row();
		if($group->name == $this->config->adminGroup)
		{
			$this->triggerEvents(['post_delete_group', 'post_delete_group_notallowed']);
			$this->setError('IonAuth.group_delete_notallowed');
			return false;
		}

		$this->triggerEvents('pre_delete_group');

		$this->db->trans_begin();

		// remove all users from this group
		$this->db->table($this->tables['users_groups'])->delete([$this->join['groups'] => $group_id]);
		// remove the group itself
		$this->db->table($this->tables['groups'])->delete(['id' => $group_id]);

		if ($this->db->trans_status() === false)
		{
			$this->db->trans_rollback();
			$this->triggerEvents(['post_delete_group', 'post_delete_group_unsuccessful']);
			$this->setError('IonAuth.group_delete_unsuccessful');
			return false;
		}

		$this->db->trans_commit();

		$this->triggerEvents(['post_delete_group', 'post_delete_group_successful']);
		$this->setMessage('group_delete_successful');
		return TRUE;
	}

	/**
	 * @param string $event
	 * @param string $name
	 * @param string $class
	 * @param string $method
	 * @param array $arguments
	 */
	public function setHook($event, $name, $class, $method, $arguments)
	{
		$this->_ion_hooks->{$event}[$name] = new stdClass;
		$this->_ion_hooks->{$event}[$name]->class     = $class;
		$this->_ion_hooks->{$event}[$name]->method    = $method;
		$this->_ion_hooks->{$event}[$name]->arguments = $arguments;
	}

	/**
	 * @param string $event
	 * @param string $name
	 */
	public function removeHook($event, $name)
	{
		if (isset($this->_ion_hooks->{$event}[$name]))
		{
			unset($this->_ion_hooks->{$event}[$name]);
		}
	}

	/**
	 * @param string $event
	 */
	public function removeHooks($event)
	{
		if (isset($this->_ion_hooks->$event))
		{
			unset($this->_ion_hooks->$event);
		}
	}

	/**
	 * @param string $event
	 * @param string $name
	 *
	 * @return bool|mixed
	 */
	protected function _callHook($event, $name)
	{
		if (isset($this->_ion_hooks->{$event}[$name]) && method_exists($this->_ion_hooks->{$event}[$name]->class, $this->_ion_hooks->{$event}[$name]->method))
		{
			$hook = $this->_ion_hooks->{$event}[$name];

			return call_user_func_array([$hook->class, $hook->method], $hook->arguments);
		}

		return false;
	}

	/**
	 * @param string|array $events
	 */
	public function triggerEvents($events)
	{
		if (is_array($events) && !empty($events))
		{
			foreach ($events as $event)
			{
				$this->triggerEvents($event);
			}
		}
		else
		{
			if (isset($this->_ion_hooks->$events) && !empty($this->_ion_hooks->$events))
			{
				foreach ($this->_ion_hooks->$events as $name => $hook)
				{
					$this->_callHook($events, $name);
				}
			}
		}
	}

	/**
	 * set_message_delimiters
	 *
	 * Set the message delimiters
	 *
	 * @param string $start_delimiter
	 * @param string $end_delimiter
	 *
	 * @return true
	 * @author Ben Edmunds
	 */
	public function setMessageDelimiters($start_delimiter, $end_delimiter)
	{
		$this->messageStartDelimiter = $start_delimiter;
		$this->messageEndDelimiter   = $end_delimiter;

		return TRUE;
	}

	/**
	 * set_error_delimiters
	 *
	 * Set the error delimiters
	 *
	 * @param string $start_delimiter
	 * @param string $end_delimiter
	 *
	 * @return true
	 * @author Ben Edmunds
	 */
	public function setErrorDelimiters($start_delimiter, $end_delimiter)
	{
		$this->errorStartDelimiter = $start_delimiter;
		$this->errorEndDelimiter   = $end_delimiter;

		return TRUE;
	}

	/**
	 * set_message
	 *
	 * Set a message
	 *
	 * @param string $message The message
	 *
	 * @return string The given message
	 * @author Ben Edmunds
	 */
	public function setMessage($message)
	{
		$this->messages[] = $message;

		return $message;
	}

	/**
	 * Get the messages
	 *
	 * @return string
	 * @author Ben Edmunds
	 */
	public function messages(): string
	{
		$output = '';
		foreach ($this->messages as $message)
		{
            $messageLang = lang($message) ? lang($message) : '##' . $message . '##';
			$output .= $this->messageStartDelimiter . $messageLang . $this->messageEndDelimiter;
		}

		return $output;
	}

	/**
	 * messages as array
	 *
	 * Get the messages as an array
	 *
	 * @param bool $langify
	 *
	 * @return array
	 * @author Raul Baldner Junior
	 */
	public function messagesArray($langify = TRUE)
	{
		if ($langify)
		{
			$_output = [];
			foreach ($this->messages as $message)
			{
				$messageLang = $this->lang->line($message) ? $this->lang->line($message) : '##' . $message . '##';
				$_output[] = $this->messageStartDelimiter . $messageLang . $this->messageEndDelimiter;
			}
			return $_output;
		}
		else
		{
			return $this->messages;
		}
	}

	/**
	 * clear_messages
	 *
	 * Clear messages
	 *
	 * @return true
	 * @author Ben Edmunds
	 */
	public function clearMessages()
	{
		$this->messages = [];

		return TRUE;
	}

	/**
	 * Set an error message
	 *
	 * @param string $error The error to set
	 *
	 * @return string The given error
	 * @author Ben Edmunds
	 */
	public function setError(string $error): string
	{
		$this->errors[] = $error;

		return $error;
	}

	/**
	 * Get the error message
	 *
	 * @return string
	 * @author Ben Edmunds
	 */
	public function errors(): string
	{
		$output = '';
		foreach ($this->errors as $error)
		{
			$errorLang = lang($error) ? lang($error) : '##' . $error . '##';
			$output .= $this->errorStartDelimiter . $errorLang . $this->errorEndDelimiter;
		}

		return $output;
	}

	/**
	 * Get the error messages as an array
	 *
	 * @param bool $langify
	 *
	 * @return array
	 * @author Raul Baldner Junior
	 */
	public function errorsArray($langify = TRUE): array
	{
		if ($langify)
		{
			$output = [];
			foreach ($this->errors as $error)
			{
				$errorLang = lang('IonAuth.' . $error) ? lang('IonAuth.' . $error) : '##' . $error . '##';
				$output[] = $this->errorStartDelimiter . $errorLang . $this->errorEndDelimiter;
			}
			return $output;
		}
		else
		{
			return $this->errors;
		}
	}

	/**
	 * Clear Errors
	 *
	 * @return true
	 * @author Ben Edmunds
	 */
	public function clearErrors(): boolean
	{
		$this->errors = [];

		return true;
	}

	/**
	 * Internal function to set a password in the database
	 *
	 * @param string $identity
	 * @param string $password
	 *
	 * @return bool
	 */
	protected function _setPasswordDb($identity, $password)
	{
		$hash = $this->hashPassword($password, $identity);

		if ($hash === false)
		{
			return false;
		}

		// When setting a new password, invalidate any other token
		$data = [
			'password' => $hash,
			'remember_code' => NULL,
			'forgotten_password_code' => NULL,
			'forgotten_password_time' => NULL
		];

		$this->triggerEvents('extra_where');

		$this->db->table($this->tables['users'])->update($data, [$this->identity_column => $identity]);

		return $this->db->affectedRows() == 1;
	}

	/**
	 * @param string $table
	 * @param array  $data
	 *
	 * @return array
	 */
	protected function _filterData($table, $data)
	{
		$filtered_data = [];
		//$columns = $this->db->list_fields($table);
		$columns = $this->db->getFieldNames($table);

		if (is_array($data))
		{
			foreach ($columns as $column)
			{
				if (array_key_exists($column, $data))
					$filtered_data[$column] = $data[$column];
			}
		}

		return $filtered_data;
	}


	/** Generate a random token
	 * Inspired from http://php.net/manual/en/function.random-bytes.php#118932
	 *
	 * @param int $result_length
	 * @return string
	 */
	protected function _randomToken($result_length = 32)
	{
		if(!isset($result_length) || intval($result_length) <= 8 ){
			$result_length = 32;
		}

		// Try random_bytes: PHP 7
		if (function_exists('random_bytes')) {
			return bin2hex(random_bytes($result_length / 2));
		}

		// Try mcrypt
		if (function_exists('mcrypt_create_iv')) {
			return bin2hex(mcrypt_create_iv($result_length / 2, MCRYPT_DEV_URANDOM));
		}

		// Try openssl
		if (function_exists('openssl_random_pseudo_bytes')) {
			return bin2hex(openssl_random_pseudo_bytes($result_length / 2));
		}

		// No luck!
		return false;
	}

	/** Retrieve hash parameter according to options
	 *
	 * @param string	$identity
	 *
	 * @return array|bool
	 */
	protected function _getHashParameters($identity = NULL)
	{
		// Check if user is administrator or not
		$is_admin = false;
		if ($identity)
		{
			$user_id = $this->getUserIdFromIdentity($identity);
			if ($user_id && $this->inGroup($this->config->adminGroup, $user_id))
			{
				$is_admin = TRUE;
			}
		}

		$params = false;
		switch ($this->hashMethod)
		{
			case 'bcrypt':
				$params = [
					'cost' => $is_admin ? $this->config->bcryptAdminCost
										: $this->config->bcryptDefaultCost
				];
				break;

			case 'argon2':
				$params = $is_admin ? $this->config->argon2AdminParams
									: $this->config->argon2DefaultParams;
				break;

			default:
				// Do nothing
		}

		return $params;
	}

	/** Retrieve hash algorithm according to options
	 *
	 * @return string|bool
	 */
	protected function _getHashAlgo()
	{
		$algo = false;
		switch ($this->hashMethod)
		{
			case 'bcrypt':
				$algo = PASSWORD_BCRYPT;
				break;

			case 'argon2':
				$algo = PASSWORD_ARGON2I;
				break;

			default:
				// Do nothing
		}

		return $algo;
	}

	/**
	 * Generate a random selector/validator couple
	 *
	 * @param $selector_size int	size of the selector token
	 * @param $validator_size int	size of the validator token
	 *
	 * @return object
	 * 			->selector			simple token to retrieve the user (to store in DB)
	 * 			->validator_hashed	token (hashed) to validate the user (to store in DB)
	 * 			->user_code			code to be used user-side (in cookie or URL)
	 */
	protected function _generateSelectorValidatorCouple($selector_size = 40, $validator_size = 128)
	{
		// The selector is a simple token to retrieve the user
		$selector = $this->_randomToken($selector_size);

		// The validator will strictly validate the user and should be more complex
		$validator = $this->_randomToken($validator_size);

		// The validator is hashed for storing in DB (avoid session stealing in case of DB leaked)
		$validator_hashed = $this->hashPassword($validator);

		// The code to be used user-side
		$user_code = "$selector.$validator";

		return (object) [
			'selector' => $selector,
			'validator_hashed' => $validator_hashed,
			'user_code' => $user_code,
		];
	}

	/**
	 * Retrieve remember cookie info
	 *
	 * @param $user_code	string
	 *
	 * @return object
	 * 			->selector		simple token to retrieve the user in DB
	 * 			->validator		token to validate the user (check against hashed value in DB)
	 */
	protected function _retrieveSelectorValidatorCouple($user_code)
	{
		// Check code
		if ($user_code)
		{
			$tokens = explode('.', $user_code);

			// Check tokens
			if (count($tokens) === 2)
			{
				return (object) [
					'selector' => $tokens[0],
					'validator' => $tokens[1]
				];
			}
		}

		return false;
	}

	/**
	 * Handle legacy sha1 password
	 *
	 * We expect the configuration to still have:
	 *		store_salt
	 *		salt_length
	 *
	 * @TODO to be removed in later version
	 *
	 * @param string	$identity
	 * @param string	$password
	 * @param string	$hashed_password_db
	 *
	 * @return bool
	 **/
	protected function _passwordVerifySha1Legacy($identity, $password, $hashed_password_db)
	{
		$this->triggerEvents('pre_sha1_password_migration');

		if ($this->config->store_salt)
		{
			// Salt is store at the side, retrieve it
			$query = $this->db->table($this->tables['users'])
							  ->select('salt')
							  ->where($this->identity_column, $identity)
							  ->limit(1)
							  ->get();

			$salt_db = $query->row();

			if ($query->numRows() !== 1)
			{
				$this->triggerEvents(['post_sha1_password_migration', 'post_sha1_password_migration_unsuccessful']);
				return false;
			}

			$hashed_password = sha1($password . $salt_db->salt);
		}
		else
		{
			// Salt is stored along with password
			$salt_length = $this->config->salt_length;

			if (!$salt_length)
			{
				$this->triggerEvents(['post_sha1_password_migration', 'post_sha1_password_migration_unsuccessful']);
				return false;
			}

			$salt = substr($hashed_password_db, 0, $salt_length);

			$hashed_password =  $salt . substr(sha1($salt . $password), 0, -$salt_length);
		}

		// Now we can compare them
		if($hashed_password === $hashed_password_db)
		{
			// Password is good, migrate it to latest
			$result = $this->_setPasswordDb($identity, $password);

			if ($result)
			{
				$this->triggerEvents(['post_sha1_password_migration', 'post_sha1_password_migration_successful']);
			}
			else
			{
				$this->triggerEvents(['post_sha1_password_migration', 'post_sha1_password_migration_unsuccessful']);
			}

			return $result;
		}
		else
		{
			// Password mismatch, we cannot migrate...
			$this->triggerEvents(['post_sha1_password_migration', 'post_sha1_password_migration_unsuccessful']);
			return false;
		}
	}
}
