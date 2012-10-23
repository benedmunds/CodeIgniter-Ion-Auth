<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Romanian
*
* Author: Adrian Voicu
* 		  avenir.ro@gmail.com
*         @benedmunds
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  10.21.2012
*
* Description:  Romanian language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'Cont creat cu succes';
$lang['account_creation_unsuccessful'] 	 	 = 'Nu am reusit sa creez contul';
$lang['account_creation_duplicate_email'] 	 = 'Email deja folosit sau invalid';
$lang['account_creation_duplicate_username'] = 'Numele de utilizator este deja folosit sau invalid';

// Password
$lang['password_change_successful'] 	 	 = 'Parola schimbata cu succes';
$lang['password_change_unsuccessful'] 	  	 = 'Nu am reusit sa schimb parola';
$lang['forgot_password_successful'] 	 	 = 'Emailul de resetare a parolei a fost trimis';
$lang['forgot_password_unsuccessful'] 	 	 = 'Nu am reusit sa resetez parola';

// Activation
$lang['activate_successful'] 		  	     = 'Cont activat';
$lang['activate_unsuccessful'] 		 	     = 'Nu am reusit sa activez contul';
$lang['deactivate_successful'] 		  	     = 'Cont dezactivat';
$lang['deactivate_unsuccessful'] 	  	     = 'Nu am reusit sa dezactivez contul';
$lang['activation_email_successful'] 	  	 = 'Mailul de activare a fost trimis';
$lang['activation_email_unsuccessful']   	 = 'Nu am reusit sa trimit mailul de activare';

// Login / Logout
$lang['login_successful'] 		  	         = 'Logarea a reusit';
$lang['login_unsuccessful'] 		  	     = 'Date de logare incorecte';
$lang['login_unsuccessful_not_active'] 		 = 'Contul este dezactivat';
$lang['login_timeout']                       = 'Ati fost temporar scos din sesiune. Reincercati mai tarziu.';
$lang['logout_successful'] 		 	         = 'Delogarea a reusit';

// Account Changes
$lang['update_successful'] 		 	         = 'Informatiile contului au fost actualizate cu succes';
$lang['update_unsuccessful'] 		 	     = 'Nu am reusit sa actualizez informatiile contului';
$lang['delete_successful'] 		 	         = 'Utilizator sters';
$lang['delete_unsuccessful'] 		 	     = 'Nu am reusit sa sterg utilizatorul';

// Groups
$lang['group_creation_successful']  = 'Grup creat cu succes';
$lang['group_already_exists']       = 'Numele de grup a fost deja utilizat';
$lang['group_update_successful']    = 'Detaliile grupului au fost actualizate';

// Email Subjects
$lang['email_forgotten_password_subject']    = 'Verificarea parolei uitate';
$lang['email_new_password_subject']          = 'Parola noua';
$lang['email_activation_subject']            = 'Activarea contului';
