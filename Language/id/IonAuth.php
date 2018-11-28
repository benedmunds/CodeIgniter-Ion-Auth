<?php
/**
* Name:  Ion Auth Lang - Indonesian
*
* Author: Toni Haryanto
* 		  toha.samba@gmail.com
*         @yllumi
*
* Author: Daeng Muhammad Feisal
*         daengdoang@gmail.com
*         @daengdoang
*
* Author: Suhindra
*         suhindra@hotmail.co.id
*         @suhindra
*
* Location: https://github.com/benedmunds/CodeIgniter-Ion-Auth
*
* Created:  11.15.2011
* Last-Edit: 28.04.2016
*
* Description:  Indonesian language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful'				=> 'Akun Berhasil Dibuat',
	'account_creation_unsuccessful'				=> 'Tidak Dapat Membuat Akun',
	'account_creation_duplicate_email'			=> 'Email Sudah Digunakan atau Tidak Valid',
	'account_creation_duplicate_identity'	    => 'Identitas Sudah Digunakan atau Tidak Valid',

	// TODO Please Translate
	'account_creation_missing_defaultGroup'		=> 'Standar grup tidak diatur',
	'account_creation_invalid_defaultGroup'		=> 'Pengaturan Nama Grup Standar Tidak Valid',


	// Password
	'password_change_successful'					=> 'Kata Sandi Berhasil Diubah',
	'password_change_unsuccessful'				=> 'Tidak Dapat Mengganti Kata Sandi',
	'forgot_password_successful'					=> 'Email untuk Set Ulang Kata Sandi Telah Dikirim',
	'forgot_password_unsuccessful'				=> 'Tidak Dapat Set Ulang Kata Sandi',

	// Activation
	'activate_successful'						=> 'Akun Telah Diaktifkan',
	'activate_unsuccessful'						=> 'Tidak Dapat Mengaktifkan Akun',
	'deactivate_successful'						=> 'Akun Telah Dinonaktifkan',
	'deactivate_unsuccessful'					=> 'Tidak Dapat Menonaktifkan Akun',
	'activation_email_successful'			    => 'Email untuk Aktivasi Telah Dikirim. Silahkan cek inbox atau spam',
	'activation_email_unsuccessful'		        => 'Tidak Dapat Mengirimkan Email Aktivasi',
	'deactivate_current_user_unsuccessful'		=> 'Anda tidak dapat Nonaktifkan akun anda sendiri.',

	// Login / Logout
	'login_successful'							=> 'Log In Berhasil',
	'login_unsuccessful'							=> 'Log In Gagal',
	'login_unsuccessful_not_active'	            => 'Akun Tidak Aktif',
	'login_timeout'								=> 'Sementara Terkunci. Coba Beberapa Saat Lagi.',
	'logout_successful'							=> 'Log Out Berhasil',

	// Account Changes
	'update_successful'							=> 'Informasi Akun Berhasil Diperbaharui',
	'update_unsuccessful'						=> 'Gagal Memperbaharui Informasi Akun',
	'delete_successful'							=> 'Pengguna Telah Dihapus',
	'delete_unsuccessful'						=> 'Gagal Menghapus Pengguna',

	// Groups
	'group_creation_successful'				    => 'Grup Berhasil Dibuat',
	'group_already_exists'						=> 'Nama Grup Sudah Digunakan',
	'group_update_successful'					=> 'Rincian Grup Berhasil Diubah',
	'group_delete_successful'					=> 'Grup Berhasil Dihapus',
	'group_delete_unsuccessful'				    => 'Gagal Menghapus Grup',
	'group_delete_notallowed'					=> 'Tidak Dapat menghapus Grup Administrator',
	'group_name_required'						=> 'Nama Grup Tidak Boleh Kosong',
	'group_name_admin_not_alter'			    	=> 'Nama Grup Admin Tidak Bisa Diubah',

	// Activation Email
	'emailActivation_subject'					=> 'Aktivasi Akun',
	'emailActivate_heading'						=> 'Aktifkan Akun dari %s',
	'emailActivate_subheading'				    => 'Silahkan klik tautan berikut untuk %s.',
	'emailActivate_link'						=> 'Aktifkan Akun Anda',

	// Forgot Password Email
	'email_forgotten_password_subject'			=> 'Verifikasi Lupa Password',
	'emailForgotPassword_heading'				=> 'Setel Ulang Kata Sandi untuk %s',
	'emailForgotPassword_subheading'			=> 'Silahkan klik tautan berikut untuk %s.',
	'emailForgotPassword_link'					=> 'Setel Ulang Kata Sandi',
];
