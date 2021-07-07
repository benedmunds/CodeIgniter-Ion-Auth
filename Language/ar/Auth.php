<?php
/**
 * Name:  Auth Lang - English
 *
 * Author: Ben Edmunds
 * 		  ben.edmunds@gmail.com
 *         @benedmunds
 *
 * Author: Daniel Davis
 *         @ourmaninjapan
 *
 * Location: http://github.com/benedmunds/ion_auth/
 *
 * Created:  03.09.2013
 *
 * Description:  Arabic language file for Ion Auth example views
 *
 */

return [
	// Errors
	'error_security' => 'This form post did not pass our security checks.',

	// Login
	'login_heading'         => 'Login',
	'login_subheading'      => 'Please login with your email/username and password below.',
	'login_identity_label'  => 'Email/Username:',
	'login_password_label'  => 'Password:',
	'login_remember_label'  => 'Remember Me:',
	'login_submit_btn'      => 'Login',
	'login_forgot_password' => 'Forgot your password?',

	// Index
	'index_heading'           => 'Users',
	'index_subheading'        => 'Below is a list of the users.',
	'index_fname_th'          => 'First Name',
	'index_lname_th'          => 'Last Name',
	'index_email_th'          => 'Email',
	'index_groups_th'         => 'Groups',
	'index_status_th'         => 'Status',
	'index_action_th'         => 'Action',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'Active',
	'index_inactive_link'     => 'Inactive',
	'index_create_user_link'  => 'Create a new user',
	'index_create_group_link' => 'Create a new group',

	// Deactivate User
	'deactivate_heading'                  => 'Deactivate User',
	'deactivate_subheading'               => 'Are you sure you want to deactivate the user \'%s\'',
	'deactivate_confirm_y_label'          => 'Yes:',
	'deactivate_confirm_n_label'          => 'No:',
	'deactivate_submit_btn'               => 'Submit',
	'deactivate_validation_confirm_label' => 'confirmation',
	'deactivate_validation_user_id_label' => 'user ID',

	// Create User
	'create_user_heading'                           => 'Create User',
	'create_user_subheading'                        => 'Please enter the users information below.',
	'create_user_fname_label'                       => 'First Name:',
	'create_user_lname_label'                       => 'Last Name:',
	'create_user_identity_label'                    => 'Identity:',
	'create_user_company_label'                     => 'Company Name:',
	'create_user_email_label'                       => 'Email:',
	'create_user_phone_label'                       => 'Phone:',
	'create_user_password_label'                    => 'Password:',
	'create_user_password_confirm_label'            => 'Confirm Password:',
	'create_user_submit_btn'                        => 'Create User',
	'create_user_validation_fname_label'            => 'First Name',
	'create_user_validation_lname_label'            => 'Last Name',
	'create_user_validation_identity_label'         => 'Identity',
	'create_user_validation_email_label'            => 'Email Address',
	'create_user_validation_phone_label'            => 'Phone',
	'create_user_validation_company_label'          => 'Company Name',
	'create_user_validation_password_label'         => 'Password',
	'create_user_validation_password_confirm_label' => 'Password Confirmation',

	// Edit User
	'edit_user_heading'                           => 'Edit User',
	'edit_user_subheading'                        => 'Please enter the users information below.',
	'edit_user_fname_label'                       => 'First Name:',
	'edit_user_lname_label'                       => 'Last Name:',
	'edit_user_company_label'                     => 'Company Name:',
	'edit_user_email_label'                       => 'Email:',
	'edit_user_phone_label'                       => 'Phone:',
	'edit_user_password_label'                    => 'Password: (if changing password)',
	'edit_user_password_confirm_label'            => 'Confirm Password: (if changing password)',
	'edit_user_groups_heading'                    => 'Member of groups',
	'edit_user_submit_btn'                        => 'Save User',
	'edit_user_validation_fname_label'            => 'First Name',
	'edit_user_validation_lname_label'            => 'Last Name',
	'edit_user_validation_email_label'            => 'Email Address',
	'edit_user_validation_phone_label'            => 'Phone',
	'edit_user_validation_company_label'          => 'Company Name',
	'edit_user_validation_groups_label'           => 'Groups',
	'edit_user_validation_password_label'         => 'Password',
	'edit_user_validation_password_confirm_label' => 'Password Confirmation',

	// Create Group
	'create_group_title'                  => 'Create Group',
	'create_group_heading'                => 'Create Group',
	'create_group_subheading'             => 'Please enter the group information below.',
	'create_group_name_label'             => 'Group Name:',
	'create_group_desc_label'             => 'Description:',
	'create_group_submit_btn'             => 'Create Group',
	'create_group_validation_name_label'  => 'Group Name',
	'create_group_validation_desc_label'  => 'Description',

	// Edit Group
	'edit_group_title'                  => 'Edit Group',
	'edit_group_saved'                  => 'Group Saved',
	'edit_group_heading'                => 'Edit Group',
	'edit_group_subheading'             => 'Please enter the group information below.',
	'edit_group_name_label'             => 'Group Name:',
	'edit_group_desc_label'             => 'Description:',
	'edit_group_submit_btn'             => 'Save Group',
	'edit_group_validation_name_label'  => 'Group Name',
	'edit_group_validation_desc_label'  => 'Description',

	// Change Password
	'change_password_heading'                               => 'Change Password',
	'change_password_old_password_label'                    => 'Old Password:',
	'change_password_new_password_label'                    => 'New Password (at least %s characters long):',
	'change_password_new_password_confirm_label'            => 'Confirm New Password:',
	'change_password_submit_btn'                            => 'Change',
	'change_password_validation_old_password_label'         => 'Old Password',
	'change_password_validation_new_password_label'         => 'New Password',
	'change_password_validation_new_password_confirm_label' => 'Confirm New Password',

	// Forgot Password
	'forgot_password_heading'                 => 'Forgot Password',
	'forgot_password_subheading'              => 'Please enter your %s so we can send you an email to reset your password.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Submit',
	'forgot_password_validation_email_label'  => 'Email Address',
	'forgot_password_username_identity_label' => 'Username',
	'forgot_password_email_identity_label'    => 'Email',
	'forgot_password_email_not_found'         => 'No record of that email address.',
	'forgot_password_identity_not_found'      => 'No record of that username address.',

	// Reset Password
	'reset_password_heading'                               => 'Change Password',
	'reset_password_new_password_label'                    => 'New Password (at least %s characters long):',
	'reset_password_new_password_confirm_label'            => 'Confirm New Password:',
	'reset_password_submit_btn'                            => 'Change',
	'reset_password_validation_new_password_label'         => 'New Password',
	'reset_password_validation_new_password_confirm_label' => 'Confirm New Password',

	// Forgot Password Email
	'emailForgotPassword_heading'    => 'Reset Password for %s',
	'emailForgotPassword_subheading' => 'Please click this link to %s.',
	'emailForgotPassword_link'       => 'Reset Your Password',
];
