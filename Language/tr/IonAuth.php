<?php
/**
 * Name:  Ion Auth Lang - Turkish (UTF-8)
 *
 * Author: Ben Edmunds
 * 	       ben.edmunds@gmail.com
 *         @benedmunds
 *
 * Translation: Acipayamli Ozi
 *
 * Modifications:
 *           Hüseyin Kozan @huseyinkozan posta@huseyinkozan.com.tr
 *           Burak Özdemir @ozdemirburak http://burakozdemir.co.uk
 *
 * Created:  05.01.2010
 * Updated:  03.14.2015
 * Description:  Turkish language file for Ion Auth messages and errors
 *
 */

return [
	// Account Creation
	'account_creation_successful' 	  	    => 'Üyelik kaydınız başarıyla tamamlandı',
	'account_creation_unsuccessful' 	 	    => 'Üyelik kaydınız yapılamadı',
	'account_creation_duplicate_email' 	    => 'E-posta adresi geçersiz ya da daha önceden alınmış',
	'account_creation_duplicate_identity'    => 'Kullanıcı adı geçersiz ya da daha önceden alınmış',
	'account_creation_missing_defaultGroup' => 'Herhangi bir varsayılan grup ayarlanmamış',
	'account_creation_invalid_defaultGroup' => 'Geçersiz bir varsayılan grup seçimi',

	// Password
	'password_change_successful' 	 	    => 'Şifreniz değiştirildi',
	'password_change_unsuccessful' 	  	    => 'Şifre değiştirme isteği gerçekleştirilemedi',
	'forgot_password_successful' 	 	    => 'Yeni şifreniz e-posta adresinize gönderildi',
	'forgot_password_unsuccessful' 	 	    => 'Şifre yenileme isteği gerçekleştirilemedi',

	// Activation
	'activate_successful' 		  	        => 'Hesap başarıyla etkinleştirildi',
	'activate_unsuccessful' 		 	        => 'Hesap etkinleştirme başarısız',
	'deactivate_successful' 		  	        => 'Hesap devre dışı bırakıldı',
	'deactivate_unsuccessful' 	  	        => 'Hesap devre dışı bırakma isteğiniz gerçekleştirilemedi',
	'activation_email_successful' 	        => 'Hesap etkinleştirme e-postası gönderildi',
	'activation_email_unsuccessful'          => 'Hesap etkinleştirme e-postası gönderilemedi',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful' 		  	            => 'Giriş başarılı',
	'login_unsuccessful' 		 	        => 'Giriş başarısız',
	'login_unsuccessful_not_active'          => 'Giriş başarısız, hesap aktif değil',
	'login_timeout'                          => 'Oturum zaman aşımı, daha sonra tekrar deneyiniz.',
	'logout_successful' 		 	            => 'Çıkış başarılı',

	// Account Changes
	'update_successful' 		 	            => 'Üyelik bilgileri güncellendi',
	'update_unsuccessful' 		 	        => 'Üyelik bilgileri güncellenemedi',
	'delete_successful' 		 	            => 'Kullanıcı silindi',
	'delete_unsuccessful' 			        => 'Kullanıcı silme başarısız',

	// Groups
	'group_creation_successful'              => 'Grup başarıyla oluşturuldu',
	'group_already_exists'                   => 'Grup adı daha önceden oluşturulmuş',
	'group_update_successful'                => 'Grup detayları güncellendi',
	'group_delete_successful'                => 'Grup silindi ',
	'group_delete_unsuccessful' 	            => 'Grup silinemedi',
	'group_delete_notallowed'                => 'Yönetici grup silinemez',
	'group_name_required' 		            => 'Grup adı alanı gereklidir',
	'group_name_admin_not_alter'             => 'Yönetici grup adı değiştirilemez',

	// Activation Email
	'emailActivation_subject'               => 'Hesap Etkinleştirme',
	'emailActivate_heading'                 => '%s için hesap etkinleştirme',
	'emailActivate_subheading'              => 'Bu linke tıklayarak %s.',
	'emailActivate_link'                    => 'hesabınızı etkinleştirin',

	// Forgot Password Email
	'email_forgotten_password_subject'       => 'Şifremi Unuttum',
	'emailForgotPassword_heading'          => '%s için şifre sıfırlama',
	'emailForgotPassword_subheading'       => 'Bağlantıya tıklayarak %s.',
	'emailForgotPassword_link'             => 'şifrenizi sıfırlayınız',
];
