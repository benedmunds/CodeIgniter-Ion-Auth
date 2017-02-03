<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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

// Account Creation
$lang['account_creation_successful'] 	  	 = 'Account creato con successo.';
$lang['account_creation_unsuccessful'] 	 	 = 'Impossibile creare l\'account.';
$lang['account_creation_duplicate_email'] 	 = 'Email gi&agrave; in uso o non valida.';
$lang['account_creation_duplicate_identity'] 	 = 'Nome utente gi&agrave; in uso o non valido.';

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';


// Password
$lang['password_change_successful'] 	 	 = 'Password modificata con successo.';
$lang['password_change_unsuccessful'] 	  	 = 'Impossibile modificare la password.';
$lang['forgot_password_successful'] 	 	 = 'Email di reset della password inviata.';
$lang['forgot_password_unsuccessful'] 	 	 = 'Impossibile resettare la password.';

// Activation
$lang['activate_successful'] 		  	 = 'Account attivato.';
$lang['activate_unsuccessful'] 		 	 = 'Impossibile attivare l\'account.';
$lang['deactivate_successful'] 		  	 = 'Account disattivato.';
$lang['deactivate_unsuccessful'] 	  	 = 'Impossibile disattivare l\'account.';
$lang['activation_email_successful'] 	  	 = 'Email di attivazione inviata.';
$lang['activation_email_unsuccessful']   	 = 'Impossibile inviare l\'email di attivazione.';
$lang['deactivate_current_user_unsuccessful']= 'You cannot De-Activate your self.';

// Login / Logout
$lang['login_successful'] 		  	 = 'Login effettuato con successo.';
$lang['login_unsuccessful'] 		  	 = 'Login non corretto.';
$lang['login_unsuccessful_not_active'] 		 = 'Account is inactive';
$lang['login_timeout']                       = 'Temporarily Locked Out. Try again later.';
$lang['logout_successful'] 		 	 = 'Logout effettuato con successo.';

// Account Changes
$lang['update_successful'] 		 	 = 'Informazioni dell\'account aggiornate con successo.';
$lang['update_unsuccessful'] 		 	 = 'Impossibile aggiornare le informazioni dell\'account.';
$lang['delete_successful'] 		 	 = 'Utente eliminato.';
$lang['delete_unsuccessful'] 		 	 = 'Impossibile eliminare l\'utente.';

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
$lang['email_activation_subject']            = 'Attivazione Account';
$lang['email_activate_heading']    = 'Activate account for %s';
$lang['email_activate_subheading'] = 'Please click this link to %s.';
$lang['email_activate_link']       = 'Activate Your Account';
// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Verifica il cambio password dimenticata';
$lang['email_forgot_password_heading']    = 'Reset Password for %s';
$lang['email_forgot_password_subheading'] = 'Please click this link to %s.';
$lang['email_forgot_password_link']       = 'Reset Your Password';
// New Password Email
$lang['email_new_password_subject']          = 'Nuova Password';
$lang['email_new_password_heading']    = 'New Password for %s';
$lang['email_new_password_subheading'] = 'Your password has been reset to: %s';
