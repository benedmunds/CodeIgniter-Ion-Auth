<?php
/**
* Name:  Auth Lang - Vietnamese
*
* Author: Trung Dinh Quang
* 		  trungdq88@gmail.com
*         @trungdq88
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  01.17.2015
*
* Description:  Vietnamese language file for Ion Auth example views
*
*/

return [
	// Errors
	'error_security' => 'Có lỗi xảy ra trong quá trình đăng nhập.',

	// Login
	'login_heading'         => 'Đăng nhập',
	'login_subheading'      => 'Đăng nhập bằng email.',
	'login_identity_label'  => 'Email',
	'login_password_label'  => 'Mật khẩu',
	'login_remember_label'  => 'Nhớ mật khẩu',
	'login_submit_btn'      => 'Đăng nhập',
	'login_forgot_password' => 'Quên mật khẩu?',

	// Index
	'index_heading'           => 'Tài khoản',
	'index_subheading'        => 'Danh sách tài khoản.',
	'index_fname_th'          => 'Tên',
	'index_lname_th'          => 'Họ',
	'index_email_th'          => 'Email',
	'index_groups_th'         => 'Nhóm',
	'index_status_th'         => 'Trạng thái',
	'index_action_th'         => 'Tác vụ',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'Kích hoạt',
	'index_inactive_link'     => 'Khoá',
	'index_create_user_link'  => 'Tạo tài khoản mới',
	'index_create_group_link' => 'Tạo nhóm mới',

	// Deactivate User
	'deactivate_heading'                  => 'Khoá tài khoản',
	'deactivate_subheading'               => 'Bạn có chắc chắn muốn khoá tài khoản \'%s\'',
	'deactivate_confirm_y_label'          => 'Có:',
	'deactivate_confirm_n_label'          => 'Không:',
	'deactivate_submit_btn'               => 'Chấp nhận',
	'deactivate_validation_confirm_label' => 'Xác nhận',
	'deactivate_validation_user_id_label' => 'ID Tài khoản',

	// Create User
	'create_user_heading'                           => 'Tạo tài khoản',
	'create_user_subheading'                        => 'Vui lòng nhập các thông tin cần thiết sau.',
	'create_user_fname_label'                       => 'Tên:',
	'create_user_lname_label'                       => 'Họ:',
	'create_user_identity_label'                    => 'Identity:',
	'create_user_company_label'                     => 'Công ty:',
	'create_user_email_label'                       => 'Email:',
	'create_user_phone_label'                       => 'Điện thoại:',
	'create_user_password_label'                    => 'Mật khẩu:',
	'create_user_password_confirm_label'            => 'Xác nhận mật khẩu:',
	'create_user_submit_btn'                        => 'Tạo tài khoản',
	'create_user_validation_fname_label'            => 'Tên',
	'create_user_validation_lname_label'            => 'Họ',
	'create_user_validation_identity_label'         => 'Identity',
	'create_user_validation_email_label'            => 'Email',
	'create_user_validation_phone1_label'           => 'Số điện thoại (mã vùng)',
	'create_user_validation_phone2_label'           => 'Số điện thoại (3 số đầu)',
	'create_user_validation_phone3_label'           => 'Số điện thoại (các số còn lại)',
	'create_user_validation_company_label'          => 'Tên công ty',
	'create_user_validation_password_label'         => 'Mật khẩu',
	'create_user_validation_password_confirm_label' => 'Xác nhận mật khẩu',

	// Edit User
	'edit_user_heading'                           => 'Sửa thông tin tài khoản',
	'edit_user_subheading'                        => 'Vui lòng nhập các thông tin sau.',
	'edit_user_fname_label'                       => 'Tên:',
	'edit_user_lname_label'                       => 'Họ:',
	'edit_user_company_label'                     => 'Tên công ty:',
	'edit_user_email_label'                       => 'Email:',
	'edit_user_phone_label'                       => 'Số điện thoại:',
	'edit_user_password_label'                    => 'Mật khẩu: (nếu có thay đổi)',
	'edit_user_password_confirm_label'            => 'Xác nhận mật khẩu: (nếu có thay đổi)',
	'edit_user_groups_heading'                    => 'Các nhóm tham gia',
	'edit_user_submit_btn'                        => 'Lưu lại',
	'edit_user_validation_fname_label'            => 'Tên',
	'edit_user_validation_lname_label'            => 'Họ',
	'edit_user_validation_email_label'            => 'Email',
	'edit_user_validation_phone1_label'           => 'Số điện thoại (mã vùng)',
	'edit_user_validation_phone2_label'           => 'Số điện thoại (3 số đầu)',
	'edit_user_validation_phone3_label'           => 'Số điện thoại (các số còn lại)',
	'edit_user_validation_company_label'          => 'Tên công ty',
	'edit_user_validation_groups_label'           => 'Nhóm',
	'edit_user_validation_password_label'         => 'Mật khẩu',
	'edit_user_validation_password_confirm_label' => 'Xác nhận mật khẩu',

	// Create Group
	'create_group_title'                  => 'Tạo nhóm mới',
	'create_group_heading'                => 'Tạo nhóm mới',
	'create_group_subheading'             => 'Vui lòng nhập các thông tin bên dưới.',
	'create_group_name_label'             => 'Tên nhóm:',
	'create_group_desc_label'             => 'Mô tả:',
	'create_group_submit_btn'             => 'Tạo nhóm',
	'create_group_validation_name_label'  => 'Tên nhóm',
	'create_group_validation_desc_label'  => 'Mô tả',

	// Edit Group
	'edit_group_title'                  => 'Sửa thông tin nhóm',
	'edit_group_saved'                  => 'Đã lưu',
	'edit_group_heading'                => 'Sửa thông tin nhóm',
	'edit_group_subheading'             => 'Vui lòng nhập các thông tin bên dưới.',
	'edit_group_name_label'             => 'Tên nhóm:',
	'edit_group_desc_label'             => 'Mô tả:',
	'edit_group_submit_btn'             => 'Lưu lại',
	'edit_group_validation_name_label'  => 'Tên nhóm',
	'edit_group_validation_desc_label'  => 'Mô tả',

	// Change Password
	'change_password_heading'                               => 'Đổi mật khẩu',
	'change_password_old_password_label'                    => 'Mật khẩu cũ:',
	'change_password_new_password_label'                    => 'Mật khẩu mới (ít nhất %s ký tự):',
	'change_password_new_password_confirm_label'            => 'Xác nhận mật khẩu mới:',
	'change_password_submit_btn'                            => 'Lưu lại',
	'change_password_validation_old_password_label'         => 'Mật khẩu cũ',
	'change_password_validation_new_password_label'         => 'Mật khẩu mới',
	'change_password_validation_new_password_confirm_label' => 'Xác nhận mật khẩu mới',

	// Forgot Password
	'forgot_password_heading'                 => 'Quên mật khẩu',
	'forgot_password_subheading'              => 'Vui lòng nhập %s để nhận được email khôi phục mật khẩu.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Xác nhận',
	'forgot_password_validation_email_label'  => 'Email',
	'forgot_password_username_identity_label' => 'Tài khoản',
	'forgot_password_email_identity_label'    => 'Email',
	'forgot_password_email_not_found'         => 'Địa chỉ email không tồn tại.',
	'forgot_password_identity_not_found'         => 'No record of that username address.',

	// Reset Password
	'reset_password_heading'                               => 'Đổi mật khẩu',
	'reset_password_new_password_label'                    => 'Mật khẩu mới (ít nhất %s ký tự):',
	'reset_password_new_password_confirm_label'            => 'Xác nhận mật khẩu mới:',
	'reset_password_submit_btn'                            => 'Lưu lại',
	'reset_password_validation_new_password_label'         => 'Mật khẩu mới',
	'reset_password_validation_new_password_confirm_label' => 'Xác nhận mật khẩu mới',
];
