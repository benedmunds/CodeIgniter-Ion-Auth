<?php
/**
* Name:  Ion Auth Lang - Italian
*
* Author: Ben Edmunds
*         ben.edmunds@gmail.com
*         @benedmunds
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  07.08.2010
*
* Description:  Italian language file for Ion Auth messages and errors
* translation:   Antonio Frignani (www.thinkers.it)
*/

return [
	// Account Creation
	'account_creation_successful' 	  	 => 'Account creato con successo.',
	'account_creation_unsuccessful' 	 	 => 'Impossibile creare l\'account.',
	'account_creation_duplicate_email' 	 => 'Email gi&agrave; in uso o non valida.',
	'account_creation_duplicate_identity' 	 => 'Nome utente gi&agrave; in uso o non valido.',
	'account_creation_missing_defaultGroup' => 'Gruppo predefinito non impostato',
	'account_creation_invalid_defaultGroup' => 'Nome del gruppo predefinito non valido',


	// Password
	'password_change_successful' 	 	 => 'Password modificata con successo.',
	'password_change_unsuccessful' 	  	 => 'Impossibile modificare la password.',
	'forgot_password_successful' 	 	 => 'Email di reset della password inviata.',
	'forgot_password_unsuccessful' 	 	 => 'Impossibile resettare la password.',

	// Activation
	'activate_successful' 		  	 => 'Account attivato.',
	'activate_unsuccessful' 		 	 => 'Impossibile attivare l\'account.',
	'deactivate_successful' 		  	 => 'Account disattivato.',
	'deactivate_unsuccessful' 	  	 => 'Impossibile disattivare l\'account.',
	'activation_email_successful' 	  	 => 'Email di attivazione inviata.',
	'activation_email_unsuccessful'   	 => 'Impossibile inviare l\'email di attivazione.',
	'deactivate_current_user_unsuccessful'=> 'Non puoi disattivare te stesso.',

	// Login / Logout
	'login_successful' 		  	 => 'Accesso effettuato con successo.',
	'login_unsuccessful' 		  	 => 'Accesso non corretto.',
	'login_unsuccessful_not_active' 		 => 'Account non attivo.',
	'login_timeout'                       => 'Temporaneamente bloccato. Riprovare pi&ugrave; tardi.',
	'logout_successful' 		 	 => 'Disconnessione effettuata con successo.',

	// Account Changes
	'update_successful' 		 	 => 'Informazioni dell\'account aggiornate con successo.',
	'update_unsuccessful' 		 	 => 'Impossibile aggiornare le informazioni dell\'account.',
	'delete_successful' 		 	 => 'Utente eliminato.',
	'delete_unsuccessful' 		 	 => 'Impossibile eliminare l\'utente.',

	// Groups
	'group_creation_successful'  => 'Gruppo creato con successo',
	'group_already_exists'       => 'Nome gruppo gi&agrave; assegnato',
	'group_update_successful'    => 'Dettagli gruppo aggiornati',
	'group_delete_successful'    => 'Gruppo cancellato',
	'group_delete_unsuccessful' 	=> 'Impossibile cancellare il gruppo',
	'group_delete_notallowed'    => 'Impossibile eliminare il gruppo amministratori',
	'group_name_required' 		=> 'Il nome gruppo &egrave; un campo obbligatorio',
	'group_name_admin_not_alter' => 'Il nome del gruppo amministratori non pu&ograve; essere modificato',

	// Activation Email
	'emailActivation_subject'            => 'Attivazione Account',
	'emailActivate_heading'    => 'Attiva account per %s',
	'emailActivate_subheading' => 'Si prega di cliccare su questo collegamento per %s.',
	'emailActivate_link'       => 'Attiva il tuo Account',
	// Forgot Password Email
	'email_forgotten_password_subject'    => 'Verifica il cambio password dimenticata',
	'emailForgotPassword_heading'    => 'Reimposta Password per %s',
	'emailForgotPassword_subheading' => 'Si prega di cliccare su questo collegamento per %s.',
	'emailForgotPassword_link'       => 'Reimposta la tua Password',
];
