<?php
/**
* Name:  Auth Lang - Chinese Simplified
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Translation: Bruce Huang
*         	   @libruce
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  Simplified Chinese language file for Ion Auth example views
*
*/

return [
	// Errors
	'error_security' => '该表单提交未通过我们的安全性检查.',

	// Login
	'login_heading'         => '登录',
	'login_subheading'      => '请输入下列的邮箱/用户名和密码进行登录.',
	'login_identity_label'  => '邮箱/用户名:',
	'login_password_label'  => '密码:',
	'login_remember_label'  => '记住我:',
	'login_submit_btn'      => '登录',
	'login_forgot_password' => '忘记密码?',

	// Index
	'index_heading'           => '用户管理',
	'index_subheading'        => '下面是用户列表.',
	'index_fname_th'          => '名字',
	'index_lname_th'          => '姓氏',
	'index_email_th'          => '邮箱',
	'index_groups_th'         => '用户组',
	'index_status_th'         => '状态',
	'index_action_th'         => '操作',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => '激活',
	'index_inactive_link'     => '未激活',
	'index_create_user_link'  => '创建用户',
	'index_create_group_link' => '创建用户组',

	// Deactivate User
	'deactivate_heading'                  => '冻结',
	'deactivate_subheading'               => '您确定要冻结用户 \'%s\'',
	'deactivate_confirm_y_label'          => '确定:',
	'deactivate_confirm_n_label'          => '取消:',
	'deactivate_submit_btn'               => '提交',
	'deactivate_validation_confirm_label' => '确认',
	'deactivate_validation_user_id_label' => '用户 ID',

	// Create User
	'create_user_heading'                           => '创建用户',
	'create_user_subheading'                        => '请填入以下的用户信息.',
	'create_user_fname_label'                       => '名字:',
	'create_user_lname_label'                       => '姓氏:',
	'create_user_identity_label'                    => 'Identity:',
	'create_user_company_label'                     => '公司名:',
	'create_user_email_label'                       => '邮箱地址:',
	'create_user_phone_label'                       => '电话:',
	'create_user_password_label'                    => '密码:',
	'create_user_password_confirm_label'            => '确认密码:',
	'create_user_submit_btn'                        => '创建用户',
	'create_user_validation_fname_label'            => '名字',
	'create_user_validation_lname_label'            => '姓氏',
	'create_user_validation_identity_label'         => 'Identity',
	'create_user_validation_email_label'            => '邮箱地址',
	'create_user_validation_phone1_label'           => '电话号码第一部分',
	'create_user_validation_phone2_label'           => '电话号码第二部分',
	'create_user_validation_phone3_label'           => '电话号码第三部分',
	'create_user_validation_company_label'          => '公司名',
	'create_user_validation_password_label'         => '密码',
	'create_user_validation_password_confirm_label' => '确认密码',

	// Edit User
	'edit_user_heading'                           => '修改用户',
	'edit_user_subheading'                        => '请输入下列的用户信息.',
	'edit_user_fname_label'                       => '名字:',
	'edit_user_lname_label'                       => '姓氏:',
	'edit_user_company_label'                     => '公司名:',
	'edit_user_email_label'                       => '邮箱:',
	'edit_user_phone_label'                       => '电话号码:',
	'edit_user_password_label'                    => '密码: (如果需要修改请输入)',
	'edit_user_password_confirm_label'            => '确认密码: (如果需要修改请输入)',
	'edit_user_groups_heading'                    => '所在用户组',
	'edit_user_submit_btn'                        => '保存用户',
	'edit_user_validation_fname_label'            => '名字',
	'edit_user_validation_lname_label'            => '姓氏',
	'edit_user_validation_email_label'            => '邮箱地址',
	'edit_user_validation_phone1_label'           => '电话号码第一部分',
	'edit_user_validation_phone2_label'           => '电话号码第二部分',
	'edit_user_validation_phone3_label'           => '电话号码第三部分',
	'edit_user_validation_company_label'          => '公司名',
	'edit_user_validation_groups_label'           => '用户组',
	'edit_user_validation_password_label'         => '密码',
	'edit_user_validation_password_confirm_label' => '密码确认',

	// Create Group
	'create_group_title'                  => '创建用户组',
	'create_group_heading'                => '创建用户组',
	'create_group_subheading'             => '请输入下列用户名信息.',
	'create_group_name_label'             => '用户组名:',
	'create_group_desc_label'             => '用户组描述:',
	'create_group_submit_btn'             => '创建用户组',
	'create_group_validation_name_label'  => '用户组名',
	'create_group_validation_desc_label'  => '用户组描述',

	// Edit Group
	'edit_group_title'                  => '修改用户组',
	'edit_group_saved'                  => '用户组已保存',
	'edit_group_heading'                => '修改用户组',
	'edit_group_subheading'             => '请输入下列用户名信息.',
	'edit_group_name_label'             => '用户组名:',
	'edit_group_desc_label'             => '用户组描述:',
	'edit_group_submit_btn'             => '用户组已保存',
	'edit_group_validation_name_label'  => '用户组名',
	'edit_group_validation_desc_label'  => '用户组描述',

	// Change Password
	'change_password_heading'                               => '修改密码',
	'change_password_old_password_label'                    => '当前密码:',
	'change_password_new_password_label'                    => '新密码 (最少 %s 位):',
	'change_password_new_password_confirm_label'            => '确认新密码:',
	'change_password_submit_btn'                            => '修改',
	'change_password_validation_old_password_label'         => '当前密码',
	'change_password_validation_new_password_label'         => '新密码',
	'change_password_validation_new_password_confirm_label' => '确认新密码',

	// Forgot Password
	'forgot_password_heading'                 => '忘记密码',
	'forgot_password_subheading'              => '请输入您的 %s 以收取邮件重置密码.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => '提交',
	'forgot_password_validation_email_label'  => '邮箱地址',
	'forgot_password_identity_label'          => '用户名',
	'forgot_password_email_identity_label'    => '邮箱',
	'forgot_password_email_not_found'         => '无此邮箱的记录.',
	'forgot_password_identity_not_found'         => 'No record of that username address.',

	// Reset Password
	'reset_password_heading'                               => '修改密码',
	'reset_password_new_password_label'                    => '新密码 (至少 %s 位):',
	'reset_password_new_password_confirm_label'            => '确认新密码:',
	'reset_password_submit_btn'                            => '修改',
	'reset_password_validation_new_password_label'         => '新密码',
	'reset_password_validation_new_password_confirm_label' => '确认新密码',

	// Forgot Password Email
	'emailForgotPassword_heading'    => '重置 %s 的密码',
	'emailForgotPassword_subheading' => '请点击连接跳转至 %s.',
	'emailForgotPassword_link'       => '重置您的密码',
];
