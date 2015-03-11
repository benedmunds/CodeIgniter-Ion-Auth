<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Polish
*
* Author: Bart Majewski
* 		  hello@bartoszmajewski.pl
*         @bart_majewski
 * Updates: Slawomir Jasinski
 * 			slav123@gmail.com
 * 			@slavomirj
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.23.2010
* Updated:  22.08.2012
*
* Description:  Polish language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful'] 		 = 'Konto zostało pomyślnie założone';
$lang['account_creation_unsuccessful'] 		 = 'Nie można utworzyć konta';
$lang['account_creation_duplicate_email'] 	 = 'Podany adres Email jest nieprawidłowy lub został już użyty';
$lang['account_creation_duplicate_username'] = 'Podana nazwa użytkownika jest nieprawidłowa lub została już użyta';

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';


// Password
$lang['password_change_successful'] 		 = 'Hasło zostało pomyślnie zmienione';
$lang['password_change_unsuccessful'] 		 = 'Nie można zmienić hasła';
$lang['forgot_password_successful'] 		 = 'Nowe hasło zostało wysłane';
$lang['forgot_password_unsuccessful'] 		 = 'Nie można zresetować hasła';

// Activation
$lang['activate_successful'] 			     = 'Konto zostało aktywowane';
$lang['activate_unsuccessful'] 				 = 'Nie można aktywować konta';
$lang['deactivate_successful'] 				 = 'Konto zostało deaktywowane';
$lang['deactivate_unsuccessful'] 			 = 'Nie można deaktywować konta';
$lang['activation_email_successful'] 		 = 'Na twój adres E-mail został wysłany link aktywacyjny';
$lang['activation_email_unsuccessful'] 		 = 'Nie można wysłać linku aktywacyjnego';

// Login / Logout
$lang['login_successful'] 					 = 'Użytkownik został pomyślnie zalogowany';
$lang['login_unsuccessful'] 			     = 'Nieprawidłowy login';
$lang['login_unsuccessful_not_active'] 		 = 'Account is inactive';
$lang['login_timeout']                       = 'Temporarily Locked Out.  Try again later.';
$lang['logout_successful'] 					 = 'Użytkownik został pomyślnie wylogowany';

// Account Changes
$lang['update_successful'] 					 = 'Konto zostało pomyślnie uaktualnione';
$lang['update_unsuccessful'] 				 = 'Nie można uaktualnić konta';
$lang['delete_successful'] 					 = 'Użytkownik został skasowany';
$lang['delete_unsuccessful'] 				 = 'Nie można skasować użytkownika';

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
$lang['email_activation_subject']            = 'Aktywacja Konta';
$lang['email_activate_heading']    = 'Activate account for %s';
$lang['email_activate_subheading'] = 'Please click this link to %s.';
$lang['email_activate_link']       = 'Activate Your Account';
// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Weryfikacja Zapomnianengo Hasła';
$lang['email_forgot_password_heading']    = 'Reset Password for %s';
$lang['email_forgot_password_subheading'] = 'Please click this link to %s.';
$lang['email_forgot_password_link']       = 'Reset Your Password';
// New Password Email
$lang['email_new_password_subject']          = 'Nowe Hasło';
$lang['email_new_password_heading']    = 'New Password for %s';
$lang['email_new_password_subheading'] = 'Your password has been reset to: %s';
