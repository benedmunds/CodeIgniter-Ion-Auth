<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin())
		{
			//redirect them to the home page because they must be an administrator to view this
			redirect('/', 'refresh');
		}
	}

	/**
	 * Index page
	 */
	function index()
	{
		$this->data['title'] = "Users";
		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		//list the users
		$table = array();
		$this->data['users'] = $this->ion_auth->users()->result();
		foreach ($this->data['users'] as $k => $user)
		{
			$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
		}
		$this->load->view('auth/index', $this->data);
	}

	/**
	 * View user
	 * @param int $id User ID
	 */
	function read($id = NULL)
	{
		$this->update($id, TRUE);
	}

	/**
	 * Create user
	 */
	function create()
	{
		$this->data['title'] = "Create User";

		//validate form input
		$this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
		$this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('groups', 'Group(s)', 'required');
		$this->form_validation->set_rules('company', 'Company Name', 'required|xss_clean');
		$this->form_validation->set_rules('phone1', 'First Part of Phone', 'required|xss_clean|min_length[3]|max_length[3]');
		$this->form_validation->set_rules('phone2', 'Second Part of Phone', 'required|xss_clean|min_length[3]|max_length[3]');
		$this->form_validation->set_rules('phone3', 'Third Part of Phone', 'required|xss_clean|min_length[4]|max_length[4]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');

		if ($this->form_validation->run() == true)
		{
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$groups = $this->input->post('groups');

			$additional_data = array('first_name' => $this->input->post('first_name'),
									 'last_name'  => $this->input->post('last_name'),
									 'company'    => $this->input->post('company'),
									 'phone'      => $this->input->post('phone1') . '-' . $this->input->post('phone2') . '-' . $this->input->post('phone3'),);
		}

		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data, $groups))
		{
			//check to see if we are creating the user
			//redirect them back to the users page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("user", 'refresh');
		}
		else
		{
			//display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');

			$this->data['username'] = array('name'     => 'username',
											'id'       => 'username',
											'type'     => 'text',
											'required' => 'required',
											'value'    => $this->form_validation->set_value('username'),);
			$this->data['first_name'] = array('name'     => 'first_name',
											  'id'       => 'first_name',
											  'type'     => 'text',
											  'required' => 'required',
											  'value'    => $this->form_validation->set_value('first_name'),);
			$this->data['last_name'] = array('name'     => 'last_name',
											 'id'       => 'last_name',
											 'type'     => 'text',
											 'required' => 'required',
											 'value'    => $this->form_validation->set_value('last_name'),);
			$this->data['email'] = array('name'     => 'email',
										 'id'       => 'email',
										 'type'     => 'text',
										 'required' => 'required',
										 'value'    => $this->form_validation->set_value('email'),);

			$groups = array();
			foreach ($this->ion_auth->groups()->result() as $group)
			{
				$groups[$group->id] = $group->name;
			}
			$this->data['groups'] = array('name'     => 'groups[]',
										  'extra'    => 'id="groups" required="required"',
										  'options'  => $groups,
										  'selected' => $this->input->post('groups'),);

			$this->data['company'] = array('name'     => 'company',
										   'id'       => 'company',
										   'type'     => 'text',
										   'required' => 'required',
										   'value'    => $this->form_validation->set_value('company'),);
			$this->data['phone1'] = array('name'     => 'phone1',
										  'id'       => 'phone1',
										  'type'     => 'text',
										  'required' => 'required',
										  'value'    => $this->form_validation->set_value('phone1'),);
			$this->data['phone2'] = array('name'     => 'phone2',
										  'id'       => 'phone2',
										  'type'     => 'text',
										  'required' => 'required',
										  'value'    => $this->form_validation->set_value('phone2'),);
			$this->data['phone3'] = array('name'     => 'phone3',
										  'id'       => 'phone3',
										  'type'     => 'text',
										  'required' => 'required',
										  'value'    => $this->form_validation->set_value('phone3'),);
			$this->data['password'] = array('name'     => 'password',
											'id'       => 'password',
											'type'     => 'password',
											'required' => 'required',
											'value'    => $this->form_validation->set_value('password'),);
			$this->data['password_confirm'] = array('name'     => 'password_confirm',
													'id'       => 'password_confirm',
													'type'     => 'password',
													'required' => 'required',
													'value'    => $this->form_validation->set_value('password_confirm'),);

			$this->load->view('auth/create_user', $this->data);
		}
	}

	/**
	 * Update user
	 * @param int $id User ID
	 * @param boolean $readonly View only?
	 */
	function update($id = NULL, $readonly = FALSE)
	{
		$this->data['title'] = ($readonly ? "View" : "Edit") . " User";

		if (empty($id) || ($user = $this->ion_auth->user($id)->row()) == FALSE)
		{
			$message = 'update_unsuccessful';
			$this->session->set_flashdata('message', $this->lang->line($message));
			redirect('user', 'refresh');
		}

		//process the phone number
		if (isset($user->phone) && !empty($user->phone))
		{
			$user->phone = explode('-', $user->phone);
		}
		else
		{
			$user->phone = array('', '', '');
		}

		//validate form input
		$this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
		$this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('groups', 'Group(s)', 'required');
		$this->form_validation->set_rules('company', 'Company Name', 'required|xss_clean');
		$this->form_validation->set_rules('phone1', 'First Part of Phone', 'required|xss_clean|min_length[3]|max_length[3]');
		$this->form_validation->set_rules('phone2', 'Second Part of Phone', 'required|xss_clean|min_length[3]|max_length[3]');
		$this->form_validation->set_rules('phone3', 'Third Part of Phone', 'required|xss_clean|min_length[4]|max_length[4]');

		if (isset($_POST) && !empty($_POST))
		{
			// do we have a valid request?
			if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
			{
				show_error('This form post did not pass our security checks.');
			}

			$data = array('username'   => $this->input->post('username'),
						  'first_name' => $this->input->post('first_name'),
						  'last_name'  => $this->input->post('last_name'),
						  'email'      => $this->input->post('email'),
						  'company'    => $this->input->post('company'),
						  'phone'      => $this->input->post('phone1') . '-' . $this->input->post('phone2') . '-' . $this->input->post('phone3'),);

			$groups = $this->input->post('groups');

			//update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');

				$data['password'] = $this->input->post('password');
			}

			if ($this->form_validation->run() === TRUE && $this->ion_auth->update($user->id, $data, $groups))
			{
				//check to see if we are editing the user
				//redirect them back to the users page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('user', 'refresh');
			}
		}

		//display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');

		//pass the user to the view
		$this->data['user'] = $user;

		$this->data['username'] = array('name'     => 'username',
										'id'       => 'username',
										'type'     => 'text',
										'required' => 'required',
										'value'    => $this->form_validation->set_value('username', $user->username),);
		$this->data['first_name'] = array('name'     => 'first_name',
										  'id'       => 'first_name',
										  'type'     => 'text',
										  'required' => 'required',
										  'value'    => $this->form_validation->set_value('first_name', $user->first_name),);
		$this->data['last_name'] = array('name'     => 'last_name',
										 'id'       => 'last_name',
										 'type'     => 'text',
										 'required' => 'required',
										 'value'    => $this->form_validation->set_value('last_name', $user->last_name),);
		$this->data['email'] = array('name'     => 'email',
									 'id'       => 'email',
									 'type'     => 'text',
									 'required' => 'required',
									 'value'    => $this->form_validation->set_value('email', $user->email));
		$groups = array();
		foreach ($this->ion_auth->groups()->result() as $group)
		{
			$groups[$group->id] = $group->name;
		}

		if ($this->input->post('groups'))
		{
			$user_groups = $this->input->post('groups');
		}
		else
		{
			$user_groups = array_map(function ($group)
			{
				return $group['id'];
			}, $this->ion_auth->get_users_groups($user->id)->result_array());
		}
		$this->data['groups'] = array('name'     => 'groups[]',
									  'extra'    => 'id="groups" required="required"',
									  'options'  => $groups,
									  'selected' => $user_groups);
		$this->data['company'] = array('name'     => 'company',
									   'id'       => 'company',
									   'type'     => 'text',
									   'required' => 'required',
									   'value'    => $this->form_validation->set_value('company', $user->company),);
		$this->data['phone1'] = array('name'     => 'phone1',
									  'id'       => 'phone1',
									  'type'     => 'text',
									  'required' => 'required',
									  'value'    => $this->form_validation->set_value('phone1', $user->phone[0]),);
		$this->data['phone2'] = array('name'     => 'phone2',
									  'id'       => 'phone2',
									  'type'     => 'text',
									  'required' => 'required',
									  'value'    => $this->form_validation->set_value('phone2', $user->phone[1]),);
		$this->data['phone3'] = array('name'     => 'phone3',
									  'id'       => 'phone3',
									  'type'     => 'text',
									  'required' => 'required',
									  'value'    => $this->form_validation->set_value('phone3', $user->phone[2]),);
		$this->data['password'] = array('name' => 'password',
										'id'   => 'password',
										'type' => 'password');
		$this->data['password_confirm'] = array('name' => 'password_confirm',
												'id'   => 'password_confirm',
												'type' => 'password');

		if ($readonly)
		{
			foreach (array('username',
						   'first_name',
						   'last_name',
						   'email',
						   'company',
						   'phone1',
						   'phone2',
						   'phone3',
						   'password',
						   'password_confirm') as $disabled_field)
			{
				$this->data[$disabled_field]['disabled'] = 'disabled';
			}
			$this->data['groups']['extra'] .= ' disabled="disabled"';
		}

		$this->data['readonly'] = $readonly;

		$this->load->view('auth/edit_user', $this->data);
	}

	/**
	 * Delete user
	 * @param int $id User ID
	 */
	function delete($id = NULL)
	{
		if ($this->ion_auth->delete_user($id))
		{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
		}
		else
		{
			$this->session->set_flashdata('message', $this->ion_auth->errors());
		}

		//redirect them back to the users page
		redirect('user', 'refresh');
	}

	/**
	 * Deactivate user
	 * @param int $id User ID
	 */
	function deactivate($id = NULL)
	{
		$this->data['title'] = "Deactivate User";

		$id = $this->config->item('use_mongodb', 'ion_auth') ? (string) $id : (int) $id;

		$this->form_validation->set_rules('confirm', 'confirmation', 'required');
		$this->form_validation->set_rules('id', 'user ID', 'required|alpha_numeric');

		if ($this->form_validation->run() == FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();

			$this->load->view('auth/deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_error('This form post did not pass our security checks.');
				}

				if ($this->ion_auth->deactivate($id))
				{
					$this->session->set_flashdata('message', $this->ion_auth->messages());
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
			}

			//redirect them back to the users page
			redirect('user', 'refresh');
		}
	}

	/**
	 * Activate user
	 * @param int $id User ID
	 */
	function activate($id)
	{
		if ($this->ion_auth->activate($id))
		{
			$this->session->set_flashdata('message', $this->ion_auth->messages());
		}
		else
		{
			$this->session->set_flashdata('message', $this->ion_auth->errors());
		}

		//redirect them back to the users page
		redirect('user', 'refresh');
	}

	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);
		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE && $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
