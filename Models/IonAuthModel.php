<?php
namespace IonAuth\Models;

/**
 * Name:    Ion Auth Model
 *
 * Created:  10.01.2009
 *
 * Description:  Modified auth system based on redux_auth with extensive customization.
 *               This is basically what Redux Auth 2 should be.
 * Original Author name has been kept but that does not mean that the method has not been modified.
 *
 * Requirements: PHP 7.2 or above
 *
 * @package    CodeIgniter-Ion-Auth
 * @author     Ben Edmunds <ben.edmunds@gmail.com>
 * @author     Phil Sturgeon
 * @author     Benoit VRIGNAUD <benoit.vrignaud@tangue.fr>
 * @license    https://opensource.org/licenses/MIT	MIT License
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
	 * IonAuth config
	 *
	 * @var Config\IonAuth
	 */
	protected $config;

	/**
	 * CodeIgniter session
	 *
	 * @var \CodeIgniter\Session\Session
	 */
	protected $session;

	/**
	 * Holds an array of tables used
	 *
	 * @var array
	 */
	public $tables = [];

	/**
	 * Activation code
	 *
	 * Set by deactivate() function
	 * Also set on register() function, if email_activation
	 * option is activated
	 *
	 * This is the value devs should give to the user
	 * (in an email, usually)
	 *
	 * It contains the *user* version of the activation code
	 * It's a value of the form "selector.validator"
	 *
	 * This is not the same activationCode as the one in DB.
	 * The DB contains a *hashed* version of the validator
	 * and a selector in another column.
	 *
	 * THe selector is not private, and only used to lookup
	 * the validator.
	 *
	 * The validator is private, and to be only known by the user
	 * So in case of DB leak, nothing could be actually used.
	 *
	 * @var string
	 */
	public $activationCode;

	/**
	 * Identity column
	 *
	 * @var string
	 */
	public $identityColumn;

	/**
	 * Where
	 *
	 * @var array
	 */
	protected $ionWhere = [];

	/**
	 * Select
	 *
	 * @var array
	 */
	protected $ionSelect = [];

	/**
	 * Like
	 *
	 * @var array
	 */
	protected $ionLike = [];

	/**
	 * Limit
	 *
	 * @var string
	 */
	protected $ionLimit = null;

	/**
	 * Offset
	 *
	 * @var string
	 */
	protected $ionOffset = null;

	/**
	 * Order By
	 *
	 * @var string
	 */
	protected $ionOrderBy = null;

	/**
	 * Order
	 *
	 * @var string
	 */
	protected $ionOrder = null;

	/**
	 * Hooks
	 *
	 * @var object
	 */
	protected $ionHooks;

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
	protected $messages = [];

	/**
	 * Error message (uses lang file)
	 *
	 * @var string
	 */
	protected $errors = [];

	/**
	 * Message templates (single, list).
	 *
	 * @var array
	 */
	protected $messageTemplates = [];

	/**
	 * Caching of users and their groups
	 *
	 * @var array
	 */
	protected $cacheUserInGroup = [];

	/**
	 * Caching of groups
	 *
	 * @var array
	 */
	protected $cacheGroups = [];

	/**
	 * Database object
	 *
	 * @var \CodeIgniter\Database\BaseConnection
	 */
	protected $db;

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->config = config('IonAuth');
		helper(['cookie', 'date']);
		$this->session = session();

		// initialize the database
		if (empty($this->config->databaseGroupName))
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
		$this->identityColumn = $this->config->identity;
		$this->join           = $this->config->join;

		// initialize hash method options (Bcrypt)
		$this->hashMethod = $this->config->hashMethod;

		// load the messages template from the config file
		$this->messagesTemplates = $this->config->templates['messages'];

		// initialize our hooks object
		$this->ionHooks = new \stdClass();

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
	 * @param string $password Password
	 * @param string $identity Identity
	 *
	 * @return false|string
	 * @author Mathew
	 */
	public function hashPassword(string $password, string $identity='')
	{
		// Check for empty password, or password containing null char, or password above limit
		// Null char may pose issue: http://php.net/manual/en/function.password-hash.php#118603
		// Long password may pose DOS issue (note: strlen gives size in bytes and not in multibyte symbol)
		if (empty($password) || strpos($password, "\0") !== false ||
			strlen($password) > self::MAX_PASSWORD_SIZE_BYTES)
		{
			return false;
		}

		$algo   = $this->getHashAlgo();
		$params = $this->getHashParameters($identity);

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
	 * @param string $password       Password
	 * @param string $hashPasswordDb
	 * @param string $identity		 Optional @deprecated only for BC SHA1
	 *
	 * @return boolean
	 * @author Mathew
	 */
	public function verifyPassword(string $password, string $hashPasswordDb, string $identity=''): bool
	{
		// Check for empty id or password, or password containing null char, or password above limit
		// Null char may pose issue: http://php.net/manual/en/function.password-hash.php#118603
		// Long password may pose DOS issue (note: strlen gives size in bytes and not in multibyte symbol)
		if (empty($password) || empty($hashPasswordDb) || strpos($password, "\0") !== false
			|| strlen($password) > self::MAX_PASSWORD_SIZE_BYTES)
		{
			return false;
		}

		return password_verify($password, $hashPasswordDb);
	}

	/**
	 * Check if password needs to be rehashed
	 * If true, then rehash and update it in DB
	 *
	 * @param string $hash     Hash
	 * @param string $identity Identity
	 * @param string $password Password
	 *
	 * @return void
	 */
	public function rehashPasswordIfNeeded(string $hash, string $identity, string $password): void
	{
		$algo   = $this->getHashAlgo();
		$params = $this->getHashParameters($identity);

		if ($algo !== false && $params !== false)
		{
			if (password_needs_rehash($hash, $algo, $params))
			{
				if ($this->setPasswordDb($identity, $password))
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
	 * Get a user by its activation code
	 *
	 * @param string $userCode The activation code
	 *                         It's the *user* one, containing "selector.validator"
	 *                         the one you got in activation_code member
	 *
	 * @return boolean|object
	 * @author Indigo
	 */
	public function getUserByActivationCode(string $userCode)
	{
		// Retrieve the token object from the code
		$token = $this->retrieveSelectorValidatorCouple($userCode);

		// Retrieve the user according to this selector
		$user = $this->where('activation_selector', $token->selector)->users()->row();

		if ($user)
		{
			// Check the hash against the validator
			if ($this->verifyPassword($token->validator, $user->activation_code))
			{
				return $user;
			}
		}

		return false;
	}

	/**
	 * Validates and removes activation code.
	 *
	 * @param integer|string $id   The user identifier
	 * @param string         $code The *user* activation code
	 *                             if omitted, simply activate the user without check
	 *
	 * @return boolean
	 * @author Mathew
	 */
	public function activate($id, string $code=''): bool
	{
		$this->triggerEvents('pre_activate');

		if ($code)
		{
			$user = $this->getUserByActivationCode($code);
		}
		// Activate if no code is given
		// Or if a user was found with this code, and that it matches the id
		if (!$code || ($user && $user->id == $id))
		{
			$data = [
				'activation_selector' => null,
				'activation_code'     => null,
				'active'              => 1,
			];

			$this->triggerEvents('extra_where');
			$this->db->table($this->tables['users'])->update($data, ['id' => $id]);

			if ($this->db->affectedRows() === 1)
			{
				$this->triggerEvents(['post_activate', 'post_activate_successful']);
				$this->setMessage('IonAuth.activate_successful');
				return true;
			}
		}

		$this->triggerEvents(['post_activate', 'post_activate_unsuccessful']);
		$this->setError('IonAuth.activate_unsuccessful');
		return false;
	}

	/**
	 * Updates a users row with an activation code.
	 *
	 * @param integer $id User id
	 *
	 * @return boolean
	 * @author Mathew
	 */
	public function deactivate(int $id=0): bool
	{
		$this->triggerEvents('deactivate');

		if (! $id)
		{
			$this->setError('IonAuth.deactivate_unsuccessful');
			return false;
		}
		else if ((new \IonAuth\Libraries\IonAuth())->loggedIn() && $this->user()->row()->id == $id)
		{
			$this->setError('IonAuth.deactivate_current_user_unsuccessful');
			return false;
		}

		$token                = $this->generateSelectorValidatorCouple(20, 40);
		$this->activationCode = $token->userCode;

		$data = [
			'activation_selector' => $token->selector,
			'activation_code'     => $token->validatorHashed,
			'active'              => 0,
		];

		$this->triggerEvents('extra_where');
		$this->db->table($this->tables['users'])->update($data, ['id' => $id]);

		$return = $this->db->affectedRows() === 1;
		if ($return)
		{
			$this->setMessage('IonAuth.deactivate_successful');
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
	 * @param string $identity Identity
	 *
	 * @return boolean Success
	 */
	public function clearForgottenPasswordCode(string $identity): bool
	{
		if (empty($identity))
		{
			return false;
		}

		$data = [
			'forgotten_password_selector' => null,
			'forgotten_password_code'     => null,
			'forgotten_password_time'     => null,
		];

		return $this->db->table($this->tables['users'])->update($data, [$this->identityColumn => $identity]);
	}

	/**
	 * Clear the remember code for a user
	 *
	 * @param string $identity Identity
	 *
	 * @return boolean Success
	 */
	public function clearRememberCode(string $identity): bool
	{
		if (empty($identity))
		{
			return false;
		}

		$data = [
			'remember_selector' => null,
			'remember_code'     => null,
		];

		return $this->db->table($this->tables['users'])->update($data, [$this->identityColumn => $identity]);
	}

	/**
	 * Reset password
	 *
	 * @param string $identity Identity
	 * @param string $new      New password
	 *
	 * @return boolean
	 * @author Mathew
	 */
	public function resetPassword(string $identity, string $new)
	{
		$this->triggerEvents('pre_change_password');

		if (! $this->identityCheck($identity))
		{
			$this->triggerEvents(['post_change_password', 'post_change_password_unsuccessful']);
			return false;
		}

		$return = $this->setPasswordDb($identity, $new);

		if ($return)
		{
			$this->triggerEvents(['post_change_password', 'post_change_password_successful']);
			$this->setMessage('IonAuth.password_change_successful');
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
	 * @param string $identity Identity
	 * @param string $old      Old password
	 * @param string $new      New password
	 *
	 * @return boolean
	 * @author Mathew
	 */
	public function changePassword(string $identity, string $old, string $new): bool
	{
		$this->triggerEvents('pre_change_password');

		$this->triggerEvents('extra_where');

		$builder = $this->db->table($this->tables['users']);
		$query   = $builder
					   ->select('id, password')
					   ->where($this->identityColumn, $identity)
					   ->limit(1)
					   ->get()->getResult();

		if (empty($query))
		{
			$this->triggerEvents(['post_change_password', 'post_change_password_unsuccessful']);
			$this->setError('IonAuth.password_change_unsuccessful');
			return false;
		}

		$user = $query[0];

		if ($this->verifyPassword($old, $user->password, $identity))
		{
			$result = $this->setPasswordDb($identity, $new);

			if ($result)
			{
				$this->triggerEvents(['post_change_password', 'post_change_password_successful']);
				$this->setMessage('IonAuth.password_change_successful');
			}
			else
			{
				$this->triggerEvents(['post_change_password', 'post_change_password_unsuccessful']);
				$this->setError('IonAuth.password_change_unsuccessful');
			}

			return $result;
		}

		$this->setError('IonAuth.password_change_unsuccessful');
		return false;
	}

	/**
	 * Checks username
	 *
	 * @param string $username User name
	 *
	 * @return boolean
	 * @author Mathew
	 */
	public function usernameCheck(string $username): bool
	{
		$this->triggerEvents('username_check');

		if (empty($username))
		{
			return false;
		}

		$this->triggerEvents('extra_where');

		return $this->db->table($this->tables['users'])
			->where('username', $username)
			->limit(1)
			->countAllResults() > 0;
	}

	/**
	 * Checks email to see if the email is already registered.
	 *
	 * @param string $email Email to check
	 *
	 * @return boolean true if the user is registered false if the user is not registered.
	 * @author Mathew
	 */
	public function emailCheck(string $email=''): bool
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
	 * Identity check : Check to see if the identity is already registered
	 *
	 * @param string $identity Identity
	 *
	 * @return boolean
	 * @author Mathew
	 */
	public function identityCheck(string $identity=''): bool
	{
		$this->triggerEvents('identity_check');

		if (empty($identity))
		{
			return false;
		}

		$builder = $this->db->table($this->tables['users']);
		return $builder->where($this->identityColumn, $identity)
					   ->limit(1)
					   ->countAllResults() > 0;
	}

	/**
	 * Get user ID from identity
	 *
	 * @param string $identity Identity
	 *
	 * @return boolean|integer
	 */
	public function getUserIdFromIdentity(string $identity='')
	{
		if (empty($identity))
		{
			return false;
		}

		$builder = $this->db->table($this->tables['users']);
		$query = $builder->select('id')
						 ->where($this->identityColumn, $identity)
						 ->limit(1)
						 ->get();

		$user = $query->getRow();

		if ($user)
		{
			return $user->id;
		}

		return false;
	}

	/**
	 * Insert a forgotten password key.
	 *
	 * @param string $identity As defined in Config/IonAuth
	 *
	 * @return boolean|string
	 *
	 * @author Mathew
	 * @author Ryan
	 */
	public function forgottenPassword(string $identity)
	{
		if (empty($identity))
		{
			$this->triggerEvents(['post_forgotten_password', 'post_forgotten_password_unsuccessful']);
			return false;
		}

		// Generate random token: smaller size because it will be in the URL
		$token = $this->generateSelectorValidatorCouple(20, 80);

		$update = [
			'forgotten_password_selector' => $token->selector,
			'forgotten_password_code'     => $token->validatorHashed,
			'forgotten_password_time'     => time(),
		];

		$this->triggerEvents('extra_where');
		$this->db->table($this->tables['users'])->update($update, [$this->identityColumn => $identity]);

		if ($this->db->affectedRows() === 1)
		{
			$this->triggerEvents(['post_forgotten_password', 'post_forgotten_password_successful']);
			return $token->userCode;
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
	 * @param string $userCode Forgotten password key
	 *
	 * @return  boolean|object
	 * @author  Mathew
	 * @updated Ryan
	 */
	public function getUserByForgottenPasswordCode(string $userCode)
	{
		// Retrieve the token object from the code
		$token = $this->retrieveSelectorValidatorCouple($userCode);

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

		return false;
	}

	/**
	 * Register (create) a new user
	 *
	 * @param string $identity       This must be the value that uniquely identifies the user when he is registered
	 * @param string $password       Password
	 * @param string $email          Email
	 * @param array  $additionalData Multidimensional array
	 * @param array  $groups         If not passed the default group name set in the config will be used
	 *
	 * @return integer|boolean
	 * @author Mathew
	 */
	public function register(string $identity, string $password, string $email, array $additionalData=[], array $groups=[])
	{
		$this->triggerEvents('pre_register');

		$manualActivation = $this->config->manualActivation;

		if ($this->identityCheck($identity))
		{
			$this->setError('IonAuth.account_creation_duplicate_identity');
			return false;
		}
		else if (! $this->config->defaultGroup && empty($groups))
		{
			$this->setError('IonAuth.account_creation_missing_defaultGroup');
			return false;
		}

		// check if the default set in config exists in database
		$query = $this->db->table($this->tables['groups'])->where(['name' => $this->config->defaultGroup], 1)->get()->getRow();
		if (! isset($query->id) && empty($groups))
		{
			$this->setError('IonAuth.account_creation_invalid_defaultGroup');
			return false;
		}

		// capture default group details
		$defaultGroup = $query;

		// IP Address
		$ipAddress = \Config\Services::request()->getIPAddress();

		// Do not pass $identity as user is not known yet so there is no need
		$password = $this->hashPassword($password);

		if ($password === false)
		{
			$this->setError('IonAuth.account_creation_unsuccessful');
			return false;
		}

		// Users table.
		$data = [
			$this->identityColumn => $identity,
			'username'            => $identity,
			'password'            => $password,
			'email'               => $email,
			'ip_address'          => $ipAddress,
			'created_on'          => time(),
			'active'              => ($manualActivation === false ? 1 : 0),
		];

		// filter out any data passed that doesnt have a matching column in the users table
		// and merge the set user data and the additional data
		$userData = array_merge($this->filterData($this->tables['users'], $additionalData), $data);

		$this->triggerEvents('extra_set');

		$this->db->table($this->tables['users'])->insert($userData);

		$id = $this->db->insertId($this->tables['users'] . '_id_seq');

		// add in groups array if it doesn't exists and stop adding into default group if default group ids are set
		if (isset($defaultGroup->id) && empty($groups))
		{
			$groups[] = $defaultGroup->id;
		}

		if (! empty($groups))
		{
			// add to groups
			foreach ($groups as $group)
			{
				$this->addToGroup($group, $id);
			}
		}

		$this->triggerEvents('post_register');

		return $id ?? false;
	}

	/**
	 * Logs the user into the system
	 *
	 * @param string  $identity Username, email or any unique value in your users table, depending on your configuration
	 * @param string  $password Password
	 * @param boolean $remember Sets the user to be remembered if enabled in the configuration
	 *
	 * @return boolean
	 * @author Mathew
	 */
	public function login(string $identity, string $password, bool $remember=false): bool
	{
		$this->triggerEvents('pre_login');

		if (empty($identity) || empty($password))
		{
			$this->setError('IonAuth.login_unsuccessful');
			return false;
		}

		$this->triggerEvents('extra_where');
		$query = $this->db->table($this->tables['users'])
						  ->select($this->identityColumn . ', email, id, password, active, last_login')
						  ->where($this->identityColumn, $identity)
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

		$user = $query->getRow();

		if (isset($user))
		{
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
				$this->setMessage('IonAuth.login_successful');

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
	 *
	 * @return boolean
	 */
	public function recheckSession(): bool
	{
		$recheck = (null !== $this->config->recheckTimer) ? $this->config->recheckTimer : 0;

		if ($recheck !== 0)
		{
			$lastLogin = $this->session->get('last_check');
			if ($lastLogin + $recheck < time())
			{
				$query = $this->db->select('id')
								  ->where([
									  $this->identityColumn => $this->session->get('identity'),
									  'active'              => '1',
								  ])
								  ->limit(1)
								  ->orderBy('id', 'desc')
								  ->get($this->tables['users']);
				if ($query->numRows() === 1)
				{
					$this->session->set('last_check', time());
				}
				else
				{
					$this->triggerEvents('logout');

					$identity = $this->config->identity;

					$this->session->remove([$identity, 'id', 'user_id']);

					return false;
				}
			}
		}

		return (bool)session('identity');
	}

	/**
	 * Check if max login attempts exceeded
	 * Based on code from Tank Auth, by Ilya Konyukhov (https://github.com/ilkon/Tank-Auth)
	 *
	 * @param string      $identity  User's identity
	 * @param string|null $ipAddress IP address
	 *                               Only used if trackLoginIpAddress is set to true.
	 *                               If null (default value), the current IP address is used.
	 *                               Use getLastAttemptIp($identity) to retrieve a user's last IP
	 *
	 * @return boolean
	 */
	public function isMaxLoginAttemptsExceeded(string $identity, $ipAddress=null): bool
	{
		if ($this->config->trackLoginAttempts)
		{
			$maxAttempts = $this->config->maximumLoginAttempts;
			if ($maxAttempts > 0)
			{
				$attempts = $this->getAttemptsNum($identity, $ipAddress);
				return $attempts >= $maxAttempts;
			}
		}
		return false;
	}

	/**
	 * Get number of login attempts for the given IP-address or identity
	 * Based on code from Tank Auth, by Ilya Konyukhov (https://github.com/ilkon/Tank-Auth)
	 *
	 * @param string      $identity  User's identity
	 * @param string|null $ipAddress IP address
	 *                               Only used if trackLoginIpAddress is set to true.
	 *                               If null (default value), the current IP address is used.
	 *                               Use getLastAttemptIp($identity) to retrieve a user's last IP
	 *
	 * @return integer
	 */
	public function getAttemptsNum(string $identity, $ipAddress=null): int
	{
		if ($this->config->trackLoginAttempts)
		{
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
			$builder->where('time >', time() - $this->config->lockoutTime, false);
			return $builder->countAllResults();
		}
		return 0;
	}

	/**
	 * Get the last time a login attempt occurred from given identity
	 *
	 * @param string      $identity  User's identity
	 * @param string|null $ipAddress IP address
	 *                               Only used if trackLoginIpAddress is set to true.
	 *                               If null (default value), the current IP address is used.
	 *                               Use getLastAttemptIp($identity) to retrieve a user's last IP
	 *
	 * @return integer The time of the last login attempt for a given IP-address or identity
	 */
	public function getLastAttemptTime(string $identity, $ipAddress=null): int
	{
		if ($this->config->trackLoginAttempts)
		{
			$builder = $this->db->table($this->tables['login_attempts']);
			$builder->select('time');
			$builder->where('login', $identity);
			if ($this->config->trackLoginIpAddress)
			{
				if (! isset($ipAddress))
				{
					$ipAddress = \Config\Services::request()->getIPAddress();
				}
				$builder->where('ip_address', $ipAddress);
			}
			$builder->orderBy('id', 'desc');
			$qres = $builder->get(1);

			if ($qres->getRow())
			{
				return $qres->getRow()->time;
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
	public function getLastAttemptIp(string $identity)
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
	 * Note: the current IP address will be used if trackLoginIpAddress config value is true
	 *
	 * @param string $identity User's identity
	 *
	 * @return boolean
	 */
	public function increaseLoginAttempts(string $identity): bool
	{
		if ($this->config->trackLoginAttempts)
		{
			$data = ['ip_address' => '', 'login' => $identity, 'time' => time()];
			if ($this->config->trackLoginIpAddress)
			{
				$data['ip_address'] = \Config\Services::request()->getIPAddress();
			}
			$builder = $this->db->table($this->tables['login_attempts']);
			$builder->insert($data);
			return true;
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
	 *                                                Only used if track_login_ipAddress is set to true.
	 *                                                If null (default value), the current IP address is used.
	 *                                                Use getLastAttemptIp($identity) to retrieve a user's last IP
	 *
	 * @return boolean
	 */
	public function clearLoginAttempts(string $identity, int $oldAttemptsAxpirePeriod=86400, $ipAddress = null): bool
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
	 * Limit
	 *
	 * @param integer $limit Limit
	 *
	 * @return static
	 */
	public function limit(int $limit): self
	{
		$this->triggerEvents('limit');
		$this->ionLimit = $limit;

		return $this;
	}

	/**
	 * Offset
	 *
	 * @param integer $offset Offset
	 *
	 * @return static
	 */
	public function offset(int $offset): self
	{
		$this->triggerEvents('offset');
		$this->ionOffset = $offset;

		return $this;
	}

	/**
	 * @param array|string $where
	 * @param null|string  $value
	 *
	 * @return static
	 */
	public function where($where, $value=null): self
	{
		$this->triggerEvents('where');

		if (! is_array($where))
		{
			$where = [$where => $value];
		}

		array_push($this->ionWhere, $where);

		return $this;
	}

	/**
	 * Like
	 *
	 * @param string      $like
	 * @param string|null $value
	 * @param string      $position
	 *
	 * @return static
	 */
	public function like(string $like, $value=null, $position='both'): self
	{
		$this->triggerEvents('like');

		array_push($this->ionLike, [
			'like'     => $like,
			'value'    => $value,
			'position' => $position,
		]);

		return $this;
	}

	/**
	 * Select
	 *
	 * @param array|string $select Select
	 *
	 * @return static
	 */
	public function select($select): self
	{
		$this->triggerEvents('select');

		$this->ionSelect[] = $select;

		return $this;
	}

	/**
	 * Order by
	 *
	 * @param string $by    By
	 * @param string $order Order
	 *
	 * @return static
	 */
	public function orderBy(string $by, string $order='desc'): self
	{
		$this->triggerEvents('order_by');

		$this->ionOrderBy = $by;
		$this->ionOrder   = $order;

		return $this;
	}

	/**
	 * Wrapper object to return a row as either an array, an object, or
	 * a custom class.
	 *
	 * If row doesn't exist, returns null.
	 *
	 * @return mixed
	 */
	public function row()
	{
		$this->triggerEvents('row');

		$row = $this->response->getRow();

		return $row;
	}

	/**
	 * Returns a single row from the results as an array.
	 *
	 * If row doesn't exist, returns null.
	 *
	 * @return mixed
	 */
	public function rowArray()
	{
		$this->triggerEvents(['row', 'row_array']);

		$row = $this->response->getRowArray();

		return $row;
	}

	/**
	 * Get result
	 *
	 * @return array
	 */
	public function result(): array
	{
		$this->triggerEvents('result');

		return $this->response->getResult();
	}

	/**
	 * Get result array
	 *
	 * @return array
	 */
	public function resultArray(): array
	{
		$this->triggerEvents(['result', 'result_array']);

		$result = $this->response->getResultArray();

		return $result;
	}

	/**
	 * Num rows
	 *
	 * @return integer
	 */
	public function numRows(): int
	{
		$this->triggerEvents(['num_rows']);

		$result = $this->response->numRows();

		return $result;
	}

	/**
	 * Get the users
	 *
	 * @param array|string|integer $groups Group IDs, group names, or group IDs and names
	 *
	 * @return static
	 * @author Ben Edmunds
	 */
	public function users($groups=null): self
	{
		$this->triggerEvents('users');

		$builder = $this->db->table($this->tables['users']);

		if (! empty($this->ionSelect))
		{
			foreach ($this->ionSelect as $select)
			{
				$builder->select($select);
			}

			$this->ionSelect = [];
		}
		else
		{
			// default selects
			$builder->select([
				$this->tables['users'] . '.*',
				$this->tables['users'] . '.id as id',
				$this->tables['users'] . '.id as user_id',
			]);
		}

		// filter by group id(s) if passed
		if (isset($groups))
		{
			// build an array if only one group was passed
			if (! is_array($groups))
			{
				$groups = [$groups];
			}

			// join and then run a where_in against the group ids
			if (! empty($groups))
			{
				$builder->distinct();
				$builder->join(
					$this->tables['users_groups'],
					$this->tables['users_groups'] . '.' . $this->join['users'] . '=' . $this->tables['users'] . '.id',
					'inner'
				);
			}

			// verify if group name or group id was used and create and put elements in different arrays
			$groupIds   = [];
			$groupNames = [];
			foreach ($groups as $group)
			{
				if (is_numeric($group))
				{
					$groupIds[] = $group;
				}
				else
				{
					$groupNames[] = $group;
				}
			}
			$orWhereIn = (! empty($groupIds) && ! empty($groupNames)) ? 'orWhereIn' : 'whereIn';
			// if group name was used we do one more join with groups
			if (! empty($groupNames))
			{
				$builder->join($this->tables['groups'], $this->tables['users_groups'] . '.' . $this->join['groups'] . ' = ' . $this->tables['groups'] . '.id', 'inner');
				$builder->whereIn($this->tables['groups'] . '.name', $groupNames);
			}
			if (! empty($groupIds))
			{
				$builder->{$orWhereIn}($this->tables['users_groups'] . '.' . $this->join['groups'], $groupIds);
			}
		}

		$this->triggerEvents('extra_where');

		// run each where that was passed
		if (! empty($this->ionWhere))
		{
			foreach ($this->ionWhere as $where)
			{
				$builder->where($where);
			}

			$this->ionWhere = [];
		}

		if (! empty($this->ionLike))
		{
			foreach ($this->ionLike as $like)
			{
				$builder->orLike($like['like'], $like['value'], $like['position']);
			}

			$this->ionLike = [];
		}

		if (isset($this->ionLimit) && isset($this->ionOffset))
		{
			$builder->limit($this->ionLimit, $this->ionOffset);

			$this->ionLimit  = null;
			$this->ionOffset = null;
		}
		else if (isset($this->ionLimit))
		{
			$builder->limit($this->ionLimit);

			$this->ionLimit = null;
		}

		// set the order
		if (isset($this->ionOrderBy) && isset($this->ionOrder))
		{
			$builder->orderBy($this->ionOrderBy, $this->ionOrder);

			$this->ionOrder   = null;
			$this->ionOrderBy = null;
		}

		$this->response = $builder->get();

		return $this;
	}

	/**
	 * Get a user
	 *
	 * @param integer $id If a user id is not passed the id of the currently logged in user will be used
	 *
	 * @return static
	 * @author Ben Edmunds
	 */
	public function user(int $id=0): self
	{
		$this->triggerEvents('user');

		// if no id was passed use the current users id
		$id = $id ?: $this->session->get('user_id');

		$this->limit(1);
		$this->orderBy($this->tables['users'] . '.id', 'desc');
		$this->where($this->tables['users'] . '.id', $id);

		$this->users();

		return $this;
	}

	/**
	 * Get all groups a user is part of
	 *
	 * @param integer $id If a user id is not passed the id of the currently logged in user will be used
	 *
	 * @return \CodeIgniter\Database\ResultInterface
	 * @author Ben Edmunds
	 */
	public function getUsersGroups(int $id=0)
	{
		$this->triggerEvents('get_users_group');

		// if no id was passed use the current users id
		$id || $id = $this->session->get('user_id');

		$builder = $this->db->table($this->tables['users_groups']);
		return $builder->select($this->tables['users_groups'] . '.' . $this->join['groups'] . ' as id, ' . $this->tables['groups'] . '.name, ' . $this->tables['groups'] . '.description')
					   ->where($this->tables['users_groups'] . '.' . $this->join['users'], $id)
					   ->join($this->tables['groups'], $this->tables['users_groups'] . '.' . $this->join['groups'] . '=' . $this->tables['groups'] . '.id')
					   ->get();
	}

	/**
	 * Check to see if a user is in a group(s)
	 *
	 * @param integer|array $checkGroup Group(s) to check
	 * @param integer       $id         User id
	 * @param boolean       $checkAll   Check if all groups is present, or any of the groups
	 *
	 * @return boolean Whether the/all user(s) with the given ID(s) is/are in the given group
	 * @author Phil Sturgeon
	 **/
	public function inGroup($checkGroup, int $id=0, bool $checkAll=false): bool
	{
		$this->triggerEvents('in_group');

		$id || $id = $this->session->get('user_id');

		if (! is_array($checkGroup))
		{
			$checkGroup = [$checkGroup];
		}

		if (isset($this->cacheUserInGroup[$id]))
		{
			$groupsArray = $this->cacheUserInGroup[$id];
		}
		else
		{
			$usersGroups = $this->getUsersGroups($id)->getResult();
			$groupsArray = [];
			foreach ($usersGroups as $group)
			{
				$groupsArray[$group->id] = $group->name;
			}
			$this->cacheUserInGroup[$id] = $groupsArray;
		}
		foreach ($checkGroup as $key => $value)
		{
			$groups = (is_numeric($value)) ? array_keys($groupsArray) : $groupsArray;

			/**
			 * if !all (default), in_array
			 * if all, !in_array
			 */
			if (in_array($value, $groups) xor $checkAll)
			{
				/**
				 * if !all (default), true
				 * if all, false
				 */
				return ! $checkAll;
			}
		}

		/**
		 * if !all (default), false
		 * if all, true
		 */
		return $checkAll;
	}

	/**
	 * Add to group
	 *
	 * @param array|integer $groupIds Groups id
	 * @param integer       $userId   User id
	 *
	 * @return integer The number of groups added
	 * @author Ben Edmunds
	 */
	public function addToGroup($groupIds, int $userId=0): int
	{
		$this->triggerEvents('add_to_group');

		// if no id was passed use the current users id
		$userId || $userId = $this->session->get('user_id');

		if (! is_array($groupIds))
		{
			$groupIds = [$groupIds];
		}

		$return = 0;

		// Then insert each into the database
		foreach ($groupIds as $groupId)
		{
			// Cast to float to support bigint data type
			if ($this->db->table($this->tables['users_groups'])->insert([
																	$this->join['groups'] => (float)$groupId,
																	$this->join['users']  => (float)$userId  ]))
			{
				if (isset($this->cacheGroups[$groupId]))
				{
					$groupName = $this->cacheGroups[$groupId];
				}
				else
				{
					$group                       = $this->group($groupId)->result();
					$groupName                   = $group[0]->name;
					$this->cacheGroups[$groupId] = $groupName;
				}
				$this->cacheUserInGroup[$userId][$groupId] = $groupName;

				// Return the number of groups added
				$return++;
			}
		}

		return $return;
	}

	/**
	 * Remove from group
	 *
	 * @param array|integer $groupIds Group id
	 * @param integer       $userId   User id
	 *
	 * @return boolean
	 * @author Ben Edmunds
	 */
	public function removeFromGroup($groupIds=0, int $userId=0): bool
	{
		$this->triggerEvents('remove_from_group');

		// user id is required
		if (! $userId)
		{
			return false;
		}

		$builder = $this->db->table($this->tables['users_groups']);

		// if group id(s) are passed remove user from the group(s)
		if (! empty($groupIds))
		{
			if (! is_array($groupIds))
			{
				$groupIds = [$groupIds];
			}

			foreach ($groupIds as $groupId)
			{
				$builder->delete([$this->join['groups'] => (int)$groupId, $this->join['users'] => $userId]);
				if (isset($this->cacheUserInGroup[$userId]) && isset($this->cacheUserInGroup[$userId][$groupId]))
				{
					unset($this->cacheUserInGroup[$userId][$groupId]);
				}
			}

			$return = true;
		}
		// otherwise remove user from all groups
		else
		{
			if ($return = $builder->delete([$this->join['users'] => $userId]))
			{
				$this->cacheUserInGroup[$userId] = [];
				$return = true;
			}
		}
		return $return;
	}

	/**
	 * Get the groups
	 *
	 * @return static
	 * @author Ben Edmunds
	 */
	public function groups(): self
	{
		$this->triggerEvents('groups');

		$builder = $this->db->table($this->tables['groups']);

		// run each where that was passed
		if (isset($this->ionWhere) && ! empty($this->ionWhere))
		{
			foreach ($this->ionWhere as $where)
			{
				$builder->where($where);
			}
			$this->ionWhere = [];
		}

		if (isset($this->ionLimit) && isset($this->ionOffset))
		{
			$builder->limit($this->ionLimit, $this->ionOffset);

			$this->ionLimit  = null;
			$this->ionOffset = null;
		}
		else if (isset($this->ionLimit))
		{
			$builder->limit($this->ionLimit);

			$this->ionLimit = null;
		}

		// set the order
		if (isset($this->ionOrderBy) && isset($this->ionOrder))
		{
			$builder->orderBy($this->ionOrderBy, $this->ionOrder);
		}

		$this->response = $builder->get();

		return $this;
	}

	/**
	 * Get a group
	 *
	 * @param integer $id Group id
	 *
	 * @return static
	 * @author Ben Edmunds
	 */
	public function group(int $id=0)
	{
		$this->triggerEvents('group');

		if ($id)
		{
			$this->where($this->tables['groups'] . '.id', $id);
		}

		$this->limit(1);
		$this->orderBy('id', 'desc');

		return $this->groups();
	}

	/**
	 * Update a user
	 *
	 * @param integer $id   User id
	 * @param array   $data Multidimensional array
	 *
	 * @return boolean
	 * @author Phil Sturgeon
	 */
	public function update(int $id, array $data): bool
	{
		$this->triggerEvents('pre_update_user');

		$user = $this->user($id)->row();

		$this->db->transBegin();

		if (array_key_exists($this->identityColumn, $data) && $this->identityCheck($data[$this->identityColumn]) && $user->{$this->identityColumn} !== $data[$this->identityColumn])
		{
			$this->db->transRollback();
			$this->setError('IonAuth.account_creation_duplicate_identity');

			$this->triggerEvents(['post_update_user', 'post_update_user_unsuccessful']);
			$this->setError('IonAuth.update_unsuccessful');

			return false;
		}

		// Filter the data passed
		$data = $this->filterData($this->tables['users'], $data);

		if (array_key_exists($this->identityColumn, $data) || array_key_exists('password', $data) || array_key_exists('email', $data))
		{
			if (array_key_exists('password', $data))
			{
				if (! empty($data['password']))
				{
					$data['password'] = $this->hashPassword($data['password'], $user->{$this->identityColumn});
					if ($data['password'] === false)
					{
						$this->db->transRollback();
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
		$this->setMessage('IonAuth.update_successful');
		return true;
	}

	/**
	 * Delete a user
	 *
	 * @param integer $id User id
	 *
	 * @return boolean
	 * @author Phil Sturgeon
	 */
	public function deleteUser(int $id): bool
	{
		$this->triggerEvents('pre_delete_user');

		$this->db->transBegin();

		// remove user from groups
		$this->removeFromGroup(null, $id);

		// delete user from users table should be placed after remove from group
		$this->db->table($this->tables['users'])->delete(['id' => $id]);

		if ($this->db->transStatus() === false)
		{
			$this->db->transRollback();
			$this->triggerEvents(['post_delete_user', 'post_delete_user_unsuccessful']);
			$this->setError('IonAuth.delete_unsuccessful');
			return false;
		}

		$this->db->transCommit();

		$this->triggerEvents(['post_delete_user', 'post_delete_user_successful']);
		$this->setMessage('delete_successful');
		return true;
	}

	/**
	 * Update last login
	 *
	 * @param integer $id User id
	 *
	 * @return boolean
	 * @author Ben Edmunds
	 */
	public function updateLastLogin(int $id): bool
	{
		$this->triggerEvents('update_last_login');

		$this->triggerEvents('extra_where');

		$this->db->table($this->tables['users'])->update(['last_login' => time()], ['id' => $id]);

		return $this->db->affectedRows() === 1;
	}

	/**
	 * Set lang
	 *
	 * @param string $lang Lang
	 *
	 * @return boolean
	 * @author Ben Edmunds
	 */
	public function setLang(string $lang='en'): bool
	{
		$this->triggerEvents('set_lang');

		// if the userExpire is set to zero we'll set the expiration two years from now.
		if ($this->config->userExpire === 0)
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
			'expire' => $expire,
		]);

		return true;
	}

	/**
	 * Set session
	 *
	 * @param \stdClass $user User
	 *
	 * @return boolean
	 * @author jrmadsen67
	 */
	public function setSession(\stdClass $user): bool
	{
		$this->triggerEvents('pre_set_session');

		$sessionData = [
			'identity'            => $user->{$this->identityColumn},
			$this->identityColumn => $user->{$this->identityColumn},
			'email'               => $user->email,
			'user_id'             => $user->id, //everyone likes to overwrite id so we'll use user_id
			'old_last_login'      => $user->last_login,
			'last_check'          => time(),
		];

		$this->session->set($sessionData);

		$this->triggerEvents('post_set_session');

		return true;
	}

	/**
	 * Set a user to be remembered
	 *
	 * Implemented as described in
	 * https://paragonie.com/blog/2015/04/secure-authentication-php-with-long-term-persistence
	 *
	 * @param string $identity Identity
	 *
	 * @return boolean
	 * @author Ben Edmunds
	 */
	public function rememberUser(string $identity): bool
	{
		$this->triggerEvents('pre_remember_user');

		if (! $identity)
		{
			return false;
		}

		// Generate random tokens
		$token = $this->generateSelectorValidatorCouple();

		if ($token->validatorHashed)
		{
			$this->db->table($this->tables['users'])->update(['remember_selector' => $token->selector,
								  			   'remember_code' => $token->validatorHashed],
											   [$this->identityColumn => $identity]);

			if ($this->db->affectedRows() > -1)
			{
				// if the userExpire is set to zero we'll set the expiration two years from now.
				if ( $this->config->userExpire === 0)
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
					'value'  => $token->userCode,
					'expire' => $expire
				]);

				$this->triggerEvents(['post_remember_user', 'remember_user_successful']);
				return true;
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
	 * @return boolean
	 * @author Ben Edmunds
	 */
	public function loginRememberedUser(): bool
	{
		$this->triggerEvents('pre_login_remembered_user');

		// Retrieve token from cookie
		$rememberCookie = get_cookie($this->config->rememberCookieName);
		$token          = $this->retrieveSelectorValidatorCouple($rememberCookie);

		if ($token === false)
		{
			$this->triggerEvents(['post_login_remembered_user', 'post_login_remembered_user_unsuccessful']);
			return false;
		}

		// get the user with the selector
		$this->triggerEvents('extra_where');
		$query = $this->db->table($this->tables['users'])
						  ->select($this->identityColumn . ', id, email, remember_code, last_login')
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
			$identity = $user->{$this->identityColumn};
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
				$this->session->regenerate(false);

				$this->triggerEvents(['post_login_remembered_user', 'post_login_remembered_user_successful']);
				return true;
			}
		}
		delete_cookie($this->config->rememberCookieName);

		$this->triggerEvents(['post_login_remembered_user', 'post_login_remembered_user_unsuccessful']);
		return false;
	}

	/**
	 * Create a group
	 *
	 * @param string $groupName        Group name
	 * @param string $groupDescription Group description
	 * @param array  $additionalData   Additional data
	 *
	 * @return integer|boolean The ID of the inserted group, or false on failure
	 * @author aditya menon
	 */
	public function createGroup(string $groupName='', string $groupDescription='', array $additionalData=[])
	{
		// bail if the group name was not passed
		if (! $groupName)
		{
			$this->setError('IonAuth.groupName_required');
			return false;
		}

		// bail if the group name already exists
		$existingGroup = $this->db->table($this->tables['groups'])->where(['name' => $groupName])->countAllResults();
		if ($existingGroup !== 0)
		{
			$this->setError('IonAuth.group_already_exists');
			return false;
		}

		$data = [
			'name'        => $groupName,
			'description' => $groupDescription,
		];

		// filter out any data passed that doesnt have a matching column in the groups table
		// and merge the set group data and the additional data
		if (! empty($additionalData))
		{
			$data = array_merge($this->filterData($this->tables['groups'], $additionalData), $data);
		}

		$this->triggerEvents('extra_group_set');

		// insert the new group
		$this->db->table($this->tables['groups'])->insert($data);
		$groupId = $this->db->insertId($this->tables['groups'] . '_id_seq');

		// report success
		$this->setMessage('IonAuth.group_creation_successful');
		// return the brand new group id
		return $groupId;
	}

	/**
	 * Update group
	 *
	 * @param integer $groupId        Group id
	 * @param string  $groupName      Group name
	 * @param array   $additionalData Additional datas
	 *
	 * @return boolean
	 * @author aditya menon
	 */
	public function updateGroup(int $groupId, string $groupName='', array $additionalData=[]): bool
	{
		if (! $groupId)
		{
			return false;
		}

		$data = [];

		if (! empty($groupName))
		{
			// we are changing the name, so do some checks

			// bail if the group name already exists
			$existingGroup = $this->db->table($this->tables['groups'])->getWhere(['name' => $groupName])->getRow();
			if (isset($existingGroup->id) && (int)$existingGroup->id !== $groupId)
			{
				$this->setError('IonAuth.group_already_exists');
				return false;
			}

			$data['name'] = $groupName;
		}

		// restrict change of name of the admin group
		$group = $this->db->table($this->tables['groups'])->getWhere(['id' => $groupId])->getRow();
		if ($this->config->adminGroup === $group->name && $groupName !== $group->name)
		{
			$this->setError('IonAuth.groupName_admin_not_alter');
			return false;
		}

		// filter out any data passed that doesnt have a matching column in the groups table
		// and merge the set group data and the additional data
		if (! empty($additionalData))
		{
			$data = array_merge($this->filterData($this->tables['groups'], $additionalData), $data);
		}

		$this->db->table($this->tables['groups'])->update($data, ['id' => $groupId]);

		$this->setMessage('IonAuth.group_update_successful');

		return true;
	}

	/**
	 * Remove a group.
	 *
	 * @param integer $groupId Group id
	 *
	 * @return boolean
	 * @author aditya menon
	 */
	public function deleteGroup(int $groupId): bool
	{
		// bail if mandatory param not set
		if (! $groupId || empty($groupId))
		{
			return false;
		}
		$group = $this->group($groupId)->row();
		if ($group->name === $this->config->adminGroup)
		{
			$this->triggerEvents(['post_delete_group', 'post_delete_group_notallowed']);
			$this->setError('IonAuth.group_delete_notallowed');
			return false;
		}

		$this->triggerEvents('pre_delete_group');

		$this->db->transBegin();

		// remove all users from this group
		$this->db->table($this->tables['users_groups'])->delete([$this->join['groups'] => $groupId]);
		// remove the group itself
		$this->db->table($this->tables['groups'])->delete(['id' => $groupId]);

		if ($this->db->transStatus() === false)
		{
			$this->db->transRollback();
			$this->triggerEvents(['post_delete_group', 'post_delete_group_unsuccessful']);
			$this->setError('IonAuth.group_delete_unsuccessful');
			return false;
		}

		$this->db->transCommit();

		$this->triggerEvents(['post_delete_group', 'post_delete_group_successful']);
		$this->setMessage('group_delete_successful');
		return true;
	}

	/**
	 * Set a single or multiple functions to be called when trigged by triggerEvents().
	 *
	 * @param string $event     Event
	 * @param string $name      Name
	 * @param string $class     Class
	 * @param string $method    Method
	 * @param array  $arguments Arguments
	 *
	 * @return self
	 */
	public function setHook(string $event, string $name, string $class, string $method, array $arguments=[]): self
	{
		$this->ionHooks->{$event}[$name]            = new \stdClass;
		$this->ionHooks->{$event}[$name]->class     = $class;
		$this->ionHooks->{$event}[$name]->method    = $method;
		$this->ionHooks->{$event}[$name]->arguments = $arguments;
		return $this;
	}

	/**
	 * Remove hook
	 *
	 * @param string $event Event
	 * @param string $name  Name
	 *
	 * @return void
	 */
	public function removeHook(string $event, string $name): void
	{
		if (isset($this->ionHooks->{$event}[$name]))
		{
			unset($this->ionHooks->{$event}[$name]);
		}
	}

	/**
	 * Remove hooks
	 *
	 * @param string $event Event
	 *
	 * @return void
	 */
	public function removeHooks(string $event): void
	{
		if (isset($this->ionHooks->$event))
		{
			unset($this->ionHooks->$event);
		}
	}

	/**
	 * Call hook
	 *
	 * @param string $event Event
	 * @param string $name  Name
	 *
	 * @return false|mixed
	 */
	protected function callHook(string $event, string $name)
	{
		if (isset($this->ionHooks->{$event}[$name]) && method_exists($this->ionHooks->{$event}[$name]->class, $this->ionHooks->{$event}[$name]->method))
		{
			$hook = $this->ionHooks->{$event}[$name];

			return call_user_func_array([$hook->class, $hook->method], $hook->arguments);
		}

		return false;
	}

	/**
	 * Call Additional functions to run that were registered with setHook().
	 *
	 * @param string|array $events Event(s)
	 *
	 * @return void
	 */
	public function triggerEvents($events): void
	{
		if (is_array($events) && ! empty($events))
		{
			foreach ($events as $event)
			{
				$this->triggerEvents($event);
			}
		}
		else
		{
			if (isset($this->ionHooks->$events) && ! empty($this->ionHooks->$events))
			{
				foreach ($this->ionHooks->$events as $name => $hook)
				{
					$this->callHook($events, $name);
				}
			}
		}
	}

	/**
	 * Set the message templates
	 *
	 * @param string $single Template for single message
	 * @param string $list	 Template for list messages
	 *
	 * @return true
	 * @author Ben Edmunds
	 */
	public function setMessageTemplate(string $single='', string $list=''): bool
	{
		if (! empty($single))
		{
			$this->messagesTemplates['single'] = $single;
		}

		if (! empty($list))
		{
			$this->messagesTemplates['list'] = $list;
		}

		return true;
	}

	/**
	 * Set a message
	 *
	 * @param string $message The message
	 *
	 * @return string The given message
	 * @author Ben Edmunds
	 */
	public function setMessage(string $message): string
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
		if (empty($this->messages))
		{
			return '';
		}

		$messageLang = [];
		foreach ($this->messages as $message)
		{
			$messageLang[] = lang($message) !== $message ? lang($message) : '##' . $message . '##';
		}
		return view($this->messagesTemplates['list'], ['messages' => $messageLang]);
	}

	/**
	 * Get the messages as an array
	 *
	 * @param boolean $langify Translate messages ?
	 *
	 * @return array
	 * @author Raul Baldner Junior
	 */
	public function messagesArray(bool $langify=true): array
	{
		if ($langify)
		{
			$output = [];
			foreach ($this->messages as $message)
			{
				$messageLang = lang($message) !== $message ? lang($message) : '##' . $message . '##';
				$output[]    = view($this->messagesTemplates['single'], ['message' => $messageLang]);
			}
			return $output;
		}
		else
		{
			return $this->messages;
		}
	}

	/**
	 * Clear messages
	 *
	 * @return true
	 * @author Ben Edmunds
	 */
	public function clearMessages()
	{
		$this->messages = [];

		return true;
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
	 * @param string $template Template @see https://codeigniter4.github.io/CodeIgniter4/libraries/validation.html#configuration
	 *
	 * @return string
	 * @author Ben Edmunds
	 */
	public function errors(string $template='list'): string
	{
		if (! array_key_exists($template, config('Validation')->templates))
		{
			throw new \CodeIgniter\Exceptions\ConfigException(lang('Validation.invalidTemplate', [$template]));
		}

		$errors = [];
		foreach ($this->errors as $error)
		{
			$errors[] = lang($error) !== $error ? lang($error) : '##' . $error . '##';
		}

		return view(config('Validation')->templates[$template], ['errors' => $errors]);
	}

	/**
	 * Get the error messages as an array
	 *
	 * @param boolean $langify Langify errors ?
	 *
	 * @return array
	 * @author Raul Baldner Junior
	 *
	 * @deprecated No longer used by internal code and not recommended.
	 */
	public function errorsArray(bool $langify = true): array
	{
		if ($langify)
		{
			$output = [];
			foreach ($this->errors as $error)
			{
				$output[] = lang($error) !== $error ? lang($error) : '##' . $error . '##';
			}
			return $output;
		}
		else
		{
			return $this->errors;
		}
	}

	/**
	 * Get the error messages as an array
	 *
	 * @param boolean $langify Langify errors ?
	 *
	 * @return array
	 * @author Benoit VRIGNAUD
	 */
	public function getErrors(bool $langify=true): array
	{
		if ($langify)
		{
			$output = [];
			foreach ($this->errors as $error)
			{
				$output[] = lang($error);
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
	 * @param string $identity Identity
	 * @param string $password Password
	 *
	 * @return boolean
	 */
	protected function setPasswordDb(string $identity, string $password): bool
	{
		$hash = $this->hashPassword($password, $identity);

		if ($hash === false)
		{
			return false;
		}

		// When setting a new password, invalidate any other token
		$data = [
			'password'                => $hash,
			'remember_code'           => null,
			'forgotten_password_code' => null,
			'forgotten_password_time' => null,
		];

		$this->triggerEvents('extra_where');

		$this->db->table($this->tables['users'])->update($data, [$this->identityColumn => $identity]);

		return $this->db->affectedRows() === 1;
	}

	/**
	 * Filter data
	 *
	 * @param string $table Table
	 * @param array  $data  Data
	 *
	 * @return array
	 */
	protected function filterData(string $table, $data): array
	{
		$filteredData = [];
		$columns = $this->db->getFieldNames($table);

		if (is_array($data))
		{
			foreach ($columns as $column)
			{
				if (array_key_exists($column, $data))
				{
					$filteredData[$column] = $data[$column];
				}
			}
		}

		return $filteredData;
	}

	/**
	 * Generate a random token
	 * Inspired from http://php.net/manual/en/function.random-bytes.php#118932
	 *
	 * @param integer $resultLength Result lenght
	 *
	 * @return string
	 */
	protected function randomToken(int $resultLength=32): string
	{
		if ($resultLength <= 8)
		{
			$resultLength = 32;
		}

		// Try random_bytes: PHP 7
		if (function_exists('random_bytes'))
		{
			return bin2hex(random_bytes($resultLength / 2));
		}

		// No luck!
		throw new \Exception('Unable to generate a random token');
	}

	/**
	 * Retrieve hash parameter according to options
	 *
	 * @param string $identity Identity
	 *
	 * @return array|boolean
	 */
	protected function getHashParameters(string $identity='')
	{
		// Check if user is administrator or not
		$isAdmin = false;
		if ($identity)
		{
			$userId = $this->getUserIdFromIdentity($identity);
			if ($userId && $this->inGroup($this->config->adminGroup, $userId))
			{
				$isAdmin = true;
			}
		}

		$params = false;
		switch ($this->hashMethod)
		{
			case 'bcrypt':
				$params = [
					'cost' => $isAdmin ? $this->config->bcryptAdminCost
										: $this->config->bcryptDefaultCost
				];
				break;

			case 'argon2':
				$params = $isAdmin ? $this->config->argon2AdminParams
									: $this->config->argon2DefaultParams;
				break;

			default:
				// Do nothing
		}

		return $params;
	}

	/**
	 * Retrieve hash algorithm according to options
	 *
	 * @return string|boolean
	 */
	protected function getHashAlgo()
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
	 * This is a user code
	 *
	 * @param integer $selectorSize  Size of the selector token
	 * @param integer $validatorSize Size of the validator token
	 *
	 * @return \stdClass
	 *          ->selector			simple token to retrieve the user (to store in DB)
	 *          ->validatorHashed	token (hashed) to validate the user (to store in DB)
	 *          ->user_code			code to be used user-side (in cookie or URL)
	 */
	protected function generateSelectorValidatorCouple(int $selectorSize=40, int $validatorSize=128): \stdClass
	{
		// The selector is a simple token to retrieve the user
		$selector = $this->randomToken($selectorSize);

		// The validator will strictly validate the user and should be more complex
		$validator = $this->randomToken($validatorSize);

		// The validator is hashed for storing in DB (avoid session stealing in case of DB leaked)
		$validatorHashed = $this->hashPassword($validator);

		// The code to be used user-side
		$userCode = $selector . '.' . $validator;

		return (object) [
			'selector'        => $selector,
			'validatorHashed' => $validatorHashed,
			'userCode'        => $userCode,
		];
	}

	/**
	 * Retrieve remember cookie info
	 *
	 * @param string $userCode A user code of the form "selector.validator"
	 *
	 * @return false|stdCalss
	 *          ->selector		simple token to retrieve the user in DB
	 *          ->validator		token to validate the user (check against hashed value in DB)
	 */
	protected function retrieveSelectorValidatorCouple(string $userCode)
	{
		// Check code
		if ($userCode)
		{
			$tokens = explode('.', $userCode);

			// Check tokens
			if (count($tokens) === 2)
			{
				return (object) [
					'selector'  => $tokens[0],
					'validator' => $tokens[1],
				];
			}
		}

		return false;
	}

}
