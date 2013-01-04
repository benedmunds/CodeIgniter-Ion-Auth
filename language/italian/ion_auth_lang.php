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
* Updated:  2012-01-03
* 
* Description:  Italian language file for Ion Auth messages and errors
* translation:   Antonio Frignani (www.thinkers.it)
* translation:   Damiano Venturin (www.venturin.net)
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'Account creato con successo.';
$lang['account_creation_unsuccessful'] 	 	 = 'Impossibile creare l\'account.';
$lang['account_creation_duplicate_email'] 	 = 'Email gi&agrave; in uso o non valida.';
$lang['account_creation_duplicate_username'] 	 = 'Nome utente gi&agrave; in uso o non valido.';

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

// Login / Logout
$lang['login_successful'] 		  	 = 'Login effettuato con successo.';
$lang['login_unsuccessful'] 		  	 = 'Login non corretto.';
$lang['login_unsuccessful_not_active'] 		 = 'L\'account é inattivo';
$lang['login_timeout']                       = 'Temporaneamente Bloccato.  Prova dopo.';
$lang['logout_successful'] 		 	 = 'Logout effettuato con successo.';
  

// Account Changes
$lang['update_successful'] 		 	 = 'Informazioni dell\'account aggiornate con successo.';
$lang['update_unsuccessful'] 		 	 = 'Impossibile aggiornare le informazioni dell\'account.';
$lang['delete_successful'] 		 	 = 'Utente eliminato.';
$lang['delete_unsuccessful'] 		 	 = 'Impossibile eliminare l\'utente.';

// Groups
$lang['group_creation_successful']  = 'Gruppo creato con successo';
$lang['group_already_exists']       = 'Nome gruppo giá in uso';
$lang['group_update_successful']    = 'Dettagli gruppo aggiornati';
$lang['group_delete_successful']    = 'Gruppo eliminato';
$lang['group_delete_unsuccessful'] 	= 'Impossibile eliminare il gruppo';

// Email Subjects
$lang['email_forgotten_password_subject']    = 'Verifica Password Dimenticata';
$lang['email_new_password_subject']          = 'Nuova Password';
$lang['email_activation_subject']            = 'Attivazione Account';