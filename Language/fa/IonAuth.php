<?php
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
* Modification: pBeez
* 		  @pbeez
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  10.24.2012
* Modified: 01.01.2017
*
* Description:  Persian language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful' 	  	 => 'حساب کاربري با موفقیت ايجاد شد',
	'account_creation_unsuccessful' 	 	 => 'ايجاد حساب کاربري با شكست مواجه شد',
	'account_creation_duplicate_email' 	 => 'ایمیل قبلا استفاده شده است',
	'account_creation_duplicate_identity' => 'نام کاربری قبلا استفاده شده است',

	// TODO Please Translate
	'account_creation_missing_defaultGroup' => 'گروه پیش فرض ذخیره نشده است',
	'account_creation_invalid_defaultGroup' => 'گروه پیشفرض نامعتبر است',

	// Password
	'password_change_successful' 	 	 => 'رمز عبور عوض شد',
	'password_change_unsuccessful' 	  	 => 'تعويض رمز عبور انجام نشد',
	'forgot_password_successful' 	 	 => 'ایمیل تعويض رمز عبور ارسال شد',
	'forgot_password_unsuccessful' 	 	 => 'امكان تعويض رمز عبور وجود ندارد',

	// Activation
	'activate_successful' 		  	     => 'حساب کاربري فعال شد',
	'activate_unsuccessful' 		 	     => 'امكان فعال سازي حساب کاربري وجود ندارد',
	'deactivate_successful' 		  	     => 'حساب کاربري غيرفعال شد',
	'deactivate_unsuccessful' 	  	     => 'امكان غيرفعال كردن حساب کاربري وجود ندارد',
	'activation_email_successful' 	  	 => 'ایمیل فعال سازی فرستاده شد',
	'activation_email_unsuccessful'   	 => 'امكان ارسال ایمیل فعال سازی وجود ندارد',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful' 		  	         => 'ورود موفقیت آميز',
	'login_unsuccessful' 		  	     => 'ورود نا موفق',
	'login_unsuccessful_not_active' 		 => 'حساب کاربري غیر فعال است',
	'login_timeout'                       => 'حساب کاربري موقتا قفل شده است، لطفا بعدا دوباره تلاش نماييد.',
	'logout_successful' 		 	         => 'خروج موفقیت آميز',

	// Account Changes
	'update_successful' 		 	         => 'اطلاعات حساب کاربري به روز شد',
	'update_unsuccessful' 		 	     => 'اطلاعات حساب کاربري به روز نشد',
	'delete_successful'              	 => 'کاربر حذف شد',
	'delete_unsuccessful'          		 => 'امكان حذف کاربر وجود ندارد',

	// Groups
	'group_creation_successful'  => 'گروه با موفقيت ايجاد شد',
	'group_already_exists'       => 'اين نام گروه قبلا استفاده شده است',
	'group_update_successful'    => 'جزئيات گروه با موفقيت بروز رساني شد',
	'group_delete_successful'    => 'گروه حذف شد',
	'group_delete_unsuccessful' 	=> 'امكان حذف گروه وجود ندارد',
	'group_delete_notallowed'    => 'نمیتوان گروه مدیریت را پاک کرد',
	'group_name_required' 		=> 'نام گروه لازم است',
	'group_name_admin_not_alter' => 'نام گروه ادمین را نمیتوان تغییر داد',

	// Activation Email
	'emailActivation_subject'            => 'فعال سازی حساب کاربري',
	'emailActivate_heading'    => 'فعال سازی اکانت %s',
	'emailActivate_subheading' => 'لطفا روی این لینک کلیک کنید: %s',
	'emailActivate_link'       => 'فعال سازی اکانت',
	// Forgot Password Email
	'email_forgotten_password_subject'    => 'تایید رمز عبور جدید',
	'emailForgotPassword_heading'    => 'بازیابی کلمه عبور برای %s',
	'emailForgotPassword_subheading' => 'لطفا روی این لینک کلیک کنید: %s',
	'emailForgotPassword_link'       => 'کلمه عبور خود را بازیابی کنید',
];
