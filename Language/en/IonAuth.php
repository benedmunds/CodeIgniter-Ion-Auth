<?php

/**
 * Name:  Ion Auth Lang - English
 *
 * Author: Ben Edmunds
 *         ben.edmunds@gmail.com
 *         @benedmunds
 *
 * Location: http://github.com/benedmunds/ion_auth/
 *
 * Created:  03.14.2010
 *
 * Description:  English language file for Ion Auth messages and errors
 *
 * @package Codeigniter-Ion-Auth
 */

return [
	// Account Creation
	'account_creation_successful'            => 'Account Successfully Created',
	'account_creation_unsuccessful'          => 'Unable to Create Account',
	'account_creation_duplicate_email'       => 'Email Already Used or Invalid',
	'account_creation_duplicate_identity'    => 'Identity Already Used or Invalid',
	'account_creation_missing_defaultGroup' => 'Default group is not set',
	'account_creation_invalid_defaultGroup' => 'Invalid default group name set',

	// Password
	'password_change_successful'          => 'Password Successfully Changed',
	'password_change_unsuccessful'        => 'Unable to Change Password',
	'forgot_password_successful'          => 'Password Reset Email Sent',
	'forgot_password_unsuccessful'        => 'Unable to email the Reset Password link',

	// Activation
	'activate_successful'                 => 'Account Activated',
	'activate_unsuccessful'               => 'Unable to Activate Account',
	'deactivate_successful'               => 'Account De-Activated',
	'deactivate_unsuccessful'             => 'Unable to De-Activate Account',
	'activation_email_successful'         => 'Activation Email Sent. Please check your inbox or spam',
	'activation_email_unsuccessful'       => 'Unable to Send Activation Email',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful'                    => 'Logged In Successfully',
	'login_unsuccessful'                  => 'Incorrect Login',
	'login_unsuccessful_not_active'       => 'Account is inactive',
	'login_timeout'                       => 'Temporarily Locked Out.  Try again later.',
	'logout_successful'                   => 'Logged Out Successfully',

	// Account Changes
	'update_successful'                   => 'Account Information Successfully Updated',
	'update_unsuccessful'                 => 'Unable to Update Account Information',
	'delete_successful'                   => 'User Deleted',
	'delete_unsuccessful'                 => 'Unable to Delete User',

	// Groups
	'group_creation_successful'           => 'Group created Successfully',
	'group_already_exists'                => 'Group name already taken',
	'group_update_successful'             => 'Group details updated',
	'group_delete_successful'             => 'Group deleted',
	'group_delete_unsuccessful'           => 'Unable to delete group',
	'group_delete_notallowed'             => 'Can\'t delete the administrators\' group',
	'group_name_required'                 => 'Group name is a required field',
	'group_name_admin_not_alter'          => 'Admin group name can not be changed',

	// Activation Email
	'emailActivation_subject'            => 'Account Activation',
	'emailActivate_heading'              => 'Activate account for %s',
	'emailActivate_subheading'           => 'Please click this link to %s.',
	'emailActivate_link'                 => 'Activate Your Account',
	'empty_identity'          			 => 'Something went wrong. Please try again.',
	'unregistered_identity'          	 => 'This email is not registered yet. Please, try to register first.',
	'already_activated_identity'         => 'This email is activated already. Please, try to login.',

	// Forgot Password Email
	'email_forgotten_password_subject'    => 'Forgotten Password Verification',
	'emailForgotPassword_heading'       => 'Reset Password for %s',
	'emailForgotPassword_subheading'    => 'Please click this link to %s.',
	'emailForgotPassword_link'          => 'Reset Your Password',

];
