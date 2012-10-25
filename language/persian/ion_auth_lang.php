<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Persian
*
* Author: Rob Davarnia
* 		  robdvr@gmail.com
*         @robdvr
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  10.24.2012
*
* Description:  Persian language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'کاربر با موفقیت ساخته شد';
$lang['account_creation_unsuccessful'] 	 	 = 'کاربر با موفقیت ساخته نشد';
$lang['account_creation_duplicate_email'] 	 = 'ایمیل در حال استفاده است';
$lang['account_creation_duplicate_username'] = 'نام کاربری در حال استفاده است';

// Password
$lang['password_change_successful'] 	 	 = 'رمز عبور عوض شد';
$lang['password_change_unsuccessful'] 	  	 = 'رمز عبور عوض نشد';
$lang['forgot_password_successful'] 	 	 = 'ایمیل برای رمز جدید فرستاده شد';
$lang['forgot_password_unsuccessful'] 	 	 = 'ایمیل برای رمز جدید فرستاده نشد';

// Activation
$lang['activate_successful'] 		  	     = 'کاربر فعال شد';
$lang['activate_unsuccessful'] 		 	     = 'کاربر فعال نشد';
$lang['deactivate_successful'] 		  	     = 'کاربر غیر فعال شد';
$lang['deactivate_unsuccessful'] 	  	     = 'کاربر غیر فعال نشد';
$lang['activation_email_successful'] 	  	 = 'ایمیل فعال سازی فرستاده شد';
$lang['activation_email_unsuccessful']   	 = 'ایمیل فعال سازی فرستاده نشد';

// Login / Logout
$lang['login_successful'] 		  	         = 'ورود با موفقیت';
$lang['login_unsuccessful'] 		  	     = 'ورود نا موفق';
$lang['login_unsuccessful_not_active'] 		 = 'کاربر غیر فعال است';
$lang['login_timeout']                       = 'کاربر قفل است';
$lang['logout_successful'] 		 	         = 'خروج با موفقیت';

// Account Changes
$lang['update_successful'] 		 	         = 'اطلاعات کاربر به روز شد';
$lang['update_unsuccessful'] 		 	     = 'اطلاعات کاربر به روز نشد';
$lang['delete_successful']              	 = 'کاربر حذف شد';
$lang['delete_unsuccessful']          		 = 'کاربر حذف نشد';

// Groups
$lang['group_creation_successful']  = 'گروه حذف شد';
$lang['group_already_exists']       = 'گروه در حال استفاده است';
$lang['group_update_successful']    = 'گروه حذف شد';
$lang['group_delete_successful']    = 'گروه پاک شد';
$lang['group_delete_unsuccessful'] 	= 'گروه پاک نشد';

// Email Subjects
$lang['email_forgotten_password_subject']    = 'تایید رمز عبور جدید';
$lang['email_new_password_subject']          = 'رمز جدید';
$lang['email_activation_subject']            = 'فعال سازی کاربر';