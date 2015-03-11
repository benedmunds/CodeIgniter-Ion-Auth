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
$lang['login_unsuccessful_not_active'] 		 = 'Account is inactive';
$lang['login_timeout']                       = 'Temporarily Locked Out. Try again later.';
$lang['logout_successful'] 		 	 = 'Atsijungta sėkminga';

// Account Changes
$lang['update_successful'] 		 	 = 'Vartotojo duomenys sėkmingai pakeisti';
$lang['update_unsuccessful'] 		 	 = 'Neįmanoma pakeisti vartotojo duoemnų';
$lang['delete_successful'] 		 	 = 'Vartotojas pašalintas';
$lang['delete_unsuccessful'] 		 	 = 'Neįmanoma pašalinti vartotojo';

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
$lang['email_activation_subject']            = 'Paskyros aktyvavimas';
$lang['email_activate_heading']    = 'Activate account for %s';
$lang['email_activate_subheading'] = 'Please click this link to %s.';
$lang['email_activate_link']       = 'Activate Your Account';
// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Pamiršto slaptažodžio patvirtinimas';
$lang['email_forgot_password_heading']    = 'Reset Password for %s';
$lang['email_forgot_password_subheading'] = 'Please click this link to %s.';
$lang['email_forgot_password_link']       = 'Reset Your Password';
// New Password Email
$lang['email_new_password_subject']          = 'Naujas slaptažodis';
$lang['email_new_password_heading']    = 'New Password for %s';
$lang['email_new_password_subheading'] = 'Your password has been reset to: %s';
