<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:         Ion Auth Lang - German
*
* Author:       Ben Edmunds
* 		        ben.edmunds@gmail.com
*               @benedmunds
* Translation:  Bernd Hückstädt (akademie@joytopia.net), Benjamin Neu (benny@duxu.de)
*
*
*
* Location:     http://github.com/benedmunds/ion_auth/
*
* Created:  04.02.2010
* Last-Edit: 22.02.2014
*
* Description:      German language file for Ion Auth messages and errors
* Beschreibung:     Deutsche Sprach-Datei für Ion Auth System- und Fehlermeldungen
*
*/

// Account Creation
$lang['account_creation_successful'] 	  	     = 'Das Benutzerkonto wurde erfolgreich erstellt';
$lang['account_creation_unsuccessful'] 	         = 'Das Benutzerkonto konnte nicht erstellt werden';
$lang['account_creation_duplicate_email']        = 'Die E-Mail-Adresse ist ungültig oder wird bereits verwendet';
$lang['account_creation_duplicate_identity'] 	 = 'Der Benutzername ist ungültig oder wird bereits verwendet';

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';


// Password
$lang['password_change_successful'] 	 	 = 'Das Passwort wurde erfolgreich geändert';
$lang['password_change_unsuccessful'] 	  	 = 'Das Passwort konnte nicht geändert werden';
$lang['forgot_password_successful'] 	 	 = 'Es wurde eine E-Mail zum Zurücksetzen des Passwortes versandt';
$lang['forgot_password_unsuccessful'] 	 	 = 'Das Passwort konnte nicht zurückgesetzt werden';

// Activation
$lang['activate_successful'] 		  	     = 'Das Benutzerkonto wurde aktiviert';
$lang['activate_unsuccessful'] 		 	     = 'Das Benutzerkonto konnte nicht aktiviert werden';
$lang['deactivate_successful'] 		  	     = 'Das Benutzerkonto wurde deaktiviert';
$lang['deactivate_unsuccessful'] 	  	     = 'Das Benutzerkonto konnte nicht deaktiviert werden';
$lang['activation_email_successful'] 	  	 = 'Es wurde eine E-Mail zum Aktivieren des Benutzerkontos versandt';
$lang['activation_email_unsuccessful']   	 = 'Die Aktivierungs-E-Mail konnte nicht versandt werden';

// Login / Logout
$lang['login_successful'] 		  	 = 'Login erfolgreich';
$lang['login_unsuccessful'] 		 = 'Login fehlgeschlagen';
$lang['login_unsuccessful_not_active'] = 'Der Account ist deaktiviert';
$lang['login_timeout']                       = 'Temporarily Locked Out.  Try again later.';
$lang['logout_successful'] 		 	 = 'Logout erfolgreich';

// Account Changes
$lang['update_successful'] 		 	 = 'Die Konto-Informationen wurden erfolgreich geändert';
$lang['update_unsuccessful'] 		 = 'Die Konto-Informationen konnten nicht geändert werden';
$lang['delete_successful'] 		 	 = 'Das Benutzerkonto wurde gelöscht';
$lang['delete_unsuccessful'] 		 = 'Das Benutzerkonto konnte nicht gelöscht werden';

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
$lang['email_activation_subject']            = 'Aktivierung des Kontos';
$lang['email_activate_heading']    = 'Activate account for %s';
$lang['email_activate_subheading'] = 'Please click this link to %s.';
$lang['email_activate_link']       = 'Activate Your Account';
// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Vergessenes Kennwort Verifikation';
$lang['email_forgot_password_heading']    = 'Reset Password for %s';
$lang['email_forgot_password_subheading'] = 'Please click this link to %s.';
$lang['email_forgot_password_link']       = 'Reset Your Password';
// New Password Email
$lang['email_new_password_subject']          = 'Neues Password';
$lang['email_new_password_heading']    = 'New Password for %s';
$lang['email_new_password_subheading'] = 'Your password has been reset to: %s';
