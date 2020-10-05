<?php
/**
* Name:  Auth Lang - Japanese
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author/Translation: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.19.2013
*
* Description:  Japanese language file for Ion Auth example views
*
*/

return [
	// Errors
	'error_security' => 'セキュリティに問題が生じ送信できませんでした。',

	// Login
	'login_heading'         => 'ログイン',
	'login_subheading'      => 'メールアドレス又はユーザー名とパスワードでログインして下さい。',
	'login_identity_label'  => 'メールアドレス又はユーザー名：',
	'login_password_label'  => 'パスワード：',
	'login_remember_label'  => '次回から自動的にログイン：',
	'login_submit_btn'      => 'ログイン',
	'login_forgot_password' => 'パスワードを忘れましたか？',

	// Index
	'index_heading'           => 'ユーザー',
	'index_subheading'        => 'ユーザー一覧',
	'index_fname_th'          => '名',
	'index_lname_th'          => '姓',
	'index_email_th'          => 'メールアドレス',
	'index_groups_th'         => 'グループ',
	'index_status_th'         => '状態',
	'index_action_th'         => '操作',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => '有効',
	'index_inactive_link'     => '無効',
	'index_create_user_link'  => 'ユーザーの新規作成',
	'index_create_group_link' => 'グループの新規作成',

	// Deactivate User
	'deactivate_heading'                  => 'ユーザーの無効化',
	'deactivate_subheading'               => '本当にユーザー「%s」を無効にしますか。',
	'deactivate_confirm_y_label'          => 'はい：',
	'deactivate_confirm_n_label'          => 'いいえ：',
	'deactivate_submit_btn'               => '送信',
	'deactivate_validation_confirm_label' => '確認',
	'deactivate_validation_user_id_label' => 'ユーザーID',

	// Create User
	'create_user_heading'                           => 'ユーザーの作成',
	'create_user_subheading'                        => 'ユーザー情報を入力して下さい。',
	'create_user_fname_label'                       => '名：',
	'create_user_lname_label'                       => '姓：',
	'create_user_identity_label'                    => 'Identity:',
	'create_user_company_label'                     => '会社名：',
	'create_user_email_label'                       => 'メールアドレス：',
	'create_user_phone_label'                       => '電話番号：',
	'create_user_password_label'                    => 'パスワード：',
	'create_user_password_confirm_label'            => 'パスワード（確認用）：',
	'create_user_submit_btn'                        => '作成',
	'create_user_validation_fname_label'            => '名',
	'create_user_validation_lname_label'            => '姓',
	'create_user_validation_identity_label'         => 'Identity',
	'create_user_validation_email_label'            => 'メールアドレス',
	'create_user_validation_phone1_label'           => '電話番号の第1部',
	'create_user_validation_phone2_label'           => '電話番号の第2部',
	'create_user_validation_phone3_label'           => '電話番号の第3部',
	'create_user_validation_company_label'          => '会社名',
	'create_user_validation_password_label'         => 'パスワード',
	'create_user_validation_password_confirm_label' => 'パスワードの確認',

	// Edit User
	'edit_user_heading'                           => 'ユーザーの編集',
	'edit_user_subheading'                        => 'ユーザー情報を入力して下さい。',
	'edit_user_fname_label'                       => '名：',
	'edit_user_lname_label'                       => '姓：',
	'edit_user_company_label'                     => '会社名：',
	'edit_user_email_label'                       => 'メールアドレス：',
	'edit_user_phone_label'                       => '電話番号：:',
	'edit_user_password_label'                    => 'パスワード（パスワードを変更する場合のみ）：',
	'edit_user_password_confirm_label'            => 'パスワードの確認（パスワードを変更する場合のみ）：',
	'edit_user_groups_heading'                    => '所属グループ',
	'edit_user_submit_btn'                        => '保存',
	'edit_user_validation_fname_label'            => '名',
	'edit_user_validation_lname_label'            => '姓',
	'edit_user_validation_email_label'            => 'メールアドレス',
	'edit_user_validation_phone1_label'           => '電話番号の第1部',
	'edit_user_validation_phone2_label'           => '電話番号の第2部',
	'edit_user_validation_phone3_label'           => '電話番号の第3部',
	'edit_user_validation_company_label'          => '会社名',
	'edit_user_validation_groups_label'           => 'グループ',
	'edit_user_validation_password_label'         => 'パスワード',
	'edit_user_validation_password_confirm_label' => 'パスワードの確認',

	// Create Group
	'create_group_title'                  => 'グループの作成',
	'create_group_heading'                => 'グループの作成',
	'create_group_subheading'             => 'グループ情報を入力して下さい。',
	'create_group_name_label'             => 'グループ名：',
	'create_group_desc_label'             => '詳細：',
	'create_group_submit_btn'             => '作成',
	'create_group_validation_name_label'  => 'グループ名',
	'create_group_validation_desc_label'  => '詳細',

	// Edit Group
	'edit_group_title'                  => 'グループの編集',
	'edit_group_saved'                  => '保存できました',
	'edit_group_heading'                => 'グループの編集',
	'edit_group_subheading'             => 'グループ情報を入力して下さい。',
	'edit_group_name_label'             => 'グループ名：',
	'edit_group_desc_label'             => '詳細：',
	'edit_group_submit_btn'             => '保存',
	'edit_group_validation_name_label'  => 'グループ名',
	'edit_group_validation_desc_label'  => '詳細',

	// Change Password
	'change_password_heading'                               => 'パスワードの変更',
	'change_password_old_password_label'                    => '元のパスワード：',
	'change_password_new_password_label'                    => '新しいパスワード（少なくとも%s字以上）：',
	'change_password_new_password_confirm_label'            => '新しいパスワード（確認用）：',
	'change_password_submit_btn'                            => '変更',
	'change_password_validation_old_password_label'         => '元のパスワード',
	'change_password_validation_new_password_label'         => '新しいパスワード',
	'change_password_validation_new_password_confirm_label' => '新しいパスワードの確認',

	// Forgot Password
	'forgot_password_heading'                 => 'パスワードの再発行',
	'forgot_password_subheading'              => '新しいパスワードをメールで送信するため、%sを入力して下さい。',
	'forgot_password_email_label'             => '%s：',
	'forgot_password_submit_btn'              => '送信',
	'forgot_password_validation_email_label'  => 'メールアドレス',
	'forgot_password_identity_label'          => 'ユーザー名',
	'forgot_password_email_identity_label'    => 'メールアドレス',
	'forgot_password_email_not_found'         => 'No record of that email address.',
	'forgot_password_identity_not_found'         => 'No record of that username address.',

	// Reset Password
	'reset_password_heading'                               => 'パスワードの変更',
	'reset_password_new_password_label'                    => '新しいパスワード（少なくとも%s字以上）：',
	'reset_password_new_password_confirm_label'            => '新しいパスワード（確認用）：',
	'reset_password_submit_btn'                            => '変更',
	'reset_password_validation_new_password_label'         => '新しいパスワード',
	'reset_password_validation_new_password_confirm_label' => '新しいパスワードの確認',

	// Forgot Password Email
	'emailForgotPassword_heading'    => 'パスワードのリセット： %s',
	'emailForgotPassword_subheading' => 'このリンクをクリックして%s。',
	'emailForgotPassword_link'       => 'パスワードをリセットして下さい',
];
