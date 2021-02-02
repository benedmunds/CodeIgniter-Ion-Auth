<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - Burmese
*
* 
 Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan

*File Author: Shaibal Saha
* 		  sahashaibal22@gmail.com
*         @shaibal13
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  Burmese language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'ဤပုံစံစာပို့သည်ကျွန်ုပ်တို့၏လုံခြုံရေးစစ်ဆေးမှုများကိုမအောင်မြင်ခဲ့ပါ.';

// Login
$lang['login_heading']         = 'လော့ဂ်အင်';
$lang['login_subheading']      = 'ကျေးဇူးပြု၍ သင်၏အီးမေးလ်၊ အသုံးပြုသူအမည်နှင့်လျှို့ဝှက်နံပါတ်တို့ဖြင့်ဝင်ပါ။';
$lang['login_identity_label']  = 'အီးမေးလ် / အသုံးပြုသူ:';
$lang['login_password_label']  = 'စကားဝှက်:';
$lang['login_remember_label']  = 'ငါ့ကိုသတိရပါ:';
$lang['login_submit_btn']      = 'လော့ဂ်အင်';
$lang['login_forgot_password'] = 'သင့်လျို့ဝှက်စာလုံးကိုမေ့နေပါသလား?';

// Index
$lang['index_heading']           = 'အသုံးပြုသူများ';
$lang['index_subheading']        = 'အောက်တွင်အသုံးပြုသူများ၏စာရင်းဖြစ်သည်.';
$lang['index_fname_th']          = 'နာမည်';
$lang['index_lname_th']          = 'မျိုးနွယ်အမည်';
$lang['index_email_th']          = 'အီးမေးလ်';
$lang['index_groups_th']         = 'အဖွဲ့များ';
$lang['index_status_th']         = 'အခြေအနေ';
$lang['index_action_th']         = 'လှုပ်ရှားမှု';
$lang['index_active_link']       = 'တက်ကြွ';
$lang['index_inactive_link']     = 'မလှုပ်မရှား';
$lang['index_create_user_link']  = 'အသုံးပြုသူအသစ်ဖန်တီးပါ';
$lang['index_create_group_link'] = 'အုပ်စုအသစ်တစ်ခုဖန်တီးပါ';

// Deactivate User
$lang['deactivate_heading']                  = 'အသုံးပြုသူအားပိတ်ထားပါ';
$lang['deactivate_subheading']               = 'သငျသညျအသုံးပြုသူကိုပိတ်ထားချင်သေချာလား \'%s\'';
$lang['deactivate_confirm_y_label']          = 'ဟုတ်တယ်:';
$lang['deactivate_confirm_n_label']          = 'မဟုတ်ဘူး:';
$lang['deactivate_submit_btn']               = 'တင်သွင်းပါ';
$lang['deactivate_validation_confirm_label'] = 'အတည်ပြုချက်';
$lang['deactivate_validation_user_id_label'] = 'သုံးစွဲသူအိုင်ဒီ';

// Create User
$lang['create_user_heading']                           = 'အသုံးပြုသူဖန်တီးပါ';
$lang['create_user_subheading']                        = 'ကျေးဇူးပြု၍ အသုံးပြုသူ၏အချက်အလက်များကိုဖြည့်ပါ.';
$lang['create_user_fname_label']                       = 'နာမည်:';
$lang['create_user_lname_label']                       = 'မျိုးနွယ်အမည်:';
$lang['create_user_company_label']                     = 'ကုမ္ပဏီအမည်:';
$lang['create_user_email_label']                       = 'အီးမေးလ်:';
$lang['create_user_phone_label']                       = 'ဖုန်း:';
$lang['create_user_password_label']                    = 'စကားဝှက်:';
$lang['create_user_password_confirm_label']            = 'စကားဝှက်ကိုအတည်ပြုပါ:';
$lang['create_user_submit_btn']                        = 'အသုံးပြုသူဖန်တီးပါ';
$lang['create_user_validation_fname_label']            = 'နာမည်';
$lang['create_user_validation_lname_label']            = 'မျိုးနွယ်အမည်';
$lang['create_user_validation_email_label']            = 'အီးမေးလိပ်စာ';
$lang['create_user_validation_phone1_label']           = 'ဖုန်း၏ပထမအပိုင်း';
$lang['create_user_validation_phone2_label']           = 'ဖုန်း၏ဒုတိယအပိုင်း';
$lang['create_user_validation_phone3_label']           = 'ဖုန်း၏တတိယအပိုင်း';
$lang['create_user_validation_company_label']          = 'ကုမ္ပဏီအမည်';
$lang['create_user_validation_password_label']         = 'စကားဝှက်';
$lang['create_user_validation_password_confirm_label'] = 'စကားဝှက်အတည်ပြုချက်';

// Edit User
$lang['edit_user_heading']                           = 'အသုံးပြုသူကိုတည်းဖြတ်ပါ';
$lang['edit_user_subheading']                        = 'ကျေးဇူးပြု၍ အသုံးပြုသူ၏အချက်အလက်များကိုဖြည့်ပါ.';
$lang['edit_user_fname_label']                       = 'နာမည်:';
$lang['edit_user_lname_label']                       = 'မျိုးနွယ်အမည်:';
$lang['edit_user_company_label']                     = 'ကုမ္ပဏီအမည်:';
$lang['edit_user_email_label']                       = 'အီးမေးလ်:';
$lang['edit_user_phone_label']                       = 'ဖုန်း:';
$lang['edit_user_password_label']                    = 'စကားဝှက်: (စကားဝှက်ကိုပြောင်းလဲလိုက်လျှင်)';
$lang['edit_user_password_confirm_label']            = 'စကားဝှက်ကိုအတည်ပြုပါ။';
$lang['edit_user_groups_heading']                    = 'အဖွဲ့ ၀ င်';
$lang['edit_user_submit_btn']                        = 'အသုံးပြုသူကိုသိမ်းပါ';
$lang['edit_user_validation_fname_label']            = 'နာမည်';
$lang['edit_user_validation_lname_label']            = 'မျိုးနွယ်အမည်';
$lang['edit_user_validation_email_label']            = 'အီးမေးလိပ်စာ';
$lang['edit_user_validation_phone1_label']           = 'ဖုန်း၏ပထမအပိုင်း';
$lang['edit_user_validation_phone2_label']           = 'ဖုန်း၏ဒုတိယအပိုင်း';
$lang['edit_user_validation_phone3_label']           = 'ဖုန်း၏တတိယအပိုင်း';
$lang['edit_user_validation_company_label']          = 'ကုမ္ပဏီအမည်';
$lang['edit_user_validation_groups_label']           = 'အဖွဲ့များ';
$lang['edit_user_validation_password_label']         = 'စကားဝှက်';
$lang['edit_user_validation_password_confirm_label'] = 'စကားဝှက်အတည်ပြုချက်';

// Create Group
$lang['create_group_title']                  = 'အုပ်စုဖွဲ့ပါ';
$lang['create_group_heading']                = 'အုပ်စုဖွဲ့ပါ';
$lang['create_group_subheading']             = 'ကျေးဇူးပြု၍ အောက်ဖော်ပြပါအုပ်စုသတင်းအချက်အလက်များကိုဖြည့်ပါ.';
$lang['create_group_name_label']             = 'အဖွဲ့နာမည်:';
$lang['create_group_desc_label']             = 'ဖော်ပြချက်:';
$lang['create_group_submit_btn']             = 'အုပ်စုဖွဲ့ပါ';
$lang['create_group_validation_name_label']  = 'အဖွဲ့နာမည်';
$lang['create_group_validation_desc_label']  = 'ဖော်ပြချက်';

// Edit Group
$lang['edit_group_title']                  = 'အုပ်စုဖွဲ့တည်းဖြတ်ပါ';
$lang['edit_group_saved']                  = 'သိမ်းဆည်းထားသည့်အဖွဲ့';
$lang['edit_group_heading']                = 'အုပ်စုဖွဲ့တည်းဖြတ်ပါ';
$lang['edit_group_subheading']             = 'ကျေးဇူးပြု၍ အောက်ဖော်ပြပါအုပ်စုသတင်းအချက်အလက်များကိုဖြည့်ပါ.';
$lang['edit_group_name_label']             = 'အဖွဲ့နာမည်:';
$lang['edit_group_desc_label']             = 'ဖော်ပြချက်:';
$lang['edit_group_submit_btn']             = 'အဖွဲ့ကိုသိမ်းဆည်းပါ';
$lang['edit_group_validation_name_label']  = 'အဖွဲ့နာမည်';
$lang['edit_group_validation_desc_label']  = 'ဖော်ပြချက်';

// Change Password
$lang['change_password_heading']                               = 'စကားဝှက်ကိုပြောင်းရန်';
$lang['change_password_old_password_label']                    = 'စကားဝှက်အဟောင်း:';
$lang['change_password_new_password_label']                    = 'စကားဝှက်အသစ် (အနည်းဆုံး% s အက္ခရာများ):';
$lang['change_password_new_password_confirm_label']            = 'စကားဝှက်အသစ်ကိုအတည်ပြုပါ:';
$lang['change_password_submit_btn']                            = 'ပြောင်းလဲမှု';
$lang['change_password_validation_old_password_label']         = 'စကားဝှက်အဟောင်း';
$lang['change_password_validation_new_password_label']         = 'စကားဝှကိအသစ်';
$lang['change_password_validation_new_password_confirm_label'] = 'စကားဝှက်အသစ်ကိုအတည်ပြုပါ';

// Forgot Password
$lang['forgot_password_heading']                 = 'စကားဝှက်ကိုမေ့နေပါသလား';
$lang['forgot_password_subheading']              = 'သင်၏% s ကိုဖြည့်စွက်ပါ၊ သို့မှသာသင်၏စကားဝှက်ကိုပြန်လည်သတ်မှတ်ရန်သင့်အားအီးမေးလ်တစ်စောင်ပို့နိုင်မည်။';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'တင်သွင်းပါ';
$lang['forgot_password_validation_email_label']  = 'အီးမေးလိပ်စာ';
$lang['forgot_password_username_identity_label'] = 'အသုံးပြုသူအမည်';
$lang['forgot_password_email_identity_label']    = 'အီးမေးလ်';
$lang['forgot_password_email_not_found']         = 'ဒီအီးမေးလ်လိပ်စာကိုမှတ်တမ်းမရှိပါ.';

// Reset Password
$lang['reset_password_heading']                               = 'စကားဝှက်ကိုပြောင်းရန်';
$lang['reset_password_new_password_label']                    = 'စကားဝှက်အသစ် (အနည်းဆုံး% s အက္ခရာများ):';
$lang['reset_password_new_password_confirm_label']            = 'စကားဝှက်အသစ်ကိုအတည်ပြုပါ:';
$lang['reset_password_submit_btn']                            = 'ပြောင်းလဲမ';
$lang['reset_password_validation_new_password_label']         = 'စကားဝှကိအသစ်';
$lang['reset_password_validation_new_password_confirm_label'] = 'စကားဝှက်အသစ်ကိုအတည်ပြုပါ';
