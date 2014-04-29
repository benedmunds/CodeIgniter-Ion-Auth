<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * IonAuth MongoDB Model
 *
 * Version: 2.5.2
 *
 * A rewrite of IonAuth model to use MongoDB as database backend. It
 * requires both CodeIgniter MongoDB Active Record and CodeIgniter MongoDB Session
 * libraries installed.
 *
 * This model class will be loaded in case that it's set to use MongoDB as
 * database backend instead of the original model class, see controller and library
 * files for more info on its internal usage.
 *
 * @package		CodeIgniter
 * @author		Sepehr Lajevardi <me@sepehr.ws>
 * @copyright	Copyright (c) 2012 Sepehr Lajevardi.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		https://github.com/sepehr/ci-mongodb-ionauth-module
 * @version 	Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * IonAuth MongoDB Model
 *
 * A rewrite of IonAuth model class to use MongoDB as database backend.
 *
 * @package 	CodeIgniter
 * @subpackage	Models
 * @category	Authentication
 * @author		Sepehr Lajevardi <me@sepehr.ws>
 * @link		https://github.com/sepehr/ci-mongodb-ionauth-module
 * @todo		Re-document the code!
 */
class Ion_auth_mongodb_model extends CI_Model {

	/**
	 * Holds the name of MongoDB collections
	 *
	 * @var array
	 */
	public $collections = array();

	/**
	 * activation code
	 *
	 * @var string
	 */
	public $activation_code;

	/**
	 * forgotten password key
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
	public $_ion_where = array();

	/**
	 * Select
	 *
	 * @var string
	 */
	public $_ion_select = array();

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
	 * @var string
	 */
	protected $response = NULL;

	/**
	 * message (uses lang file)
	 *
	 * @var string
	 */
	protected $messages;

	/**
	 * error message (uses lang file)
	 *
	 * @var string
	 */
	protected $errors;

	/**
	 * error start delimiter
	 *
	 * @var string
	 */
	protected $error_start_delimiter;

	/**
	 * error end delimiter
	 *
	 * @var string
	 */
	protected $error_end_delimiter;

	/**
	 * caching of users and their groups
	 *
	 * @var array
	 */
	public $_cache_user_in_group = array();

	/**
	 * caching of groups
	 *
	 * @var array
	 */
	protected $_cache_groups = array();

	// ------------------------------------------------------------------------

	/**
	 * IonAuth MongoDB Model Constructor
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('mongo_db');
		$this->load->config('ion_auth', TRUE);
		$this->load->helper('cookie');
		$this->load->helper('date');
		$this->lang->load('ion_auth');

		// Initialize MongoDB collection names
		$this->collections = $this->config->item('collections', 'ion_auth');

		// Initialize general config directives
		$this->identity_column = $this->config->item('identity', 'ion_auth');
		$this->store_salt      = $this->config->item('store_salt', 'ion_auth');
		$this->salt_length     = $this->config->item('salt_length', 'ion_auth');

		// Initialize hash method directives (Bcrypt)
		$this->hash_method    = $this->config->item('hash_method', 'ion_auth');
		$this->default_rounds = $this->config->item('default_rounds', 'ion_auth');
		$this->random_rounds  = $this->config->item('random_rounds', 'ion_auth');
		$this->min_rounds     = $this->config->item('min_rounds', 'ion_auth');
		$this->max_rounds     = $this->config->item('max_rounds', 'ion_auth');


		// Initialize messages and errors directives
		$this->messages                = array();
		$this->errors                  = array();
		$this->message_start_delimiter = $this->config->item('message_start_delimiter', 'ion_auth');
		$this->message_end_delimiter   = $this->config->item('message_end_delimiter', 'ion_auth');
		$this->error_start_delimiter   = $this->config->item('error_start_delimiter', 'ion_auth');
		$this->error_end_delimiter     = $this->config->item('error_end_delimiter', 'ion_auth');

		// Initialize IonAuth hooks object
		$this->_ion_hooks = new stdClass;

		// Load the Bcrypt class if needed
		if ($this->hash_method == 'bcrypt') {
			if ($this->random_rounds)
			{
				$rand   = rand($this->min_rounds,$this->max_rounds);
				$rounds = array('rounds' => $rand);
			}
			else
			{
				$rounds = array('rounds' => $this->default_rounds);
			}
			$this->load->library('bcrypt',$rounds);
		}

		$this->trigger_events('model_constructor');
	}

	// ------------------------------------------------------------------------

	/**
	 * Hashes the password to be stored in the database.
	 */
	public function hash_password($password, $salt = FALSE, $use_sha1_override = FALSE)
	{
		if (empty($password))
		{
			return FALSE;
		}

		// Bcrypt
		if ($use_sha1_override === FALSE && $this->hash_method == 'bcrypt')
		{
			return $this->bcrypt->hash($password);
		}


		if ($this->store_salt && $salt)
		{
			return sha1($password . $salt);
		}
		else
		{
			$salt = $this->salt();
			return $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * Takes a password and validates it against an entry in the collection.
	 */
	public function hash_password_db($id, $password, $use_sha1_override = FALSE)
	{
		if (empty($id) || empty($password))
		{
			return FALSE;
		}

		$this->trigger_events('extra_where');

		$document = $this->mongo_db
			->select(array('password', 'salt'))
			->where('_id', new MongoId($id))
			->limit(1)
			->get($this->collections['users']);
		$hash_password_db = (object) $document[0];

		if (count($document) !== 1)
		{
			return FALSE;
		}

		// Bcrypt
		if ($use_sha1_override === FALSE && $this->hash_method == 'bcrypt')
		{
			if ($this->bcrypt->verify($password, $hash_password_db->password))
			{
				return TRUE;
			}

			return FALSE;
		}

		// SHA1
		if ($this->store_salt)
		{
			$db_password = sha1($password . $hash_password_db->salt);
		}
		else
		{
			$salt = substr($hash_password_db->password, 0, $this->salt_length);
			$db_password = $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
		}

		return ($db_password == $hash_password_db->password);
	}

	// ------------------------------------------------------------------------

	/**
	 * Generates a random salt value for forgotten passwords or any other keys. Uses SHA1.
	 */
	public function hash_code($password)
	{
		return $this->hash_password($password, FALSE, TRUE);
	}

	/**
	 * Generates a random salt value.
	 */
	public function salt()
	{
		return substr(md5(uniqid(rand(), true)), 0, $this->salt_length);
	}

	// ------------------------------------------------------------------------

	/**
	 * Validates and removes activation code.
	 */
	public function activate($id, $code = FALSE)
	{
		$this->trigger_events('pre_activate');

		// If activation code is set
		if ($code !== FALSE)
		{
			// Get identity value of the activation code
			$docs = $this->mongo_db
				->select($this->identity_column)
				->where('activation_code', $code)
				->limit(1)
				->get($this->collections['users']);
			$result = (object) $docs[0];

			// If unsuccessfull
			if (count($docs) !== 1)
			{
				$this->trigger_events(array('post_activate', 'post_activate_unsuccessful'));
				$this->set_error('docs');
				return FALSE;
			}

			$identity = $result->{$this->identity_column};

			$this->trigger_events('extra_where');
			$updated = $this->mongo_db
				->where($this->identity_column, $identity)
				->set(array('activation_code' => NULL, 'active' => 1))
				->update($this->collections['users']);
		}
		// Activation code is not set
		else
		{
			$this->trigger_events('extra_where');
			$updated = $this->mongo_db
				->where('_id', new MongoId($id))
				->set(array('activation_code' => NULL, 'active' => 1))
				->update($this->collections['users']);
		}


		if ($updated)
		{
			$this->trigger_events(array('post_activate', 'post_activate_successful'));
			$this->set_message('activate_successful');
		}
		else
		{
			$this->trigger_events(array('post_activate', 'post_activate_unsuccessful'));
			$this->set_error('activate_unsuccessful');
		}

		return $updated;
	}

	// ------------------------------------------------------------------------

	/**
	 * Updates a user document with an activation code.
	 */
	public function deactivate($id = NULL)
	{
		$this->trigger_events('deactivate');

		if (!isset($id))
		{
			$this->set_error('deactivate_unsuccessful');
			return FALSE;
		}

		$activation_code       = sha1(md5(microtime()));
		$this->activation_code = $activation_code;
		$this->trigger_events('extra_where');

		$updated = $this->mongo_db
			->where('_id', new MongoId($id))
			->set(array('activation_code' => $activation_code, 'active' => 0))
			->update($this->collections['users']);

		if ($updated)
		{
			$this->set_message('deactivate_successful');
		}
		else
		{
			$this->set_error('deactivate_unsuccessful');
		}

		return $updated;
	}

	// ------------------------------------------------------------------------

	/**
	 * Clears forgotten password code from database.
	 */
	public function clear_forgotten_password_code($code) {
		if (empty($code))
		{
			return FALSE;
		}

		$count = count($this->mongo_db
			->where('forgotten_password_code', $code)
			->get($this->collections['users']));

		if ($count > 0)
		{
			$this->mongo_db
				->where('forgotten_password_code', $code)
				->set(array('forgotten_password_code' => NULL, 'forgotten_password_time' => NULL))
				->update($this->collections['users']);

			return TRUE;
		}
		return FALSE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Resets password.
	 *
	 * @return bool
	 */
	public function reset_password($identity, $new) {
		$this->trigger_events('pre_change_password');

		if (!$this->identity_check($identity)) {
			$this->trigger_events(array('post_change_password', 'post_change_password_unsuccessful'));
			return FALSE;
		}

		$this->trigger_events('extra_where');

		$docs = $this->mongo_db
			->select(array('_id', 'password', 'salt'))
			->where($this->identity_column, $identity)
			->limit(1)
			->get($this->collections['users']);

		// Unsuccessfull password change
		if (count($docs) !== 1)
		{
			$this->trigger_events(array('post_change_password', 'post_change_password_unsuccessful'));
			$this->set_error('password_change_unsuccessful');
			return FALSE;
		}

		// Generate new password hash
		$result = (object) $docs[0];
		$new    = $this->hash_password($new, $result->salt);

		$this->trigger_events('extra_where');

		// Store the new password and reset the remember code so all remembered instances have
		// to re-login. Also clear the forgotten password code.
		$updated = $this->mongo_db
			->where($this->identity_column, $identity)
			->set(array(
				'password'                => $new,
				'remember_code'           => NULL,
				'forgotten_password_code' => NULL,
				'forgotten_password_time' => NULL,
			))
			->update($this->collections['users']);

		if ($updated)
		{
			$this->trigger_events(array('post_change_password', 'post_change_password_successful'));
			$this->set_message('password_change_successful');
		}
		else
		{
			$this->trigger_events(array('post_change_password', 'post_change_password_unsuccessful'));
			$this->set_error('password_change_unsuccessful');
		}

		return $updated;
	}

	// ------------------------------------------------------------------------

	/**
	 * Changes password.
	 *
	 * @return bool
	 */
	public function change_password($identity, $old, $new)
	{
		$this->trigger_events('pre_change_password');
		$this->trigger_events('extra_where');

		$docs = $this->mongo_db
			->select(array('_id', 'password', 'salt'))
			->where($this->identity_column, $identity)
			->limit(1)
			->get($this->collections['users']);

		if (count($docs) !== 1)
		{
			$this->trigger_events(array('post_change_password', 'post_change_password_unsuccessful'));
			$this->set_error('password_change_unsuccessful');
			return FALSE;
		}

		$result      = (object) $docs[0];
		$db_password = $result->password;
		$old         = $this->hash_password_db($result->_id, $old);
		$new         = $this->hash_password($new, $result->salt);

		if ($old === TRUE)
		{
			$this->trigger_events('extra_where');

			// Store the new password and reset the remember code so all remembered instances have to re-login
			$updated = $this->mongo_db
				->where($this->identity_column, $identity)
				->set(array('password' => $new, 'remember_code' => NULL))
				->update($this->collections['users']);

			if ($updated)
			{
				$this->trigger_events(array('post_change_password', 'post_change_password_successful'));
				$this->set_message('password_change_successful');
			}
			else
			{
				$this->trigger_events(array('post_change_password', 'post_change_password_unsuccessful'));
				$this->set_error('password_change_unsuccessful');
			}

			return $updated;
		}

		$this->set_error('password_change_unsuccessful');
		return FALSE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Checks username.
	 *
	 * @return bool
	 */
	public function username_check($username = '')
	{
		$this->trigger_events('username_check');

		if (empty($username))
		{
			return FALSE;
		}

		$this->trigger_events('extra_where');
		$username = new MongoRegex('/^'.$username.'$/i');
		return count($this->mongo_db
			->where('username', $username)
			->get($this->collections['users'])) > 0;
	}

	// ------------------------------------------------------------------------

	/**
	 * Checks email.
	 *
	 * @return bool
	 */
	public function email_check($email = '')
	{
		$this->trigger_events('email_check');

		if (empty($email))
		{
			return FALSE;
		}

		$this->trigger_events('extra_where');
		$email = new MongoRegex('/^'.$email.'$/i');
		return count($this->mongo_db
			->where('email', $email)
			->get($this->collections['users'])) > 0;
	}

	// ------------------------------------------------------------------------

	/**
	 * Checks identity field.
	 *
	 * @return bool
	 */
	protected function identity_check($identity = '')
	{
		$this->trigger_events('identity_check');

		if (empty($identity))
		{
			return FALSE;
		}

		return count($this->mongo_db
			->where($this->identity_column, $identity)
			->get($this->collections['users'])) > 0;
	}

	// ------------------------------------------------------------------------

	/**
	 * Inserts a forgotten password key.
	 *
	 * @return bool
	 */
	public function forgotten_password($identity)
	{
		if (empty($identity))
		{
			$this->trigger_events(array('post_forgotten_password', 'post_forgotten_password_unsuccessful'));
			return FALSE;
		}

		$this->forgotten_password_code = $this->hash_code(microtime() . $identity);
		$this->trigger_events('extra_where');

		$updated = $this->mongo_db
			->where($this->identity_column, $identity)
			->set(array(
				'forgotten_password_code' => $this->forgotten_password_code,
				'forgotten_password_time' => time()
			))
			->update($this->collections['users']);

		if ($updated)
		{
			$this->trigger_events(array('post_forgotten_password', 'post_forgotten_password_successful'));
		}
		else
		{
			$this->trigger_events(array('post_forgotten_password', 'post_forgotten_password_unsuccessful'));
		}

		return $updated;
	}

	// ------------------------------------------------------------------------

	/**
	 * Completes a forgotten password procedure.
	 *
	 * @return string
	 */
	public function forgotten_password_complete($code, $salt=FALSE)
	{
		$this->trigger_events('pre_forgotten_password_complete');

		if (empty($code))
		{
			$this->trigger_events(array(
				'post_forgotten_password_complete',
				'post_forgotten_password_complete_unsuccessful',
			));
			return FALSE;
		}

		// Get user document for this forgotten password code
		$profile = $this->where('forgotten_password_code', $code)->users()->document();

		// If there's any user with this code:
		if ($profile)
		{
			// Check if the forgot password request is not expired yet
			if ($this->config->item('forgot_password_expiration', 'ion_auth') > 0)
			{
				$expiration = $this->config->item('forgot_password_expiration', 'ion_auth');

				// If the forgot password request is expired, abort the operation!
				if (time() - $profile->forgotten_password_time > $expiration)
				{
					$this->set_error('forgot_password_expired');
					$this->trigger_events(array(
						'post_forgotten_password_complete',
						'post_forgotten_password_complete_unsuccessful'
					));
					return FALSE;
				}
			}

			// Update the user document with the new password
			$password = $this->salt();
			$this->mongo_db
				->where('forgotten_password_code', $code)
				->set(array(
					'password'                => $this->hash_password($password, $salt),
					'forgotten_password_code' => NULL,
					'active'                  => 1,
				))
				->update($this->collections['users']);

			// Trigger appropriate hooks
			$this->trigger_events(array(
				'post_forgotten_password_complete',
				'post_forgotten_password_complete_successful'
			));

			// And return the password
			return $password;
		}

		// But if there were no users with that forgotten password code:
		$this->trigger_events(array(
			'post_forgotten_password_complete',
			'post_forgotten_password_complete_unsuccessful'
		));
		return FALSE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Inserts a user document into users collection.
	 *
	 * @return bool
	 */
	public function register($username, $password, $email, $additional_data = array(), $groups = array())
	{
		$this->trigger_events('pre_register');
		$manual_activation = $this->config->item('manual_activation', 'ion_auth');

		// Check if email already exists
		if ($this->identity_column == 'email' && $this->email_check($email))
		{
			$this->set_error('account_creation_duplicate_email');
			return FALSE;
		}
		// Check if username already exists
		elseif ($this->identity_column == 'username' && $this->username_check($username))
		{
			$this->set_error('account_creation_duplicate_username');
			return FALSE;
		}

		// If username is taken, use username1 or username2, etc.
		// TODO: Drop this shit!
		if ($this->identity_column != 'username')
		{
			$original_username = $username;
			for($i = 0; $this->username_check($username); $i++)
			{
				if($i > 0)
				{
					$username = $original_username . $i;
				}
			}
		}

		// IP address
		$ip_address = $this->_prepare_ip($this->input->ip_address());
		$salt       = $this->store_salt ? $this->salt() : FALSE;
		$password   = $this->hash_password($password, $salt);

		// New user document
		$data = array(
			'username'   => $username,
			'password'   => $password,
			'email'      => $email,
			'ip_address' => $ip_address,
			'created_on' => time(),
			'last_login' => time(),
			'active'     => ($manual_activation === FALSE ? 1 : 0),
			'groups'     => array(),
		);

		// Store salt in document?
		if ($this->store_salt)
		{
			$data['salt'] = $salt;
		}

		// Add groups to the user document, We don't use
		// add_to_group() API function here regarding lesser queries.
		if (!empty($groups))
		{
			foreach ($groups as $group)
			{
				$data['groups'][] = $group;
			}
		}
		// Add to default group if not already set,
		// get the ID of the default group first:
		$default_group = $this->where('name', $this->config->item('default_group', 'ion_auth'))->group()->document();
		if ((isset($default_group->_id) && !isset($groups)) || (empty($groups) && !in_array($default_group->id, $groups)))
		{
			$data['groups'][] = $default_group->_id;
		}

		// Filter out any data passed that doesn't have a matching column in the
		// user document and merge the set user data with the passed additional data
		$data = array_merge($this->_filter_data($this->collections['users'], $additional_data), $data);

		$this->trigger_events('extra_set');

		// Insert new document and store the _id value
		$id = $this->mongo_db->insert($this->collections['users'], $data);

		$this->trigger_events('post_register');

		// Return new document _id or FALSE on failure
		return isset($id) ? $id : FALSE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Checks credentials and logs the passed user in if possible.
	 *
	 * @return bool
	 */
	public function login($identity, $password, $remember = FALSE)
	{
		$this->trigger_events('pre_login');

		if (empty($identity) || empty($password))
		{
			$this->set_error('login_unsuccessful');
			return FALSE;
		}

		$this->trigger_events('extra_where');

		$document = $this->mongo_db
			->select(array($this->identity_column, '_id', 'username', 'email', 'password', 'active', 'last_login'))
			// MongoDB is vulnerable to SQL Injection like attacks (in PHP at least), in MongoDB
			// PHP driver we use objects to make queries and as we know PHP allows us to submit
			// objects via GET, POST, etc. and so getting user input like password[$ne]=1 is possible
			// which translates to: array('$ne' => 1) in for example find queries. So we make sure that
			// what we put into a collection is strictly string typed. We also watch what we put in our
			// stomach, goveg! :))
			->where($this->identity_column, (string) $identity)
			->limit(1)
			->get($this->collections['users']);

		// If user document found
		if (count($document) === 1)
		{
			$user = (object) $document[0];
			$password = $this->hash_password_db($user->_id, $password);

			if ($password === TRUE)
			{
				// Not yet activated?
                if ($user->active == 0)
                {
                    $this->trigger_events('post_login_unsuccessful');
                    $this->set_error('login_unsuccessful_not_active');
                    return FALSE;
                }

                // Set user session data
                $session_data = array(
					'identity'       => $user->{$this->identity_column},
					'username'       => $user->username,
					'email'          => $user->email,
					'user_id'        => $user->_id->{'$id'},
					'old_last_login' => $user->last_login
                );
                $this->session->set_userdata($session_data);

                // Clean login attempts, also update last login time
                $this->update_last_login($user->_id);
				$this->clear_login_attempts($identity);

				// Check whether we should remember the user
                if ($remember && $this->config->item('remember_users', 'ion_auth'))
                {
                    $this->remember_user($user->_id);
                }

                $this->trigger_events(array('post_login', 'post_login_successful'));
                $this->set_message('login_successful');

                return TRUE;
			}
		}

		// The user document was not found
		$this->hash_password($password);
		$this->increase_login_attempts($identity);
		$this->trigger_events('post_login_unsuccessful');
		$this->set_error('login_unsuccessful');

		return FALSE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Checks whether the maximum login attempts limit is reached.
	 *
	 * @return bool
	 */
	public function is_max_login_attempts_exceeded($identity)
	{
		// Do we set to track login attempts?
		if ($this->config->item('track_login_attempts', 'ion_auth'))
		{
			$max_attempts = $this->config->item('maximum_login_attempts', 'ion_auth');

			if ($max_attempts > 0)
			{
				$attempts = $this->get_attempts_num($identity);
				return $attempts >= $max_attempts;
			}
		}
		return FALSE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Returns the number of attempts to login occured from given IP or identity
	 *
	 * @return int
	 */
	function get_attempts_num($identity)
	{
		// Do we set to track login attempts?
		if ($this->config->item('track_login_attempts', 'ion_auth'))
		{
			$this->mongo_db->where('ip_address', $this->_prepare_ip($this->input->ip_address()));

			if (strlen($identity) > 0)
			{
				$this->mongo_db->or_where('login', $identity);
			}

			$document = $this->mongo_db->get($this->collections['login_attempts']);
			return count($document);
		}
		return 0;
	}

	// ------------------------------------------------------------------------

	/**
	 * Increses login attempts of the passed user
	 */
	public function increase_login_attempts($identity)
	{
		// Do we set to track login attempts?
		if ($this->config->item('track_login_attempts', 'ion_auth'))
		{
			return $this->mongo_db->insert($this->collections['login_attempts'], array(
				'ip_address' => $this->_prepare_ip($this->input->ip_address()),
				'login'      => (string) $identity,
				'time'       => time(),
			));
		}
		return FALSE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Clears login attempts of the passed identity.
	 */
	public function clear_login_attempts($identity, $expire_period = 86400)
	{
		// Do we set to track login attempts?
		if ($this->config->item('track_login_attempts', 'ion_auth'))
		{
			return $this->mongo_db
				->where(array(
					'login'      => $identity,
					'ip_address' => $this->_prepare_ip($this->input->ip_address())
				))
				// Purge obsolete login attempts
				->or_where(array('time <' => time() - $expire_period))
				->delete($this->collections['login_attempts']);
		}
		return FALSE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Helper: Sets query limit parameter.
	 */
	public function limit($limit)
	{
		$this->trigger_events('limit');
		$this->_ion_limit = $limit;

		return $this;
	}

	// ------------------------------------------------------------------------

	/**
	 * Helper: Sets query offset parameter.
	 */
	public function offset($offset)
	{
		$this->trigger_events('offset');
		$this->_ion_offset = $offset;

		return $this;
	}

	// ------------------------------------------------------------------------

	/**
	 * Helper: Sets query where conditions.
	 */
	public function where($where, $value = NULL)
	{
		$this->trigger_events('where');

		if (!is_array($where))
		{
			$where = array($where => $value);
		}

		array_push($this->_ion_where, $where);

		return $this;
	}

	// ------------------------------------------------------------------------

	/**
	 * Helper: Sets query select portion.
	 */
	public function select($select)
	{
		$this->trigger_events('select');

		$this->_ion_select[] = $select;

		return $this;
	}

	// ------------------------------------------------------------------------

	/**
	 * Helper: Sets query orderby parameter.
	 */
	public function order_by($by, $order='desc')
	{
		$this->trigger_events('order_by');

		$this->_ion_order_by = $by;
		$this->_ion_order    = $order;

		return $this;
	}

	// ------------------------------------------------------------------------

	/**
	 * Helper: Returns a single document object from an array of results.
	 *
	 * It's our MongoDB equivalent of CodeIgniter row() method.
	 *
	 * @return object
	 */
	public function document()
	{
		$this->trigger_events('document');

		$document = array();
		if (isset($this->response[0]))
		{
			// Clone mongoid of the resulting array, if necessary
			$this->response[0] = $this->_clone_mongoid($this->response[0]);
			// Get the first result as an object
			$document = (object) $this->response[0];
		}
		// Free memory
		unset($this->response);

		return $document;
	}

	// ------------------------------------------------------------------------

	/**
	 * Helper: Returns a single document object from an array of results.
	 *
	 * It's our MongoDB equivalent of CodeIgniter row_array() method.
	 *
	 * @return array
	 */
	public function document_array()
	{
		$this->trigger_events(array('document', 'document_array'));

		$document = array();
		if (isset($this->response[0]))
		{
			// Clone mongoid of the resulting array, if necessary
			$this->response[0] = $this->_clone_mongoid($this->response[0]);
			// Get the first result as an array
			$document = $this->response[0];
		}
		// Free memory
		unset($this->response);

		return $document;
	}

	// ------------------------------------------------------------------------

	/**
	 * Helper: Alias function for document() to maintain API consistency.
	 *
	 * @return object
	 */
	public function row()
	{
		return $this->document();
	}

	// ------------------------------------------------------------------------

	/**
	 * Helper: Alias function for document_array() to maintain API consistency.
	 *
	 * @return object
	 */
	public function row_array()
	{
		return $this->document_array();
	}

	// ------------------------------------------------------------------------

	/**
	 * Helper: Returns query results as an array of objects.
	 *
	 * This helper, and a few others (result_array, row, row_array) are
	 * implemented to mimic the behavior of their equivalent functions in the
	 * original model, but in MongoDB interface environment.
	 *
	 * TODO: These kinda helpers should exist in MongoDB Active Record Library.
	 */
	public function result()
	{
		$this->trigger_events('result');

		if (! empty($this->response))
		{
			foreach ($this->response as $key => $value)
			{
				// We need to add an arbitrary "id" field to the resulted
				// object to maintain IonAuth compatibility with both
				// mongodb library and the native database drivers with
				// minimum level of code change.
				$this->response[$key] = $this->_clone_mongoid($value);

				// Typecast document results into objects for API consistency
				$this->response[$key] = (object) $this->response[$key];
			}
		}

		$result = $this->response;
		unset($this->response);

		return $result;
	}

	// ------------------------------------------------------------------------

	/**
	 * Helper: Returns query results as an array of arrays.
	 */
	public function result_array()
	{
		$this->trigger_events(array('result', 'result_array'));

		$result = $this->response;
		unset($this->response);

		// We need to add an arbitrary "id" field to the resulted
		// object to maintain IonAuth compatibility with both
		// mongodb library and the native database drivers with
		// minimum level of code change.
		$result = $this->_clone_mongoid($result);

		return $result;
	}

	// ------------------------------------------------------------------------

	/**
	 * Helper: Builds & executes a MongoDB query based on the already set parameters
	 * against users collection.
	 *
	 * @return object
	 */
	public function users($groups = NULL)
	{
		$this->trigger_events('users');

        // If there are specific select fields, apply them and flush SELECT buffer
        if (isset($this->_ion_select))
        {
        	foreach ($this->_ion_select as $select)
			{
				$this->mongo_db->select($select);
			}
            $this->_ion_select = array();
        }

        // Filter by group if any passed
        if (isset($groups))
        {
        	// Build an array if only one group was passed
        	if (is_numeric($groups))
        	{
        		$groups = array($groups);
        	}

        	if ( ! empty($groups))
        	{
        		$this->mongo_db->where_in('groups', $groups);
	        }
        }

		$this->trigger_events('extra_where');

		// Run each set where conditions and flush conditions buffer
		if (isset($this->_ion_where))
		{
			foreach ($this->_ion_where as $where)
			{
				$this->mongo_db->where($where);
			}
			$this->_ion_where = array();
		}

		// Apply limit portion of the query if set
		if (isset($this->_ion_limit) && isset($this->_ion_offset))
		{
			$this->mongo_db
				->limit($this->_ion_limit)
				->offset($this->_ion_offset);
			// Flush...
			$this->_ion_limit  = NULL;
			$this->_ion_offset = NULL;
		}
		// Limit only?
		elseif (isset($this->_ion_limit))
		{
			$this->mongo_db->limit($this->_ion_limit);
			$this->_ion_limit = NULL;
		}

		// Finally apply the order portion
		if (isset($this->_ion_order_by) && isset($this->_ion_order))
		{
			$this->mongo_db->order_by(array($this->_ion_order_by => $this->_ion_order));
			// Flush order buffers
			$this->_ion_order    = NULL;
			$this->_ion_order_by = NULL;
		}

		// Execute and return the object itself for the sake of chaining!
		$this->response = $this->mongo_db->get($this->collections['users']);
		return $this;
	}

	// ------------------------------------------------------------------------

	/**
	 * Helper: Returns user object by its passed ID.
	 *
	 * @return object
	 */
	public function user($id = FALSE)
	{
		$this->trigger_events('user');

		// If no id was passed use the current user id stored in session
		$id || $id = $this->session->userdata('user_id');

		// Set query parameters
		$this->limit(1);
		$this->where('_id', new MongoId($id));

		// Build and execute the query
		$this->users();

		return $this;
	}

	// ------------------------------------------------------------------------

	/**
	 * Returns an array of the user groups.
	 *
	 * @return array
	 */
	public function get_users_groups($id = FALSE)
	{
		$this->trigger_events('get_users_group');

		// If no id passed use the current user id stored in session
		$id || $id = $this->session->userdata('user_id');

		$groups = array();
		// Load user's group IDs array
		$user = $this->mongo_db
			->select(array('groups'))
			->where('_id', new MongoId($id))
			->limit(1)
			->get($this->collections['users']);

		if (empty($user))
		{
			$this->response = new stdClass;
			return $this;
		}

		// Buildup user groups data array
		$user = (object) $user[0];
		foreach ($user->groups as $group_id)
		{
			$groups[] = $this->group($group_id)->document();
		}

		$this->response = $groups;
		return $this;
	}

	// ------------------------------------------------------------------------

	/**
	 * Adds group ID to the specified user document.
	 *
	 * @return bool
	 */
	public function add_to_group($group_id, $user_id = FALSE)
	{
		$this->trigger_events('add_to_group');

		// If no id passed use the current user id stored in session
		$user_id || $user_id = $this->session->userdata('user_id');

		return $this->mongo_db
			->where('_id', new MongoId($user_id))
			->push('groups', $group_id)
			->update($this->collections['users']);
	}

	// ------------------------------------------------------------------------

	/**
	 * Removes passed group from the user document.
	 *
	 * If the group ID is not set, it will remove all groups
	 * from the user document.
	 *
	 * @return bool
	 */
	public function remove_from_group($group_id = FALSE, $user_id = FALSE)
	{
		$this->trigger_events('remove_from_group');

		// If no id passed use the current user id stored in session
		$user_id || $user_id = $this->session->userdata('user_id');

		// If no group name is passed remove user from all groups
		if (empty($group_id))
		{
			return $this->mongo_db
				->where('_id', new MongoId($user_id))
				->set('groups', array())
				->update($this->collections['users']);
		}
		// Only remove the specified group name from the user document
		else
		{
			return $this->mongo_db
			->where('_id', new MongoId($user_id))
			->pull('groups', $group_id)
			->update($this->collections['users']);
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * Helper: Builds and executes a MongoDB query against groups collection.
	 *
	 * @return object
	 */
	public function groups()
	{
		$this->trigger_events('groups');

		// Apply buffered conditions, and flush immediately
		if (isset($this->_ion_where))
		{
			foreach ($this->_ion_where as $where)
			{
				$this->mongo_db->where($where);
			}
			$this->_ion_where = array();
		}

		// Apply limit/offset portions, and flush immediately
		if (isset($this->_ion_limit) && isset($this->_ion_offset))
		{
			$this->mongo_db
				->limit($this->_ion_limit)
				->offset($this->_ion_offset);
			// Flush...
			$this->_ion_limit  = NULL;
			$this->_ion_offset = NULL;
		}
		// Limit only?
		elseif (isset($this->_ion_limit))
		{
			$this->mongo_db->limit($this->_ion_limit);
			$this->_ion_limit  = NULL;
		}

		// Apply order portion of query
		if (isset($this->_ion_order_by) && isset($this->_ion_order))
		{
			$this->mongo_db->order_by(array($this->_ion_order_by => $this->_ion_order));
		}

		// Execute, store results and return the object itself
		$this->response = $this->mongo_db->get($this->collections['groups']);
		return $this;
	}

	// ------------------------------------------------------------------------

	/**
	 * Helper: Returns a group object based on pre-defined buffered parameters.
	 *
	 * @return object
	 */
	public function group($id = NULL)
	{
		$this->trigger_events('group');

		if (isset($id))
		{
			$this->mongo_db->where('_id', new MongoId($id));
		}

		// Set query parameters
		$this->limit(1);

		// Execute and return results
		return $this->groups();
	}

	// ------------------------------------------------------------------------

	/**
	 * Updates a user document.
	 *
	 * @return bool
	 */
	public function update($id, array $data)
	{
		$this->trigger_events('pre_update_user');

		// Get user document to update
		$user = $this->user($id)->document();

		// If we're updating user document with a new identity
		// and the identity is not available to register, bam!
		if (array_key_exists($this->identity_column, $data) &&
			$this->identity_check($data[$this->identity_column]) &&
			$user->{$this->identity_column} !== $data[$this->identity_column])
		{
			$this->set_error('account_creation_duplicate_' . $this->identity_column);
			$this->trigger_events(array('post_update_user', 'post_update_user_unsuccessful'));
			$this->set_error('update_unsuccessful');

			return FALSE;
		}

		// Filter the data passed
		$data = $this->_filter_data($this->collections['users'], $data);

		// Hash new password
		if (array_key_exists('password', $data))
		{
			if( ! empty($data['password']))
			{
				$data['password'] = $this->hash_password($data['password'], $user->salt);
			}
			else
			{
				// unset password so it doesn't effect database entry if password field empty
				unset($data['password']);
			}
		}

		// TODO: DO WE NEED TO CHECK EMAIL AND USERNAME VALUES REGARDLESS
		// OF WHAT IDENTITY FIELD IS? ARE THEY STILL UNIQUE? DONNO!

		// Check if new email already exists
		if ($this->identity_column !== 'email' && array_key_exists('email', $data) &&
			$this->email_check($data['email']) && $user->email !== $data['email'])
		{
			$this->set_error('account_creation_duplicate_email');
			return FALSE;
		}

		// Check if new username already exists
		if ($this->identity_column !== 'username' && array_key_exists('username', $data) &&
			$this->username_check($data['username']) && $user->username !== $data['username'])
		{
			$this->set_error('account_creation_duplicate_username');
			return FALSE;
		}

		$this->trigger_events('extra_where');

		$updated = $this->mongo_db
			->where('_id', new MongoId($user->id))
			->set($data)
			->update($this->collections['users']);

		if ( ! $updated)
		{
			$this->trigger_events(array('post_update_user', 'post_update_user_unsuccessful'));
			$this->set_error('update_unsuccessful');
			return FALSE;
		}

		$this->trigger_events(array('post_update_user', 'post_update_user_successful'));
		$this->set_message('update_successful');
		return TRUE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Deletes a user document by its ID.
	 *
	 * @return bool
	 */
	public function delete_user($id)
	{
		$this->trigger_events('pre_delete_user');

		// Delete user document (groups association will also be deleted)
		$deleted = $this->mongo_db
			->where('_id', new MongoId($id))
			->delete($this->collections['users']);

		if ( ! $deleted)
		{
			$this->trigger_events(array('post_delete_user', 'post_delete_user_unsuccessful'));
			$this->set_error('delete_unsuccessful');
			return FALSE;
		}

		$this->trigger_events(array('post_delete_user', 'post_delete_user_successful'));
		$this->set_message('delete_successful');
		return TRUE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Updates user last login timestamp.
	 *
	 * @return bool
	 */
	public function update_last_login($id)
	{
		$this->load->helper('date');

		$this->trigger_events('update_last_login');
		$this->trigger_events('extra_where');

		return $this->mongo_db
			->where('_id', new MongoId($id))
			->set('last_login', time())
			->update($this->collections['users']);
	}

	// ------------------------------------------------------------------------

	/**
	 * Sets language cookie.
	 *
	 * @return bool
	 */
	public function set_lang($lang = 'en')
	{
		$this->trigger_events('set_lang');

		// if the user_expire is set to zero we'll set the expiration two years from now.
		if($this->config->item('user_expire', 'ion_auth') === 0)
		{
			$expire = (60*60*24*365*2);
		}
		// otherwise use what is set
		else
		{
			$expire = $this->config->item('user_expire', 'ion_auth');
		}

		set_cookie(array(
			'name'   => 'lang_code',
			'value'  => $lang,
			'expire' => $expire
		));

		return TRUE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Remembers user by setting required cookies
	 *
	 * @return bool
	 */
	public function remember_user($id)
	{
		$this->trigger_events('pre_remember_user');

		if (!$id)
		{
			return FALSE;
		}

		// Load user document
		$user = $this->user($id)->document();
		// Re-hash user password as remember code
		$salt = sha1($user->password);

		$updated = $this->mongo_db
			->where('_id', new MongoId($id))
			->set('remember_code', $salt)
			->update($this->collections['users']);

		// Set cookies
		if ($updated)
		{
			// if the user_expire is set to zero we'll set the expiration two years from now.
			if($this->config->item('user_expire', 'ion_auth') === 0)
			{
				$expire = (60*60*24*365*2);
			}
			// otherwise use what is set
			else
			{
				$expire = $this->config->item('user_expire', 'ion_auth');
			}

			set_cookie(array(
			    'name'   => 'identity',
			    'value'  => $user->{$this->identity_column},
			    'expire' => $expire
			));

			set_cookie(array(
			    'name'   => 'remember_code',
			    'value'  => $salt,
			    'expire' => $expire
			));

			$this->trigger_events(array('post_remember_user', 'remember_user_successful'));
			return TRUE;
		}

		// User not found
		$this->trigger_events(array('post_remember_user', 'remember_user_unsuccessful'));
		return FALSE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Logs in a remembered user.
	 *
	 * @return bool
	 */
	public function login_remembered_user()
	{
		$this->trigger_events('pre_login_remembered_user');

		// Check for valid data
		if ( !get_cookie('identity') || !get_cookie('remember_code') || !$this->identity_check(get_cookie('identity')))
		{
			$this->trigger_events(array('post_login_remembered_user', 'post_login_remembered_user_unsuccessful'));
			return FALSE;
		}

		// Load the user by cookie data
		$this->trigger_events('extra_where');
		$document = $this->mongo_db
			->select(array('_id', $this->identity_column))
		    ->where($this->identity_column, get_cookie('identity'))
		    ->where('remember_code', get_cookie('remember_code'))
		    ->limit(1)
		    ->get($this->collections['users']);

		// If the user was found, sign them in
		if (count($document))
		{
			$user = (object) $document[0];

			// Update last login timestamp
			$this->update_last_login($user->_id);

			// And set user session data
			$this->session->set_userdata(array(
				$this->identity_column => $user->{$this->identity_column},
				'user_id'              => $user->_id,
			));

			// Extend the users cookies if the option is enabled
			if ($this->config->item('user_extend_on_login', 'ion_auth'))
			{
				$this->remember_user($user->_id);
			}

			$this->trigger_events(array('post_login_remembered_user', 'post_login_remembered_user_successful'));
			return TRUE;
		}

		// User not found
		$this->trigger_events(array('post_login_remembered_user', 'post_login_remembered_user_unsuccessful'));
		return FALSE;
	}


	/**
	 * create_group
	 *
	 * @author Ben Edmunds
	*/
	public function create_group($group_name = FALSE, $group_description = '', $additional_data = array())
	{
		// bail if the group name was not passed
		if(!$group_name)
		{
			$this->set_error('group_name_required');
			return FALSE;
		}

		// bail if the group name already exists
		$existing_group = $this->where('name', $group_name)->group()->document();
		if(isset($existing_group) && !empty($existing_group))
		{
			$this->set_error('group_already_exists');
			return FALSE;
		}

		$data = array('name'=>$group_name,'description'=>$group_description);

		//filter out any data passed that doesnt have a matching column in the groups table
		//and merge the set group data and the additional data
		if (!empty($additional_data)) $data = array_merge($this->_filter_data($this->collections['groups'], $additional_data), $data);

		$this->trigger_events('extra_group_set');

		// insert the new group
		$group_id = $this->mongo_db->insert($this->collections['groups'], $data);

		// report success
		$this->set_message('group_creation_successful');

		// return the brand new group id
		return $group_id;
	}

	/**
	 * update_group
	 *
	 * @return bool
	 * @author Ben Edmunds
	 **/
	public function update_group($group_id = FALSE, $group_name = FALSE, $additional_data = array())
	{
		if (empty($group_id)) return FALSE;

		$data = array();

		if (!empty($group_name))
		{
			// we are changing the name, so do some checks

			// bail if the group name already exists
			$existing_group = $this->where('name', $group_name)->group()->document();
			if(isset($existing_group->id) && $existing_group->id != $group_id)
			{
				$this->set_error('group_already_exists');
				return FALSE;
			}

			$data['name'] = $group_name;
		}


		// IMPORTANT!! Third parameter was string type $description; this following code is to maintain backward compatibility
		// New projects should work with 3rd param as array
		if (is_string($additional_data)) $additional_data = array('description' => $additional_data);


		//filter out any data passed that doesnt have a matching column in the groups table
		//and merge the set group data and the additional data
		if (!empty($additional_data)) $data = array_merge($this->_filter_data($this->collections['groups'], $additional_data), $data);


		$updated = $this->mongo_db
			->where('_id', new MongoId($group_id))
			->set($data)
			->update($this->collections['groups']);

		$this->set_message('group_update_successful');

		return TRUE;
	}

	/**
	* delete_group
	*
	* @return bool
	* @author Ben Edmunds
	**/
	public function delete_group($group_id = FALSE)
	{
		// bail if mandatory param not set
		if(!$group_id || empty($group_id))
		{
			return FALSE;
		}

		$this->trigger_events('pre_delete_group');


		// delete this group
		$deleted = $this->mongo_db
			->where('_id', new MongoId($group_id))
			->delete($this->collections['groups']);

		if (!$deleted)
		{
			$this->trigger_events(array('post_delete_group', 'post_delete_group_unsuccessful'));
			$this->set_error('group_delete_unsuccessful');
			return FALSE;
		}


		$this->trigger_events(array('post_delete_group', 'post_delete_group_successful'));
		$this->set_message('group_delete_successful');
		return TRUE;
	}


	// ------------------------------------------------------------------------

	/**
	 * Registers a hook.
	 */
	public function set_hook($event, $name, $class, $method, $arguments)
	{
		$this->_ion_hooks->{$event}[$name] = (object) array(
			'class'     => $class,
			'method'    => $method,
			'arguments' => $arguments,
		);
	}

	// ------------------------------------------------------------------------

	/**
	 * Unregisters a hook.
	 */
	public function remove_hook($event, $name)
	{
		if (isset($this->_ion_hooks->{$event}[$name]))
		{
			unset($this->_ion_hooks->{$event}[$name]);
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * Unregisters all hooks from the passed event.
	 */
	public function remove_hooks($event)
	{
		if (isset($this->_ion_hooks->$event))
		{
			unset($this->_ion_hooks->$event);
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * Calls a registered hook callback.
	 */
	protected function _call_hook($event, $name)
	{
		if (isset($this->_ion_hooks->{$event}[$name]) &&
			method_exists($this->_ion_hooks->{$event}[$name]->class, $this->_ion_hooks->{$event}[$name]->method))
		{
			$hook = $this->_ion_hooks->{$event}[$name];
			return call_user_func_array(array($hook->class, $hook->method), $hook->arguments);
		}

		return FALSE;
	}

	// ------------------------------------------------------------------------

	/**
	 *
	 */
	public function trigger_events($events)
	{
		// If it's an array, call hooks foreach event
		if (is_array($events) && !empty($events))
		{
			foreach ($events as $event)
			{
				$this->trigger_events($event);
			}
		}
		else
		{
			if (isset($this->_ion_hooks->$events) && !empty($this->_ion_hooks->$events))
			{
				foreach ($this->_ion_hooks->$events as $name => $hook)
				{
					$this->_call_hook($events, $name);
				}
			}
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * Sets the message delimiters
	 *
	 * @return bool
	 */
	public function set_message_delimiters($start_delimiter, $end_delimiter)
	{
		$this->message_start_delimiter = $start_delimiter;
		$this->message_end_delimiter   = $end_delimiter;
		return TRUE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Sets the error delimiters
	 *
	 * @return bool
	 */
	public function set_error_delimiters($start_delimiter, $end_delimiter)
	{
		$this->error_start_delimiter = $start_delimiter;
		$this->error_end_delimiter   = $end_delimiter;
		return TRUE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Sets a message
	 */
	public function set_message($message)
	{
		$this->messages[] = $message;
		return $message;
	}

	// ------------------------------------------------------------------------

	/**
	 * Applies delimiters and returns themed messages
	 */
	public function messages()
	{
		$_output = '';
		foreach ($this->messages as $message)
		{
            $message_lang = $this->lang->line($message) ? $this->lang->line($message) : '##' . $message . '##';
            $_output .= $this->message_start_delimiter . $message_lang . $this->message_end_delimiter;
		}

		return $_output;
	}

	// ------------------------------------------------------------------------

	/**
	 * Return messages as an array, langified or not
	 **/
	public function messages_array($langify = TRUE)
	{
		if ($langify)
		{
			$_output = array();
			foreach ($this->messages as $message)
			{
				$messageLang = $this->lang->line($message) ? $this->lang->line($message) : '##' . $message . '##';
				$_output[] = $this->message_start_delimiter . $messageLang . $this->message_end_delimiter;
			}
			return $_output;
		}
		else
		{
			return $this->messages;
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * Sets an error message
	 */
	public function set_error($error)
	{
		$this->errors[] = $error;
		return $error;
	}

	// ------------------------------------------------------------------------

	/**
	 * Applies delimiters and returns themed errors
	 */
	public function errors()
	{
		$_output = '';
		foreach ($this->errors as $error)
		{
            $error_lang = $this->lang->line($error) ? $this->lang->line($error) : '##' . $error . '##';
            $_output .= $this->error_start_delimiter . $error_lang . $this->error_end_delimiter;
		}

		return $_output;
	}

	// ------------------------------------------------------------------------

	/**
	 * Return errors as an array, langified or not
	 **/
	public function errors_array($langify = TRUE)
	{
		if ($langify)
		{
			$_output = array();
			foreach ($this->errors as $error)
			{
				$errorLang = $this->lang->line($error) ? $this->lang->line($error) : '##' . $error . '##';
				$_output[] = $this->error_start_delimiter . $errorLang . $this->error_end_delimiter;
			}
			return $_output;
		}
		else
		{
			return $this->errors;
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * Helper: Filters out any data passed that doesn't have a matching column in $table.
	 *
	 * Since MongoDB is a schemaless database, we define collection fields as an static array,
	 * why we do so? MongoDB is vulnerable to Null Byte Injection as stated in the below article.
	 *
	 * @see http://www.idontplaydarts.com/2011/02/mongodb-null-byte-injection-attacks/
	 * @return array
	 */
	protected function _filter_data($collection, $data)
	{
		$filtered_data = $columns = array();
		// Define field dictionaries
		$columns = $collection == 'users' ?
			// Users collection static schema array
			array('_id', 'ip_address', 'username', 'password', 'salt', 'email', 'activation_code', 'forgotten_password_code', 'forgotten_password_time', 'remember_code', 'created_on', 'last_login', 'active', 'first_name', 'last_name', 'company', 'phone') :
			// Groups collection static schema array
			array('_id', 'name', 'description');

		if (is_array($data))
		{
			foreach ($columns as $column)
			{
				// Skip unavailable fields
				if (array_key_exists($column, $data))
				{
					$filtered_data[$column] = $data[$column];
				}
			}
		}

		return $filtered_data;
	}

	// ------------------------------------------------------------------------

	/**
	 * Helper: Prepares IP address string for database insertion.
	 *
	 * @return string
	 */
	protected function _prepare_ip($ip_address)
	{
		return $ip_address;
	}

	// ------------------------------------------------------------------------

	/**
	 * Helper: Clones "_id" field value in a new "id" property.
	 *
	 * We need to add an arbitrary "id" field to the resulted
	 * object to maintain IonAuth compatibility with both
	 * mongodb library and the native database drivers with
	 * minimum level of code change.
	 *
	 * This helper only clones the _id field value, if:
	 * 1. _id field is already present in the array.
	 * 2. id field is not set already set with any other values.
	 *
	 * @param  mixed $result Result array or object
	 * @return mixed
	 */
	public function _clone_mongoid($result)
	{
		$data = is_object($result) ? (array) $result : $result;

		// It's an array of array, clone mongoid of each one
		if (isset($data[0]))
		{
			foreach ($data as $key => $value)
			{
				$data[$key] = $this->_clone_mongoid($value);
			}
		}
		elseif ( ! isset($data['id']) && isset($data['_id']))
		{
			$data['id'] = $data['_id']->{'$id'};
		}

		return is_object($result) ? (object) $data : $data;
	}

}
// END Ion_auth_mongodb_model Class

/* End of file ion_auth_mongodb_model.php */
/* Location: ./application/modules/auth/models/ion_auth_mongodb_model.php */
