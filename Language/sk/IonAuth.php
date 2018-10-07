<?php
/**
* Name:  Ion Auth Lang - Slovak
*
* Author: Jakub Vatrt
* 		  vatrtj@gmail.com
*
*
* Created:  11.11.2016
*
* Description:  Slovak language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful' 	  	 => 'Účet bol úspešne vytvorený',
	'account_creation_unsuccessful' 	 	 => 'Nie je možné vytvoriť účet',
	'account_creation_duplicate_email' 	 => 'E-mail už existuje alebo je neplatný',
	'account_creation_duplicate_identity' => 'Užívateľské meno už existuje alebo je neplatné',

	// TODO Please Translate
	'account_creation_missing_defaultGroup' => 'Základná skupina nenastavená',
	'account_creation_invalid_defaultGroup' => 'Nesprávne meno základnej skupiny',

	// Password
	'password_change_successful' 	 	 => 'Heslo bolo úspešne zmenené',
	'password_change_unsuccessful' 	  	 => 'Nie je možné zmeniť heslo',
	'forgot_password_successful' 	 	 => 'Heslo bolo odoslané na e-mail',
	'forgot_password_unsuccessful' 	 	 => 'Nie je možné obnoviť heslo',

	// Activation
	'activate_successful' 		  	     => 'Účet bol aktivovaný',
	'activate_unsuccessful' 		 	     => 'Nie je možné aktivovať účet',
	'deactivate_successful' 		  	     => 'Účet bol deaktivovaný',
	'deactivate_unsuccessful' 	  	     => 'Nie je možné deaktivovať účet',
	'activation_email_successful' 	  	 => 'Aktivačný e-mail bol odoslaný',
	'activation_email_unsuccessful'   	 => 'Nedá sa odoslať aktivačný e-mail',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful' 		  	         => 'Úspešne prihlásený',
	'login_unsuccessful' 		  	     => 'Nesprávny e-mail alebo heslo',
	'login_unsuccessful_not_active' 		 => 'Účet je neaktívny',
	'login_timeout'                       => 'Dočasne uzamknuté z bezpečnostných dôvodov. Skúste neskôr',
	'logout_successful' 		 	         => 'Úspešné odhlásenie',

	// Account Changes
	'update_successful' 		 	         => 'Informácie o účte boli úspešne aktualizované',
	'update_unsuccessful' 		 	     => 'Informácie o účte sa nedájú aktualizovať',
	'delete_successful' 		 	         => 'Užívateľ bol zmazaný',
	'delete_unsuccessful' 		 	     => 'Užívateľ sa nedá zmazať ',

	// Groups
	'group_creation_successful'  => 'Skupina úspešne vytvorená',
	'group_already_exists'       => 'Meno skupiny už existuje',
	'group_update_successful'    => 'Detaily skupiny upravené',
	'group_delete_successful'    => 'Skupina zmazaná',
	'group_delete_unsuccessful' 	=> 'Nemôžem zmazať skupinu',
	'group_delete_notallowed'    => 'Nemôžem zmazať administrátorskú skupinu',
	'group_name_required' 		=> 'Meno skupiny je požadované pole',
	'group_name_admin_not_alter' => 'Administratorská skupina nemôže byť zmenená',

	// Activation Email
	'emailActivation_subject'            => 'Aktivácia účtu',
	'emailActivate_heading'    => 'Aktivujte účet na %s',
	'emailActivate_subheading' => 'Prosím kliknite na tento odkaz pre %s.',
	'emailActivate_link'       => 'Aktivujte váš účet',
	// Forgot Password Email
	'email_forgotten_password_subject'    => 'Obnovenie hesla kontrola',
	'emailForgotPassword_heading'    => 'Obnoviť heslo pre %s',
	'emailForgotPassword_subheading' => 'Prosím kliknite na tento odkaz pre %s.',
	'emailForgotPassword_link'       => 'Reset vášho hesla',
];
