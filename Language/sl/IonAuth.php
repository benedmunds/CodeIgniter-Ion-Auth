<?php
/**
* Name:  Auth Lang - Slovenian
*
* Author: Žiga Drnovšček
* 		  ziga.drnovscek@gmail.com
*
*
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  12.5.2013
*
* Description:  Slovenian language file for Ion Auth example views
*
*/

return [
	// Ustvarjanje računa
	'account_creation_successful' 	  	 => 'Račun je bil uspešno ustvarjen',
	'account_creation_unsuccessful' 	 	 => 'Ni mogoče ustvariti računa',
	'account_creation_duplicate_email' 	 => 'Elektronski naslov je neveljaven ali pa že obstaja',
	'account_creation_duplicate_identity' => 'Uporabniško ime je neveljavno ali pa že obstaja',

	// TODO Please Translate
	'account_creation_missing_defaultGroup' => 'Default group is not set',
	'account_creation_invalid_defaultGroup' => 'Invalid default group name set',

	// Geslo
	'password_change_successful' 	 	 => 'Geslo je bilo uspešno spremenjeno',
	'password_change_unsuccessful' 	  	 => 'Ni mogoče spremeniti gesla',
	'forgot_password_successful' 	 	 => 'Zahteva za ponastavitev gesla je bila uspešno poslana',
	'forgot_password_unsuccessful' 	 	 => 'Gesla ni mogoče ponastaviti',

	// Aktivacija
	'activate_successful' 		  	     => 'Račun aktiviran',
	'activate_unsuccessful' 		 	     => 'Ni mogoče aktivirati računa',
	'deactivate_successful' 		  	     => 'Račun deaktiviran',
	'deactivate_unsuccessful' 	  	     => 'Ni mogoče deaktivirati računa',
	'activation_email_successful' 	  	 => 'Aktivacijska pošta uspešno poslana',
	'activation_email_unsuccessful'   	 => 'Aktivacijske pošte ni možno poslati',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Prijava / Odjava
	'login_successful' 		  	         => 'Uspešna prijava',
	'login_unsuccessful' 		  	     => 'Neuspešna prijava',
	'login_unsuccessful_not_active' 		 => 'Račun je neaktiven',
	'login_timeout'                       => 'Začasno zaklenjen. Poskusite ponovno pozneje.',
	'logout_successful' 		 	         => 'Uspešna odjava',

	// Sprememba računa
	'update_successful' 		 	         => 'Informacije računa so bile uspešno posodobljene',
	'update_unsuccessful' 		 	     => 'Informacije računa ni možno posodobljene',
	'delete_successful'               => 'Uporabnik izbrisan',
	'delete_unsuccessful'           => 'Ni možno izbrisati uporabnika',

	// Skupina
	'group_creation_successful'  => 'Skupina je bila uspešno ustvarjena',
	'group_already_exists'       => 'Ime skupine že obstaja',
	'group_update_successful'    => 'Podatki o skupini so bili uspešno posodobljeni',
	'group_delete_successful'    => 'Skupina izbrisana',
	'group_delete_unsuccessful' 	=> 'Ni možno izbrisati skupine',
	'group_delete_notallowed'    => 'Can\'t delete the administrators\' group',
	'group_name_required' 		=> 'Ime skupine je obvezno polje',
	'group_name_admin_not_alter' => 'Admin group name can not be changed',

	// Activation Email
	'emailActivation_subject'            => 'Aktivacija računa',
	'emailActivate_heading'    => 'Activate account for %s',
	'emailActivate_subheading' => 'Prosimo, sledite povezavi do %s.',
	'emailActivate_link'       => 'Aktivirajte vaš račun',

	// Forgot Password Email
	'email_forgotten_password_subject'    => 'Pozabljeno geslo',
	'emailForgotPassword_heading'    => 'Reset Password for %s',
	'emailForgotPassword_subheading' => 'Please click this link to %s.',
	'emailForgotPassword_link'       => 'Reset Your Password',
];
