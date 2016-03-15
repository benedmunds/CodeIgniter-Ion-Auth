<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Ukraine (UTF-8)
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
* Translation:  Petrosyan R.
*             for@petrosyan.rv.ua
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.27.2010
*
* Description:  Ukraine language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful']        = 'Обліковий запис успішно створено';
$lang['account_creation_unsuccessful']       = 'Неможливо створити обліковий запис';
$lang['account_creation_duplicate_email']    = 'Електронна пошта використовується або некоректна';
$lang['account_creation_duplicate_identity']    = 'Ім`я користувача існує або некоректне';

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';

// Password
$lang['password_change_successful']       = 'Пароль успішно змінено';
$lang['password_change_unsuccessful']        = 'Пароль неможливо змінити';
$lang['forgot_password_successful']       = 'Пароль скинутий. На електронну пошту відправлено повідомлення';
$lang['forgot_password_unsuccessful']       = 'Неможливе скидання пароля';

// Activation
$lang['activate_successful']          = 'Обліковий запис активовано';
$lang['activate_unsuccessful']         = 'Не вдалося активувати обліковий запис';
$lang['deactivate_successful']          = 'Обліковий запис деактивовано';
$lang['deactivate_unsuccessful']        = 'Неможливо деактивувати обліковий запис';
$lang['activation_email_successful']        = 'Повідомлення про активацію відправлено';
$lang['activation_email_unsuccessful']      = 'Повідомлення про активацію неможливо відправити';

// Login / Logout
$lang['login_successful']          = 'Авторизація пройшла успішно';
$lang['login_unsuccessful']          = 'Логін невірний';
$lang['login_unsuccessful_not_active'] 		 = 'Account is inactive';
$lang['login_timeout']                       = 'Temporarily Locked Out.  Try again later.';
$lang['logout_successful']         = 'Вихід успішний';

// Account Changes
$lang['update_successful']         = 'Обліковий запис успішно оновлено';
$lang['update_unsuccessful']         = 'Неможливо оновити обліковий запис';
$lang['delete_successful']         = 'Обліковий запис видалено';
$lang['delete_unsuccessful']         = 'Неможливо видалити обліковий запис';

// Groups
$lang['group_creation_successful']  = 'Group created Successfully';
$lang['group_already_exists']       = 'Group name already taken';
$lang['group_update_successful']    = 'Group details updated';
$lang['group_delete_successful']    = 'Group deleted';
$lang['group_delete_unsuccessful'] 	= 'Unable to delete group';
$lang['group_delete_notallowed']    = 'Can\'t delete the administrators\' group';
$lang['group_name_required'] 		= 'Group name is a required field';
$lang['group_name_admin_not_alter'] = 'Admin group name can not be changed';

// Activation Email
$lang['email_activation_subject']            = 'Account Activation';
$lang['email_activate_heading']    = 'Activate account for %s';
$lang['email_activate_subheading'] = 'Please click this link to %s.';
$lang['email_activate_link']       = 'Activate Your Account';
// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Forgotten Password Verification';
$lang['email_forgot_password_heading']    = 'Reset Password for %s';
$lang['email_forgot_password_subheading'] = 'Please click this link to %s.';
$lang['email_forgot_password_link']       = 'Reset Your Password';
// New Password Email
$lang['email_new_password_subject']          = 'New Password';
$lang['email_new_password_heading']    = 'New Password for %s';
$lang['email_new_password_subheading'] = 'Your password has been reset to: %s';
