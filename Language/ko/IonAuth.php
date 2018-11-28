<?php
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

return [
	// Account Creation
	'account_creation_successful' 	  	 => '계정을 만들었습니다',
	'account_creation_unsuccessful' 	 	 => '계정을 만들 수 없습니다',
	'account_creation_duplicate_email' 	 => '이 이메일은 사용중이거나 올바르지 않습니다',
	'account_creation_duplicate_identity' => '이 계정명은 사용중이거나 올바르지 않습니다',

	// TODO Please Translate
	'account_creation_missing_defaultGroup' => 'Default group is not set',
	'account_creation_invalid_defaultGroup' => 'Invalid default group name set',

	// Password
	'password_change_successful' 	 	 => '비밀번호를 바꾸었습니다',
	'password_change_unsuccessful' 	  	 => '비밀번호를 바꿀 수 없습니다',
	'forgot_password_successful' 	 	 => '비밀번호 재설정 이메일을 보냈습니다',
	'forgot_password_unsuccessful' 	 	 => '비밀번호를 재설정할 수 없습니다.',

	// Activation
	'activate_successful' 		  	     => '계정을 활성화하였습니다',
	'activate_unsuccessful' 		 	     => '계정을 활성화할 수 없습니다',
	'deactivate_successful' 		  	     => '계정을 비활성화하였습니다',
	'deactivate_unsuccessful' 	  	     => '계정을 비활성화할 수 없습니다',
	'activation_email_successful' 	  	 => '계정 활성화 이메일을 보냈습니다',
	'activation_email_unsuccessful'   	 => '계정 활성화 이메일을 보날 수 없습니다',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful' 		  	         => '로그인 하였습니다',
	'login_unsuccessful' 		  	     => '로그인할 수 없습니다',
	'login_unsuccessful_not_active' 		 => '계정이 비활성화 되어 로그인할 수 없습니다',
	'login_timeout'                       => '계정이 잠시 잠긴 것 같습니다. 잠시 후에 다시 시도해 주세요.',
	'logout_successful' 		 	         => '로그아웃을 하였습니다',

	// Account Changes
	'update_successful' 		 	         => '계정 정보를 업데이트 하였습니다',
	'update_unsuccessful' 		 	     => '계정 정보를 업데이트할 수 없습니다',
	'delete_successful'               => '사용자를 삭제하였습니다',
	'delete_unsuccessful'           => '사용자를 삭제할 수 없습니다',

	// Groups
	'group_creation_successful'  => '그룹을 생성하였습니다',
	'group_already_exists'       => '이미 사용 중인 그룹명입니다',
	'group_update_successful'    => '그룹에 대한 세부 정보를 업데이트 하였습니다',
	'group_delete_successful'    => '그룹을 삭제했습니다',
	'group_delete_unsuccessful' 	=> '그룹을 삭제할 수 없습니다',
	'group_delete_notallowed'    => 'Can\'t delete the administrators\' group',
	'group_name_required' 		=> '그룹 이름을 입력해 주십시오',
	'group_name_admin_not_alter' => 'Admin group name can not be changed',

	// Activation Email
	'emailActivation_subject'            => '계정 활성화 방법을 보내드립니다',
	'emailActivate_heading'    => '%s 계정 활성화',
	'emailActivate_subheading' => '다음 링크를 클릭하여 %s로 접근해 주십시오.',
	'emailActivate_link'       => '계정 활성화',

	// Forgot Password Email
	'email_forgotten_password_subject'    => '잊어버린 비밀번호를 찾는 절차를 보내드립니다',
	'emailForgotPassword_heading'    => 'Reset Password for %s',
	'emailForgotPassword_subheading' => 'Please click this link to %s.',
	'emailForgotPassword_link'       => 'Reset Your Password',
];
