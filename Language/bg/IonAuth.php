<?php
/**
* Name:  Ion Auth Lang - Bulgarian
*
* Author: Ivan Kolev
* 		  ivan.kolev@gmail.com
*
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  01.22.2013
*
* Description:  Bulgarian language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful' 	  	 => 'Регистрацията бе създадена успешно',
	'account_creation_unsuccessful' 	 	 => 'Неуспешен опит за създаване на регистрация',
	'account_creation_duplicate_email' 	 => 'Email адреса е вече използван или невалиден',
	'account_creation_duplicate_identity' => 'Потребителското име е вече използвано или невалидно',

	// TODO Please Translate
	'account_creation_missing_defaultGroup' => 'Default group is not set',
	'account_creation_invalid_defaultGroup' => 'Invalid default group name set',

	// Password
	'password_change_successful' 	 	 => 'Паролата бе сменена успешно',
	'password_change_unsuccessful' 	  	 => 'Неуспешен опит за смяна на паролата',
	'forgot_password_successful' 	 	 => 'Изпратен е Email за нулиране на паролата',
	'forgot_password_unsuccessful' 	 	 => 'Неуспешен опит за нулиране на паролата',

	// Activation
	'activate_successful' 		  	     => 'Регистрацията е активирана',
	'activate_unsuccessful' 		 	     => 'Неуспешен опит за активиране на регистрацията',
	'deactivate_successful' 		  	     => 'Регистрацията е деактивирана',
	'deactivate_unsuccessful' 	  	     => 'Неуспешен опит за деактивиране на регистрацията',
	'activation_email_successful' 	  	 => 'Изпратен е Email за активиране на регистрацията',
	'activation_email_unsuccessful'   	 => 'Неуспешен опит за изпращане на Email за активация',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful' 		  	         => 'Успешен вход в системата',
	'login_unsuccessful' 		  	     => 'Неуспешен вход в системата',
	'login_unsuccessful_not_active' 		 => 'Регистрацията не е активирана',
	'login_timeout'                       => 'Временно заключен. Моля опитайте по-късно',
	'logout_successful' 		 	         => 'Успешен изход от системата',

	// Account Changes
	'update_successful' 		 	         => 'Регистрацията беше актуализирана успешно',
	'update_unsuccessful' 		 	     => 'Неуспешен опит за актуализиране на регистрацията',
	'delete_successful'               => 'Потребителя бе изтрит',
	'delete_unsuccessful'           => 'Неуспешен опит за изтриване на потребител',

	// Groups
	'group_creation_successful'  => 'Групата бе създадена успешно',
	'group_already_exists'       => 'Името на групата вече е заето',
	'group_update_successful'    => 'Детайлите на групата бяха актуализирани',
	'group_delete_successful'    => 'Групата бе изтрита',
	'group_delete_unsuccessful' 	=> 'Неуспешен опит за изтриване на групата',
	//TO DO Please translate
	'group_delete_notallowed'    => 'Can\'t delete the administrators\' group',
	'group_name_required' 		=> 'Group name is a required field',
	'group_name_admin_not_alter' => 'Admin group name can not be changed',

	//TO DO Please translate
	// Activation Email
	'emailActivation_subject'            => 'Активиране на регистрацията',
	'emailActivate_heading'    => 'Activate account for %s',
	'emailActivate_subheading' => 'Please click this link to %s.',
	'emailActivate_link'       => 'Activate Your Account',
	// Forgot Password Email
	'email_forgotten_password_subject'    => 'Проверка за забравена парола',
	'emailForgotPassword_heading'    => 'Reset Password for %s',
	'emailForgotPassword_subheading' => 'Please click this link to %s.',
	'emailForgotPassword_link'       => 'Reset Your Password',
];
