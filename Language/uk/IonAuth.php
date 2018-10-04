<?php
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

return [
	// Account Creation
	'account_creation_successful'		=> 'Обліковий запис успішно створено',
	'account_creation_unsuccessful'		=> 'Неможливо створити обліковий запис',
	'account_creation_duplicate_email'	=> 'Електронна пошта використовується або некоректна',
	'account_creation_duplicate_identity'    => 'Ім`я користувача існує або некоректне',

	// TODO Please Translate
	'account_creation_missing_default_group' => 'Група за умовчанням не встановлена',
	'account_creation_invalid_default_group' => 'Група за умовчанням задана некоректно',

	// Password
	'password_change_successful'		=> 'Пароль успішно змінено',
	'password_change_unsuccessful'		=> 'Пароль неможливо змінити',
	'forgot_password_successful'		=> 'Пароль скинутий. На електронну пошту відправлено повідомлення',
	'forgot_password_unsuccessful'		=> 'Неможливе скидання пароля',

	// Activation
	'activate_successful'		=> 'Обліковий запис активовано',
	'activate_unsuccessful'		=> 'Не вдалося активувати обліковий запис',
	'deactivate_successful'          => 'Обліковий запис деактивовано',
	'deactivate_unsuccessful'        => 'Неможливо деактивувати обліковий запис',
	'activation_email_successful'    => 'Повідомлення про активацію відправлено',
	'activation_email_unsuccessful'  => 'Повідомлення про активацію неможливо відправити',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful'		=> 'Авторизація пройшла успішно',
	'login_unsuccessful'		=> 'Логін невірний',
	'login_unsuccessful_not_active' 	=> 'Обліковий запис не активований',
	'login_timeout'			=> 'В цілях безпеки можливість входу тимчасово заблокована. Спробуйте зайти пізніше.',
	'logout_successful'		=> 'Вихід успішний',

	// Account Changes
	'update_successful'		=> 'Обліковий запис успішно оновлено',
	'update_unsuccessful'		=> 'Неможливо оновити обліковий запис',
	'delete_successful'		=> 'Обліковий запис видалено',
	'delete_unsuccessful'		=> 'Неможливо видалити обліковий запис',

	// Groups
	'group_creation_successful'  => 'Група створена успішно',
	'group_already_exists'       => 'Група з таким ім\'ям вже існує',
	'group_update_successful'    => 'Дані групи оновлені успішно',
	'group_delete_successful'    => 'Група видалена',
	'group_delete_unsuccessful'  => 'Не вдалося видалити групу',
	'group_delete_notallowed'    => 'Не можна видалити групу адміністраторів',
	'group_name_required' 	    => 'Ім\'я групи обов\'язкове до заповнення',
	'group_name_admin_not_alter' => 'Admin group name can not be changed',

	// Activation Email
	'email_activation_subject'  => 'Активація облікового запису',
	'email_activate_heading'    => 'Активувати акаунт з ім\'ям  %s',
	'email_activate_subheading' => 'Натисніть на посилання %s.',
	'email_activate_link'       => 'Активувати ваш акаунт',
	// Forgot Password Email
	'email_forgotten_password_subject'	=> 'Перевірка забутого пароля',
	'email_forgot_password_heading'		=> 'Скидання пароля для користувача %s',
	'email_forgot_password_subheading'	=> 'Натисніть на посилання для %s.',
	'email_forgot_password_link'		=> 'Відновлення пароля',
];
