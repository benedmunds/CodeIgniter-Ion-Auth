<?php
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
 *			vertisan
 *			vertisan@vrs-factory.pl
 *			@vertisan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.23.2010
* Updated:  13.03.2016
*
* Description:  Polish language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful' 		 => 'Konto zostało pomyślnie założone',
	'account_creation_unsuccessful' 		 => 'Nie można utworzyć konta',
	'account_creation_duplicate_email' 	 => 'Podany adres Email jest nieprawidłowy lub został już użyty',
	'account_creation_duplicate_identity' => 'Podana nazwa użytkownika jest nieprawidłowa lub została już użyta',

	// TODO Please Translate
	'account_creation_missing_defaultGroup' => 'Domyślna grupa nie jest ustawiona',
	'account_creation_invalid_defaultGroup' => 'Nieprawidłowa nazwa domyślnej grupy',


	// Password
	'password_change_successful' 		 => 'Hasło zostało pomyślnie zmienione',
	'password_change_unsuccessful' 		 => 'Nie można zmienić hasła',
	'forgot_password_successful' 		 => 'Nowe hasło zostało wysłane',
	'forgot_password_unsuccessful' 		 => 'Nie można zresetować hasła',

	// Activation
	'activate_successful' 			     => 'Konto zostało aktywowane',
	'activate_unsuccessful' 				 => 'Nie można aktywować konta',
	'deactivate_successful' 				 => 'Konto zostało deaktywowane',
	'deactivate_unsuccessful' 			 => 'Nie można deaktywować konta',
	'activation_email_successful' 		 => 'Na twój adres E-mail został wysłany link aktywacyjny',
	'activation_email_unsuccessful' 		 => 'Nie można wysłać linku aktywacyjnego',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful' 					 => 'Użytkownik został pomyślnie zalogowany',
	'login_unsuccessful' 			     => 'Nieprawidłowy login',
	'login_unsuccessful_not_active' 		 => 'Konto nie jest aktywne',
	'login_timeout'                       => 'Konto tymczasowo zablokowane. Spróbuj ponownie później',
	'logout_successful' 					 => 'Użytkownik został pomyślnie wylogowany',

	// Account Changes
	'update_successful' 					 => 'Konto zostało pomyślnie uaktualnione',
	'update_unsuccessful' 				 => 'Nie można uaktualnić konta',
	'delete_successful' 					 => 'Użytkownik został skasowany',
	'delete_unsuccessful' 				 => 'Nie można skasować użytkownika',

	// Groups
	'group_creation_successful'  => 'Grupa została utworzona pomyślnie',
	'group_already_exists'       => 'Podana grupa już istnieje!',
	'group_update_successful'    => 'Grupa została zaktualizowana',
	'group_delete_successful'    => 'Grupa została usunięta',
	'group_delete_unsuccessful' 	=> 'Unable to delete group',
	'group_delete_notallowed'    => 'Nie można usunąć grupy administracyjnej',
	'group_name_required' 		=> 'Nazwa grupy jest wymagana',
	'group_name_admin_not_alter' => 'Nazwa grupy administracyjnej nie może zostać zmieniona!',

	// Activation Email
	'emailActivation_subject'  => 'Aktywacja Konta',
	'emailActivate_heading'    => 'Aktywuj konto dla %s',
	'emailActivate_subheading' => 'Przejdź do tego adresu aby aktywować swoje konto %s.',
	'emailActivate_link'       => 'Aktywacja konta',
	// Forgot Password Email
	'email_forgotten_password_subject'    => 'Resetowanie hasła',
	'emailForgotPassword_heading'    	 => 'Zresetuj hasło dla %s',
	'emailForgotPassword_subheading' 	 => 'Przejdź do tego adresu aby zresetować swoje hasło %s.',
	'emailForgotPassword_link'       	 => 'Resetowanie hasła',
];
