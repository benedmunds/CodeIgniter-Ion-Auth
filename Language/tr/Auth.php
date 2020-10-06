<?php
/**
* Name:  Auth Lang - Turkish
*
* Author: Hüseyin Kozan
* 		  posta@huseyinkozan.com.tr
*         @huseyinkozan
*
* Location: http://github.com/huseyinkozan/CodeIgniter-Ion-Auth/
*
* Created:  21.08.2014
*
* Description:  Turkish language file for Ion Auth example views
*
*/

return [
	// Errors
	'error_security' => 'Gönderilen form verisi güvenlik kontrolünden geçemedi.',

	// Login
	'login_heading'         => 'Giriş',
	'login_subheading'      => 'Lütfen kullanıcı adınız/epostanız ve şifreniz ile giriş yapın. ',
	'login_identity_label'  => 'Eposta/Kullanıcı Adı:',
	'login_password_label'  => 'Şifre:',
	'login_remember_label'  => 'Beni Hatırla:',
	'login_submit_btn'      => 'Gir',
	'login_forgot_password' => 'Şifrenizi mi unuttunuz ?',

	// Index
	'index_heading'           => 'Kullanıcılar',
	'index_subheading'        => 'Aşağıdaki kullanıcıların listesidir.',
	'index_fname_th'          => 'İsim',
	'index_lname_th'          => 'Soyisim',
	'index_email_th'          => 'Eposta',
	'index_groups_th'         => 'Gruplar',
	'index_status_th'         => 'Durum',
	'index_action_th'         => 'Eylem',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'Etkin',
	'index_inactive_link'     => 'Etkin Değil',
	'index_create_user_link'  => 'Yeni bir kullanıcı oluştur',
	'index_create_group_link' => 'Yeni bir grup oluştur',

	// Deactivate User
	'deactivate_heading'                  => 'Kullanıcı Devre Dışı Bırakma',
	'deactivate_subheading'               => '\'%s\' Kullanıcısını devre dışı bırakmak istediğinizden emin misiniz ?',
	'deactivate_confirm_y_label'          => 'Evet:',
	'deactivate_confirm_n_label'          => 'Hayır:',
	'deactivate_submit_btn'               => 'Kaydet',
	'deactivate_validation_confirm_label' => 'onaylama',
	'deactivate_validation_user_id_label' => 'kullanıcı ID',

	// Create User
	'create_user_heading'                           => 'Kullanıcı Oluşturma',
	'create_user_subheading'                        => 'Kullanıcı bilgilerini aşağıya giriniz.',
	'create_user_fname_label'                       => 'İsim:',
	'create_user_lname_label'                       => 'Soyisim:',
	'create_user_identity_label'                    => 'Identity:',
	'create_user_company_label'                     => 'Şirket İsmi:',
	'create_user_email_label'                       => 'Eposta:',
	'create_user_phone_label'                       => 'Telefon:',
	'create_user_password_label'                    => 'Şifre:',
	'create_user_password_confirm_label'            => 'Şifre Tekrarı:',
	'create_user_submit_btn'                        => 'Kullanıcı Oluştur',
	'create_user_validation_fname_label'            => 'İsim',
	'create_user_validation_lname_label'            => 'Soyisim',
	'create_user_validation_identity_label'         => 'Identity',
	'create_user_validation_email_label'            => 'Eposta Adresi',
	'create_user_validation_phone1_label'           => 'Telefonun İlk Kısmı',
	'create_user_validation_phone2_label'           => 'Telefonun İkinci Kısmı',
	'create_user_validation_phone3_label'           => 'Telefonun Üçüncü Kısmı',
	'create_user_validation_company_label'          => 'Şirket İsmi',
	'create_user_validation_password_label'         => 'Şifre',
	'create_user_validation_password_confirm_label' => 'Şifre Tekrarı',

	// Edit User
	'edit_user_heading'                           => 'Kullanıcı Düzenleme',
	'edit_user_subheading'                        => 'Kullanıcı bilgilerini aşağıya giriniz.',
	'edit_user_fname_label'                       => 'İsim:',
	'edit_user_lname_label'                       => 'Soyisim:',
	'edit_user_company_label'                     => 'Şirket İsmi:',
	'edit_user_email_label'                       => 'Eposta:',
	'edit_user_phone_label'                       => 'Telefon:',
	'edit_user_password_label'                    => 'Şifre: (Eğer değişecekse)',
	'edit_user_password_confirm_label'            => 'Şifre Tekrarı: (Eğer değişecekse)',
	'edit_user_groups_heading'                    => 'Üye olduğu gruplar',
	'edit_user_submit_btn'                        => 'Kullanıcıyı Kaydet',
	'edit_user_validation_fname_label'            => 'İsim',
	'edit_user_validation_lname_label'            => 'Soyisim',
	'edit_user_validation_email_label'            => 'Eposta Adresi',
	'edit_user_validation_phone1_label'           => 'Telefonun İlk Kısmı',
	'edit_user_validation_phone2_label'           => 'Telefonun İkinci Kısmı',
	'edit_user_validation_phone3_label'           => 'Telefonun Üçüncü Kısmı',
	'edit_user_validation_company_label'          => 'Şirket İsmi',
	'edit_user_validation_groups_label'           => 'Gruplar',
	'edit_user_validation_password_label'         => 'Şifre',
	'edit_user_validation_password_confirm_label' => 'Şifre Tekrarı',

	// Create Group
	'create_group_title'                  => 'Grup Oluşturma',
	'create_group_heading'                => 'Grup Oluşturma',
	'create_group_subheading'             => 'Grup bilgilerini aşağıya giriniz.',
	'create_group_name_label'             => 'Grup İsmi:',
	'create_group_desc_label'             => 'Açıklama:',
	'create_group_submit_btn'             => 'Grubu Oluştur',
	'create_group_validation_name_label'  => 'Grup İsmi',
	'create_group_validation_desc_label'  => 'Açıklama',

	// Edit Group
	'edit_group_title'                  => 'Grup Düzenleme',
	'edit_group_saved'                  => 'Grup Kaydedildi',
	'edit_group_heading'                => 'Grup Düzenleme',
	'edit_group_subheading'             => 'Grup bilgilerini aşağıya giriniz.',
	'edit_group_name_label'             => 'Grup İsmi:',
	'edit_group_desc_label'             => 'Açıklama:',
	'edit_group_submit_btn'             => 'Grubu Kaydet',
	'edit_group_validation_name_label'  => 'Grup İsmi',
	'edit_group_validation_desc_label'  => 'Açıklama',

	// Change Password
	'change_password_heading'                               => 'Şifre Değiştirme',
	'change_password_old_password_label'                    => 'Eski Şifre:',
	'change_password_new_password_label'                    => 'Yeni Şifre (en az %s karakter uzunluğunda):',
	'change_password_new_password_confirm_label'            => 'Yeni Şifre Tekrarı:',
	'change_password_submit_btn'                            => 'Değiştir',
	'change_password_validation_old_password_label'         => 'Eski Şifre',
	'change_password_validation_new_password_label'         => 'Yeni Şifre',
	'change_password_validation_new_password_confirm_label' => 'Yeni Şifre Tekrarı',

	// Forgot Password
	'forgot_password_heading'                 => 'Şifremi Unuttum',
	'forgot_password_subheading'              => 'Şifrenizi sıfırlamanızı sağlayacak eposta gönderebilmemiz için %s giriniz.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Gönder',
	'forgot_password_validation_email_label'  => 'Eposta Adresi',
	'forgot_password_identity_label'          => 'Kullanıcı Adı',
	'forgot_password_email_identity_label'    => 'Eposta',
	'forgot_password_email_not_found'         => 'Belirttiğiniz Eposta adresi için bir kayıt bulunamadı.',
	'forgot_password_identity_not_found'         => 'No record of that username address.',

	// Reset Password
	'reset_password_heading'                               => 'Şifre Değiştirme',
	'reset_password_new_password_label'                    => 'Yeni Şifre (en az %s karakter uzunluğunda):',
	'reset_password_new_password_confirm_label'            => 'Yeni Şifre Tekrarı:',
	'reset_password_submit_btn'                            => 'Değiştir',
	'reset_password_validation_new_password_label'         => 'Yeni Şifre',
	'reset_password_validation_new_password_confirm_label' => 'Yeni Şifre Tekrarı',

	// Forgot Password Email
	'emailForgotPassword_heading'    => '%s İçin Şifre Sıfırlama',
	'emailForgotPassword_subheading' => 'Bağlantıya basarak %s.',
	'emailForgotPassword_link'       => 'Şifrenizi Sıfırlayınız',
];
