<?php namespace App\Controllers;

use CodeIgniter\Controller;

/**
 * Class Auth
 *
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @package  CodeIgniter-Ion-Auth
 */
class Auth extends Controller
{
	public $data = [];

	/**
	 * 
	 * @var \App\Config\IonAuth
	 */
	private $configIonAuth;

	/**
	 *
	 * @var \App\Libraries\IonAuth
	 */
	private $ionAuth;

	/**
	 *
	 * @var \CodeIgniter\Session\Session
	 */
	private $session;

	/**
	 *
	 * @var \CodeIgniter\Validation\Validation
	 */
	private $validation;


	public function __construct()
	{
		$this->ionAuth = new \App\Libraries\IonAuth();
		$this->validation = \Config\Services::validation();
		helper(['form', 'url']);
		$this->configIonAuth = config('IonAuth');
		$this->session = \Config\Services::session();
		// TODO: $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	}

	/**
	 * Redirect if needed, otherwise display the user list
	 */
	public function index()
	{
		if (! $this->ionAuth->loggedIn())
		{
			// redirect them to the login page
			//redirect('auth/login', 'refresh');
			return redirect('auth/login');
		}
		else if (! $this->ionAuth->isAdmin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			//show_error('You must be an administrator to view this page.');
			throw new \Exception('You must be an administrator to view this page.');
		}
		else
		{
			$this->data['title'] = lang('Auth.index_heading');

			// set the flash data error message if there is one
			$this->data['message'] = ($this->validation->listErrors()) ? $this->validation->listErrors() : $this->session->getFlashdata('message');
			//list the users
			$this->data['users'] = $this->ionAuth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ionAuth->getUsersGroups($user->id)->getResult();
			}
			return $this->_render_page('auth' . DIRECTORY_SEPARATOR . 'index', $this->data);
		}
	}

	/**
	 * Log the user in
	 */
	public function login()
	{
		$this->data['title'] = lang('Auth.login_heading');

		// validate form input
		$this->validation->setRule('identity', str_replace(':', '', lang('Auth.login_identity_label')), 'required');
		$this->validation->setRule('password', str_replace(':', '', lang('Auth.login_password_label')), 'required');

		//if ($this->form_validation->run() === TRUE)
		if ($this->validation->withRequest($this->request)->run())
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool)$this->request->getVar('remember');

			if ($this->ionAuth->login($this->request->getVar('identity'), $this->request->getVar('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->setFlashdata('message', $this->ionAuth->messages());
				return redirect('/');
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->setFlashdata('message', $this->ionAuth->errors());
				//redirect('auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
				return redirect('auth/login');
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			//$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['message'] = ($this->validation->listErrors()) ? $this->validation->listErrors() : $this->session->getFlashdata('message');

			$this->data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => set_value('identity'),
			];

			$this->data['password'] = [
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
			];

			return $this->_render_page('auth' . DIRECTORY_SEPARATOR . 'login', $this->data);
		}
	}

	/**
	 * Log the user out
	 */
	public function logout()
	{
		$this->data['title'] = "Logout";

		// log the user out
		$this->ionAuth->logout();

		// redirect them to the login page
		$this->session->setFlashdata('message', $this->ionAuth->messages());
		//redirect('auth/login', 'refresh');
		return redirect('auth/login');
	}

	/**
	 * Change password
	 */
	public function change_password()
	{
		$this->validation->setRule('old', lang('Auth.change_password_validation_old_password_label'), 'required');
		$this->validation->setRule('new', lang('Auth.change_password_validation_new_password_label'), 'required|min_length[' . $this->configIonAuth->min_password_length . ']|matches[new_confirm]');
		$this->validation->setRule('new_confirm', lang('Auth.change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ionAuth->loggedIn())
		{
			//redirect('auth/login', 'refresh');
			return redirect('auth/login');
		}

		$user = $this->ionAuth->user()->row();

		if ($this->validation->run() === FALSE)
		{
			// display the form
			// set the flash data error message if there is one
			$this->data['message'] = ($this->validation->listErrors()) ? $this->validation->listErrors() : $this->session->getFlashdata('message');

			$this->data['min_password_length'] = $this->configIonAuth->min_password_length;
			$this->data['old_password'] = [
				'name' => 'old',
				'id' => 'old',
				'type' => 'password',
			];
			$this->data['new_password'] = [
				'name' => 'new',
				'id' => 'new',
				'type' => 'password',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
			];
			$this->data['new_password_confirm'] = [
				'name' => 'new_confirm',
				'id' => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
			];
			$this->data['user_id'] = [
				'name' => 'user_id',
				'id' => 'user_id',
				'type' => 'hidden',
				'value' => $user->id,
			];

			// render
			return $this->_render_page('auth' . DIRECTORY_SEPARATOR . 'change_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ionAuth->changePassword($identity, $this->request->getPost('old'), $this->request->getPost('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->setFlashdata('message', $this->ionAuth->messages());
				$this->logout();
			}
			else
			{
				$this->session->setFlashdata('message', $this->ionAuth->errors());
				//redirect('auth/change_password', 'refresh');
				return redirect('auth/change_password');
			}
		}
	}

	/**
	 * Forgot password
	 */
	public function forgot_password()
	{
		$this->data['title'] = lang('Auth.forgot_password_heading');
		
		// setting validation rules by checking whether identity is username or email
		if ($this->configIonAuth->identity != 'email')
		{
			$this->validation->setRule('identity', lang('Auth.forgot_password_identity_label'), 'required');
		}
		else
		{
			$this->validation->setRule('identity', lang('Auth.forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->validation->run() === FALSE)
		{
			$this->data['type'] = $this->configIonAuth->identity;
			// setup the input
			$this->data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
			];

			if ($this->configIonAuth->identity != 'email')
			{
				$this->data['identity_label'] = lang('Auth.forgot_password_identity_label');
			}
			else
			{
				$this->data['identity_label'] = lang('Auth.forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$this->data['message'] = ($this->validation->listErrors()) ? $this->validation->listErrors() : $this->session->getFlashdata('message');
			return $this->_render_page('auth' . DIRECTORY_SEPARATOR . 'forgot_password', $this->data);
		}
		else
		{
			$identity_column = $this->configIonAuth->identity;
			$identity = $this->ionAuth->where($identity_column, $this->request->getPost('identity'))->users()->row();

			if (empty($identity))
			{

				if ($this->configIonAuth->identity != 'email')
				{
					$this->ionAuth->setError('forgot_password_identity_not_found');
				}
				else
				{
					$this->ionAuth->setError('forgot_password_email_not_found');
				}

				$this->session->setFlashdata('message', $this->ionAuth->errors());
				//redirect("auth/forgot_password", 'refresh');
				return redirect("auth/forgot_password");
			}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ionAuth->forgotten_password($identity->{$this->configIonAuth->identity});

			if ($forgotten)
			{
				// if there were no errors
				$this->session->setFlashdata('message', $this->ionAuth->messages());
				//redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
				return redirect("auth/login"); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->setFlashdata('message', $this->ionAuth->errors());
				//redirect("auth/forgot_password", 'refresh');
				return redirect("auth/forgot_password");
			}
		}
	}

	/**
	 * Reset password - final step for forgotten password
	 *
	 * @param string|null $code The reset code
	 */
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$this->data['title'] = lang('Auth.reset_password_heading');
		
		$user = $this->ionAuth->forgotten_password_check($code);

		if ($user)
		{
			// if the code is valid then display the password reset form

			$this->validation->setRule('new', lang('Auth.reset_password_validation_new_password_label'), 'required|min_length[' . $this->configIonAuth->min_password_length . ']|matches[new_confirm]');
			$this->validation->setRule('new_confirm', lang('Auth.reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->validation->run() === FALSE)
			{
				// display the form

				// set the flash data error message if there is one
				$this->data['message'] = ($this->validation->listErrors()) ? $this->validation->listErrors() : $this->session->getFlashdata('message');

				$this->data['min_password_length'] = $this->configIonAuth->min_password_length;
				$this->data['new_password'] = [
					'name' => 'new',
					'id' => 'new',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				];
				$this->data['new_password_confirm'] = [
					'name' => 'new_confirm',
					'id' => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				];
				$this->data['user_id'] = [
					'name' => 'user_id',
					'id' => 'user_id',
					'type' => 'hidden',
					'value' => $user->id,
				];
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				// render
				return $this->_render_page('auth' . DIRECTORY_SEPARATOR . 'reset_password', $this->data);
			}
			else
			{
				$identity = $user->{$this->configIonAuth->identity};

				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->request->getPost('user_id'))
				{

					// something fishy might be up
					$this->ionAuth->clear_forgotten_password_code($identity);

					throw new \Exception(lang('Auth.error_csrf'));

				}
				else
				{
					// finally change the password
					$change = $this->ionAuth->resetPassword($identity, $this->request->getPost('new'));

					if ($change)
					{
						// if the password was successfully changed
						$this->session->setFlashdata('message', $this->ionAuth->messages());
						//redirect("auth/login", 'refresh');
						return redirect("auth/login");
					}
					else
					{
						$this->session->setFlashdata('message', $this->ionAuth->errors());
						//redirect('auth/reset_password/' . $code, 'refresh');
						return redirect('auth/reset_password/' . $code);
					}
				}
			}
		}
		else
		{
			// if the code is invalid then send them back to the forgot password page
			$this->session->setFlashdata('message', $this->ionAuth->errors());
			//redirect("auth/forgot_password", 'refresh');
			return redirect("auth/forgot_password");
		}
	}

	/**
	 * Activate the user
	 *
	 * @param int         $id   The user ID
	 * @param string|bool $code The activation code
	 */
	public function activate($id, $code = FALSE)
	{
		$activation = FALSE;

		if ($code !== FALSE)
		{
			$activation = $this->ionAuth->activate($id, $code);
		}
		else if ($this->ionAuth->isAdmin())
		{
			$activation = $this->ionAuth->activate($id);
		}

		if ($activation)
		{
			// redirect them to the auth page
			$this->session->setFlashdata('message', $this->ionAuth->messages());
			return redirect('/auth');
		}
		else
		{
			// redirect them to the forgot password page
			$this->session->setFlashdata('message', $this->ionAuth->errors());
			return redirect('/auth/forgot_password');
		}
	}

	/**
	 * Deactivate the user
	 *
	 * @param int|string|null $id The user ID
	 */
	public function deactivate($id = NULL)
	{
		if (!$this->ionAuth->loggedIn() || !$this->ionAuth->isAdmin())
		{
			// redirect them to the home page because they must be an administrator to view this
			throw new \Exception('You must be an administrator to view this page.');
		}

		$id = (int)$id;

		$this->validation->setRule('confirm', lang('Auth.deactivate_validation_confirm_label'), 'required');
		$this->validation->setRule('id', lang('Auth.deactivate_validation_user_id_label'), 'required|alpha_numeric');

		if (! $this->validation->withRequest($this->request)->run())
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ionAuth->user($id)->row();

			return $this->_render_page('auth' . DIRECTORY_SEPARATOR . 'deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->request->getPost('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->request->getPost('id'))
				{
					throw new \Exception(lang('Auth.error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->ionAuth->loggedIn() && $this->ionAuth->isAdmin())
				{
					$this->ionAuth->deactivate($id);
				}
			}

			// redirect them back to the auth page
			//redirect('auth', 'refresh');
			return redirect('/auth');
		}
	}

	/**
	 * Create a new user
	 */
	public function create_user()
	{
		$this->data['title'] = lang('Auth.create_user_heading');

		if (!$this->ionAuth->loggedIn() || !$this->ionAuth->isAdmin())
		{
			return redirect('auth');
		}

		$tables = $this->configIonAuth->tables;
		$identity_column = $this->configIonAuth->identity;
		$this->data['identity_column'] = $identity_column;

		// validate form input
		$this->validation->setRule('first_name', lang('Auth.create_user_validation_fname_label'), 'trim|required');
		$this->validation->setRule('last_name', lang('Auth.create_user_validation_lname_label'), 'trim|required');
		if ($identity_column !== 'email')
		{
			$this->validation->setRule('identity', lang('Auth.create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
			$this->validation->setRule('email', lang('Auth.create_user_validation_email_label'), 'trim|required|valid_email');
		}
		else
		{
			$this->validation->setRule('email', lang('Auth.create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
		}
		$this->validation->setRule('phone', lang('Auth.create_user_validation_phone_label'), 'trim');
		$this->validation->setRule('company', lang('Auth.create_user_validation_company_label'), 'trim');
		$this->validation->setRule('password', lang('Auth.create_user_validation_password_label'), 'required|min_length[' . $this->configIonAuth->min_password_length . ']|matches[password_confirm]');
		$this->validation->setRule('password_confirm', lang('Auth.create_user_validation_password_confirm_label'), 'required');

		if ($this->validation->withRequest($this->request)->run())
		{
			$email = strtolower($this->request->getPost('email'));
			$identity = ($identity_column === 'email') ? $email : $this->request->getPost('identity');
			$password = $this->request->getPost('password');

			$additional_data = [
				'first_name' => $this->request->getPost('first_name'),
				'last_name' => $this->request->getPost('last_name'),
				'company' => $this->request->getPost('company'),
				'phone' => $this->request->getPost('phone'),
			];
		}
		if ($this->validation->withRequest($this->request)->run() && $this->ionAuth->register($identity, $password, $email, $additional_data))
		{
			// check to see if we are creating the user
			// redirect them back to the admin page
			$this->session->setFlashdata('message', $this->ionAuth->messages());
			return redirect('/auth');
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			$this->data['message'] = ($this->validation->listErrors() ? $this->validation->listErrors() : ($this->ionAuth->errors() ? $this->ionAuth->errors() : $this->session->getFlashdata('message')));

			$this->data['first_name'] = [
				'name' => 'first_name',
				'id' => 'first_name',
				'type' => 'text',
				'value' => set_value('first_name'),
			];
			$this->data['last_name'] = [
				'name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => set_value('last_name'),
			];
			$this->data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => set_value('identity'),
			];
			$this->data['email'] = [
				'name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => set_value('email'),
			];
			$this->data['company'] = [
				'name' => 'company',
				'id' => 'company',
				'type' => 'text',
				'value' => set_value('company'),
			];
			$this->data['phone'] = [
				'name' => 'phone',
				'id' => 'phone',
				'type' => 'text',
				'value' => set_value('phone'),
			];
			$this->data['password'] = [
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'value' => set_value('password'),
			];
			$this->data['password_confirm'] = [
				'name' => 'password_confirm',
				'id' => 'password_confirm',
				'type' => 'password',
				'value' => set_value('password_confirm'),
			];

			return $this->_render_page('auth' . DIRECTORY_SEPARATOR . 'create_user', $this->data);
		}
	}

	/**
	 * Redirect a user checking if is admin
	 *
	 * @return \CodeIgniter\HTTP\RedirectResponse
	 */
	public function redirectUser()
	{
		if ($this->ionAuth->isAdmin())
		{
			return redirect('/auth');
		}
		return redirect('/');
	}

	/**
	 * Edit a user
	 *
	 * @param int|string $id
	 */
	public function edit_user($id)
	{
		$this->data['title'] = lang('Auth.edit_user_heading');

		if (!$this->ionAuth->loggedIn() || (!$this->ionAuth->isAdmin() && !($this->ionAuth->user()->row()->id == $id)))
		{
			return redirect('/auth');
		}

		$user = $this->ionAuth->user($id)->row();
		$groups = $this->ionAuth->groups()->resultArray();
		$currentGroups = $this->ionAuth->getUsersGroups($id)->getResult();

		// validate form input
		$this->validation->setRule('first_name', lang('Auth.edit_user_validation_fname_label'), 'trim|required');
		$this->validation->setRule('last_name', lang('Auth.edit_user_validation_lname_label'), 'trim|required');
		$this->validation->setRule('phone', lang('Auth.edit_user_validation_phone_label'), 'trim|required');
		$this->validation->setRule('company', lang('Auth.edit_user_validation_company_label'), 'trim|required');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->request->getPost('id'))
			{
				//show_error(lang('Auth.error_csrf'));
				throw new \Exception(lang('Auth.error_csrf'));
			}

			// update the password if it was posted
			if ($this->request->getPost('password'))
			{
				$this->validation->setRule('password', lang('Auth.edit_user_validation_password_label'), 'required|min_length[' . $this->configIonAuth->min_password_length . ']|matches[password_confirm]');
				$this->validation->setRule('password_confirm', lang('Auth.edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->validation->withRequest($this->request)->run())
			{
				$data = [
					'first_name' => $this->request->getPost('first_name'),
					'last_name' => $this->request->getPost('last_name'),
					'company' => $this->request->getPost('company'),
					'phone' => $this->request->getPost('phone'),
				];

				// update the password if it was posted
				if ($this->request->getPost('password'))
				{
					$data['password'] = $this->request->getPost('password');
				}

				// Only allow updating groups if user is admin
				if ($this->ionAuth->isAdmin())
				{
					// Update the groups user belongs to
					$groupData = $this->request->getPost('groups');

					if (isset($groupData) && !empty($groupData))
					{

						$this->ionAuth->removeFromGroup('', $id);

						foreach ($groupData as $grp)
						{
							$this->ionAuth->addToGroup($grp, $id);
						}
					}
				}

				// check to see if we are updating the user
				if ($this->ionAuth->update($user->id, $data))
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->setFlashdata('message', $this->ionAuth->messages());
					return $this->redirectUser();
				}
				else
				{
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->setFlashdata('message', $this->ionAuth->errors());
					return $this->redirectUser();
				}

			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$this->data['message'] = ($this->validation->listErrors() ? $this->validation->listErrors() : ($this->ionAuth->errors() ? $this->ionAuth->errors() : $this->session->getFlashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = [
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => set_value('first_name', $user->first_name),
		];
		$this->data['last_name'] = [
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => set_value('last_name', $user->last_name),
		];
		$this->data['company'] = [
			'name'  => 'company',
			'id'    => 'company',
			'type'  => 'text',
			'value' => set_value('company', empty($user->company) ? '': $user->company),
		];
		$this->data['phone'] = [
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => set_value('phone', empty($user->phone) ? '': $user->phone),
		];
		$this->data['password'] = [
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password'
		];
		$this->data['password_confirm'] = [
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password'
		];
		$this->data['ionAuth'] = $this->ionAuth;

		return $this->_render_page('auth/edit_user', $this->data);
	}

	/**
	 * Create a new group
	 */
	public function create_group()
	{
		$this->data['title'] = lang('Auth.create_group_title');

		if (!$this->ionAuth->loggedIn() || !$this->ionAuth->isAdmin())
		{
			return redirect('/auth');
		}

		// validate form input
		$this->validation->setRule('group_name', lang('Auth.create_group_validation_name_label'), 'trim|required|alpha_dash');

		if ($this->validation->withRequest($this->request)->run())
		{
			$new_group_id = $this->ionAuth->create_group($this->request->getPost('group_name'), $this->request->getPost('description'));
			if ($new_group_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$this->session->setFlashdata('message', $this->ionAuth->messages());
				return redirect('/auth');
			}
		}
		else
		{
			// display the create group form
			// set the flash data error message if there is one
			$this->data['message'] = ($this->validation->listErrors() ? $this->validation->listErrors() : ($this->ionAuth->errors() ? $this->ionAuth->errors() : $this->session->getFlashdata('message')));

			$this->data['group_name'] = [
				'name'  => 'group_name',
				'id'    => 'group_name',
				'type'  => 'text',
				'value' => set_value('group_name'),
			];
			$this->data['description'] = [
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'value' => set_value('description'),
			];

			return $this->_render_page('auth/create_group', $this->data);
		}
	}

	/**
	 * Edit a group
	 *
	 * @param int|string $id
	 */
	public function edit_group($id)
	{
		// bail if no group id given
		if (!$id || empty($id))
		{
			return redirect('/auth');
		}

		$this->data['title'] = lang('Auth.edit_group_title');

		if (!$this->ionAuth->loggedIn() || !$this->ionAuth->isAdmin())
		{
			return redirect('/auth');
		}

		$group = $this->ionAuth->group($id)->row();

		// validate form input
		$this->validation->setRule('group_name', lang('Auth.edit_group_validation_name_label'), 'required|alpha_dash');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->validation->withRequest($this->request)->run())
			{
				$group_update = $this->ionAuth->updateGroup($id, $_POST['group_name'], $_POST['group_description']);

				if ($group_update)
				{
					$this->session->setFlashdata('message', lang('Auth.edit_group_saved'));
				}
				else
				{
					$this->session->setFlashdata('message', $this->ionAuth->errors());
				}
				return redirect('/auth');
			}
		}

		// set the flash data error message if there is one
		$this->data['message'] = ($this->validation->listErrors() ? $this->validation->listErrors() : ($this->ionAuth->errors() ? $this->ionAuth->errors() : $this->session->getFlashdata('message')));

		// pass the user to the view
		$this->data['group'] = $group;

		$readonly = $this->configIonAuth->admin_group === $group->name ? 'readonly' : '';

		$this->data['group_name'] = [
			'name'    => 'group_name',
			'id'      => 'group_name',
			'type'    => 'text',
			'value'   => set_value('group_name', $group->name),
			$readonly => $readonly,
		];
		$this->data['group_description'] = [
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'value' => set_value('group_description', $group->description),
		];

		return $this->_render_page('auth' . DIRECTORY_SEPARATOR . 'edit_group', $this->data);
	}

	/**
	 * @return array A CSRF key-value pair
	 */
	public function _get_csrf_nonce(): array
	{
		helper('text');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->setFlashdata('csrfkey', $key);
		$this->session->setFlashdata('csrfvalue', $value);

		return [$key => $value];
	}

	/**
	 * @return bool Whether the posted CSRF token matches
	 */
	public function _valid_csrf_nonce(){
		//$csrfkey = $this->request->getPost($this->session->flashdata('csrfkey'));
		$csrfkey = $this->request->getPost($this->session->getFlashdata('csrfkey'));
		if ($csrfkey && $csrfkey === $this->session->getFlashdata('csrfvalue'))
		{
			return TRUE;
		}
			return FALSE;
	}

    /**
	 * @param string     $view
	 * @param array|null $data
	 * @param bool       $returnhtml
	 *
	 * @return mixed
	 */
	public function _render_page($view, $data = NULL, $returnhtml = FALSE)//I think this makes more sense
	{
		$viewdata = (empty($data)) ? $this->data : $data;
		$view_html = view($view, $viewdata);
		/*// This will return html on 3rd argument being true
		if ($returnhtml)
		{
			return $view_html;
		}*/
        return $view_html;
	}
}
