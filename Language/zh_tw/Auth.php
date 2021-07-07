<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Name:  Auth Lang - Chinese Traditional
 *
 * Author: Bo-Yi Wu
 *         appleboy.tw@gmail.com
 *         @taiwan
 *
 * Location: http://github.com/benedmunds/ion_auth/
 *
 * Created:  03.09.2013
 *
 * Description: Chinese language language file for Ion Auth example views
 *
 */

return [
	// Errors
	'error_security' => '此表單內容資訊沒通過系統安全認證.',

	// Login
	'login_heading'         => '登入',
	'login_subheading'      => '請登入您的電子郵件/帳號和密碼.',
	'login_identity_label'  => '電子郵件/帳號:',
	'login_password_label'  => '密碼:',
	'login_remember_label'  => '記住我:',
	'login_submit_btn'      => '登入',
	'login_forgot_password' => '忘記密碼?',

	// Index
	'index_heading'           => '使用者資訊',
	'index_subheading'        => '底下是帳號資訊列表.',
	'index_fname_th'          => '名字',
	'index_lname_th'          => '姓氏',
	'index_email_th'          => '電子郵件',
	'index_groups_th'         => '群組',
	'index_status_th'         => '狀態',
	'index_action_th'         => '動作',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => '啟動',
	'index_inactive_link'     => '關閉',
	'index_create_user_link'  => '建立新帳號',
	'index_create_group_link' => '建立新群組',

	// Deactivate User
	'deactivate_heading'                  => '關閉帳號',
	'deactivate_subheading'               => '您確定關閉此使用者帳號 \'%s\'',
	'deactivate_confirm_y_label'          => '是:',
	'deactivate_confirm_n_label'          => '否:',
	'deactivate_submit_btn'               => '送出',
	'deactivate_validation_confirm_label' => '確認',
	'deactivate_validation_user_id_label' => '帳號 ID',

	// Create User
	'create_user_heading'                           => '建立帳號',
	'create_user_subheading'                        => '請填寫使用者帳號基本資料.',
	'create_user_fname_label'                       => '名字:',
	'create_user_lname_label'                       => '姓氏:',
	'create_user_identity_label'                    => '帳號:',
	'create_user_company_label'                     => '公司名稱:',
	'create_user_email_label'                       => '電子郵件:',
	'create_user_phone_label'                       => '電話:',
	'create_user_password_label'                    => '密碼:',
	'create_user_password_confirm_label'            => '確認密碼:',
	'create_user_submit_btn'                        => '建立帳號',
	'create_user_validation_fname_label'            => '名字',
	'create_user_validation_lname_label'            => '姓氏',
	'create_user_validation_identity_label'         => '帳號',
	'create_user_validation_email_label'            => '電子郵件',
	'create_user_validation_phone1_label'           => '聯絡電話一',
	'create_user_validation_phone2_label'           => '聯絡電話二',
	'create_user_validation_phone3_label'           => '聯絡電話三',
	'create_user_validation_company_label'          => '公司名稱',
	'create_user_validation_password_label'         => '密碼',
	'create_user_validation_password_confirm_label' => '確認密碼',

	// Edit User
	'edit_user_heading'                           => '修改帳號',
	'edit_user_subheading'                        => '請填寫使用者帳號基本資料.',
	'edit_user_fname_label'                       => '名字:',
	'edit_user_lname_label'                       => '姓氏:',
	'edit_user_company_label'                     => '公司名稱:',
	'edit_user_email_label'                       => '電子郵件:',
	'edit_user_phone_label'                       => '聯絡電話:',
	'edit_user_password_label'                    => '密碼: (如果要修改密碼請填寫)',
	'edit_user_password_confirm_label'            => '確認密碼: (如果要修改密碼請填寫)',
	'edit_user_groups_heading'                    => '使用者群組',
	'edit_user_submit_btn'                        => '儲存帳號',
	'edit_user_validation_fname_label'            => '名字',
	'edit_user_validation_lname_label'            => '姓氏',
	'edit_user_validation_email_label'            => '電子郵件',
	'edit_user_validation_phone1_label'           => '聯絡電話一',
	'edit_user_validation_phone2_label'           => '聯絡電話二',
	'edit_user_validation_phone3_label'           => '聯絡電話三',
	'edit_user_validation_company_label'          => '公司名稱',
	'edit_user_validation_groups_label'           => '群組',
	'edit_user_validation_password_label'         => '密碼',
	'edit_user_validation_password_confirm_label' => '確認密碼',

	// Create Group
	'create_group_title'                  => '建立群組',
	'create_group_heading'                => '建立群組',
	'create_group_subheading'             => '請填寫群組基本資料.',
	'create_group_name_label'             => '群組名稱:',
	'create_group_desc_label'             => '群組描述:',
	'create_group_submit_btn'             => '建立群組',
	'create_group_validation_name_label'  => '群組名稱',
	'create_group_validation_desc_label'  => '群組描述',

	// Edit Group
	'edit_group_title'                  => '修改群組',
	'edit_group_saved'                  => '儲存群組',
	'edit_group_heading'                => '修改群組',
	'edit_group_subheading'             => '請填寫群組基本資料.',
	'edit_group_name_label'             => '群組名稱:',
	'edit_group_desc_label'             => '群組描述:',
	'edit_group_submit_btn'             => '儲存群組',
	'edit_group_validation_name_label'  => '群組名稱',
	'edit_group_validation_desc_label'  => '群組描述',

	// Change Password
	'change_password_heading'                               => '修改密碼',
	'change_password_old_password_label'                    => '舊密碼:',
	'change_password_new_password_label'                    => '新密碼 (至少含 %s 字元長度):',
	'change_password_new_password_confirm_label'            => '確認新密碼:',
	'change_password_submit_btn'                            => '修改',
	'change_password_validation_old_password_label'         => '舊密碼',
	'change_password_validation_new_password_label'         => '新密碼',
	'change_password_validation_new_password_confirm_label' => '確認新密碼',

	// Forgot Password
	'forgot_password_heading'                 => '忘記密碼',
	'forgot_password_subheading'              => '請填寫您的%s，以便讓我們寄送電子郵件重新啟用密碼.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => '送出',
	'forgot_password_validation_email_label'  => '電子郵件',
	'forgot_password_identity_label'          => '帳號',
	'forgot_password_email_identity_label'    => '電子郵件',
	'forgot_password_email_not_found'         => '找不到此電子郵件相關資訊.',
	'forgot_password_identity_not_found'         => 'No record of that username address.',

	// Reset Password
	'reset_password_heading'                               => '修改密碼',
	'reset_password_new_password_label'                    => '新密碼 (至少含 %s 字元長度):',
	'reset_password_new_password_confirm_label'            => '確認新密碼:',
	'reset_password_submit_btn'                            => '修改',
	'reset_password_validation_new_password_label'         => '新密碼',
	'reset_password_validation_new_password_confirm_label' => '確認新密碼',
];
