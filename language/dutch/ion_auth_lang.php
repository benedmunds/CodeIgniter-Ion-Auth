<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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

// Account Creation
$lang['account_creation_successful'] 	  	 = 'Account is aangemaakt';
$lang['account_creation_unsuccessful'] 	 	 = 'Account aanmaken is mislukt';
$lang['account_creation_duplicate_email'] 	 = 'E-mail is al in gebruik of ongeldig';
$lang['account_creation_duplicate_username'] 	 = 'Gebruikersnaam is al in gebruik of ongeldig';

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Standaard groep is niet ingesteld';
$lang['account_creation_invalid_default_group'] = 'Standaard groepsnaam is ongeldig';


// Password
$lang['password_change_successful'] 	 	 = 'Wachtwoord succesvol gewijzigd';
$lang['password_change_unsuccessful'] 	  	 = 'Wachtwoord wijzigen is mislukt';
$lang['forgot_password_successful'] 	 	 = 'E-mail om het wachtwoord te Resetten is verzonden';
$lang['forgot_password_unsuccessful'] 	 	 = 'Wachtwoord resetten is mislukt';

// Activation
$lang['activate_successful'] 		  	 = 'Account is geactiveerd';
$lang['activate_unsuccessful'] 		 	 = 'Account activeren is mislukt';
$lang['deactivate_successful'] 		  	 = 'Account is gedeactiveerd';
$lang['deactivate_unsuccessful'] 	  	 = 'Accound deactiveren is mislukt';
$lang['activation_email_successful'] 	  	 = 'Activatie e-mail is verzonden';
$lang['activation_email_unsuccessful']   	 = 'Activatie e-mail verzenden is mislukt';

// Login / Logout
$lang['login_successful'] 		  	 = 'U bent ingelogd';
$lang['login_unsuccessful'] 		  	 = 'Login is incorrect';
$lang['login_unsuccessful_not_active'] 		 = 'Account is inactive';
$lang['login_timeout']                       = 'Temporarily Locked Out.  Try again later.';
$lang['logout_successful'] 		 	 = 'U bent uitgelogd';

// Account Changes
$lang['update_successful'] 		 	 = 'Account is bijgewerkt';
$lang['update_unsuccessful'] 		 	 = 'Account bijwerken is mislukt';
$lang['delete_successful'] 		 	 = 'Gebruiker is verwijderd';
$lang['delete_unsuccessful'] 		 	 = 'Gebruiker verwijderen is mislukt';

// Groups
$lang['group_creation_successful']  = 'Group created Successfully';
$lang['group_already_exists']       = 'Group name already taken';
$lang['group_update_successful']    = 'Group details updated';
$lang['group_delete_successful']    = 'Group deleted';
$lang['group_delete_unsuccessful'] 	= 'Unable to delete group';
$lang['group_delete_notallowed']    = 'Can\'t delete the administrators\' group';
$lang['group_name_required'] 		= 'Group name is a required field';
$lang['group_name_admin_not_alter'] = 'Admin group name can not be changed';

// Activation Email
$lang['email_activation_subject']            = 'Account Activering';
$lang['email_activate_heading']    = 'Activate account for %s';
$lang['email_activate_subheading'] = 'Please click this link to %s.';
$lang['email_activate_link']       = 'Activate Your Account';

// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Verificatie Verloren Wachtwoord';
$lang['email_forgot_password_heading']    = 'Reset Password for %s';
$lang['email_forgot_password_subheading'] = 'Please click this link to %s.';
$lang['email_forgot_password_link']       = 'Reset Your Password';
// New Password Email
$lang['email_new_password_subject']          = 'Nieuw wachtwoord';
$lang['email_new_password_heading']    = 'New Password for %s';
$lang['email_new_password_subheading'] = 'Your password has been reset to: %s';

/* End of file ion_auth_lang.php */
/* Location: ./system/application/language/dutch/ion_auth_lang.php */
