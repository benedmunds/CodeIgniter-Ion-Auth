<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Norwegian
* 
* Author: Tomas E. Sandven
* 		  tomas191191@gmail.com
*         @codemonkey1991
* 
* Location: http://github.com/benedmunds/ion_auth/
*          
* Created:  01.01.2012
* 
* Description:  Norwegian language file for Ion Auth messages and errors
* 
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'Konto opprettet';
$lang['account_creation_unsuccessful'] 	 	 = 'Klarte ikke å opprette konto';
$lang['account_creation_duplicate_email'] 	 = 'E-mail adressen er allerede i bruk eller ugyldig';
$lang['account_creation_duplicate_username'] 	 = 'Brukernavnet er allerede i bruk eller ugyldig';


// Password
$lang['password_change_successful'] 	 	 = 'Passordet har blitt endret';
$lang['password_change_unsuccessful'] 	  	 = 'Klarte ikke å endre passord';
$lang['forgot_password_successful'] 	 	 = 'E-mail for passord tilbakestilling har blitt sendt';
$lang['forgot_password_unsuccessful'] 	 	 = 'Klarte ikke å tilbakestille passord';

// Activation
$lang['activate_successful'] 		  	 = 'Kontoen har blitt aktivert';
$lang['activate_unsuccessful'] 		 	 = 'Klarte ikke å aktivere konto';
$lang['deactivate_successful'] 		  	 = 'Kontoen har blitt deaktivert';
$lang['deactivate_unsuccessful'] 	  	 = 'Klarte ikke å deaktivere konto';
$lang['activation_email_successful'] 	  	 = 'E-mail for aktivering av konto har blitt sendt';
$lang['activation_email_unsuccessful']   	 = 'Klarte ikke å sende e-mail for aktivering av konto';

// Login / Logout
$lang['login_successful'] 		  	 = 'Logget inn';
$lang['login_unsuccessful'] 		  	 = 'Feil brukernavn eller passord';
$lang['logout_successful'] 		 	 = 'Logget ut';

// Account Changes
$lang['update_successful'] 		 	 = 'Konto informasjon oppdatert';
$lang['update_unsuccessful'] 		 	 = 'Klarte ikke å oppdatere konto informasjon';
$lang['delete_successful'] 		 	 = 'Konto fjernet';
$lang['delete_unsuccessful'] 		 	 = 'Klarte ikke å fjerne konto';

// Email Subjects - TODO Please Translate
$lang['email_forgotten_password_subject']    = 'Forgotten Password Verification';
$lang['email_new_password_subject']          = 'New Password';
$lang['email_activation_subject']            = 'Account Activation';