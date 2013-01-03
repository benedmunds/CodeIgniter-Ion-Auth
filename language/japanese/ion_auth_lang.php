<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Japanese
*
* Author: Nobuo Kihara
* 		  softark@gmail.com
*
* Created:  2010-10-30
*
* Description:  Japanese language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'アカウントを作成しました';
$lang['account_creation_unsuccessful'] 	 	 = 'アカウントを作成することが出来ません';
$lang['account_creation_duplicate_email'] 	 = 'メール・アドレスが登録済みまたは不正です';
$lang['account_creation_duplicate_username'] = 'ユーザー名が登録済みまたは不正です';


// Password
$lang['password_change_successful'] 	 	 = 'パスワードを変更しました';
$lang['password_change_unsuccessful'] 	  	 = 'パスワードを変更することが出来ません';
$lang['forgot_password_successful'] 	 	 = 'パスワード再設定メールを送信しました';
$lang['forgot_password_unsuccessful'] 	 	 = 'パスワードを再設定することが出来ません';

// Activation
$lang['activate_successful'] 		  	 = 'アカウントを有効にしました';
$lang['activate_unsuccessful'] 		 	 = 'アカウントを有効にすることが出来ません';
$lang['deactivate_successful'] 		  	 = 'アカウントを無効にしました';
$lang['deactivate_unsuccessful'] 	  	 = 'アカウントを無効にすることが出来ません';
$lang['activation_email_successful'] 	 = 'アクティベーション・メールを送信しました';
$lang['activation_email_unsuccessful']   = 'アクティベーション・メールを送信できません';

// Login / Logout
$lang['login_successful'] 		  	 = 'ログインしました';
$lang['login_unsuccessful'] 		 = 'ログイン出来ません';
$lang['logout_successful'] 		 	 = 'ログアウトしました';

// Account Changes
$lang['update_successful'] 		 	 = 'アカウント情報を更新しました';
$lang['update_unsuccessful'] 		 = 'アカウント情報を更新することが出来ません';
$lang['delete_successful'] 		 	 = 'ユーザーを削除しました';
$lang['delete_unsuccessful'] 		 = 'ユーザーを削除することが出来ません';

// Email Subjects - TODO Please Translate
$lang['email_forgotten_password_subject']    = '忘れたパスワードの確認';
$lang['email_new_password_subject']          = '新しいパスワード';
$lang['email_activation_subject']            = 'アカウントの承認';
