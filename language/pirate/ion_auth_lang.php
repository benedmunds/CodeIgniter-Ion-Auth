<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * Every application needs to support the famous pirate language
 *
 * @author 		Yorick Peterse <info [at] yorickpeterse [dot] com>
 * @link 		http://www.yorickpeterse.com/
 * 
 */

// Account Creation
$lang['account_creation_successful'] 	  	 = 'Ahoy, Welcome Aboard Landlubber!';
$lang['account_creation_unsuccessful'] 	 	 = 'Avast, Unable to Commandeer Ship';
$lang['account_creation_duplicate_email'] 	 = 'Letter in the Bottle Already Used or Invalid';
$lang['account_creation_duplicate_username'] = 'Pirate Name Already Used or Invalid';

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';


// Password
$lang['password_change_successful'] 	 	 = 'Secret Code Successfully Changed';
$lang['password_change_unsuccessful'] 	  	 = 'Unable to Change Secret Code';
$lang['forgot_password_successful'] 	 	 = 'Secret Code Reset Letter Sent';
$lang['forgot_password_unsuccessful'] 	 	 = 'Unable to Reset Secret Code';

// Activation
$lang['activate_successful'] 		  	 	= 'Ahoy, Your Ship Be Ready For Sailing The Seven Seas';
$lang['activate_unsuccessful'] 		 	 	= 'Avast, Furner be having trouble!';
$lang['deactivate_successful'] 		  	 	= 'Furner be burned down by the Navy';
$lang['deactivate_unsuccessful'] 	  	 	= 'Shiver me timbers! Account not Deactivated';
$lang['activation_email_successful'] 	  	= 'Letter in the Bottle Sent';
$lang['activation_email_unsuccessful']   	= 'Unable to Send Letter in the Bottle';

// Login / Logout
$lang['login_successful'] 		  	 		= 'Yarr, welcome aboard!';
$lang['login_unsuccessful'] 		  	 	= 'In-Correct Secret Code';
$lang['logout_successful'] 		 	 		= 'Be Seeying ya Matey';
  
// Account Changes
$lang['update_successful'] 		 	 		= 'Ship Information Successfully Updated';
$lang['update_unsuccessful'] 		 	 	= 'Unable to Update Ship Information';
$lang['delete_successful'] 		 	 		= 'Pirate Sent to Davy Jones\' Locker';
$lang['delete_unsuccessful'] 		 	 	= 'Avast, The Pirate be Still Alive';

// Email Subjects - TODO Please Translate
$lang['email_forgotten_password_subject']    = 'Forgotten Password Verification';
$lang['email_new_password_subject']          = 'New Password';
$lang['email_activation_subject']            = 'Account Activation';