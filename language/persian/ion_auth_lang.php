<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Persian
*
* Author: Rob Davarnia
*         robdvr@gmail.com
*         @robdvr
*
* Modification: Ghasem Shahabi
* 		  ghasem.shahabi@gmail.com
* 		  @GhasemShahabi
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  10.24.2012
* Modified: 11.20.2012
*
* Description:  Persian language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'حساب کاربري با موفقیت ايجاد شد';
$lang['account_creation_unsuccessful'] 	 	 = 'ايجاد حساب کاربري با شكست مواجه شد';
$lang['account_creation_duplicate_email'] 	 = 'ایمیل قبلا استفاده شده است';
$lang['account_creation_duplicate_identity'] = 'نام کاربری قبلا استفاده شده است';

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';

// Password
$lang['password_change_successful'] 	 	 = 'رمز عبور عوض شد';
$lang['password_change_unsuccessful'] 	  	 = 'تعويض رمز عبور انجام نشد';
$lang['forgot_password_successful'] 	 	 = 'ایمیل تعويض رمز عبور ارسال شد';
$lang['forgot_password_unsuccessful'] 	 	 = 'امكان تعويض رمز عبور وجود ندارد';

// Activation
$lang['activate_successful'] 		  	     = 'حساب کاربري فعال شد';
$lang['activate_unsuccessful'] 		 	     = 'امكان فعال سازي حساب کاربري وجود ندارد';
$lang['deactivate_successful'] 		  	     = 'حساب کاربري غيرفعال شد';
$lang['deactivate_unsuccessful'] 	  	     = 'امكان غيرفعال كردن حساب کاربري وجود ندارد';
$lang['activation_email_successful'] 	  	 = 'ایمیل فعال سازی فرستاده شد';
$lang['activation_email_unsuccessful']   	 = 'امكان ارسال ایمیل فعال سازی وجود ندارد';

// Login / Logout
$lang['login_successful'] 		  	         = 'ورود موفقیت آميز';
$lang['login_unsuccessful'] 		  	     = 'ورود نا موفق';
$lang['login_unsuccessful_not_active'] 		 = 'حساب کاربري غیر فعال است';
$lang['login_timeout']                       = 'حساب کاربري موقتا قفل شده است، لطفا بعدا دوباره تلاش نماييد.';
$lang['logout_successful'] 		 	         = 'خروج موفقیت آميز';

// Account Changes
$lang['update_successful'] 		 	         = 'اطلاعات حساب کاربري به روز شد';
$lang['update_unsuccessful'] 		 	     = 'اطلاعات حساب کاربري به روز نشد';
$lang['delete_successful']              	 = 'کاربر حذف شد';
$lang['delete_unsuccessful']          		 = 'امكان حذف کاربر وجود ندارد';

// Groups
$lang['group_creation_successful']  = 'گروه با موفقيت ايجاد شد';
$lang['group_already_exists']       = 'اين نام گروه قبلا استفاده شده است';
$lang['group_update_successful']    = 'جزئيات گروه با موفقيت بروز رساني شد';
$lang['group_delete_successful']    = 'گروه حذف شد';
$lang['group_delete_unsuccessful'] 	= 'امكان حذف گروه وجود ندارد';
$lang['group_delete_notallowed']    = 'Can\'t delete the administrators\' group';
$lang['group_name_required'] 		= 'Group name is a required field';
$lang['group_name_admin_not_alter'] = 'Admin group name can not be changed';

// Activation Email
$lang['email_activation_subject']            = 'فعال سازی حساب کاربري';
$lang['email_activate_heading']    = 'Activate account for %s';
$lang['email_activate_subheading'] = 'Please click this link to %s.';
$lang['email_activate_link']       = 'Activate Your Account';
// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'تایید رمز عبور جدید';
$lang['email_forgot_password_heading']    = 'Reset Password for %s';
$lang['email_forgot_password_subheading'] = 'Please click this link to %s.';
$lang['email_forgot_password_link']       = 'Reset Your Password';
// New Password Email
$lang['email_new_password_subject']          = 'رمز عبور جدید';
$lang['email_new_password_heading']    = 'New Password for %s';
$lang['email_new_password_subheading'] = 'Your password has been reset to: %s';
