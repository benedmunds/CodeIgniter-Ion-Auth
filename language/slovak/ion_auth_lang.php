<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Slovak
*
* Author: Kristián Feldsam
* 		  kristian@feldsam.cz
*
*
* Created:  11.05.2012
*
* Description:  Slovak language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'Účet bol úspešne vytvorený';
$lang['account_creation_unsuccessful'] 	 	 = 'Nie je možné vytvoriť účet';
$lang['account_creation_duplicate_email'] 	 = 'E-mail už existuje alebo je neplatný';
$lang['account_creation_duplicate_username'] = 'Užívateľské meno už existuje alebo je neplatné';

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';

// Password
$lang['password_change_successful'] 	 	 = 'Heslo bolo úspešne zmenené';
$lang['password_change_unsuccessful'] 	  	 = 'Nie je možné zmeniť heslo';
$lang['forgot_password_successful'] 	 	 = 'Heslo bolo odoslané na e-mail';
$lang['forgot_password_unsuccessful'] 	 	 = 'Nie je možné obnoviť heslo';

// Activation
$lang['activate_successful'] 		  	     = 'Účet bol aktivovaný';
$lang['activate_unsuccessful'] 		 	     = 'Nie je možné aktivovať účet';
$lang['deactivate_successful'] 		  	     = 'Účet bol deaktivovaný';
$lang['deactivate_unsuccessful'] 	  	     = 'Nie je možné deaktivovať účet';
$lang['activation_email_successful'] 	  	 = 'Aktivačný e-mail bol odoslaný';
$lang['activation_email_unsuccessful']   	 = 'Nedá sa odoslať aktivačný e-mail';

// Login / Logout
$lang['login_successful'] 		  	         = 'Úspešne prihlásený';
$lang['login_unsuccessful'] 		  	     = 'Nesprávny e-mail alebo heslo';
$lang['login_unsuccessful_not_active'] 		 = 'Účet je neaktívny';
$lang['login_timeout']                       = 'Temporarily Locked Out.  Try again later.';
$lang['logout_successful'] 		 	         = 'Úspešné odhlásenie';

// Account Changes
$lang['update_successful'] 		 	         = 'Informácie o účte boli úspešne aktualizované';
$lang['update_unsuccessful'] 		 	     = 'Informácie o účte sa nedájú aktualizovať';
$lang['delete_successful'] 		 	         = 'Užívateľ bol zmazaný';
$lang['delete_unsuccessful'] 		 	     = 'Užívateľ sa nedá zmazať ';

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
$lang['email_activation_subject']            = 'Account Activation';
$lang['email_activate_heading']    = 'Activate account for %s';
$lang['email_activate_subheading'] = 'Please click this link to %s.';
$lang['email_activate_link']       = 'Activate Your Account';
// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Forgotten Password Verification';
$lang['email_forgot_password_heading']    = 'Reset Password for %s';
$lang['email_forgot_password_subheading'] = 'Please click this link to %s.';
$lang['email_forgot_password_link']       = 'Reset Your Password';
// New Password Email
$lang['email_new_password_subject']          = 'New Password';
$lang['email_new_password_heading']    = 'New Password for %s';
$lang['email_new_password_subheading'] = 'Your password has been reset to: %s';
