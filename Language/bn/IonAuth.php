<?php
/**
 * Name:  Ion Auth Lang - Bengali
 *
 * Author: Ben Edmunds
 *         ben.edmunds@gmail.com
 *         @benedmunds
 *
 * Author: Arifur Rahman
 *         @arif2009
 *
 * Location: http://github.com/benedmunds/ion_auth/
 *
 * Created:  03.25.2018
 *
 * Description:  Bengali language file for Ion Auth messages and errors
 *
 */

return [
	// Account Creation
	'account_creation_successful'            => 'অ্যাকাউন্টটি সফলভাবে তৈরি হয়েছে',
	'account_creation_unsuccessful'          => 'অ্যাকাউন্টটি তৈরি করা যাচ্ছেনা',
	'account_creation_duplicate_email'       => 'ইমেলটি ইতিমধ্যে ব্যবহৃত হয়েছে অথবা এটি ভুল',
	'account_creation_duplicate_identity'    => 'এটি ইতিমধ্যে ব্যবহৃত হয়েছে অথবা ভুল',
	'account_creation_missing_defaultGroup' => 'পূর্বনির্ধারিত গ্রুপ সেট করা হয়নি',
	'account_creation_invalid_defaultGroup' => 'পূর্বনির্ধারিত দলটি ভুল হয়েছে',


	// Password
	'password_change_successful'          => 'পাসওয়ার্ড সফলভাবে পরিবর্তন করা হয়েছে',
	'password_change_unsuccessful'        => 'পাসওয়ার্ডটি পরিবর্তন করা যাচ্ছেনা',
	'forgot_password_successful'          => 'পাসওয়ার্ড পরিবর্তনের জন্য ই-মেইল করা হয়েছে',
	'forgot_password_unsuccessful'        => 'পরিবর্তনযোগ লিঙ্ক ই-মেইল করা যাচ্ছেনা',

	// Activation
	'activate_successful'                 => 'অ্যাকাউন্টটি সফলভাবে চালু হয়েছে',
	'activate_unsuccessful'               => 'অ্যাকাউন্টটি চালু করা যাচ্ছেনা',
	'deactivate_successful'               => 'অ্যাকাউন্টটি নিষ্ক্রিয় করা হয়েছে',
	'deactivate_unsuccessful'             => 'অ্যাকাউন্টটি নিষ্ক্রিয় করা যাচ্ছেনা',
	'activation_email_successful'         => 'সক্রিয়করণ ইমেল পাঠানো হয়েছে। আপনার ইনবক্স অথবা স্প্যামে চেক করুণ',
	'activation_email_unsuccessful'       => 'সক্রিয়করণ ইমেল পাঠানো যাচ্ছেনা',
	'deactivate_current_user_unsuccessful'=> 'আপনি নিজেকে নিজেকে নিষ্ক্রিয় করতে পারবেন না।',

	// Login / Logout
	'login_successful'                    => 'আপনি সফলভাবে প্রবেশ করেছেন',
	'login_unsuccessful'                  => 'প্রবেশ করা যাচ্ছেনা',
	'login_unsuccessful_not_active'       => 'অ্যাকাউন্টটি নিষ্ক্রিয়',
	'login_timeout'                       => 'অস্থায়ীভাবে লক হয়েছে। পরে আবার চেষ্টা করুণ।',
	'login_unsuccessful'                  => 'লগইন করা যাচ্ছেনা',
	'login_unsuccessful_not_active'       => 'অ্যাকাউন্টটি নিষ্ক্রিয়',
	'login_timeout'                       => 'অস্থায়ীভাবে লগ আউট হয়েছে। পরে আবার চেষ্টা করুণ।',
	'logout_successful'                   => 'সফলভাবে লগ আউট হয়েছে',

	// Account Changes
	'update_successful'                   => 'অ্যাকাউন্টের তথ্য সফলভাবে সংস্করণ করা হয়েছে',
	'update_unsuccessful'                 => 'অ্যাকাউন্টের তথ্য সংস্করণ করা যাচ্ছেনা',
	'delete_successful'                   => 'ব্যবহারকারীকে মুছে ফেলা হয়েছে',
	'delete_unsuccessful'                 => 'ব্যবহারকারীকে মুছে ফেলা যাচ্ছেনা',

	// Groups
	'group_creation_successful'           => 'সফলভাবে দলটি তৈরি করা হয়েছে',
	'group_already_exists'                => 'একই নামে ইতিমধ্যে আরেকটি গ্রুপ তৈরি করা হয়েছে',
	'group_update_successful'             => 'দলটির বিবরণ সংস্করণ করা হয়েছে',
	'group_delete_successful'             => 'দলটি মুছে ফেলা হয়েছে',
	'group_delete_unsuccessful'           => 'দলটি মুছে ফেলা যাচ্ছেনা',
	'group_delete_notallowed'             => 'অ্যাডমিনিস্ট্রেটরদের দলটি মুছে ফেলা যাবেনা',
	'group_name_required'                 => 'দলের নামটি অবশ্যই দিতে হবে',
	'group_name_admin_not_alter'          => 'অ্যাডমিনিস্ট্রেটরদের দলটির নাম সংস্করণ করা যাবেনা',

	// Activation Email
	'emailActivation_subject'            => 'অ্যাকাউন্ট সক্রিয়করণ',
	'emailActivate_heading'              => '%s এর জন্য অ্যাকাউন্ট সক্রিয়করণ প্রক্রিয়া',
	'emailActivate_subheading'           => 'দয়া করে এই লিঙ্কটি ক্লিক করুণ %s.',
	'emailActivate_link'                 => 'আপনার অ্যাকাউন্ট টি সক্রিয় করুণ',

	// Forgot Password Email
	'email_forgotten_password_subject'    => 'ভুলে যাওয়া পাসওয়ার্ড পুনরূদ্ধার',
	'emailForgotPassword_heading'       => '%s এর জন্য পাসওয়ার্ড পুনরূদ্ধার করন প্রক্রিয়া',
	'emailForgotPassword_subheading'    => 'দয়া করে এই লিঙ্কটি ক্লিক করুণ %s.',
	'emailForgotPassword_link'          => 'আপনার অ্যাকাউন্ট টি পুনরূদ্ধার করুণ',

	// New Password Email
	'email_new_password_subject'          => 'নতুন পাসওয়ার্ড',
	'email_new_password_heading'          => '%s এর জন্য নতুন পাসওয়ার্ড',
	'email_new_password_subheading'       => 'আপনার পাসওয়ার্ড পুনরায় সেট করা হয়েছে: %s',
];
