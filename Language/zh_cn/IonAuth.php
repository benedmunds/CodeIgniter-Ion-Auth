<?php
/**
* Name:  Ion Auth Lang - Chinese Simplified
*
* Author: Kain Liu
* 		  Lkaihua@gmail.com
*         @China
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  10.24.2011
*
* Description:  Simplified Chinese language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful'            => '账号创建成功',
	'account_creation_unsuccessful'          => '账号创建失败',
	'account_creation_duplicate_email'       => '电子邮件已被使用或不合法',
	'account_creation_duplicate_identity'    => '账号已存在或不合法',
	'account_creation_missing_defaultGroup' => '尚未设定默认群组',
	'account_creation_invalid_defaultGroup' => '默认群组名称不合法',

	// Password
	'password_change_successful'   => '密码已修改',
	'password_change_unsuccessful' => '密码修改失败',
	'forgot_password_successful'   => '密码已重设,请查收您的电子邮件',
	'forgot_password_unsuccessful' => '密码重设失败',

	// Activation
	'activate_successful'           => '账号已激活',
	'activate_unsuccessful'         => '账号激活失败',
	'deactivate_successful'         => '账号已关闭',
	'deactivate_unsuccessful'       => '账号关闭失败',
	'activation_email_successful'   => '已发送激活账号的电子邮件',
	'activation_email_unsuccessful' => '发送激活账号的电子邮件失败',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful'   => '登录成功',
	'login_unsuccessful' => '登录失败',
	'login_unsuccessful_not_active' 		 => 'Account is inactive',
	'login_timeout'                       => 'Temporarily Locked Out.  Try again later.',
	'logout_successful'  => '您已成功退出',

	// Account Changes
	'update_successful'   => '账号资料已更新',
	'update_unsuccessful' => '更新账号资料失败',
	'delete_successful'   => '账号已删除',
	'delete_unsuccessful' => '删除账号失败',

	// Groups
	'group_creation_successful'  => 'Group created Successfully',
	'group_already_exists'       => 'Group name already taken',
	'group_update_successful'    => 'Group details updated',
	'group_delete_successful'    => 'Group deleted',
	'group_delete_unsuccessful' 	=> 'Unable to delete group',
	'group_delete_notallowed'    => 'Can\'t delete the administrators\' group',
	'group_name_required' 		=> 'Group name is a required field',
	'group_name_admin_not_alter' => 'Admin group name can not be changed',

	// Activation Email
	'emailActivation_subject'         => '帐号激活',
	'emailActivate_heading'    => '激活用户 %s',
	'emailActivate_subheading' => '请点击连接跳转至 %s.',
	'emailActivate_link'       => '激活您的账户',

	// Forgot Password Email
	'email_forgotten_password_subject' => '密码重设验证',
	'emailForgotPassword_heading'    => 'Reset Password for %s',
	'emailForgotPassword_subheading' => 'Please click this link to %s.',
	'emailForgotPassword_link'       => 'Reset Your Password',
];
