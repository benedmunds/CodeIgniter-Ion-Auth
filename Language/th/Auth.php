<?php
/**
* Name:  Auth Lang - Thai
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
* Author: Rachasak Ragkamnerd
* 		  id513128@gmail.com
*         @itpcc
*
* Location: http://github.com/benedmunds/ion_auth/
*
* created:  03.09.2013
* modify :  10.11.2014
*
* Detail:  Thai language file for Ion Auth example views based from English version
*
*/

return [
	// Errors
	'error_security' => 'POST ฟอร์มนี้ไม่ผ่านการตรวจสอบความปลอดภัย',

	// Login
	'login_heading'         => 'เข้าสู่ระบบ',
	'login_subheading'      => 'โปรดเข้าสู่ระบบโดยกรอกชื่อผู้ใช้/อีเมล์ และรหัสผ่านที่ฟอร์มด้านล่าง',
	'login_identity_label'  => 'อีเมล์/ชื่อผู้ใช้:',
	'login_password_label'  => 'รหัสผ่าน:',
	'login_remember_label'  => 'ให้ฉันอยู่ในระบบต่อไป:',
	'login_submit_btn'      => 'เข้าสู่ระบบ',
	'login_forgot_password' => 'ลืมรหัสผ่าน?',

	// Index
	'index_heading'           => 'ผู้ใช้ทั้งหมด',
	'index_subheading'        => 'รายชื่อผุ้ใช้',
	'index_fname_th'          => 'ชื่อ',
	'index_lname_th'          => 'นามสกุล',
	'index_email_th'          => 'อีเมล์',
	'index_groups_th'         => 'กลุ่ม',
	'index_status_th'         => 'สถานะ',
	'index_action_th'         => 'การกระทำ',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'กำลังทำงาน',
	'index_inactive_link'     => 'ไม่ทำงาน',
	'index_create_user_link'  => 'สร้างผู้ใช้ใหม่',
	'index_create_group_link' => 'สร้างกลุ่มใหม่',

	// เลิกใช้งานผู้ใช้
	'deactivate_heading'                  => 'เลิกใช้งานผู้ใช้',
	'deactivate_subheading'               => 'ยืนยันการเลิกใช้งานผู้ใช้ \'%s\'',
	'deactivate_confirm_y_label'          => 'ใช่:',
	'deactivate_confirm_n_label'          => 'ไม่:',
	'deactivate_submit_btn'               => 'ยอมรับ',
	'deactivate_validation_confirm_label' => 'การยืนยัน',
	'deactivate_validation_user_id_label' => 'รหัสผู้ใช้',

	// สร้าง ผู้ใช้
	'create_user_heading'                           => 'สร้าง ผู้ใช้',
	'create_user_subheading'                        => 'กรุณากรอกรายละเอียดข้อมูลผู้ใช้',
	'create_user_fname_label'                       => 'ชื่อ:',
	'create_user_lname_label'                       => 'นามสกุล:',
	'create_user_identity_label'                    => 'Identity:',
	'create_user_company_label'                     => 'ชื่อบริษัท:',
	'create_user_email_label'                       => 'อีเมล์:',
	'create_user_phone_label'                       => 'หมายเลขโทรศัพท์:',
	'create_user_password_label'                    => 'รหัสผ่าน:',
	'create_user_password_confirm_label'            => 'ยืนยันรหัสผ่าน:',
	'create_user_submit_btn'                        => 'สร้างผู้ใช้',
	'create_user_validation_fname_label'            => 'ชื่อ',
	'create_user_validation_lname_label'            => 'นามสกุล',
	'create_user_validation_identity_label'         => 'Identity',
	'create_user_validation_email_label'            => 'ที่อยู่อีเมล์',
	'create_user_validation_phone1_label'           => 'หมายเลขโทรศัพท์ส่วนแรก',
	'create_user_validation_phone2_label'           => 'หมายเลขโทรศัพท์ส่วนที่สอง',
	'create_user_validation_phone3_label'           => 'หมายเลขโทรศัพท์ส่วนที่สาม',
	'create_user_validation_company_label'          => 'ชื่อบริษัท',
	'create_user_validation_password_label'         => 'รหัสผ่าน',
	'create_user_validation_password_confirm_label' => 'ยืนยันรหัสผ่าน',

	// แก้ไขผู้ใช้
	'edit_user_heading'                           => 'แก้ไขผู้ใช้',
	'edit_user_subheading'                        => 'กรุณากรอกรายละเอียดข้อมูลผู้ใช้',
	'edit_user_fname_label'                       => 'ชื่อ:',
	'edit_user_lname_label'                       => 'นามสกุล:',
	'edit_user_company_label'                     => 'ชื่อบริษัท:',
	'edit_user_email_label'                       => 'อีเมล์:',
	'edit_user_phone_label'                       => 'หมายเลขโทรศัพท์:',
	'edit_user_password_label'                    => 'รหัสผ่าน: (ถ้าจะแก้ไขรหัสผ่าน)',
	'edit_user_password_confirm_label'            => 'ยืนยันรหัสผ่าน: (ถ้าจะแก้ไขรหัสผ่าน)',
	'edit_user_groups_heading'                    => 'สมาชิกในกลุ่ม',
	'edit_user_submit_btn'                        => 'บันทึกผู้ใช้',
	'edit_user_validation_fname_label'            => 'ชื่อ',
	'edit_user_validation_lname_label'            => 'นามสกุล',
	'edit_user_validation_email_label'            => 'ที่อยู่อีเมล์',
	'edit_user_validation_phone1_label'           => 'หมายเลขโทรศัพท์ส่วนแรก',
	'edit_user_validation_phone2_label'           => 'หมายเลขโทรศัพท์ส่วนที่สอง',
	'edit_user_validation_phone3_label'           => 'หมายเลขโทรศัพท์ส่วนที่สาม',
	'edit_user_validation_company_label'          => 'ชื่อบริษัท',
	'edit_user_validation_groups_label'           => 'กลุ่ม',
	'edit_user_validation_password_label'         => 'รหัสผ่าน',
	'edit_user_validation_password_confirm_label' => 'ยืนยันรหัสผ่าน',

	// สร้างกลุ่ม
	'create_group_title'                  => 'สร้างกลุ่ม',
	'create_group_heading'                => 'สร้างกลุ่ม',
	'create_group_subheading'             => 'กรุณากรอกรายละเอียดกลุ่ม',
	'create_group_name_label'             => 'ชื่อกลุ่ม:',
	'create_group_desc_label'             => 'รายละเอียด:',
	'create_group_submit_btn'             => 'สร้างกลุ่ม',
	'create_group_validation_name_label'  => 'ชื่อกลุ่ม',
	'create_group_validation_desc_label'  => 'รายละเอียด',

	// แก้ไขกลุ่ม
	'edit_group_title'                  => 'แก้ไขกลุ่ม',
	'edit_group_saved'                  => 'บันทึกกลุ่มเรียบร้อยแล้ว',
	'edit_group_heading'                => 'แก้ไขกลุ่ม',
	'edit_group_subheading'             => 'กรุณากรอกรายละเอียดกลุ่ม',
	'edit_group_name_label'             => 'ชื่อกลุ่ม:',
	'edit_group_desc_label'             => 'รายละเอียด:',
	'edit_group_submit_btn'             => 'บันทึกกลุ่ม',
	'edit_group_validation_name_label'  => 'ชื่อกลุ่ม',
	'edit_group_validation_desc_label'  => 'รายละเอียด',

	// เปลี่ยนรหัสผ่าน
	'change_password_heading'                               => 'เปลี่ยนรหัสผ่าน',
	'change_password_old_password_label'                    => 'รหัสผ่านเดิม:',
	'change_password_new_password_label'                    => 'รหัสผ่านใหม่ (ต้องยาวอย่างอย่างน้อย %s ตัวอักษร):',
	'change_password_new_password_confirm_label'            => 'ยืนยันรหัสผ่านใหม่:',
	'change_password_submit_btn'                            => 'เปลี่ยน',
	'change_password_validation_old_password_label'         => 'รหัสผ่านเดิม',
	'change_password_validation_new_password_label'         => 'รหัสผ่านใหม่',
	'change_password_validation_new_password_confirm_label' => 'ยืนยันรหัสผ่านใหม่',

	// ลืมรหัสผ่าน
	'forgot_password_heading'                 => 'ลืมรหัสผ่าน',
	'forgot_password_subheading'              => 'กรุณากรอก%sของคุณเพื่อให้เราส่งอีเมล์ยืนยันรหัสผ่านใหม่ให้',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'ยอมรับ',
	'forgot_password_validation_email_label'  => 'ที่อยู่อีเมล์',
	'forgot_password_username_identity_label' => 'ชื่อผู้ใช้',
	'forgot_password_email_identity_label'    => 'อีเมล์',
	'forgot_password_email_not_found'         => 'ไม่พบที่อยู่อีเมล์นี้ในสารบบ',
	'forgot_password_identity_not_found'         => 'No record of that username address.',

	// ตั้งรหัสผ่านใหม่
	'reset_password_heading'                               => 'ตั้งรหัสผ่านใหม่',
	'reset_password_new_password_label'                    => 'รหัสผ่านใหม่ (ต้องยาวอย่างอย่างน้อย %s ตัวอักษร):',
	'reset_password_new_password_confirm_label'            => 'ยืนยันรหัสผ่านใหม่:',
	'reset_password_submit_btn'                            => 'เปลี่ยน',
	'reset_password_validation_new_password_label'         => 'รหัสผ่านใหม่',
	'reset_password_validation_new_password_confirm_label' => 'ยืนยันรหัสผ่านใหม่',
];
