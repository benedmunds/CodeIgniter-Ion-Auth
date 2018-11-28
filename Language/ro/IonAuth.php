<?php
/**
* Name:  Ion Auth Lang - Romanian
*
* Author: Adrian Voicu
* 		  avenir.ro@gmail.com
*         @benedmunds
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  10.09.2013
*
* Description:  Romanian language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful' 	  	 	=> 'Cont creat cu succes',
	'account_creation_unsuccessful' 	 	 	=> 'Nu am reușit să creez contul',
	'account_creation_duplicate_email' 	 	=> 'Email deja folosit sau invalid',
	'account_creation_duplicate_identity' 	=> 'Numele de utilizator este deja folosit sau este invalid',
	'account_creation_missing_defaultGroup' => 'Grupul prestabilit nu a fost setat',
	'account_creation_invalid_defaultGroup' => 'Ați setat un nume greșit pentru grupul prestabilit',

	// Password
	'password_change_successful' 	 	 => 'Parolă schimbată cu succes',
	'password_change_unsuccessful' 	  	 => 'Nu am reușit să schimb parola',
	'forgot_password_successful' 	 	 => 'Emailul de resetare a parolei a fost trimis',
	'forgot_password_unsuccessful' 	 	 => 'Nu am reușit să resetez parola',

	// Activation
	'activate_successful' 		  	     => 'Cont activat',
	'activate_unsuccessful' 		 	     => 'Nu am reușit să activez contul',
	'deactivate_successful' 		  	     => 'Cont dezactivat',
	'deactivate_unsuccessful' 	  	     => 'Nu am reușit să dezactivez contul',
	'activation_email_successful' 	  	 => 'Mailul de activare a fost trimis',
	'activation_email_unsuccessful'   	 => 'Nu am reușit să trimit mailul de activare',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful' 		  	         => 'Conectarea a reușit',
	'login_unsuccessful' 		  	     => 'Date de logare incorecte',
	'login_unsuccessful_not_active' 		 => 'Contul este dezactivat',
	'login_timeout'                       => 'Ați fost temporar scos din sesiune. Încercați mai tarziu.',
	'logout_successful' 		 	         => 'Deconectarea a reușit',

	// Account Changes
	'update_successful' 		 	         => 'Informațiile contului au fost actualizate cu succes',
	'update_unsuccessful' 		 	     => 'Nu am reușit să actualizez informațiile contului',
	'delete_successful' 		 	         => 'Utilizator șters',
	'delete_unsuccessful' 		 	     => 'Nu am reușit să șterg utilizatorul',

	// Groups
	'group_creation_successful'  		=> 'Grup creat cu succes',
	'group_already_exists'       		=> 'Numele de grup a fost deja utilizat',
	'group_update_successful'    		=> 'Detaliile grupului au fost actualizate',
	'group_delete_successful'    		=> 'Grup șters cu succes',
	'group_delete_unsuccessful' 			=> 'Nu am putut șterge grupul',
	'group_delete_notallowed'    		=> 'Nu pot șterge grupul administratorilor',
	'group_name_required' 				=> 'Este necesar un nume pentru grup',
	'group_name_admin_not_alter' 		=> 'Numele grupului administratorilor nu poate fi schimbat',

	// Activation Email
	'emailActivation_subject'           => 'Activarea contului',
	'emailActivate_heading'    			=> 'Activarea contului pentru %s',
	'emailActivate_subheading' 			=> 'Dați clic pe această adresă pentru %s.',
	'emailActivate_link'       			=> 'Activarea contul',

	// Forgot Password Email
	'email_forgotten_password_subject'   => 'Verificarea parolei uitate',
	'emailForgotPassword_heading'    	=> 'Resetarea parolei pentru %s',
	'emailForgotPassword_subheading' 	=> 'Dați clic pe această adresă pentru %s.',
	'emailForgotPassword_link'       	=> 'Resetarea parolei',
];
