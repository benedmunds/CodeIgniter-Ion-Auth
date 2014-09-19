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
$lang['logout_successful'] 					 = 'Użytkownik został pomyślnie wylogowany';

// Account Changes
$lang['update_successful'] 					 = 'Konto zostało pomyślnie uaktualnione';
$lang['update_unsuccessful'] 				 = 'Nie można uaktualnić konta';
$lang['delete_successful'] 					 = 'Użytkownik został skasowany';
$lang['delete_unsuccessful'] 				 = 'Nie można skasować użytkownika';

// Email Subjects
$lang['email_forgotten_password_subject']    = 'Weryfikacja Zapomnianengo Hasła';
$lang['email_new_password_subject']          = 'Nowe Hasło';
$lang['email_activation_subject']            = 'Aktywacja Konta';