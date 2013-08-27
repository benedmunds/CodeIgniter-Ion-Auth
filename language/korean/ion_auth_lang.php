<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Korean
*
* Author: Yoon, Seongsu
* 		  sople1@snooey.net
*         @sople1
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  2013-07-03
*
* Description:  Korean language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = '계정을 만들었습니다';
$lang['account_creation_unsuccessful'] 	 	 = '계정을 만들 수 없습니다';
$lang['account_creation_duplicate_email'] 	 = '이 이메일은 사용중이거나 올바르지 않습니다';
$lang['account_creation_duplicate_username'] = '이 계정명은 사용중이거나 올바르지 않습니다';

// Password
$lang['password_change_successful'] 	 	 = '비밀번호를 바꾸었습니다';
$lang['password_change_unsuccessful'] 	  	 = '비밀번호를 바꿀 수 없습니다';
$lang['forgot_password_successful'] 	 	 = '비밀번호 재설정 이메일을 보냈습니다';
$lang['forgot_password_unsuccessful'] 	 	 = '비밀번호를 재설정할 수 없습니다.';

// Activation
$lang['activate_successful'] 		  	     = '계정을 활성화하였습니다';
$lang['activate_unsuccessful'] 		 	     = '계정을 활성화할 수 없습니다';
$lang['deactivate_successful'] 		  	     = '계정을 비활성화하였습니다';
$lang['deactivate_unsuccessful'] 	  	     = '계정을 비활성화할 수 없습니다';
$lang['activation_email_successful'] 	  	 = '계정 활성화 이메일을 보냈습니다';
$lang['activation_email_unsuccessful']   	 = '계정 활성화 이메일을 보날 수 없습니다';

// Login / Logout
$lang['login_successful'] 		  	         = '로그인 하였습니다';
$lang['login_unsuccessful'] 		  	     = '로그인할 수 없습니다';
$lang['login_unsuccessful_not_active'] 		 = '계정이 비활성화 되어 로그인할 수 없습니다';
$lang['login_timeout']                       = '계정이 잠시 잠긴 것 같습니다. 잠시 후에 다시 시도해 주세요.';
$lang['logout_successful'] 		 	         = '로그아웃을 하였습니다';

// Account Changes
$lang['update_successful'] 		 	         = '계정 정보를 업데이트 하였습니다';
$lang['update_unsuccessful'] 		 	     = '계정 정보를 업데이트할 수 없습니다';
$lang['delete_successful']               = '사용자를 삭제하였습니다';
$lang['delete_unsuccessful']           = '사용자를 삭제할 수 없습니다';

// Groups
$lang['group_creation_successful']  = '그룹을 생성하였습니다';
$lang['group_already_exists']       = '이미 사용 중인 그룹명입니다';
$lang['group_update_successful']    = '그룹에 대한 세부 정보를 업데이트 하였습니다';
$lang['group_delete_successful']    = '그룹을 삭제했습니다';
$lang['group_delete_unsuccessful'] 	= '그룹을 삭제할 수 없습니다';
$lang['group_name_required'] 		= '그룹 이름을 입력해 주십시오';

// Email Subjects
$lang['email_forgotten_password_subject']    = '잊어버린 비밀번호를 찾는 절차를 보내드립니다';
$lang['email_new_password_subject']          = '새 비밀번호를 보내드립니다';
$lang['email_activation_subject']            = '계정 활성화 방법을 보내드립니다';