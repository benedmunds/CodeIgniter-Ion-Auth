<?php
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
 *  Created:  25.03.2018
 *
 * Description:  Bengali language file for Ion Auth example views
 *
 */

return [
	// Errors
	'error_security' => 'এই ফর্মের ডাটা নিরাপদ নহে, এটি আমাদের নিরাপত্তা সংক্রান্ত শর্তগুলো পূরণ করতে পারেনি।',

	// Login
	'login_heading'         => 'প্রবেশ করুন',
	'login_subheading'      => 'দয়াকরে আপনার ইমেইল / ব্যবহারকারী নাম এবং পাসওয়ার্ড দিয়ে লগইন করুন।',
	'login_identity_label'  => 'ইমেইল/ব্যবহারকারী নাম ঃ',
	'login_password_label'  => 'পাসওয়ার্ড ঃ',
	'login_remember_label'  => 'মনে রাখবেন',
	'login_submit_btn'      => 'লগইন',
	'login_forgot_password' => 'আপনি কি পাসওয়ার্ড ভুলে গেছেন?',

	// Index
	'index_heading'           => 'ব্যবহারকারীগন',
	'index_subheading'        => 'নীচে ব্যবহারকারীদের তালিকা।',
	'index_fname_th'          => 'নামের প্রথম অংশ',
	'index_lname_th'          => 'নামের দ্বিতীয় অংশ',
	'index_email_th'          => 'ই-মেইল',
	'index_groups_th'         => 'গ্রূপ/দল',
	'index_status_th'         => 'অ্যাকাউন্টের অবস্থা',
	'index_action_th'         => 'কার্য',
	'index_active_link'       => 'সক্রিয়',
	'index_inactive_link'     => 'নিষ্ক্রিয়',
	'index_create_user_link'  => 'একটি নতুন ব্যবহারকারী তৈরি করুন',
	'index_create_group_link' => 'একটি নতুন গ্রূপ/দল তৈরি করুন',

	// Deactivate User
	'deactivate_heading'                  => 'ব্যবহারকারী নিষ্ক্রিয়করন',
	'deactivate_subheading'               => '\'%s\' এই ব্যবহারকারীকে আপনি কি আসলেই নিষ্ক্রিয় করতে চান',
	'deactivate_confirm_y_label'          => 'হাঁ',
	'deactivate_confirm_n_label'          => 'না',
	'deactivate_submit_btn'               => 'সম্পূর্ণ করুন',
	'deactivate_validation_confirm_label' => 'অনুমোদন',
	'deactivate_validation_user_id_label' => 'ব্যবহারকারীর ক্রমিক নং',

	// Create User
	'create_user_heading'                           => 'নতুন ব্যবহারকারী তৈরি প্রক্রিয়া',
	'create_user_subheading'                        => 'দয়া করে নীচে ব্যবহারকারী সংক্রান্ত তথ্য গুলি পূরণ করুন।',
	'create_user_fname_label'                       => 'নামের প্রথম অংশঃ',
	'create_user_lname_label'                       => 'নামের দ্বিতীয় অংশঃ',
	'create_user_company_label'                     => 'কম্পানির নামঃ',
	'create_user_identity_label'                    => 'আইডেন্টিটিঃ',
	'create_user_email_label'                       => 'ই-মেইলঃ',
	'create_user_phone_label'                       => 'টেলিফোনঃ',
	'create_user_password_label'                    => 'পাসওয়ার্ডঃ',
	'create_user_password_confirm_label'            => 'পুনরায় পাসওয়ার্ডটি দিনঃ',
	'create_user_submit_btn'                        => 'ব্যবহারকারী তৈরি করুন',
	'create_user_validation_fname_label'            => 'নামের প্রথম অংশ',
	'create_user_validation_lname_label'            => 'নামের দ্বিতীয় অংশ',
	'create_user_validation_identity_label'         => 'আইডেন্টিটি',
	'create_user_validation_email_label'            => 'ই-মেইল',
	'create_user_validation_phone_label'            => 'টেলিফোন',
	'create_user_validation_company_label'          => 'কোম্পানি নাম',
	'create_user_validation_password_label'         => 'পাসওয়ার্ড',
	'create_user_validation_password_confirm_label' => 'পুন: পাসওয়ার্ড',

	// Edit User
	'edit_user_heading'                           => 'ব্যবহারকারীর তথ্য হালনাগাদ করুন',
	'edit_user_subheading'                        => 'দয়া করে ব্যবহারকারীর নিম্নের তথ্যগুলো সম্পূর্ণ করুন।',
	'edit_user_fname_label'                       => 'নামের প্রথম অংশঃ',
	'edit_user_lname_label'                       => 'নামের দ্বিতীয় অংশঃ',
	'edit_user_company_label'                     => 'কম্পানির নামঃ',
	'edit_user_email_label'                       => 'ই-মেইলঃ',
	'edit_user_phone_label'                       => 'টেলিফোনঃ',
	'edit_user_password_label'                    => 'পাসওয়ার্ডঃ (যদি পরিবর্তন করতে চান)',
	'edit_user_password_confirm_label'            => 'পুনরায় পাসওয়ার্ডটি দিনঃ (যদি পরিবর্তন করতে চান)',
	'edit_user_groups_heading'                    => 'কোন দল/শ্রেণীর সদস্য',
	'edit_user_submit_btn'                        => 'সংরক্ষণ করুন',
	'edit_user_validation_fname_label'            => 'নামের প্রথম অংশ',
	'edit_user_validation_lname_label'            => 'নামের দ্বিতীয় অংশ',
	'edit_user_validation_email_label'            => 'ই-মেইল',
	'edit_user_validation_phone_label'            => 'টেলিফোন',
	'edit_user_validation_company_label'          => 'কম্পানির নাম',
	'edit_user_validation_groups_label'           => 'দল/শ্রেণীর',
	'edit_user_validation_password_label'         => 'পাসওয়ার্ড',
	'edit_user_validation_password_confirm_label' => 'পুনরায় পাসওয়ার্ডটি দিন',

	// Create Group
	'create_group_title'                  => 'নুতুন দল/শ্রেণী তৈরি',
	'create_group_heading'                => 'নুতুন দল/শ্রেণী তৈরি',
	'create_group_subheading'             => 'দয়া করে নিচের দল সম্পর্কিত তথ্যগুলি সম্পূর্ণ করুন।',
	'create_group_name_label'             => 'দলের নামঃ',
	'create_group_desc_label'             => 'বর্ণনাঃ',
	'create_group_submit_btn'             => 'দল তৈরি করুন',
	'create_group_validation_name_label'  => 'দলের নাম',
	'create_group_validation_desc_label'  => 'বর্ণনা',

	// Edit Group
	'edit_group_title'                  => 'দল/শ্রেণীর তথ্য হালনাগাদ করুন',
	'edit_group_saved'                  => 'তথ্য সংরক্ষিত হয়েছে',
	'edit_group_heading'                => 'দল/শ্রেণীর তথ্য হালনাগাদ করুন',
	'edit_group_subheading'             => 'দয়া করে নিচের দল সম্পর্কিত তথ্যগুলি সম্পূর্ণ করুন।',
	'edit_group_name_label'             => 'দলের নামঃ',
	'edit_group_desc_label'             => 'বর্ণনাঃ',
	'edit_group_submit_btn'             => 'সংরক্ষণ করুন',
	'edit_group_validation_name_label'  => 'দলের নাম',
	'edit_group_validation_desc_label'  => 'বর্ণনা',

	// Change Password
	'change_password_heading'                               => 'পাসওয়ার্ড পরিবর্তন',
	'change_password_old_password_label'                    => 'পুরাতন পাসওয়ার্ডঃ',
	'change_password_new_password_label'                    => 'নুতুন পাসওয়ার্ড (অন্যূন %s অক্ষরের হতে হবে)ঃ',
	'change_password_new_password_confirm_label'            => 'নুতুন পাসওয়ার্ডটি আবার দিনঃ',
	'change_password_submit_btn'                            => 'পরিবর্তন করুন',
	'change_password_validation_old_password_label'         => 'পুরাতন পাসওয়ার্ড',
	'change_password_validation_new_password_label'         => 'নুতুন পাসওয়ার্ড',
	'change_password_validation_new_password_confirm_label' => 'নুতুন পাসওয়ার্ডটি আবার দিন',

	// Forgot Password
	'forgot_password_heading'                 => 'ভুলেযাওয়া পাসওয়ার্ড',
	'forgot_password_subheading'              => 'দয়া করে আপনার %s দিন যাতে আমরা আপনার পাসওয়ার্ড পুনরায় সেট করতে একটি ইমেল পাঠাতে পারি।',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'সম্পূর্ণ করুন',
	'forgot_password_validation_email_label'  => 'ই-মেইল',
	'forgot_password_identity_label'          => 'আইডেন্টিটি',
	'forgot_password_email_identity_label'    => 'ই-মেইল',
	'forgot_password_email_not_found'         => 'আপনার এই ই-মেইল আমাদের সাথে যুক্ত নেই।',
	'forgot_password_identity_not_found'      => 'আপনার এই নামটি আমাদের সাথে যুক্ত নেই।',

	// Reset Password
	'reset_password_heading'                               => 'পাসওয়ার্ড পরিবর্তন',
	'reset_password_new_password_label'                    => 'নুতুন পাসওয়ার্ড (অন্যূন %s অক্ষরের হতে হবে)ঃ',
	'reset_password_new_password_confirm_label'            => 'নুতুন পাসওয়ার্ডটি আবার দিনঃ',
	'reset_password_submit_btn'                            => 'পরিবর্তন করুন',
	'reset_password_validation_new_password_label'         => 'নুতুন পাসওয়ার্ড',
	'reset_password_validation_new_password_confirm_label' => 'নুতুন পাসওয়ার্ডটি আবার দিন',
];
