<?php
/**
 *
 * Every application needs to support the famous pirate language
 *
 * @author 		Yorick Peterse <info [at] yorickpeterse [dot] com>
 * @link 		http://www.yorickpeterse.com/
 *
 */

 return [
	// Account Creation
	'account_creation_successful' 	  	 => 'Ahoy, Welcome Aboard Landlubber!',
	'account_creation_unsuccessful' 	 	 => 'Avast, Unable to Commandeer Ship',
	'account_creation_duplicate_email' 	 => 'Letter in the Bottle Already Used or Invalid',
	'account_creation_duplicate_identity' => 'Pirate Name Already Used or Invalid',

	// TODO Please Translate
	'account_creation_missing_default_group' => 'Default group is not set',
	'account_creation_invalid_default_group' => 'Invalid default group name set',


	// Password
	'password_change_successful' 	 	 => 'Secret Code Successfully Changed',
	'password_change_unsuccessful' 	  	 => 'Unable to Change Secret Code',
	'forgot_password_successful' 	 	 => 'Secret Code Reset Letter Sent',
	'forgot_password_unsuccessful' 	 	 => 'Unable to Reset Secret Code',

	// Activation
	'activate_successful' 		  	 	=> 'Ahoy, Your Ship Be Ready For Sailing The Seven Seas',
	'activate_unsuccessful' 		 	 	=> 'Avast, Furner be having trouble!',
	'deactivate_successful' 		  	 	=> 'Furner be burned down by the Navy',
	'deactivate_unsuccessful' 	  	 	=> 'Shiver me timbers! Account not Deactivated',
	'activation_email_successful' 	  	=> 'Letter in the Bottle Sent',
	'activation_email_unsuccessful'   	=> 'Unable to Send Letter in the Bottle',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful' 		  	 		=> 'Yarr, welcome aboard!',
	'login_unsuccessful' 		  	 	=> 'In-Correct Secret Code',
	'login_unsuccessful_not_active' 		 => 'Account is inactive',
	'login_timeout'                       => 'Temporarily Locked Out.  Try again later.',
	'logout_successful' 		 	 		=> 'Be Seeying ya Matey',

	// Account Changes
	'update_successful' 		 	 		=> 'Ship Information Successfully Updated',
	'update_unsuccessful' 		 	 	=> 'Unable to Update Ship Information',
	'delete_successful' 		 	 		=> 'Pirate Sent to Davy Jones\' Locker',
	'delete_unsuccessful' 		 	 	=> 'Avast, The Pirate be Still Alive',

	// Groups
	'group_creation_successful'  => 'Group created Successfully',
	'group_already_exists'       => 'Group name already taken',
	'group_update_successful'    => 'Group details updated',
	'group_delete_successful'    => 'Group deleted',
	'group_delete_unsuccessful' 	=> 'Unable to delete group',
	'group_delete_notallowed'    => 'Can\'t delete the administrators\' group',
	'group_name_required' 		=> 'Group name is a required field',
	'group_name_admin_not_alter' => 'Admin group name can not be changed',

	// Activation Email
	'email_activation_subject'            => 'Account Activation',
	'email_activate_heading'    => 'Activate account for %s',
	'email_activate_subheading' => 'Please click this link to %s.',
	'email_activate_link'       => 'Activate Your Account',
	// Forgot Password Email
	'email_forgotten_password_subject'    => 'Forgotten Password Verification',
	'email_forgot_password_heading'    => 'Reset Password for %s',
	'email_forgot_password_subheading' => 'Please click this link to %s.',
	'email_forgot_password_link'       => 'Reset Your Password',
 ];
