<?php
/**
* Name:  Ion Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Rachasak Ragkamnerd
* 		  id513128@gmail.com
*         @itpcc
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.14.2010
* modify :  10.11.2014
*
* Description:  Thai language file for Ion Auth messages and errors based from English version
*
*/

return [
	// Account Creation
	'account_creation_successful' 	  	 => 'สร้างบัญชีสำเร็จ',
	'account_creation_unsuccessful' 	 	 => 'ไม่สามารถสร้างบัญชีได้',
	'account_creation_duplicate_email' 	 => 'อีเมล์นี้ถูกใช้ไปแล้วหรือรูปแบบไม่ถูกต้อง',
	'account_creation_duplicate_identity' => 'ชื่อผู้ใช้นี้ถูกใช้ไปแล้วหรือรูปแบบไม่ถูกต้อง',
	'account_creation_missing_defaultGroup' => 'กลุ่มปริยายยังไม่ถูกตั้ง',
	'account_creation_invalid_defaultGroup' => 'ชื่อกลุ่มปริยายตั้งไม่ถูกต้อง',


	// Password
	'password_change_successful' 	 	 => 'เปลี่ยนรหัสผ่านสำเร็จ',
	'password_change_unsuccessful' 	  	 => 'ไม่สามารถเปลี่ยนรหัสผ่านได้',
	'forgot_password_successful' 	 	 => 'อีเมล์ล้างรหัสผ่านถูกส่งไปแล้ว',
	'forgot_password_unsuccessful' 	 	 => 'ไม่สามารถล้างรหัสผ่านได้',

	// Activation
	'activate_successful' 		  	     => 'บัญชีเปิดใช้แล้ว',
	'activate_unsuccessful' 		 	     => 'ไม่สามารถเปิดใช้บัญชีได้',
	'deactivate_successful' 		  	     => 'บัญชีถูกปิดการใช้งานแล้ว',
	'deactivate_unsuccessful' 	  	     => 'ไม่สามารถปิดการใช้งานบัญชี',
	'activation_email_successful' 	  	 => 'ส่งอีเมล์เปิดใช้งานแล้ว',
	'activation_email_unsuccessful'   	 => 'ไม่สามารถส่งอีเมล์เปิดใช้งานรหัสผ่านได้',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful' 		  	         => 'เข้าสู่ระบบสำเร็จ',
	'login_unsuccessful' 		  	     => 'เข้าสู่ระบบไม่ถูกต้อง',
	'login_unsuccessful_not_active' 		 => 'บัญชีนี้ยังไม่เปิดใช้งาน',
	'login_timeout'                       => 'การเข้าสู่ระบบถูกระงับชั่วคราว กรุณาลองใหม่ในภายหลัง.',
	'logout_successful' 		 	         => 'ออกจากระบบสำเร็จ',

	// Accounts Changes
	'update_successful' 		 	         => 'แก้ไขข้อมูลบัญชีสำเร็จ',
	'update_unsuccessful' 		 	     => 'ไม่สามารถแก้ไขข้อมูลบัญชี',
	'delete_successful'               => 'ผู้ใช้ถูกลบแล้ว',
	'delete_unsuccessful'           => 'ไม่สามารถลบผู้ใช้ได้',

	// Groups
	'group_creation_successful'  => 'สร้างกลุ่มสำเร็จ',
	'group_already_exists'       => 'ชื่อกลุ่มถูกใช้ไปแล้ว',
	'group_update_successful'    => 'แก้ไขรายละเอียดกลุ่มแล้ว',
	'group_delete_successful'    => 'กลุ่มถูกลบแล้ว',
	'group_delete_unsuccessful' 	=> 'ไม่สามารถลบกลุ่มได้',
	'group_delete_notallowed'    => 'Can\'t delete the administrators\' group',
	'group_name_required' 		=> 'ต้องใส่ชื่อกลุ่ม',
	'group_name_admin_not_alter' => 'Admin group name can not be changed',

	// Activation Email
	'emailActivation_subject'            => 'การเปิดใช้บัญชี',
	'emailActivate_heading'    => 'เปิดใช้บัญชี %s',
	'emailActivate_subheading' => 'กรุณาคลิกลิงค์นี้เพื่อ%s',
	'emailActivate_link'       => 'เปิดใช้Your บัญชี',

	// Forgot Password Email
	'email_forgotten_password_subject'    => 'การยืนยันลืมรหัสผ่าน',
	'emailForgotPassword_heading'    => 'ล้างรหัสผ่านสำหรับ%s',
	'emailForgotPassword_subheading' => 'กรุณาคลิกลิงค์นี้เพื่อ%s',
	'emailForgotPassword_link'       => 'ล้างรหัสผ่าน',
];
