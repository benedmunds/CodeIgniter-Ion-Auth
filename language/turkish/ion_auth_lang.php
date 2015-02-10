<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Turkish (UTF-8)
*
* Author: Ben Edmunds
* 	  ben.edmunds@gmail.com
*         @benedmunds
* Translation:  Acipayamli Ozi
*
* Author: Hüseyin Kozan
* 		  posta@huseyinkozan.com.tr
*         @huseyinkozan
*             
* Location: http://github.com/huseyinkozan/CodeIgniter-Ion-Auth/
*
* Created:  05.01.2010
*
* Updated: 21.08.2014
*
* Description:  Turkish language file for Ion Auth messages and errors
*/

// Account Creation
$lang['account_creation_successful'] 	  	         = 'Üyelik Kaydınız Başarıyla Tamamlandı';
$lang['account_creation_unsuccessful'] 	 	 = 'Üyelik Kaydınız Yapılamadı';
$lang['account_creation_duplicate_email'] 	 = 'Eposta Adresi Geçersiz ya da Daha Önceden Alınmış';
$lang['account_creation_duplicate_username']	 = 'Kullanıcı Adı Geçersiz ya da Daha Önceden Alınmış';

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';


// Password
$lang['password_change_successful'] 	 	 = 'Şifreniz Değiştirildi';
$lang['password_change_unsuccessful'] 	  	 = 'Şifreniz Değiştirile Başarısız';
$lang['forgot_password_successful'] 	 	 = 'Yeni Şifreniz Eposta Adresinize Gönderildi';
$lang['forgot_password_unsuccessful'] 	 	 = 'Şifreniz Değiştirileme Başarısız';

// Activation
$lang['activate_successful'] 		  	 = 'Hesap Başarıyla Etkinleştirildi';
$lang['activate_unsuccessful'] 		 	 = 'Hesap Etkinleştirme Başarısız';
$lang['deactivate_successful'] 		  	 = 'Hesap Devre Dışı Bırakıldı';
$lang['deactivate_unsuccessful'] 	  	 = 'Hesap Devre Dışı Bırakılama Başarısız';
$lang['activation_email_successful'] 		 = 'Etkinleştirme Epostası Gönderildi';
$lang['activation_email_unsuccessful']  	 = 'Etkinleştirme Epostası Gönderme Başarısız';

// Login / Logout
$lang['login_successful'] 		  	 = 'Giriş Başarılı';
$lang['login_unsuccessful'] 		 	 = 'Giriş Başarısız';
$lang['login_unsuccessful_not_active'] ="Giriş Başarısız ,Hesabınız Etkin Değil";
$lang['login_timeout']                       = 'Temporarily Locked Out. Try again later.';
$lang['logout_successful'] 		 	 = 'Çıkış Başarılı';
  
// Account Changes
$lang['update_successful'] 		 	 = 'Üyelik Bilgileri Güncellendi';
$lang['update_unsuccessful'] 		 	 = 'Üyelik Bilgileri Güncelleme Başarısız';
$lang['delete_successful'] 		 	 = 'Kullanıcı Silindi';
$lang['delete_unsuccessful'] 			 = 'Kullanıcı Silme Başarısız';

// Groups
$lang['group_creation_successful']  = 'Group created Successfully';
$lang['group_already_exists']       = 'Group name already taken';
$lang['group_update_successful']    = 'Group details updated';
$lang['group_delete_successful']    = 'Group deleted';
$lang['group_delete_unsuccessful'] 	= 'Unable to delete group';
$lang['group_delete_notallowed']    = 'Can\'t delete the administrators\' group';
$lang['group_name_required'] 		= 'Group name is a required field';
// Activation Email
$lang['email_activation_subject']            = 'Üyelik Etkinleştirme';
$lang['email_activate_heading']    = 'Activate account for %s';
$lang['email_activate_subheading'] = 'Please click this link to %s.';
$lang['email_activate_link']       = 'Activate Your Account';
// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Şifremi Unuttum';
$lang['email_forgot_password_heading']    = 'Reset Password for %s';
$lang['email_forgot_password_subheading'] = 'Please click this link to %s.';
$lang['email_forgot_password_link']       = 'Reset Your Password';
// New Password Email
$lang['email_new_password_subject']          = 'Yeni Şifre';
$lang['email_new_password_heading']    = 'New Password for %s';
$lang['email_new_password_subheading'] = 'Your password has been reset to: %s';
