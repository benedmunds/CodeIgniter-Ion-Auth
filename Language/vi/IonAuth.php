<?php
/**
* Name:  Ion Auth Lang - Vietnamese
*
* Author: Trung Dinh Quang
* 		  trungdq88@gmail.com
*         @trungdq88
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  01.17.2015
*
* Description:  Vietnamese language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful' 	  	 => 'Đã khởi tạo tài khoản thành công',
	'account_creation_unsuccessful' 	 	 => 'Không thể tạo tài khoản vào lúc này',
	'account_creation_duplicate_email' 	 => 'Địa chỉ email không hợp lệ hoặc đã được sử dụng',
	'account_creation_duplicate_identity' => 'Tên tài khoản không hợp lệ hoặc đã được sử dụng',

	// Password
	'password_change_successful' 	 	 => 'Đã thay đổi mật khẩu thành công',
	'password_change_unsuccessful' 	  	 => 'Không thể thay đổi mật khẩu vào lúc này',
	'forgot_password_successful' 	 	 => 'Email khôi phục mật khẩu đã được gửi đi',
	'forgot_password_unsuccessful' 	 	 => 'Không thể khôi phục mật khẩu vào lúc này',

	// Activation
	'activate_successful' 		  	     => 'Tài khoản đã được kích hoạt',
	'activate_unsuccessful' 		 	     => 'Không thể kích hoạt tài khoản vào lúc này',
	'deactivate_successful' 		  	     => 'Đã khoá tài khoản thành công',
	'deactivate_unsuccessful' 	  	     => 'Không thể bất khoá tài khoản vào lúc này',
	'activation_email_successful' 	  	 => 'Đã gửi mail kích hoạt thành công',
	'activation_email_unsuccessful'   	 => 'Không thể gửi mail kích hoạt vào lúc này',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful' 		  	         => 'Đăng nhập thành công',
	'login_unsuccessful' 		  	     => 'Tài khoản hoặc mật khẩu không đúng',
	'login_unsuccessful_not_active' 		 => 'Tài khoản này đã bị khoá',
	'login_timeout'                       => 'Tài khoản này đã tạm thời bị khoá, vui lòng thử lại sau',
	'logout_successful' 		 	         => 'Đăng xuất thành công',

	// Account Changes
	'update_successful' 		 	         => 'Thông tin tài khoản đã được thay đổi thành công',
	'update_unsuccessful' 		 	     => 'Không thể thay đổi thông tin tài khoản vào lúc này',
	'delete_successful'               => 'Đã xoá tài khoản',
	'delete_unsuccessful'           => 'Không thể xoá tài khoản vào lúc này',

	// Groups
	'group_creation_successful'  => 'Đã tạo nhóm mới thành công',
	'group_already_exists'       => 'Tên nhóm bị trùng',
	'group_update_successful'    => 'Đã cập nhật thông tin nhóm thành công',
	'group_delete_successful'    => 'Đã xoá nhóm',
	'group_delete_unsuccessful' 	=> 'Không thể xoá nhóm vào lúc này',
	'group_delete_notallowed'    => 'Can\'t delete the administrators\' group',
	'group_name_required' 		=> 'Vui lòng nhập tên nhóm',
	'group_name_admin_not_alter' => 'Admin group name can not be changed',

	// Activation Email
	'emailActivation_subject'            => 'Kích hoạt tài khoản',
	'emailActivate_heading'    => 'Kích hoạt tài khoản của %s',
	'emailActivate_subheading' => 'Vui lòng click vào link này để %s.',
	'emailActivate_link'       => 'Kích hoạt tài khoản',

	// Forgot Password Email
	'email_forgotten_password_subject'    => 'Xác nhận quên mật khẩu',
	'emailForgotPassword_heading'    => 'Khôi phục mật khẩu cho %s',
	'emailForgotPassword_subheading' => 'Vui lòng click vào link này để %s.',
	'emailForgotPassword_link'       => 'Khôi phục mật khẩu của bạn',
];
