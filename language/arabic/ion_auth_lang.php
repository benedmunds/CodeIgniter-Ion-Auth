<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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

// Account Creation
$lang['account_creation_successful'] 	  	 = 'تم انشاء حسابك بنجاح';
$lang['account_creation_unsuccessful'] 	 	 = 'حدث خطأ اثناء انشاء حسابك لدينا';
$lang['account_creation_duplicate_email'] 	 = 'هذا البريد الإلكترونى تم استخدامه من قبل او غير صحيح';
$lang['account_creation_duplicate_username'] 	 = 'اسم المستخدم تم التسجيل به من قبل او غير صحيح';

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';


// Password
$lang['password_change_successful'] 	 	 = 'تم تغيير كلمة السر';
$lang['password_change_unsuccessful'] 	  	 = 'لا يمكن تغيير كلمة السر';
$lang['forgot_password_successful'] 	 	 = 'تم ارسال بريد لإستعادة كلمة السر';
$lang['forgot_password_unsuccessful'] 	 	 = 'لا يمكن استعادة كلمة السر';

// Activation
$lang['activate_successful'] 		  	 = 'تم تفعيل حسابك';
$lang['activate_unsuccessful'] 		 	 = 'لا يمكن تفعيل حسابك';
$lang['deactivate_successful'] 		  	 = 'تم إيقاف حسابك';
$lang['deactivate_unsuccessful'] 	  	 = 'لا يمكن إيقاف حسابك';
$lang['activation_email_successful'] 	  	 = 'تم إرسال بريد التفعيل';
$lang['activation_email_unsuccessful']   	 = 'لا يمكن ارسال بريد التفعيل';

// Login / Logout
$lang['login_successful'] 		  	 = 'تم تسجيل الدخول بنجاح';
$lang['login_unsuccessful'] 		  	 = 'معلومات الدخول غير صحيحة';
$lang['logout_successful'] 		 	 = 'تم تسجيل خروجك';
  
// Account Changes
$lang['update_successful'] 		 	 = 'تم تعديل معلومات حسابك';
$lang['update_unsuccessful'] 		 	 = 'لا يمكن تعديل معلومات الحساب';
$lang['delete_successful'] 		 	 = 'تم إلغاء المستخدم';
$lang['delete_unsuccessful'] 		 	 = 'لا يمكن إلغاء المستخدم';

// Email Subjects - TODO Please Translate
$lang['email_forgotten_password_subject']    = 'Forgotten Password Verification';
$lang['email_new_password_subject']          = 'New Password';
$lang['email_activation_subject']            = 'Account Activation';
