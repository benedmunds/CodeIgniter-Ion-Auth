<?php
/**
* Name:  Ion Auth Lang - Czech
*
* Author: Kristián Feldsam
* 		  kristian@feldsam.cz
*
*
* Created:  11.05.2012
*
* Description:  Czech language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful' 	  	 => 'Účet byl úspěšně vytvořen',
	'account_creation_unsuccessful' 	 	 => 'Nelze vytvořit účet',
	'account_creation_duplicate_email' 	 => 'E-mail již existuje nebo je neplatný',
	'account_creation_duplicate_identity' => 'Uživatelské jméno již existuje nebo je neplatný',

	// TODO Please Translate
	'account_creation_missing_default_group' => 'Default group is not set',
	'account_creation_invalid_default_group' => 'Invalid default group name set',

	// Password
	'password_change_successful' 	 	 => 'Heslo bylo úspěšně změněno',
	'password_change_unsuccessful' 	  	 => 'Nelze změnit heslo',
	'forgot_password_successful' 	 	 => 'Heslo bylo odeslané na e-mail',
	'forgot_password_unsuccessful' 	 	 => 'Nelze obnovit heslo',

	// Activation
	'activate_successful' 		  	     => 'Účet byl aktivován',
	'activate_unsuccessful' 		 	     => 'Nelze aktivovat účet',
	'deactivate_successful' 		  	     => 'Účet byl deaktivován',
	'deactivate_unsuccessful' 	  	     => 'Nelze deaktivován účet',
	'activation_email_successful' 	  	 => 'Aktivační e-mail byl odeslán',
	'activation_email_unsuccessful'   	 => 'Nelze odeslat aktivační e-mail',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful' 		  	         => 'Úspěšně přihlášen',
	'login_unsuccessful' 		  	     => 'Nesprávný e-mail nebo heslo',
	'login_unsuccessful_not_active' 		 => 'Účet je neaktivní',
	'login_timeout'                       => 'Temporarily Locked Out. Try again later.',
	'logout_successful' 		 	         => 'Úspěšné odhlášení',

	// Account Changes
	'update_successful' 		 	         => 'Informace o účtu byla úspěšně aktualizována',
	'update_unsuccessful' 		 	     => 'Nelze aktualizovat informace o účtu',
	'delete_successful' 		 	         => 'Uživatel byl smazán',
	'delete_unsuccessful' 		 	     => 'Nelze smazat uživatele',

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
	'email_activation_subject'            => 'Account Activation',
	'email_activate_heading'    => 'Activate account for %s',
	'email_activate_subheading' => 'Please click this link to %s.',
	'email_activate_link'       => 'Activate Your Account',
	// Forgot Password Email
	'email_forgotten_password_subject'    => 'Forgotten Password Verification',
	'email_forgot_password_heading'    => 'Reset Password for %s',
	'email_forgot_password_subheading' => 'Please click this link to %s.',
	'email_forgot_password_link'       => 'Reset Your Password',
];
