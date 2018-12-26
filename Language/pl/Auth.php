<?php
/**
* Name:  Auth Lang - Polish
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Translation: Piotr Fuz
*         piotr.fuz@gmail.com
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:    03.09.2013
* Translated: 18.05.2017
*
* Description:  Polish language file for Ion Auth example views
*
*/

return [
	// Login
	'login_heading'         => 'Login',
	'login_subheading'      => 'Zaloguj się poniżej używając email/username oraz hasła.',
	'login_identity_label'  => 'Nazwa użytkownika:',
	'login_password_label'  => 'Hało:',
	'login_remember_label'  => 'Pamiętaj mnie:',
	'login_submit_btn'      => 'Login',
	'login_forgot_password' => 'Zapomniałeś hasła?',

	// Index
	'index_heading'           => 'Użytkownicy',
	'index_subheading'        => 'Lista użytkowników poniżej.',
	'index_fname_th'          => 'Imię',
	'index_lname_th'          => 'Nazwisko',
	'index_email_th'          => 'Email',
	'index_groups_th'         => 'Grupy',
	'index_status_th'         => 'Status',
	'index_action_th'         => 'Akcja',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'Aktywny',
	'index_inactive_link'     => 'Nieaktywny',
	'index_create_user_link'  => 'Utwórz nowego użykownika',
	'index_create_group_link' => 'Utwórz nową grupę',

	// Deactivate User
	'deactivate_heading'         		 => 'Deaktywuj użytkownika',
	'deactivate_subheading'      		 => 'Czy jesteś pewny, że chcesz deaktywować użytkownika \'%s\'',
	'deactivate_confirm_y_label' 		 => 'Tak:',
	'deactivate_confirm_n_label' 		 => 'Nie:',
	'deactivate_submit_btn'      		 => 'Wyślij',
	'deactivate_validation_confirm_label' => 'potwierdzenie',
	'deactivate_validation_user_id_label' => 'ID użytkownika',

	// Create User
	'create_user_heading'                		   => 'Dodaj użytkownika',
	'create_user_subheading'             		   => 'Wprowadź poniżej dane użytkownika.',
	'create_user_fname_label'            		   => 'Imię:',
	'create_user_lname_label'            		   => 'Nazwisko:',
	'create_user_identity_label'                    => 'Nazwa użytkownika:',
	'create_user_company_label'          		   => 'Nazwa firmy:',
	'create_user_email_label'           			   => 'Email:',
	'create_user_phone_label'            		   => 'Telefon:',
	'create_user_password_label'         		   => 'Hasło:',
	'create_user_password_confirm_label' 		   => 'Potwierdź hasło:',
	'create_user_submit_btn'             		   => 'Utwórz użytkownika',
	'create_user_validation_fname_label'            => 'Imię',
	'create_user_validation_lname_label'            => 'Nazwisko',
	'create_user_validation_identity_label'         => 'Nazwa użytkownika',
	'create_user_validation_email_label'            => 'Adres e-mail',
	'create_user_validation_phone_label'            => 'Telefon',
	'create_user_validation_phone1_label'           => 'Telefon - część pierwsza',
	'create_user_validation_phone2_label'           => 'Telefon - część druga',
	'create_user_validation_phone3_label'           => 'Telefon - część trzecia',
	'create_user_validation_company_label'          => 'Nazwa firmy',
	'create_user_validation_password_label'         => 'Hasło',
	'create_user_validation_password_confirm_label' => 'Potwierdź hasło',

	// Edit User
	'edit_user_heading'               		     => 'Edytuj użytkownika',
	'edit_user_subheading'             			 => 'Proszę wprowadzić poniżej dane użykownika.',
	'edit_user_fname_label'            			 => 'Imię:',
	'edit_user_lname_label'            			 => 'Nazwisko:',
	'edit_user_company_label'          			 => 'Nazwa firmy:',
	'edit_user_email_label'            			 => 'Email:',
	'edit_user_phone_label'            			 => 'Telefon:',
	'edit_user_password_label'         			 => 'Hasło (jeśli zmieniasz hasło)',
	'edit_user_password_confirm_label' 			 => 'Potwierdź hasło: (jeśli zmieniasz hasło)',
	'edit_user_groups_heading'        		     => 'Czlonek grupy',
	'edit_user_submit_btn'             			 => 'Zapisz użytkownika',
	'edit_user_validation_phone_label'            => 'Telefon',
	'edit_user_validation_fname_label'            => 'Imię',
	'edit_user_validation_lname_label'            => 'Nazwisko',
	'edit_user_validation_email_label'            => 'Adres e-mail',

	'edit_user_validation_phone1_label'           => 'Telefon - część pierwsza',
	'edit_user_validation_phone2_label'           => 'Telefon - część druga',
	'edit_user_validation_phone3_label'           => 'Telefon - część trzecia',
	'edit_user_validation_company_label'          => 'Nazwa firmy',
	'edit_user_validation_groups_label'           => 'Grupa',
	'edit_user_validation_password_label'         => 'Hasło',
	'edit_user_validation_password_confirm_label' => 'Potwierdź hasło',

	// Create Group
	'create_group_title'                  => 'Utwórz grupę',
	'create_group_heading'     			 => 'Utwórz grupę',
	'create_group_subheading'  			 => 'Wprowadź poniżej dane dla nowej grupy.',
	'create_group_name_label' 			 => 'Nazwa grupy:',
	'create_group_desc_label'  	         => 'Opis:',
	'create_group_submit_btn'  			 => 'Utwórz grupę',
	'create_group_validation_name_label'  => 'Nazwa grupy',
	'create_group_validation_desc_label'  => 'Opis',

	// Edit Group
	'edit_group_heading'     		   => 'Edytuj grupę',
	'edit_group_subheading'  		   => 'Wprowadź poniżej dane grupy.',
	'edit_group_name_label' 			   => 'Nazwa grupy',
	'edit_group_desc_label'  		   => 'Opis:',
	'edit_group_submit_btn'  		   => 'Zapisz',
	'edit_group_validation_name_label'  => 'Nazwa grupy',
	'edit_group_validation_desc_label'  => 'Opis',

	// Change Password
	'change_password_heading'                    		   => 'Zmień hasło',
	'change_password_old_password_label'         		   => 'Stare hasło:',
	'change_password_new_password_label'         		   => 'Nowe hasło (minimum %s znaków):',
	'change_password_new_password_confirm_label' 		   => 'Potwierdź nowe hasło:',
	'change_password_submit_btn'                 		   => 'Zmień',
	'change_password_validation_old_password_label'         => 'Stare hasło',
	'change_password_validation_new_password_label'         => 'Nowe hasło',
	'change_password_validation_new_password_confirm_label' => 'Potwierdź nowe hasło',

	// Forgot Password
	'forgot_password_heading'                 => 'Przypomnienie hasła',
	'forgot_password_subheading'              => 'Proszę wprowadź swój %s ayśmy mogli wysłać Ci email do zresetowania hasła.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Wyślij',
	'forgot_password_validation_email_label'  => 'Adres email',
	'forgot_password_username_identity_label' => 'Nazwa użytkownika',
	'forgot_password_email_identity_label'    => 'Email',
	'forgot_password_email_not_found'         => 'Nie znaleziono w bazie użytkownika o tym adresie.',
	'forgot_password_identity_not_found'      => 'Nie znaleziono użytkownika o tym adresie email.',

	// Reset Password
	'reset_password_heading'                    			  => 'Zmiana hasła',
	'reset_password_new_password_label'         			  => 'Nowe hasło (minimum %s znaków):',
	'reset_password_new_password_confirm_label' 			  => 'Potwierdź nowe hasło:',
	'reset_password_submit_btn'                 			  => 'Zmień',
	'reset_password_validation_new_password_label'         => 'Nowe hasło',
	'reset_password_validation_new_password_confirm_label' => 'Potwierdź nowe hasło',

	// Forgot Password Email
	'emailForgotPassword_heading'    => 'Zresetuj hasło dla %s',
	'emailForgotPassword_subheading' => 'Proszę klilknąć na link aby %s.',
	'emailForgotPassword_link'       => 'Resetuj hasło',
];
