<?php
/**
* Name:  Ion Auth Lang - Danish
*
* Author:
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:
*
* Description:  Danish language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful' 			=> 'Konto oprettet',
	'account_creation_unsuccessful' 			=> 'Det var ikke muligt at oprette kontoen',
	'account_creation_duplicate_email' 		=> 'Email allerede i brug eller ugyldig',
	'account_creation_duplicate_identity' 	=> 'Brugernavn allerede i brug eller ugyldigt',
	'account_creation_missing_defaultGroup' => 'Default group is not set',
	'account_creation_invalid_defaultGroup' => 'Invalid default group name set',
	// Password
	'password_change_successful' 				=> 'Kodeordet er ændret',
	'password_change_unsuccessful' 			=> 'Det var ikke muligt at ændre kodeordet',
	'forgot_password_successful' 				=> 'Email vedrørende nulstilling af kodeord er afsendt',
	'forgot_password_unsuccessful' 			=> 'Det var ikke muligt at nulstille kodeordet',
	// Activation
	'activate_successful' 					=> 'Konto aktiveret',
	'activate_unsuccessful' 					=> 'Det var ikke muligt at aktivere kontoen',
	'deactivate_successful' 					=> 'Konto deaktiveret',
	'deactivate_unsuccessful' 				=> 'Det var ikke muligt at deaktivere kontoen',
	'activation_email_successful' 			=> 'Email vedrørende aktivering af konto er afsendt',
	'activation_email_unsuccessful' 			=> 'Det var ikke muligt at sende email vedrørende aktivering af konto',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',
	// Login / Logout
	'login_successful' 						=> 'Logged ind',
	'login_unsuccessful' 						=> 'Ugyldigt login',
	'login_unsuccessful_not_active' 			=> 'Kontoen er inaktiv',
	'login_timeout'                       => 'Temporarily Locked Out.  Try again later.',
	'logout_successful' 						=> 'Logged ud',
	// Account Changes
	'update_successful' 						=> 'Kontoen er opdateret',
	'update_unsuccessful' 					=> 'Det var ikke muligt at opdatere kontoen',
	'delete_successful' 						=> 'Bruger slettet',
	'delete_unsuccessful' 					=> 'Det var ikke muligt at slette bruger',
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
	'emailActivation_subject'            => 'Konto aktivering',
	'emailActivate_heading'    => 'Activate account for %s',
	'emailActivate_subheading' => 'Tryk på dette link for at %s.',
	'emailActivate_link'       => 'Aktivér din brugerkonto',

	// Forgot Password Email
	'email_forgotten_password_subject'    	=> 'Verifikation af glemt adgangskode',
	'emailForgotPassword_heading'    => 'Reset Password for %s',
	'emailForgotPassword_subheading' => 'Please click this link to %s.',
	'emailForgotPassword_link'       => 'Reset Your Password',
];
