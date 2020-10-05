<?php
/**
 * Name:  Auth Lang - Russian
 *
 * Author: Ben Edmunds
 * 		  ben.edmunds@gmail.com
 *         @benedmunds
 *
 * Author: Daniel Davis
 *         @ourmaninjapan
 *
 * Translation: Ievgen Sentiabov
 *         @joni-jones
 *
 * Location: http://github.com/benedmunds/ion_auth/
 *
 * Created:  03.09.2013
 *
 * Description:  Russian language file for Ion Auth views
 *
 */

return [
	// Errors
	'error_security' => 'Форма не прошла проверку безопасности.',

	// Login
	'login_heading'         => 'Вход',
	'login_subheading'      => 'Для входа используйте email/имя пользователя и пароль.',
	'login_identity_label'  => 'Email:',
	'login_password_label'  => 'Пароль:',
	'login_remember_label'  => 'Запомнить меня:',
	'login_submit_btn'      => 'Вход',
	'login_forgot_password' => 'Забыли свой пароль?',

	// Index
	'index_heading'           => 'Пользователь',
	'index_subheading'        => 'Доступный список пользователей.',
	'index_fname_th'          => 'Имя',
	'index_lname_th'          => 'Фамилия',
	'index_email_th'          => 'Email',
	'index_groups_th'         => 'Группы',
	'index_status_th'         => 'Статус',
	'index_action_th'         => 'Действие',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'Активный',
	'index_inactive_link'     => 'Неактивный',
	'index_create_user_link'  => 'Создать нового пользователя',
	'index_create_group_link' => 'Создать новую группу',

	// Deactivate User
	'deactivate_heading'                  => 'Деактивировать пользователя',
	'deactivate_subheading'               => 'Вы уверены, что хотите деактивировать пользователя \'%s\'',
	'deactivate_confirm_y_label'          => 'Да:',
	'deactivate_confirm_n_label'          => 'Нет:',
	'deactivate_submit_btn'               => 'Отправить',
	'deactivate_validation_confirm_label' => 'подтверждение',
	'deactivate_validation_user_id_label' => 'ID пользователя',

	// Create User
	'create_user_heading'                           => 'Создать пользователя',
	'create_user_subheading'                        => 'Пожалуйста заполните следующую информацию.',
	'create_user_fname_label'                       => 'Имя:',
	'create_user_lname_label'                       => 'Фамилия:',
	'create_user_identity_label'                    => 'Identity:',
	'create_user_company_label'                     => 'Компания:',
	'create_user_email_label'                       => 'Email:',
	'create_user_phone_label'                       => 'Телефон:',
	'create_user_password_label'                    => 'Пароль:',
	'create_user_password_confirm_label'            => 'Подтверждение пароля:',
	'create_user_submit_btn'                        => 'Создать пользователя',
	'create_user_validation_fname_label'            => 'Имя',
	'create_user_validation_lname_label'            => 'Фамилия',
	'create_user_validation_identity_label'         => 'Identity',
	'create_user_validation_email_label'            => 'Email',
	'create_user_validation_phone1_label'           => 'Первая часть телефона',
	'create_user_validation_phone2_label'           => 'Вторая часть телефона',
	'create_user_validation_phone3_label'           => 'Третья часть телефона',
	'create_user_validation_company_label'          => 'Компания',
	'create_user_validation_password_label'         => 'Пароль',
	'create_user_validation_password_confirm_label' => 'Подтверждение пароля',

	// Edit User
	'edit_user_heading'                           => 'Редактировать пользователя',
	'edit_user_subheading'                        => 'Пожалуйста заполните информацию ниже.',
	'edit_user_fname_label'                       => 'Имя:',
	'edit_user_lname_label'                       => 'Фамилия:',
	'edit_user_company_label'                     => 'Название компании:',
	'edit_user_email_label'                       => 'Email:',
	'edit_user_phone_label'                       => 'Телефон:',
	'edit_user_password_label'                    => 'Пароль: (если изменился)',
	'edit_user_password_confirm_label'            => 'Подтвердить пароль: (если изменился)',
	'edit_user_groups_heading'                    => 'Член группы',
	'edit_user_submit_btn'                        => 'Сохранить пользователя',
	'edit_user_validation_fname_label'            => 'Имя',
	'edit_user_validation_lname_label'            => 'Фамилия',
	'edit_user_validation_email_label'            => 'Email',
	'edit_user_validation_phone1_label'           => 'Первая часть телефона',
	'edit_user_validation_phone2_label'           => 'Вторая часть телефона',
	'edit_user_validation_phone3_label'           => 'Третья часть телефона',
	'edit_user_validation_company_label'          => 'Компания',
	'edit_user_validation_groups_label'           => 'Группы',
	'edit_user_validation_password_label'         => 'Пароль',
	'edit_user_validation_password_confirm_label' => 'Подтверждение пароля',

	// Create Group
	'create_group_title'                  => 'Создать группу',
	'create_group_heading'                => 'Создать группу',
	'create_group_subheading'             => 'Пожалуйста заполните следующую информацию.',
	'create_group_name_label'             => 'Группа:',
	'create_group_desc_label'             => 'Описание:',
	'create_group_submit_btn'             => 'Создать группу',
	'create_group_validation_name_label'  => 'Группа',
	'create_group_validation_desc_label'  => 'Описание',

	// Edit Group
	'edit_group_title'                  => 'Редактировать группу',
	'edit_group_saved'                  => 'Группа сохранена',
	'edit_group_heading'                => 'Редактировать группу',
	'edit_group_subheading'             => 'Пожалуйста заполните следующую информацию.',
	'edit_group_name_label'             => 'Название группы:',
	'edit_group_desc_label'             => 'Описание:',
	'edit_group_submit_btn'             => 'Сохранить группу',
	'edit_group_validation_name_label'  => 'Группа',
	'edit_group_validation_desc_label'  => 'Описание',

	// Change Password
	'change_password_heading'                               => 'Изменить пароль',
	'change_password_old_password_label'                    => 'Старый пароль:',
	'change_password_new_password_label'                    => 'Новый пароль (минимум %s символов):',
	'change_password_new_password_confirm_label'            => 'Подтвердить пароль:',
	'change_password_submit_btn'                            => 'Изменить',
	'change_password_validation_old_password_label'         => 'Старый пароль',
	'change_password_validation_new_password_label'         => 'Новый пароль',
	'change_password_validation_new_password_confirm_label' => 'Подтвердить пароль',

	// Forgot Password
	'forgot_password_heading'                 => 'Забыли пароль',
	'forgot_password_subheading'              => 'Пожалуйста введите ваш email и мы сможем отправить вам email с новым паролем.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Отправить',
	'forgot_password_validation_email_label'  => 'Email',
	'forgot_password_identity_label'          => 'Логин',
	'forgot_password_email_identity_label'    => 'Email',
	'forgot_password_back'    => 'Вернуться',
	'forgot_password_email_not_found'         => 'No record of that email address.',
	'forgot_password_identity_not_found'         => 'No record of that username address.',

	// Reset Password
	'reset_password_heading'                               => 'Изменить пароль',
	'reset_password_new_password_label'                    => 'Новый пароль (минимум 8 символов):',
	'reset_password_new_password_confirm_label'            => 'Подвердить:',
	'reset_password_submit_btn'                            => 'Изменить',
	'reset_password_validation_new_password_label'         => 'Новый пароль',
	'reset_password_validation_new_password_confirm_label' => 'Подтвердить',

	// Forgot Password Email
	'emailForgotPassword_heading'    => 'Сбросить пароль для %s',
	'emailForgotPassword_subheading' => 'Пожалуста по ссылке для %s.',
	'emailForgotPassword_link'       => 'Сбросить пароль',
];
