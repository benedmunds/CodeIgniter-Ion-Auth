<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds

*File Author: Shaibal Saha
* 		  sahashaibal22@gmail.com
*         @shaibal13
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.14.2010
*
* Description:  Burmese language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'အကောင့်ကိုအောင်မြင်စွာဖန်တီးပြီး';
$lang['account_creation_unsuccessful'] 	 	 = 'အကောင့်ဖန်တီးရန်မရပါ';
$lang['account_creation_duplicate_email'] 	 = 'အီးမေးလ်ရှိပြီးသားသို့မဟုတ်မမှန်ကန်သော';
$lang['account_creation_duplicate_username'] = 'အသုံးပြုပြီးသားသို့မဟုတ်မမှန်ကန်သောသုံးစွဲသူအမည်';
$lang['account_creation_missing_default_group'] = 'ပုံမှန်အုပ်စုကိုမသတ်မှတ်ပါ';
$lang['account_creation_invalid_default_group'] = 'မမှန်ကန်သောပုံသေအုပ်စုအမည်';


// Password
$lang['password_change_successful'] 	 	 = 'စကားဝှက်ကိုအောင်မြင်စွာပြောင်းလဲပြီး';
$lang['password_change_unsuccessful'] 	  	 = 'စကားဝှက်ကို ပြောင်းလဲ၍ မရပါ';
$lang['forgot_password_successful'] 	 	 = 'အီးမေးလ်ပို့ပြီးစကားဝှက်ကိုပြန်လည်သတ်မှတ်';
$lang['forgot_password_unsuccessful'] 	 	 = 'စကားဝှက်ကိုပြန်လည် သတ်မှတ်၍ မရပါ';

// Activation
$lang['activate_successful'] 		  	     = 'အကောင့် သက်ဝင်';
$lang['activate_unsuccessful'] 		 	     = 'အကောင့်ကိုဖွင့ ်၍ မရပါ';
$lang['deactivate_successful'] 		  	     = 'အကောင့်ဖျက်သိမ်းပြီး';
$lang['deactivate_unsuccessful'] 	  	     = 'အကောင့်ဖယ်ရှား။ မရပါ';
$lang['activation_email_successful'] 	  	 = 'တက်ကြွ အီးမေးလ်ပို့ပြီးပြီ';
$lang['activation_email_unsuccessful']   	 = 'မရနိုင်ပါ ပို့ပါ တက်ကြွ အီးမေးလ်';

// Login / Logout
$lang['login_successful'] 		  	         = 'လော့ဂ်အင် အောင်မြင်ပါပြီ';
$lang['login_unsuccessful'] 		  	     = 'မမှန်ကန်ပါ လော့ဂ်အင်';
$lang['login_unsuccessful_not_active'] 		 = 'အကောင့်သည်လှုပ်ရှားမှုမရှိပါ';
$lang['login_timeout']                       = 'ခေတ္တပိတ်ထား နောက်မှထပ်ကြိုးစားပါ.';
$lang['logout_successful'] 		 	         = 'အောင်မြင်စွာထွက်လိုက်ပြီ';

// Account Changes
$lang['update_successful'] 		 	         = 'အကောင့်အချက်အလက်များကိုအောင်မြင်စွာအဆင့်မြှင့်တင်';
$lang['update_unsuccessful'] 		 	     = 'အကောင့်အချက်အလက်ကိုမွမ်းမံ။ မရပါ';
$lang['delete_successful']               = 'အသုံးပြုသူဖျက်သိမ်းသည်';
$lang['delete_unsuccessful']           = 'အသုံးပြုသူကို ဖျက်၍ မရပါ';

// Groups
$lang['group_creation_successful']  = 'အုပ်စု နေပြည်တော် အောင်မြင်ပါပြီ';
$lang['group_already_exists']       = 'အုပ်စုနာမည်ပြီးသား';
$lang['group_update_successful']    = 'အဖွဲ့၏အသေးစိတ်အချက်အလက်များ';
$lang['group_delete_successful']    = 'အုပ်စုဖျက်ပြီးပါပြီ';
$lang['group_delete_unsuccessful'] 	= 'အုပ်စုအား ဖျက်၍ မရပါ';
$lang['group_delete_notallowed']    = 'အုပ်ချုပ်သူများ၏အဖွဲ့ကိုမဖျက်နိုင်ပါ';
$lang['group_name_required'] 		= 'အုပ်စုအမည်သည်ဖြည့်ရန်လိုအပ်သည်';
$lang['group_name_admin_not_alter'] = 'အက်မင်အုပ်စုအမည်ကို ပြောင်းလဲ၍ မရပါ';

// Activation Email
$lang['email_activation_subject']            = 'အကောင့် Activation';
$lang['email_activate_heading']    = 'အကောင့်ဖွင့်ပါ %s';
$lang['email_activate_subheading'] = 'ကျေးဇူးပြုပြီးဒီ link ကိုနှိပ်ပါ %s.';
$lang['email_activate_link']       = 'သင်၏အကောင့်ကိုဖွင့်ပါ';

// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'လျှို့ဝှက်နံပါတ်မေ့နေခြင်း';
$lang['email_forgot_password_heading']    = 'စကားဝှက်ကိုပြန်လည်သတ်မှတ်ပါ %s';
$lang['email_forgot_password_subheading'] = 'ကျေးဇူးပြုပြီးဒီ link ကိုနှိပ်ပါ %s.';
$lang['email_forgot_password_link']       = 'သင်၏စကားဝှက်ကိုပြန်လည်သတ်မှတ်ပါ';

// New Password Email
$lang['email_new_password_subject']          = 'စကားဝှကိအသစ်';
$lang['email_new_password_heading']    = 'စကားဝှက်အသစ် %s';
$lang['email_new_password_subheading'] = 'သင်၏စကားဝှက်ကိုပြန်လည်သတ်မှတ်ပြီးဖြစ်သည်: %s';
