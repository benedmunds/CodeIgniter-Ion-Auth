<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Lithuanian (UTF-8)
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
* Translation:  Radas7
*             radas7@gmail.com
*
*
* Created:  2012-03-04
*
* Description:  Lithuanian language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'Vartotojas sėkmingai sukurtas';
$lang['account_creation_unsuccessful'] 	 	 = 'Neįmanoma sukurti vartotojo';
$lang['account_creation_duplicate_email'] 	 = 'El, pašto adresas jau yra arba neteisingas';
$lang['account_creation_duplicate_username'] 	 = 'Prisijungimo vardas jau yra arba nekorektiškas';

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';

// Password
$lang['password_change_successful'] 	 	 = 'Slaptažodis sukurtas';
$lang['password_change_unsuccessful'] 	  	 = 'Negalima paeisti slaptažodžio';
$lang['forgot_password_successful'] 	 	 = 'Slaptažodis keičiamas. Instrukcijos išsiųstos paštu.';
$lang['forgot_password_unsuccessful'] 	 	 = 'Neįmanoma pakeisti slaptažodžio';

// Activation
$lang['activate_successful'] 		  	 = 'Vartotojas aktyvuotas';
$lang['activate_unsuccessful'] 		 	 = 'Nepavyko aktyvuoti';
$lang['deactivate_successful'] 		  	 = 'Deaktyvuota';
$lang['deactivate_unsuccessful'] 	  	 = 'Neįmanoma deaktyvuoti';
$lang['activation_email_successful'] 	  	 = 'Išsiųstas pranešimas į el. paštą';
$lang['activation_email_unsuccessful']   	 = 'Neįmanoma išsiųsti';

// Login / Logout
$lang['login_successful'] 		  	 = 'Sėkminga autorizacija';
$lang['login_unsuccessful'] 		  	 = 'Klaidingas prisijungimas';
$lang['logout_successful'] 		 	 = 'Atsijungta sėkminga';

// Account Changes
$lang['update_successful'] 		 	 = 'Vartotojo duomenys sėkmingai pakeisti';
$lang['update_unsuccessful'] 		 	 = 'Neįmanoma pakeisti vartotojo duoemnų';
$lang['delete_successful'] 		 	 = 'Vartotojas pašalintas';
$lang['delete_unsuccessful'] 		 	 = 'Neįmanoma pašalinti vartotojo';

// Email Subjects - TODO Please Translate
$lang['email_forgotten_password_subject']    = 'Pamiršto slaptažodžio patvirtinimas';
$lang['email_new_password_subject']          = 'Naujas slaptažodis';
$lang['email_activation_subject']            = 'Paskyros aktyvavimas';

?>
