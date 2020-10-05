<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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

// Errors
$lang['error_csrf'] = 'Gönderilen form verisi güvenlik kontrolünden geçemedi.';

// Login
$lang['login_heading']         = 'Giriş';
$lang['login_subheading']      = 'Lütfen kullanıcı adınız/e-postanız ve parolanız ile giriş yapın. ';
$lang['login_identity_label']  = 'E-posta/Kullanıcı Adı:';
$lang['login_password_label']  = 'Parola:';
$lang['login_remember_label']  = 'Beni Hatırla:';
$lang['login_submit_btn']      = 'Gir';
$lang['login_forgot_password'] = 'Parolanızı mı unuttunuz ?';

// Index
$lang['index_heading']           = 'Kullanıcılar';
$lang['index_subheading']        = 'Aşağıdaki kullanıcıların listesidir.';
$lang['index_fname_th']          = 'İsim';
$lang['index_lname_th']          = 'Soyisim';
$lang['index_email_th']          = 'E-posta';
$lang['index_groups_th']         = 'Gruplar';
$lang['index_status_th']         = 'Durum';
$lang['index_action_th']         = 'Eylem';
$lang['index_active_link']       = 'Etkin';
$lang['index_inactive_link']     = 'Etkin Değil';
$lang['index_create_user_link']  = 'Yeni bir kullanıcı oluştur';
$lang['index_create_group_link'] = 'Yeni bir grup oluştur';

// Deactivate User
$lang['deactivate_heading']                  = 'Kullanıcı Devre Dışı Bırakma';
$lang['deactivate_subheading']               = '\'%s\' Kullanıcısını devre dışı bırakmak istediğinizden emin misiniz ?';
$lang['deactivate_confirm_y_label']          = 'Evet:';
$lang['deactivate_confirm_n_label']          = 'Hayır:';
$lang['deactivate_submit_btn']               = 'Kaydet';
$lang['deactivate_validation_confirm_label'] = 'onaylama';
$lang['deactivate_validation_user_id_label'] = 'kullanıcı ID';

// Create User
$lang['create_user_heading']                           = 'Kullanıcı Oluşturma';
$lang['create_user_subheading']                        = 'Kullanıcı bilgilerini aşağıya giriniz.';
$lang['create_user_fname_label']                       = 'İsim:';
$lang['create_user_lname_label']                       = 'Soyisim:';
$lang['create_user_identity_label']                    = 'Identity:';
$lang['create_user_company_label']                     = 'Şirket İsmi:';
$lang['create_user_email_label']                       = 'E-posta:';
$lang['create_user_phone_label']                       = 'Telefon:';
$lang['create_user_password_label']                    = 'Parola:';
$lang['create_user_password_confirm_label']            = 'Parola Tekrarı:';
$lang['create_user_submit_btn']                        = 'Kullanıcı Oluştur';
$lang['create_user_validation_fname_label']            = 'İsim';
$lang['create_user_validation_lname_label']            = 'Soyisim';
$lang['create_user_validation_identity_label']         = 'Identity';
$lang['create_user_validation_email_label']            = 'E-posta Adresi';
$lang['create_user_validation_phone1_label']           = 'Telefonun İlk Kısmı';
$lang['create_user_validation_phone2_label']           = 'Telefonun İkinci Kısmı';
$lang['create_user_validation_phone3_label']           = 'Telefonun Üçüncü Kısmı';
$lang['create_user_validation_company_label']          = 'Şirket İsmi';
$lang['create_user_validation_password_label']         = 'Parola';
$lang['create_user_validation_password_confirm_label'] = 'Parola Tekrarı';

// Edit User
$lang['edit_user_heading']                           = 'Kullanıcı Düzenleme';
$lang['edit_user_subheading']                        = 'Kullanıcı bilgilerini aşağıya giriniz.';
$lang['edit_user_fname_label']                       = 'İsim:';
$lang['edit_user_lname_label']                       = 'Soyisim:';
$lang['edit_user_company_label']                     = 'Şirket İsmi:';
$lang['edit_user_email_label']                       = 'E-posta:';
$lang['edit_user_phone_label']                       = 'Telefon:';
$lang['edit_user_password_label']                    = 'Parola: (Eğer değişecekse)';
$lang['edit_user_password_confirm_label']            = 'Parola Tekrarı: (Eğer değişecekse)';
$lang['edit_user_groups_heading']                    = 'Üye olduğu gruplar';
$lang['edit_user_submit_btn']                        = 'Kullanıcıyı Kaydet';
$lang['edit_user_validation_fname_label']            = 'İsim';
$lang['edit_user_validation_lname_label']            = 'Soyisim';
$lang['edit_user_validation_email_label']            = 'E-posta Adresi';
$lang['edit_user_validation_phone1_label']           = 'Telefonun İlk Kısmı';
$lang['edit_user_validation_phone2_label']           = 'Telefonun İkinci Kısmı';
$lang['edit_user_validation_phone3_label']           = 'Telefonun Üçüncü Kısmı';
$lang['edit_user_validation_company_label']          = 'Şirket İsmi';
$lang['edit_user_validation_groups_label']           = 'Gruplar';
$lang['edit_user_validation_password_label']         = 'Parola';
$lang['edit_user_validation_password_confirm_label'] = 'Parola Tekrarı';

// Create Group
$lang['create_group_title']                  = 'Grup Oluşturma';
$lang['create_group_heading']                = 'Grup Oluşturma';
$lang['create_group_subheading']             = 'Grup bilgilerini aşağıya giriniz.';
$lang['create_group_name_label']             = 'Grup İsmi:';
$lang['create_group_desc_label']             = 'Açıklama:';
$lang['create_group_submit_btn']             = 'Grubu Oluştur';
$lang['create_group_validation_name_label']  = 'Grup İsmi';
$lang['create_group_validation_desc_label']  = 'Açıklama';

// Edit Group
$lang['edit_group_title']                  = 'Grup Düzenleme';
$lang['edit_group_saved']                  = 'Grup Kaydedildi';
$lang['edit_group_heading']                = 'Grup Düzenleme';
$lang['edit_group_subheading']             = 'Grup bilgilerini aşağıya giriniz.';
$lang['edit_group_name_label']             = 'Grup İsmi:';
$lang['edit_group_desc_label']             = 'Açıklama:';
$lang['edit_group_submit_btn']             = 'Grubu Kaydet';
$lang['edit_group_validation_name_label']  = 'Grup İsmi';
$lang['edit_group_validation_desc_label']  = 'Açıklama';

// Change Password
$lang['change_password_heading']                               = 'Parola Değiştirme';
$lang['change_password_old_password_label']                    = 'Eski Parola:';
$lang['change_password_new_password_label']                    = 'Yeni Parola (en az %s karakter uzunluğunda):';
$lang['change_password_new_password_confirm_label']            = 'Yeni Parola Tekrarı:';
$lang['change_password_submit_btn']                            = 'Değiştir';
$lang['change_password_validation_old_password_label']         = 'Eski Parola';
$lang['change_password_validation_new_password_label']         = 'Yeni Parola';
$lang['change_password_validation_new_password_confirm_label'] = 'Yeni Parola Tekrarı';

// Forgot Password
$lang['forgot_password_heading']                 = 'Parolamı Unuttum';
$lang['forgot_password_subheading']              = 'Parolanızı sıfırlamanızı sağlayacak e-posta gönderebilmemiz için %s giriniz.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Gönder';
$lang['forgot_password_validation_email_label']  = 'E-posta Adresi';
$lang['forgot_password_identity_label']          = 'Kullanıcı Adı';
$lang['forgot_password_email_identity_label']    = 'E-posta';
$lang['forgot_password_email_not_found']         = 'Belirttiğiniz E-posta adresi için bir kayıt bulunamadı.';
$lang['forgot_password_identity_not_found']      = 'Bu kullanıcı adına ait kayıt bulunamadı.';

// Reset Password
$lang['reset_password_heading']                               = 'Parola Değiştirme';
$lang['reset_password_new_password_label']                    = 'Yeni Parola (en az %s karakter uzunluğunda):';
$lang['reset_password_new_password_confirm_label']            = 'Yeni Parola Tekrarı:';
$lang['reset_password_submit_btn']                            = 'Değiştir';
$lang['reset_password_validation_new_password_label']         = 'Yeni Parola';
$lang['reset_password_validation_new_password_confirm_label'] = 'Yeni Parola Tekrarı';

// Activation Email
$lang['email_activate_heading']    = '%s İçin Hesap Etkinleştirme';
$lang['email_activate_subheading'] = 'Bağlantıya basarak %s.';
$lang['email_activate_link']       = 'Hesabınızı Etkinleştiriniz';

// Forgot Password Email
$lang['email_forgot_password_heading']    = '%s İçin Parola Sıfırlama';
$lang['email_forgot_password_subheading'] = 'Bağlantıya basarak %s.';
$lang['email_forgot_password_link']       = 'Parolanızı Sıfırlayınız';


