<?php
/**
* Name:  Ion Auth Lang - Greek
*
* Author: Vagelis Papaloukas
* 		  vagelispapalou@yahoo.gr
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  02.04.2011
*
* Description:  Greek language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful' 	  	 => 'Ο Λογαριασμός Δημιουργήθηκε Επιτυχώς',
	'account_creation_unsuccessful' 	 	 => 'Αποτυχία Δημιουργίας Λογαριασμού',
	'account_creation_duplicate_email' 	 => 'Το Email χρησιμποιείται ήδη ή είναι λάθος',
	'account_creation_duplicate_identity' 	 => 'Ο Χρήστης υπάρχει ήδη ή είναι λάθος',

	// TODO Please Translate
	'account_creation_missing_default_group' => 'Default group is not set',
	'account_creation_invalid_default_group' => 'Invalid default group name set',


	// Password
	'password_change_successful' 	 	 => 'Επιτυχής Αλλαγή Κωδικού',
	'password_change_unsuccessful' 	  	 => 'Αδυναμία Αλλαγής Κωδικού',
	'forgot_password_successful' 	 	 => 'Εστάλη Email Κωδικού Επαναφοράς',
	'forgot_password_unsuccessful' 	 	 => 'Αδυναμία Επαναφοράς Κωδικού',

	// Activation
	'activate_successful' 		  	 => 'Ο Λογαριασμός Ενεργοποιήθηκε',
	'activate_unsuccessful' 		 	 => 'Αδυναμία Ενεργοποίησης Λογαριασμού',
	'deactivate_successful' 		  	 => 'Ο Λογαριασμός Απενεργοποιήθηκε',
	'deactivate_unsuccessful' 	  	 => 'Αδυναμία Απενεργοποίησης Λογαριασμού',
	'activation_email_successful' 	  	 => 'Εστάλη Email Ενεργοποίησης Λογαριασμού',
	'activation_email_unsuccessful'   	 => 'Αδυναμία Αποστολής Email Ενεργοποίησης',

	// Login / Logout
	'login_successful' 		  	 => 'Συνδεθήκατε Επιτυχώς',
	'login_unsuccessful' 		  	 => 'Λάθος Στοιχεία',
	'login_unsuccessful_not_active' 		 => 'Account is inactive',
	'login_timeout'                       => 'Temporarily Locked Out.  Try again later.',
	'logout_successful' 		 	 => 'Αποσυνδεθήκατε Επιτυχώς',

	// Account Changes
	'update_successful' 		 	 => 'Οι Πληροφορίες του Λογαριασμού Ενημερώθηκαν Επιτυχώς',
	'update_unsuccessful' 		 	 => 'Αδυναμία Ενημέρωσης Πληροφοριών Λογαριασμού',
	'delete_successful' 		 	 => 'Ο Χρήστης Διαγράφηκε',
	'delete_unsuccessful' 		 	 => 'Αδυναμία Διαγραφής Χρήστη',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

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
