<?php
/**
 * Name:  Ion Auth Lang - Arabic
 *
 * Author: Emad Elsaid
 * 		  blazeeboy@gmail.com
 *
 * Location: http://github.com/benedmunds/ion_auth/
 *
 * Created:  30.08.2010
 *
 * Description:  Arabic language file for Ion Auth messages and errors
 *
 */

 return [
	// Account Creation
	'account_creation_successful'            => 'تم انشاء حسابك بنجاح',
	'account_creation_unsuccessful'          => 'حدث خطأ اثناء انشاء حسابك لدينا',
	'account_creation_duplicate_email' 	    => 'هذا البريد الإلكترونى تم استخدامه من قبل او غير صحيح',
	'account_creation_duplicate_identity'    => 'اسم المستخدم تم التسجيل به من قبل او غير صحيح',
	'account_creation_missing_defaultGroup' => 'Default group is not set',
	'account_creation_invalid_defaultGroup' => 'Invalid default group name set',

	// Password
	'password_change_successful'   => 'تم تغيير كلمة السر',
	'password_change_unsuccessful' => 'لا يمكن تغيير كلمة السر',
	'forgot_password_successful'   => 'تم ارسال بريد لإستعادة كلمة السر',
	'forgot_password_unsuccessful' => 'لا يمكن استعادة كلمة السر',

	// Activation
	'activate_successful'            => 'تم تفعيل حسابك',
	'activate_unsuccessful'          => 'لا يمكن تفعيل حسابك',
	'deactivate_successful'          => 'تم إيقاف حسابك',
	'deactivate_unsuccessful'        => 'لا يمكن إيقاف حسابك',
	'activation_email_successful'    => 'تم إرسال بريد التفعيل',
	'activation_email_unsuccessful'  => 'لا يمكن ارسال بريد التفعيل',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful'             => 'تم تسجيل الدخول بنجاح',
	'login_unsuccessful'           => 'معلومات الدخول غير صحيحة',
	'login_unsuccessful_not_active'=> 'Account is inactive',
	'login_timeout'                => 'Temporarily Locked Out.  Try again later.',
	'logout_successful'            => 'تم تسجيل خروجك',

	// Account Changes
	'update_successful' 		 	 => 'تم تعديل معلومات حسابك',
	'update_unsuccessful' 		 	 => 'لا يمكن تعديل معلومات الحساب',
	'delete_successful' 		 	 => 'تم إلغاء المستخدم',
	'delete_unsuccessful' 		 	 => 'لا يمكن إلغاء المستخدم',

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
	'emailActivation_subject'            => 'Account Activation',
	'emailActivate_heading'    => 'Activate account for %s',
	'emailActivate_subheading' => 'Please click this link to %s.',
	'emailActivate_link'       => 'Activate Your Account',
	// Forgot Password Email
	'email_forgotten_password_subject'    => 'Forgotten Password Verification',
	'emailForgotPassword_heading'    => 'Reset Password for %s',
	'emailForgotPassword_subheading' => 'Please click this link to %s.',
	'emailForgotPassword_link'       => 'Reset Your Password',
 ];
