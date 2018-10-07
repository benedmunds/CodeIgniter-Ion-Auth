<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Name:  Ion Auth Lang - Chinese Traditional
 *
 * Author: Bo-Yi Wu
 *         appleboy.tw@gmail.com
 *         @taiwan
 *
 * Location: http://github.com/benedmunds/ion_auth/
 *
 * Created:  03.14.2011
 *
 * Description:  Chinese language file for Ion Auth messages and errors
 *
 */

return [
	// Account Creation
	'account_creation_successful'         => '帳號建立成功',
	'account_creation_unsuccessful'       => '無法建立帳號',
	'account_creation_duplicate_email'    => '電子郵件已被使用或不合法',
	'account_creation_duplicate_identity' => '帳號已存在或不合法',
	'account_creation_missing_defaultGroup' => '尚未設定預設群組',
	'account_creation_invalid_defaultGroup' => '預設群組名稱不合法',

	// Password
	'password_change_successful'   => '密碼變更成功',
	'password_change_unsuccessful' => '密碼變更失敗',
	'forgot_password_successful'   => '密碼已重設，請收取電子郵件',
	'forgot_password_unsuccessful' => '密碼重設失敗',

	// Activation
	'activate_successful'           => '帳號已啟動',
	'activate_unsuccessful'         => '啟動帳號失敗',
	'deactivate_successful'         => '帳號已關閉',
	'deactivate_unsuccessful'       => '關閉帳號失敗',
	'activation_email_successful'   => '已寄送啟動帳號電子郵件',
	'activation_email_unsuccessful' => '啟動帳號電子郵件失敗',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful'   => '登入成功',
	'login_unsuccessful' => '登入失敗',
	'login_unsuccessful_not_active' => '帳號尚未啟動',
	'login_timeout' => '帳號暫時被鎖定，請稍候再試',
	'logout_successful'  => '登出成功',

	// Account Changes
	'update_successful'   => '帳號資料更新成功',
	'update_unsuccessful' => '更新帳號資料失敗',
	'delete_successful'   => '帳號已刪除',
	'delete_unsuccessful' => '刪除帳號失敗',

	// Groups
	'group_creation_successful'  => '建立群組成功',
	'group_already_exists'       => '群組名稱已重複',
	'group_update_successful'    => '更新群組成功',
	'group_delete_successful'    => '群組已刪除',
	'group_delete_unsuccessful'  => '刪除群組失敗',
	'group_delete_notallowed'    => '無法刪除管理者群組',
	'group_name_required'        => '群組名稱為必填欄位',
	'group_name_admin_not_alter' => '不能變更管理者群組名稱',

	// Activation Email
	'emailActivation_subject'  => '啟動帳號',
	'emailActivate_heading'    => '啟動帳號 %s',
	'emailActivate_subheading' => '請點此連結 %s',
	'emailActivate_link'       => '啟動您的帳號',

	// Forgot Password Email
	'email_forgotten_password_subject' => '密碼重設驗證',
	'emailForgotPassword_heading'    => '重新啟用密碼 %s',
	'emailForgotPassword_subheading' => '請點此連結 %s',
	'emailForgotPassword_link'       => '重新啟動密碼',
];
