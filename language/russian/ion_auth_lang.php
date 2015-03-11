<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Russian (UTF-8)
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
* Translation:  Petrosyan R.
*             for@petrosyan.rv.ua
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.26.2010
*
* Description:  Russian language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'Учетная запись успешно создана';
$lang['account_creation_unsuccessful'] 	 	 = 'Невозможно создать учетную запись';
$lang['account_creation_duplicate_email'] 	 = 'Электронная почта используется или некорректна';
$lang['account_creation_duplicate_username'] 	 = 'Имя пользователя существует или некорректно';

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Группа по умолчанию не установлена';
$lang['account_creation_invalid_default_group'] = 'Группа по умолчанию задана некорректно';

// Password
$lang['password_change_successful'] 	 	 = 'Пароль успешно изменен';
$lang['password_change_unsuccessful'] 	  	 = 'Пароль невозможно изменить';
$lang['forgot_password_successful'] 	 	 = 'Пароль сброшен. На электронную почту отправлено сообщение';
$lang['forgot_password_unsuccessful'] 	 	 = 'Невозможен сброс пароля';

// Activation
$lang['activate_successful'] 		  	 = 'Учетная запись активирована';
$lang['activate_unsuccessful'] 		 	 = 'Не удалось активировать учетную запись';
$lang['deactivate_successful'] 		  	 = 'Учетная запись деактивирована';
$lang['deactivate_unsuccessful'] 	  	 = 'Невозможно деактивировать учетную запись';
$lang['activation_email_successful'] 	  	 = 'Сообщение об активации отправлено';
$lang['activation_email_unsuccessful']   	 = 'Сообщение об активации невозможно отправить';

// Login / Logout
$lang['login_successful'] 		  	 = 'Авторизация прошла успешно';
$lang['login_unsuccessful'] 		  	 = 'Логин/пароль не верен';
$lang['login_unsuccessful_not_active'] 		 = 'Account is inactive';
$lang['login_timeout']                       = 'Temporarily Locked Out.  Try again later.';
$lang['logout_successful'] 		 	 = 'Выход успешный';

// Account Changes
$lang['update_successful'] 		 	 = 'Учетная запись успешно обновлена';
$lang['update_unsuccessful'] 		 	 = 'Невозможно обновить учетную запись';
$lang['delete_successful'] 		 	 = 'Учетная запись удалена';
$lang['delete_unsuccessful'] 		 	 = 'Невозможно удалить учетную запись';

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
$lang['email_activation_subject']            = 'Активация учетной записи';
$lang['email_activate_heading']    = 'Activate account for %s';
$lang['email_activate_subheading'] = 'Please click this link to %s.';
$lang['email_activate_link']       = 'Activate Your Account';
// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Проверка забытого пароля';
$lang['email_forgot_password_heading']    = 'Reset Password for %s';
$lang['email_forgot_password_subheading'] = 'Please click this link to %s.';
$lang['email_forgot_password_link']       = 'Reset Your Password';
// New Password Email
$lang['email_new_password_subject']          = 'Новый пароль';
$lang['email_new_password_heading']    = 'New Password for %s';
$lang['email_new_password_subheading'] = 'Your password has been reset to: %s';
