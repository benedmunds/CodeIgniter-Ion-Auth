<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - Bengali
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
*
* Author: Arifur Rahman
*         @arif2009
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  25.03.2018
*
* Description:  Bengali language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'এই ফর্মের ডাটা নিরাপদ নহে, এটি আমাদের নিরাপত্তা সংক্রান্ত শর্তগুলো পূরণ করতে পারেনি।';

// Login
$lang['login_heading']         = 'প্রবেশ করুন';
$lang['login_subheading']      = 'দয়াকরে আপনার ইমেইল / ব্যবহারকারী নাম এবং পাসওয়ার্ড দিয়ে লগইন করুন।';
$lang['login_identity_label']  = 'ইমেইল/ব্যবহারকারী নাম ঃ';
$lang['login_password_label']  = 'পাসওয়ার্ড ঃ';
$lang['login_remember_label']  = 'মনে রাখবেন';
$lang['login_submit_btn']      = 'লগইন';
$lang['login_forgot_password'] = 'আপনি কি পাসওয়ার্ড ভুলে গেছেন?';

// Index
$lang['index_heading']           = 'ব্যবহারকারীগন';
$lang['index_subheading']        = 'নীচে ব্যবহারকারীদের তালিকা।';
$lang['index_fname_th']          = 'নামের প্রথম অংশ';
$lang['index_lname_th']          = 'নামের দ্বিতীয় অংশ';
$lang['index_email_th']          = 'ই-মেইল';
$lang['index_groups_th']         = 'গ্রূপ/দল';
$lang['index_status_th']         = 'অ্যাকাউন্টের অবস্থা';
$lang['index_action_th']         = 'কার্য';
$lang['index_active_link']       = 'সক্রিয়';
$lang['index_inactive_link']     = 'নিষ্ক্রিয়';
$lang['index_create_user_link']  = 'একটি নতুন ব্যবহারকারী তৈরি করুন';
$lang['index_create_group_link'] = 'একটি নতুন গ্রূপ/দল তৈরি করুন';

// Deactivate User
$lang['deactivate_heading']                  = 'ব্যবহারকারী নিষ্ক্রিয়করন';
$lang['deactivate_subheading']               = '\'%s\' এই ব্যবহারকারীকে আপনি কি আসলেই নিষ্ক্রিয় করতে চান';
$lang['deactivate_confirm_y_label']          = 'হাঁ';
$lang['deactivate_confirm_n_label']          = 'না';
$lang['deactivate_submit_btn']               = 'সম্পূর্ণ করুন';
$lang['deactivate_validation_confirm_label'] = 'অনুমোদন';
$lang['deactivate_validation_user_id_label'] = 'ব্যবহারকারীর ক্রমিক নং';

// Create User
$lang['create_user_heading']                           = 'নতুন ব্যবহারকারী তৈরি প্রক্রিয়া';
$lang['create_user_subheading']                        = 'দয়া করে নীচে ব্যবহারকারী সংক্রান্ত তথ্য গুলি পূরণ করুন।';
$lang['create_user_fname_label']                       = 'নামের প্রথম অংশঃ';
$lang['create_user_lname_label']                       = 'নামের দ্বিতীয় অংশঃ';
$lang['create_user_company_label']                     = 'কম্পানির নামঃ';
$lang['create_user_identity_label']                    = 'আইডেন্টিটিঃ';
$lang['create_user_email_label']                       = 'ই-মেইলঃ';
$lang['create_user_phone_label']                       = 'টেলিফোনঃ';
$lang['create_user_password_label']                    = 'পাসওয়ার্ডঃ';
$lang['create_user_password_confirm_label']            = 'পুনরায় পাসওয়ার্ডটি দিনঃ';
$lang['create_user_submit_btn']                        = 'ব্যবহারকারী তৈরি করুন';
$lang['create_user_validation_fname_label']            = 'নামের প্রথম অংশ';
$lang['create_user_validation_lname_label']            = 'নামের দ্বিতীয় অংশ';
$lang['create_user_validation_identity_label']         = 'আইডেন্টিটি';
$lang['create_user_validation_email_label']            = 'ই-মেইল';
$lang['create_user_validation_phone_label']            = 'টেলিফোন';
$lang['create_user_validation_company_label']          = 'কোম্পানি নাম';
$lang['create_user_validation_password_label']         = 'পাসওয়ার্ড';
$lang['create_user_validation_password_confirm_label'] = 'পুন: পাসওয়ার্ড';

// Edit User
$lang['edit_user_heading']                           = 'ব্যবহারকারীর তথ্য হালনাগাদ করুন';
$lang['edit_user_subheading']                        = 'দয়া করে ব্যবহারকারীর নিম্নের তথ্যগুলো সম্পূর্ণ করুন।';
$lang['edit_user_fname_label']                       = 'নামের প্রথম অংশঃ';
$lang['edit_user_lname_label']                       = 'নামের দ্বিতীয় অংশঃ';
$lang['edit_user_company_label']                     = 'কম্পানির নামঃ';
$lang['edit_user_email_label']                       = 'ই-মেইলঃ';
$lang['edit_user_phone_label']                       = 'টেলিফোনঃ';
$lang['edit_user_password_label']                    = 'পাসওয়ার্ডঃ (যদি পরিবর্তন করতে চান)';
$lang['edit_user_password_confirm_label']            = 'পুনরায় পাসওয়ার্ডটি দিনঃ (যদি পরিবর্তন করতে চান)';
$lang['edit_user_groups_heading']                    = 'কোন দল/শ্রেণীর সদস্য';
$lang['edit_user_submit_btn']                        = 'সংরক্ষণ করুন';
$lang['edit_user_validation_fname_label']            = 'নামের প্রথম অংশ';
$lang['edit_user_validation_lname_label']            = 'নামের দ্বিতীয় অংশ';
$lang['edit_user_validation_email_label']            = 'ই-মেইল';
$lang['edit_user_validation_phone_label']            = 'টেলিফোন';
$lang['edit_user_validation_company_label']          = 'কম্পানির নাম';
$lang['edit_user_validation_groups_label']           = 'দল/শ্রেণীর';
$lang['edit_user_validation_password_label']         = 'পাসওয়ার্ড';
$lang['edit_user_validation_password_confirm_label'] = 'পুনরায় পাসওয়ার্ডটি দিন';

// Create Group
$lang['create_group_title']                  = 'নুতুন দল/শ্রেণী তৈরি';
$lang['create_group_heading']                = 'নুতুন দল/শ্রেণী তৈরি';
$lang['create_group_subheading']             = 'দয়া করে নিচের দল সম্পর্কিত তথ্যগুলি সম্পূর্ণ করুন।';
$lang['create_group_name_label']             = 'দলের নামঃ';
$lang['create_group_desc_label']             = 'বর্ণনাঃ';
$lang['create_group_submit_btn']             = 'দল তৈরি করুন';
$lang['create_group_validation_name_label']  = 'দলের নাম';
$lang['create_group_validation_desc_label']  = 'বর্ণনা';

// Edit Group
$lang['edit_group_title']                  = 'দল/শ্রেণীর তথ্য হালনাগাদ করুন';
$lang['edit_group_saved']                  = 'তথ্য সংরক্ষিত হয়েছে';
$lang['edit_group_heading']                = 'দল/শ্রেণীর তথ্য হালনাগাদ করুন';
$lang['edit_group_subheading']             = 'দয়া করে নিচের দল সম্পর্কিত তথ্যগুলি সম্পূর্ণ করুন।';
$lang['edit_group_name_label']             = 'দলের নামঃ';
$lang['edit_group_desc_label']             = 'বর্ণনাঃ';
$lang['edit_group_submit_btn']             = 'সংরক্ষণ করুন';
$lang['edit_group_validation_name_label']  = 'দলের নাম';
$lang['edit_group_validation_desc_label']  = 'বর্ণনা';

// Change Password
$lang['edit_user_validation_password_label']                   = 'পাসওয়ার্ড পরিবর্তন';
$lang['change_password_heading']                               = '';
$lang['change_password_old_password_label']                    = 'পুরাতন পাসওয়ার্ডঃ';
$lang['change_password_new_password_label']                    = 'নুতুন পাসওয়ার্ড (অন্যূন %s অক্ষরের হতে হবে)ঃ';
$lang['change_password_new_password_confirm_label']            = 'নুতুন পাসওয়ার্ডটি আবার দিনঃ';
$lang['change_password_submit_btn']                            = 'পরিবর্তন করুন';
$lang['change_password_validation_old_password_label']         = 'পুরাতন পাসওয়ার্ড';
$lang['change_password_validation_new_password_label']         = 'নুতুন পাসওয়ার্ড';
$lang['change_password_validation_new_password_confirm_label'] = 'নুতুন পাসওয়ার্ডটি আবার দিন';

// Forgot Password
$lang['forgot_password_heading']                 = 'ভুলেযাওয়া পাসওয়ার্ড';
$lang['forgot_password_subheading']              = 'দয়া করে আপনার %s দিন যাতে আমরা আপনার পাসওয়ার্ড পুনরায় সেট করতে একটি ইমেল পাঠাতে পারি।';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'সম্পূর্ণ করুন';
$lang['forgot_password_validation_email_label']  = 'ই-মেইল';
$lang['forgot_password_identity_label']          = 'আইডেন্টিটি';
$lang['forgot_password_email_identity_label']    = 'ই-মেইল';
$lang['forgot_password_email_not_found']         = 'আপনার এই ই-মেইল আমাদের সাথে যুক্ত নেই।';
$lang['forgot_password_identity_not_found']      = 'আপনার এই নামটি আমাদের সাথে যুক্ত নেই।';

// Reset Password
$lang['reset_password_heading']                               = 'পাসওয়ার্ড পরিবর্তন';
$lang['reset_password_new_password_label']                    = 'নুতুন পাসওয়ার্ড (অন্যূন %s অক্ষরের হতে হবে)ঃ';
$lang['reset_password_new_password_confirm_label']            = 'নুতুন পাসওয়ার্ডটি আবার দিনঃ';
$lang['reset_password_submit_btn']                            = 'পরিবর্তন করুন';
$lang['reset_password_validation_new_password_label']         = 'নুতুন পাসওয়ার্ড';
$lang['reset_password_validation_new_password_confirm_label'] = 'নুতুন পাসওয়ার্ডটি আবার দিন';
