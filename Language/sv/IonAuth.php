<?php
/**
* Name:  Ion Auth Lang - Swedish
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.14.2010
*
* Description:  Swedish language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful'         => 'Kontot har nu skapats',
	'account_creation_unsuccessful'       => 'Det gick inte att skapa kontot',
	'account_creation_duplicate_email'    => 'E-postadressen är ogiltig eller används redan',
	'account_creation_duplicate_identity' => 'Användarnamnet är ogiltigt eller används redan',

	// TODO Please Translate
	'account_creation_missing_defaultGroup' => 'Standard grupp är inte satt',
	'account_creation_invalid_defaultGroup' => 'Ogiltlig standard grupp namn satt',


	// Password
	'password_change_successful'      => 'Lösenordet har nu ändrats',
	'password_change_unsuccessful'    => 'Det gick inte att ändra lösenordet',
	'forgot_password_successful'      => 'E-postadressen för återställning av lösenord har nu skickats',
	'forgot_password_unsuccessful'    => 'Det gick inte att återställa lösenordet',

	// Activation
	'activate_successful'              => 'Kontot aktiverades',
	'activate_unsuccessful'            => 'Det gick inte att aktivera kontot',
	'deactivate_successful'            => 'Kontot inaktiverades',
	'deactivate_unsuccessful'          => 'Det gick inte att inaktivera kontot',
	'activation_email_successful'      => 'En aktveringslänk har skickats till din e-post',
	'activation_email_unsuccessful'    => 'E-post med aktiveringslänk kunde inte skickas',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful'       => 'Du är nu inloggad',
	'login_unsuccessful'     => 'Inloggningen misslyckades',
	'login_unsuccessful_not_active' 		 => 'Account is inactive',
	'login_timeout'                       => 'Temporarily Locked Out.  Try again later.',
	'logout_successful'      => 'Du är nu utloggad',

	// Account Changes
	'update_successful'      => 'Kontouppgifterna uppdaterades',
	'update_unsuccessful'    => 'Det gick inte att uppdatera kontouppgifterna',
	'delete_successful'      => 'Användaren är borttagen',
	'delete_unsuccessful'    => 'Det gick inte att ta bort användaren',

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
	'emailActivation_subject'   => 'Kontoaktivering',
	'emailActivate_heading'     => 'Kontoaktivering för %s',
	'emailActivate_subheading'  => 'Klicka denna länk för att %s.',
	'emailActivate_link'        => 'aktivera ditt konto',

	// Forgot Password Email
	'email_forgotten_password_subject' => 'Glömt lösenordsverifikation',
	'emailForgotPassword_heading'    => 'Glömt lösenord för %s',
	'emailForgotPassword_subheading' => 'Klicka denna länk för att %s.',
	'emailForgotPassword_link'       => 'återställa ditt lösenord',
];
