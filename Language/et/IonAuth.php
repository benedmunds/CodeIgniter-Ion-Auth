<?php
/**
 * Name:  Ion Auth Lang - Estonian
 *
 * Author: Esko Lehtme
 *         esko@tsoon.com
 *         @eskolehtme
 *
 * Location: http://github.com/benedmunds/ion_auth/
 *
 * Created:  01.09.2011
 *
 * Description:  Estonian language file for Ion Auth messages and errors
 *
 */

 return [
	// Account Creation
	'account_creation_successful'         => 'Konto on loodud',
	'account_creation_unsuccessful'       => 'Konto loomine ebaõnnestus',
	'account_creation_duplicate_email'    => 'E-posti aadress on juba kasutusel või vigane.',
	'account_creation_duplicate_identity' => 'Kasutajanimi on juba kasutusel või vigane.',

	// TODO Please Translate
	'account_creation_missing_defaultGroup' => 'Default group is not set',
	'account_creation_invalid_defaultGroup' => 'Invalid default group name set',


	// Password
	'password_change_successful'          => 'Salasõna on muudetud.',
	'password_change_unsuccessful'        => 'Salasõna muutmine ebaõnnestus.',
	'forgot_password_successful'          => 'Sinu e-postile saadeti kiri edasise juhendiga.',
	'forgot_password_unsuccessful'        => 'Salasõna muutmine ebaõnnestus.',

	// Activation
	'activate_successful'                 => 'Konto on aktiveeritud',
	'activate_unsuccessful'               => 'Konto aktiveerimine ebaõnnestus.',
	'deactivate_successful'               => 'Konto on taas aktiivne',
	'deactivate_unsuccessful'             => 'Konto aktiveerimine ebaõnnestus.',
	'activation_email_successful'         => 'Sinu e-postile saadeti kiri edasise juhendiga.',
	'activation_email_unsuccessful'       => 'Aktiveerimiskirja saatmine ebaõnnestus.',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful'                    => 'Oled sisse logitud',
	'login_unsuccessful'                  => 'Sisenemine ebaõnnestus.',
	'login_unsuccessful_not_active' 		 => 'Account is inactive',
	'login_timeout'                       => 'Temporarily Locked Out.  Try again later.',
	'logout_successful'                   => 'Oled välja logitud',

	// Account Changes
	'update_successful'                   => 'Sinu andmed on muudetud',
	'update_unsuccessful'                 => 'Andmete muutmine ebaõnnestus.',
	'delete_successful'                   => 'Kasutaja on eemaldatud',
	'delete_unsuccessful'                 => 'Kasutajat eemaldamine ebaõnnestus.',

	// Groups
	'group_creation_successful'  => 'Group created Successfully',
	'group_already_exists'       => 'Group name already taken',
	'group_update_successful'    => 'Group details updated',
	'group_delete_successful'    => 'Group deleted',
	'group_delete_unsuccessful' 	=> 'Unable to delete group',
	'group_delete_notallowed'    => 'Can\'t delete the administrators\' group',
	'group_name_required' 		=> 'Group name is a required field',
	'group_name_admin_not_alter' => 'Admin group name can not be changed',

	// Activation Email
	'emailActivation_subject'            => 'Account Activation',
	'emailActivate_heading'    => 'Activate account for %s',
	'emailActivate_subheading' => 'Please click this link to %s.',
	'emailActivate_link'       => 'Activate Your Account',
	// Forgot Password Email
	'email_forgotten_password_subject'    => 'Forgotten Password Verification',
	'emailForgotPassword_heading'    => 'Reset Password for %s',
	'emailForgotPassword_subheading' => 'Please click this link to %s.',
	'emailForgotPassword_link'       => 'Reset Your Password',
 ];
