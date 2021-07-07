<?php
/**
* Name:         Ion Auth Lang - German
*
* Author:       Ben Edmunds
* 		          ben.edmunds@gmail.com
*               @benedmunds
* Translation:  Bernd Hückstädt (akademie@joytopia.net), Benjamin Neu (benny@duxu.de), Max Vogl mail@max-vogl.de
*
*
*
* Location:     http://github.com/benedmunds/ion_auth/
*
* Created:  04.02.2010
* Last-Edit: 23.04.2016
*
* Description:      German language file for Ion Auth messages and errors
* Beschreibung:     Deutsche Sprach-Datei für Ion Auth System- und Fehlermeldungen
*
*/

return [
	// Account Creation
	'account_creation_successful' 	  	   => 'Das Benutzerkonto wurde erfolgreich erstellt',
	'account_creation_unsuccessful' 	     => 'Das Benutzerkonto konnte nicht erstellt werden',
	'account_creation_duplicate_email'    => 'Die E-Mail-Adresse ist ungültig oder wird bereits verwendet',
	'account_creation_duplicate_identity' => 'Der Benutzername ist ungültig oder wird bereits verwendet',

	// TODO Please Translate
	'account_creation_missing_defaultGroup' => 'Standard-Gruppe ist nicht gesetzt',
	'account_creation_invalid_defaultGroup' => 'Ungültiger Standard-Gruppenname',


	// Password
	'password_change_successful' 	=> 'Das Passwort wurde erfolgreich geändert',
	'password_change_unsuccessful' => 'Das Passwort konnte nicht geändert werden',
	'forgot_password_successful' 	=> 'Es wurde eine E-Mail zum Zurücksetzen des Passwortes versandt',
	'forgot_password_unsuccessful' => 'Das Passwort konnte nicht zurückgesetzt werden',

	// Activation
	'activate_successful' 		  	   => 'Das Benutzerkonto wurde aktiviert',
	'activate_unsuccessful' 		 	   => 'Das Benutzerkonto konnte nicht aktiviert werden',
	'deactivate_successful' 		  	 => 'Das Benutzerkonto wurde deaktiviert',
	'deactivate_unsuccessful' 	  	 => 'Das Benutzerkonto konnte nicht deaktiviert werden',
	'activation_email_successful' 	 => 'Es wurde eine E-Mail zum Aktivieren des Benutzerkontos versandt',
	'activation_email_unsuccessful' => 'Die Aktivierungs-E-Mail konnte nicht versandt werden',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful' 		  	     => 'Login erfolgreich',
	'login_unsuccessful' 		       => 'Login fehlgeschlagen',
	'login_unsuccessful_not_active' => 'Der Account ist deaktiviert',
	'login_timeout'                 => 'Vorübergehend gesperrt. Versuchen Sie es später noch einmal.',
	'logout_successful' 		 	       => 'Logout erfolgreich',

	// Account Changes
	'update_successful' 	 => 'Die Konto-Informationen wurden erfolgreich geändert',
	'update_unsuccessful' => 'Die Konto-Informationen konnten nicht geändert werden',
	'delete_successful' 	 => 'Das Benutzerkonto wurde gelöscht',
	'delete_unsuccessful' => 'Das Benutzerkonto konnte nicht gelöscht werden',

	// Groups
	'group_creation_successful'  => 'Gruppe wurde erfolgreich erstellt',
	'group_already_exists'       => 'Gruppenname bereits vergeben',
	'group_update_successful'    => 'Gruppendetails aktualisiert',
	'group_delete_successful'    => 'Gruppe gelöscht',
	'group_delete_unsuccessful' 	=> 'Gruppe konnte nicht gelöscht werden',
	'group_delete_notallowed'    => 'Sie können die Administrator-Gruppe nicht löschen',
	'group_name_required' 		    => '"Gruppenname" ist ein Pflichtfeld',
	'group_name_admin_not_alter' => 'Admin-Gruppenname kann nicht geändert werden',

	// Activation Email
	'emailActivation_subject'  => 'Aktivierung des Kontos',
	'emailActivate_heading'    => 'Konto aktivieren für %s',
	'emailActivate_subheading' => 'Bitte klicken Sie auf diesen Link, um %s.',
	'emailActivate_link'       => 'Aktivieren Sie Ihr Benutzerkonto',

	// Forgot Password Email
	'email_forgotten_password_subject' => 'Vergessenes Kennwort Verifikation',
	'emailForgotPassword_heading'    => 'Kennwort zurücksetzen für %s',
	'emailForgotPassword_subheading' => 'Bitte klicken Sie auf diesen Link, um %s.',
	'emailForgotPassword_link'       => 'Ihr Kennwort zurückzusetzen',
];
