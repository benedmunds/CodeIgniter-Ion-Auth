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
$lang['account_creation_duplicate_username']    = 'Ім`я користувача існує або некоректне';

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
$lang['logout_successful']         = 'Вихід успішний';

// Account Changes
$lang['update_successful']         = 'Обліковий запис успішно оновлено';
$lang['update_unsuccessful']         = 'Неможливо оновити обліковий запис';
$lang['delete_successful']         = 'Обліковий запис видалено';
$lang['delete_unsuccessful']         = 'Неможливо видалити обліковий запис';

// Email Subjects - TODO Please Translate
$lang['email_forgotten_password_subject']    = 'Forgotten Password Verification';
$lang['email_new_password_subject']          = 'New Password';
$lang['email_activation_subject']            = 'Account Activation';