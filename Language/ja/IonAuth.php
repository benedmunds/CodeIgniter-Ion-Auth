<?php
/**
* Name:  Ion Auth Lang - Japanese
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Translation: Nobuo Kihara
* 		  softark@gmail.com
*
* Translation: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.14.2010
*
* Description:  Japanese language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful' 	  	 => 'アカウントを作成しました',
	'account_creation_unsuccessful' 	 	 => 'アカウントを作成することが出来ません',
	'account_creation_duplicate_email' 	 => 'メールアドレスが登録済みまたは不正です',
	'account_creation_duplicate_identity' => 'ユーザー名が登録済みまたは不正です',

	// TODO Please Translate
	'account_creation_missing_defaultGroup' => 'デフォルトグループが設定されていません',
	'account_creation_invalid_defaultGroup' => 'デフォルトグループの名前が無効です',

	// Password
	'password_change_successful' 	 	 => 'パスワードを変更しました',
	'password_change_unsuccessful' 	  	 => 'パスワードを変更することが出来ません',
	'forgot_password_successful' 	 	 => 'パスワード再設定メールを送信しました',
	'forgot_password_unsuccessful' 	 	 => 'パスワードを再設定することが出来ません',

	// Activation
	'activate_successful' 		  	 => 'アカウントを有効にしました',
	'activate_unsuccessful' 		 	 => 'アカウントを有効にすることが出来ません',
	'deactivate_successful' 		  	 => 'アカウントを無効にしました',
	'deactivate_unsuccessful' 	  	 => 'アカウントを無効にすることが出来ません',
	'activation_email_successful' 	 => 'アクティベーション・メールを送信しました',
	'activation_email_unsuccessful'   => 'アクティベーション・メールを送信できません',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful' 		  	 => 'ログインしました',
	'login_unsuccessful' 		 => 'ログイン出来ません',
	'login_unsuccessful_not_active' 		 => 'アカウントが無効です',
	'login_timeout'                       => 'アカウントが仮にロックされています。後でもう一度試してください',
	'logout_successful' 		 	 => 'ログアウトしました',

	// Account Changes
	'update_successful' 		 	 => 'アカウント情報を更新しました',
	'update_unsuccessful' 		 => 'アカウント情報を更新することが出来ません',
	'delete_successful' 		 	 => 'ユーザーを削除しました',
	'delete_unsuccessful' 		 => 'ユーザーを削除することが出来ません',

	// Groups
	'group_creation_successful'  => 'グループを作成しました',
	'group_already_exists'       => 'このグループ名はすでに使われています',
	'group_update_successful'    => 'グループ情報を更新しました',
	'group_delete_successful'    => 'グループを削除しました',
	'group_delete_unsuccessful' 	=> 'グループを削除することが出来ません',
	'group_delete_notallowed'    => 'administratorsグループは削除できません',
	'group_name_required' 		=> 'グループ名が必要です。',
	'group_name_admin_not_alter' => '管理者グループ名は変更できません',

	// Activation Email
	'emailActivation_subject'            => 'アカウントの承認',
	'emailActivate_heading'    => '%s アカウントを有効化します',
	'emailActivate_subheading' => 'このリンクをクリックして %s',
	'emailActivate_link'       => 'アカウントを有効にして下さい',
	// Forgot Password Email
	'email_forgotten_password_subject'    => '忘れたパスワードの確認',
	'emailForgotPassword_heading'    => '%s のパスワードのリセット',
	'emailForgotPassword_subheading' => 'こちらのリンクをクリックしてください。 %s',
	'emailForgotPassword_link'       => 'パスワードのリセット',
];
