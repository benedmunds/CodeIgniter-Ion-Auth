<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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

// Account Creation
$lang['account_creation_successful'] 	  	 = '账号创建成功';
$lang['account_creation_unsuccessful'] 	 	 = '账号创建失败';
$lang['account_creation_duplicate_email'] 	 = '电子邮件已被使用或不合法';
$lang['account_creation_duplicate_username'] 	 = '账号已存在或不合法';


// Password
$lang['password_change_successful'] 	 	 = '密码已修改';
$lang['password_change_unsuccessful'] 	  	 = '密码修改失败';
$lang['forgot_password_successful'] 	 	 = '密码已重设,请查收您的电子邮件';
$lang['forgot_password_unsuccessful'] 	 	 = '密码重设失败';

// Activation
$lang['activate_successful'] 		  	 = '账号已激活';
$lang['activate_unsuccessful'] 		 	 = '账号激活失败';
$lang['deactivate_successful'] 		  	 = '账号已关闭';
$lang['deactivate_unsuccessful'] 	  	 = '账号关闭失败';
$lang['activation_email_successful'] 	  	 = '已发送激活账号的电子邮件';
$lang['activation_email_unsuccessful']   	 = '发送激活账号的电子邮件失败';

// Login / Logout
$lang['login_successful'] 		  	 = '登录成功';
$lang['login_unsuccessful'] 		  	 = '登录失败';
$lang['logout_successful'] 		 	 = '您已成功退出';
  
// Account Changes
$lang['update_successful'] 		 	 = '账号资料已更新';
$lang['update_unsuccessful'] 		 	 = '更新账号资料失败';
$lang['delete_successful'] 		 	 = '账号已删除';
$lang['delete_unsuccessful'] 		 	 = '删除账号失败';

// Email Subjects
$lang['email_forgotten_password_subject']    = '密码重设验证';
$lang['email_new_password_subject']          = '您的新密码';
$lang['email_activation_subject']            = '帐号激活';