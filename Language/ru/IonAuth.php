<?php
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

return [
	// Account Creation
	'account_creation_successful' 	  	 => 'Учетная запись успешно создана',
	'account_creation_unsuccessful' 	 	 => 'Невозможно создать учетную запись',
	'account_creation_duplicate_email' 	 => 'Электронная почта используется или некорректна',
	'account_creation_duplicate_username' 	 => 'Имя пользователя существует или некорректно',
	'account_creation_missing_defaultGroup' => 'Группа по умолчанию не установлена',
	'account_creation_invalid_defaultGroup' => 'Группа по умолчанию задана некорректно',

	// Password
	'password_change_successful' 	 	 => 'Пароль успешно изменен',
	'password_change_unsuccessful' 	  	 => 'Пароль невозможно изменить',
	'forgot_password_successful' 	 	 => 'Пароль сброшен. На электронную почту отправлено сообщение',
	'forgot_password_unsuccessful' 	 	 => 'Невозможен сброс пароля',

	// Activation
	'activate_successful' 		  	 => 'Учетная запись активирована',
	'activate_unsuccessful' 		 	 => 'Не удалось активировать учетную запись',
	'deactivate_successful' 		  	 => 'Учетная запись деактивирована',
	'deactivate_unsuccessful' 	  	 => 'Невозможно деактивировать учетную запись',
	'activation_email_successful' 	  	 => 'Сообщение об активации отправлено',
	'activation_email_unsuccessful'   	 => 'Сообщение об активации невозможно отправить',
	'deactivate_current_user_unsuccessful'=> 'Вы не можете сами деактивировать свою учетную запись',

	// Login / Logout
	'login_successful' 		  	 => 'Авторизация прошла успешно',
	'login_unsuccessful' 		  	 => 'Логин/пароль не верен',
	'login_unsuccessful_not_active' 		 => 'Акаунт не активен',
	'login_timeout'                       => 'В целях безопасности возможность входа временно заблокирована. Попробуйте зайти позже.',
	'logout_successful' 		 	 => 'Выход успешный',

	// Account Changes
	'update_successful' 		 	 => 'Учетная запись успешно обновлена',
	'update_unsuccessful' 		 	 => 'Невозможно обновить учетную запись',
	'delete_successful' 		 	 => 'Учетная запись удалена',
	'delete_unsuccessful' 		 	 => 'Невозможно удалить учетную запись',

	// Groups
	'group_creation_successful'  => 'Группа создана успешно',
	'group_already_exists'       => 'Группа с таким именем уже существует',
	'group_update_successful'    => 'Данные группы обновлены успешно',
	'group_delete_successful'    => 'Группа удалена',
	'group_delete_unsuccessful' 	=> 'Не удалось удалить группу',
	'group_delete_notallowed'    => 'Нельзя удалить группу администраторов',
	'group_name_required' 		=> 'Имя группы обязательно к заполнению',
	// Activation Email
	'emailActivation_subject'            => 'Активация учетной записи',
	'emailActivate_heading'    => 'Активировать акаунт с именем  %s',
	'emailActivate_subheading' => 'Нажмите на ссылку %s.',
	'emailActivate_link'       => 'Активировать ваш акаунт',
	// Forgot Password Email
	'email_forgotten_password_subject'    => 'Проверка забытого пароля',
	'emailForgotPassword_heading'    => 'Сброс пароля для пользователя %s',
	'emailForgotPassword_subheading' => 'Нажмите на ссылку для %s.',
	'emailForgotPassword_link'       => 'Восстановления пароля',
];
