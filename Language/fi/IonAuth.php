<?php
/**
* Name:  Ion Auth Lang - Finnish
*
* Author: Jarno Fabritius
*         jarno.fabritius@meisso.com
*         @meisso_jarno
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  01.03.2011
*
* Description:  Finnish language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful'             => 'Tili luotiin onnistuneesti!',
	'account_creation_unsuccessful'           => 'Tilin luonti epäonnistui',
	'account_creation_duplicate_email'        => 'Sähköpostiosoite on virheellinen tai se on jo käytössä',
	'account_creation_duplicate_identity'     => 'Tunnus on virheellinen tai se on jo käytössä',

	// TODO Please Translate
	'account_creation_missing_defaultGroup' => 'Default group is not set',
	'account_creation_invalid_defaultGroup' => 'Invalid default group name set',

	// Password
	'password_change_successful'              => 'Salasana vaihdettu!',
	'password_change_unsuccessful'            => 'Salasanan vaihto epäonnistui',
	'forgot_password_successful'              => 'Salasanan resetointiohjeet lähetettiin sähköpostiin',
	'forgot_password_unsuccessful'            => 'Salasanan resetointi epäonnistui',

	// Activation
	'activate_successful'                     => 'Tili aktivoitu!',
	'activate_unsuccessful'                   => 'Tilin aktivointi epäonnistui',
	'deactivate_successful'                   => 'Tili suljettu',
	'deactivate_unsuccessful'                 => 'Tilin sulkeminen epäonnistui',
	'activation_email_successful'             => 'Aktivointiviesti lähetetty',
	'activation_email_unsuccessful'           => 'Aktivointiviestiä ei voitu lähettää',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful'                        => 'Olet nyt kirjautunut sisään!',
	'login_unsuccessful'                      => 'Kirjautuminen epäonnistui',
	'login_unsuccessful_not_active'           => 'Tiliä ei aktivoitu',
	'login_timeout'                           => 'Väliaikaisesti suljettu. Yritä uudelleen myöhemmin.',
	'logout_successful'                       => 'Olet nyt kirjautunut ulos',

	// Account Changes
	'update_successful'                       => 'Tilin tiedot päivitetty!',
	'update_unsuccessful'                     => 'Tietojen päivitys epäonnistui',
	'delete_successful'                       => 'Tili poistettu',
	'delete_unsuccessful'                     => 'Tilin poisto epäonnistui',

	// Groups
	'group_creation_successful'               => 'Ryhmä luotiin onnistuneesti!',
	'group_already_exists'                    => 'Ryhmän nimi jo käytössä',
	'group_update_successful'                 => 'Ryhmän tiedot päivitetty!',
	'group_delete_successful'                 => 'Ryhmä poistettu',
	'group_delete_unsuccessful'               => 'Ryhmän poisto epäonnistui',
	'group_delete_notallowed'    => 'Can\'t delete the administrators\' group',
	'group_name_required'                     => 'Ryhmän nimi tarvitaan',
	'group_name_admin_not_alter' => 'Admin group name can not be changed',

	// Activation Email
	'emailActivation_subject'            => 'Tilin aktivointi',
	'emailActivate_heading'    => 'Activate account for %s',
	'emailActivate_subheading' => 'Please click this link to %s.',
	'emailActivate_link'       => 'Activate Your Account',
	// Forgot Password Email
	'email_forgotten_password_subject'        => 'Unohtuneen salasanan palautus',
	'emailForgotPassword_heading'    => 'Reset Password for %s',
	'emailForgotPassword_subheading' => 'Please click this link to %s.',
	'emailForgotPassword_link'       => 'Reset Your Password',
];
