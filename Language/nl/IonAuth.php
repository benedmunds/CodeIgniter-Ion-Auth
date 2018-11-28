<?php
/**
* Name:  Ion Auth Lang - Dutch
*
* Author: Jeroen van der Gulik
*         jeroen@isset.nl
*
* Adjustments by Dieter
*
* Location: http://github.com/benedmunds/CodeIgniter-Ion-Auth
*
* Created:  05.01.2010
*
* Description:  Dutch language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful' 	  	 => 'Account is aangemaakt',
	'account_creation_unsuccessful' 	 	 => 'Account aanmaken is mislukt',
	'account_creation_duplicate_email' 	 => 'E-mailadres is al in gebruik of ongeldig',
	'account_creation_duplicate_identity' => 'Gebruikersnaam is al in gebruik of ongeldig',

	// TODO Please Translate
	'account_creation_missing_defaultGroup' => 'Standaard groep is niet ingesteld',
	'account_creation_invalid_defaultGroup' => 'Standaard groepsnaam is ongeldig',


	// Password
	'password_change_successful' 	 	 => 'Wachtwoord succesvol gewijzigd',
	'password_change_unsuccessful' 	  	 => 'Wachtwoord wijzigen is mislukt',
	'forgot_password_successful' 	 	 => 'E-mail om het wachtwoord te resetten is verzonden',
	'forgot_password_unsuccessful' 	 	 => 'Wachtwoord resetten is mislukt',

	// Activation
	'activate_successful' 		  	 => 'Account is geactiveerd',
	'activate_unsuccessful' 		 	 => 'Account activeren is mislukt',
	'deactivate_successful' 		  	 => 'Account is gedeactiveerd',
	'deactivate_unsuccessful' 	  	 => 'Accound deactiveren is mislukt',
	'activation_email_successful' 	  	 => 'Activatie e-mail is verzonden',
	'activation_email_unsuccessful'   	 => 'Activatie e-mail verzenden is mislukt',
	'deactivate_current_user_unsuccessful'=> 'U kunt uzelf niet deactiveren.',

	// Login / Logout
	'login_successful' 		  	 => 'U bent ingelogd',
	'login_unsuccessful' 		  	 => 'Login is incorrect',
	'login_unsuccessful_not_active' 		 => 'Account is inactief',
	'login_timeout'                       => 'U bent tijdelijk geblokkeerd. Probeer het later nogmaals.',
	'logout_successful' 		 	 => 'U bent uitgelogd',

	// Account Changes
	'update_successful' 		 	 => 'Account is bijgewerkt',
	'update_unsuccessful' 		 	 => 'Account bijwerken is mislukt',
	'delete_successful' 		 	 => 'Gebruiker is verwijderd',
	'delete_unsuccessful' 		 	 => 'Gebruiker verwijderen is mislukt',

	// Groups
	'group_creation_successful'  => 'Groep is succesvol aangemaakt',
	'group_already_exists'       => 'Groepsnaam is reeds in gebruik',
	'group_update_successful'    => 'Groepsinformatie is bijgewerkt',
	'group_delete_successful'    => 'Groep is verwijderd',
	'group_delete_unsuccessful' 	=> 'Groep verwijderen is mislukt',
	'group_delete_notallowed'    => 'Het is niet mogelijk om de administrator groep te verwijderen',
	'group_name_required' 		=> 'Groepsnaam is een verplicht veld',
	'group_name_admin_not_alter' => 'De naam van de administrator groep is niet aanpasbaar',

	// Activation Email
	'emailActivation_subject'            => 'Account activering',
	'emailActivate_heading'    => 'Activeer account voor %s',
	'emailActivate_subheading' => 'Gelieve op deze link te klikken om %s.',
	'emailActivate_link'       => 'Activeer uw account',

	// Forgot Password Email
	'email_forgotten_password_subject'    => 'Verificatie vergeten wachtwoord',
	'emailForgotPassword_heading'    => 'Reset wachtwoord voor %s',
	'emailForgotPassword_subheading' => 'Gelieve op deze link te klikken om %s.',
	'emailForgotPassword_link'       => 'Reset uw wachtwoord',
];
