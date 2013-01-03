<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Czech
*
* Author: Kristián Feldsam
* 		  kristian@feldsam.cz
*
*
* Created:  11.05.2012
*
* Description:  Czech language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'Účet byl úspěšně vytvořen';
$lang['account_creation_unsuccessful'] 	 	 = 'Nelze vytvořit účet';
$lang['account_creation_duplicate_email'] 	 = 'E-mail již existuje nebo je neplatný';
$lang['account_creation_duplicate_username'] = 'Uživatelské jméno již existuje nebo je neplatný';

// Password
$lang['password_change_successful'] 	 	 = 'Heslo bylo úspěšně změněno';
$lang['password_change_unsuccessful'] 	  	 = 'Nelze změnit heslo';
$lang['forgot_password_successful'] 	 	 = 'Heslo bylo odeslané na e-mail';
$lang['forgot_password_unsuccessful'] 	 	 = 'Nelze obnovit heslo';

// Activation
$lang['activate_successful'] 		  	     = 'Účet byl aktivován';
$lang['activate_unsuccessful'] 		 	     = 'Nelze aktivovat účet';
$lang['deactivate_successful'] 		  	     = 'Účet byl deaktivován';
$lang['deactivate_unsuccessful'] 	  	     = 'Nelze deaktivován účet';
$lang['activation_email_successful'] 	  	 = 'Aktivační e-mail byl odeslán';
$lang['activation_email_unsuccessful']   	 = 'Nelze odeslat aktivační e-mail';

// Login / Logout
$lang['login_successful'] 		  	         = 'Úspěšně přihlášen';
$lang['login_unsuccessful'] 		  	     = 'Nesprávný e-mail nebo heslo';
$lang['login_unsuccessful_not_active'] 		 = 'Účet je neaktivní';
$lang['logout_successful'] 		 	         = 'Úspěšné odhlášení';

// Account Changes
$lang['update_successful'] 		 	         = 'Informace o účtu byla úspěšně aktualizována';
$lang['update_unsuccessful'] 		 	     = 'Nelze aktualizovat informace o účtu';
$lang['delete_successful'] 		 	         = 'Uživatel byl smazán';
$lang['delete_unsuccessful'] 		 	     = 'Nelze smazat uživatele';

// Email Subjects - TODO Please Translate
$lang['email_forgotten_password_subject']    = 'Forgotten Password Verification';
$lang['email_new_password_subject']          = 'New Password';
$lang['email_activation_subject']            = 'Account Activation';