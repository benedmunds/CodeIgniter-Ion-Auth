<?php
/**
* Name:  Auth Lang - Hungarian
*
* Author: Balazs Bosternak
* 	b.bosternak@gmail.com
*         @bosternakbalazs

*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  07.19.2015
*
* Description:  English language file for Ion Auth example views
*
*/

return [
	// Errors
	'error_security' => 'This form post did not pass our security checks.',

	// Login
	'login_heading'         => 'Bejelentkezés',
	'login_subheading'      => 'Az alábbi űrlapon jelentkezzen be e-mail címével/felhasználónevével és jelszavával.',
	'login_identity_label'  => 'E-mail/Felhasználónév:',
	'login_password_label'  => 'Jelszó:',
	'login_remember_label'  => 'Emlékezz rám:',
	'login_submit_btn'      => 'Belépés',
	'login_forgot_password' => 'Elfelejtette jelszavát?',

	// Index
	'index_heading'           => 'Felhasználók',
	'index_subheading'        => 'Lejjebb található a felhasználók listája.',
	'index_fname_th'          => 'Keresztnév',
	'index_lname_th'          => 'Vezetéknév',
	'index_email_th'          => 'E-mail',
	'index_groups_th'         => 'Csoportok',
	'index_status_th'         => 'Státusz',
	'index_action_th'         => 'Operáció',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'Aktív',
	'index_inactive_link'     => 'Inaktív',
	'index_create_user_link'  => 'Új felhasználó létrehozása',
	'index_create_group_link' => 'Új csoport létrehozása',

	// Deactivate User
	'deactivate_heading'                  => 'Felhasználó deaktiválása',
	'deactivate_subheading'               => 'Biztos benne hogy deaktiválni akarja a felhasználót? \'%s\'',
	'deactivate_confirm_y_label'          => 'Igen:',
	'deactivate_confirm_n_label'          => 'Nem:',
	'deactivate_submit_btn'               => 'Elküld',
	'deactivate_validation_confirm_label' => 'visszaigazolás',
	'deactivate_validation_user_id_label' => 'felhasználói ID',

	// Create User
	'create_user_heading'                           => 'Felhasználó létrehozása',
	'create_user_subheading'                        => 'Kérem adja meg a felhasználó adatait az alábbi űrlapon.',
	'create_user_fname_label'                       => 'Keresztnév:',
	'create_user_lname_label'                       => 'Vezetéknév:',
	'create_user_identity_label'                    => 'Felhasználónév:',
	'create_user_company_label'                     => 'Cég neve:',
	'create_user_email_label'                       => 'E-mail:',
	'create_user_phone_label'                       => 'Telefonszám:',
	'create_user_password_label'                    => 'Jelszó:',
	'create_user_password_confirm_label'            => 'Jelszó megerősítése:',
	'create_user_submit_btn'                        => 'Felhasználó létrehozása',
	'create_user_validation_fname_label'            => 'Keresztnév',
	'create_user_validation_lname_label'            => 'Vezetéknév',
	'create_user_validation_identity_label'         => 'Felhasználónév',
	'create_user_validation_email_label'            => 'E-mail cím',
	'create_user_validation_phone_label'            => 'Telefonszám',
	'create_user_validation_company_label'          => 'Cég neve',
	'create_user_validation_password_label'         => 'Jelszó',
	'create_user_validation_password_confirm_label' => 'Jelszó megerősítése',

	// Edit User
	'edit_user_heading'                           => 'Felhasználó szerkesztése',
	'edit_user_subheading'                        => 'Kérem adja meg a felhasználó adatait az alábbi űrlapon.',
	'edit_user_fname_label'                       => 'Keresztnév:',
	'edit_user_lname_label'                       => 'Vezetéknév:',
	'edit_user_company_label'                     => 'Cég neve:',
	'edit_user_email_label'                       => 'E-mail:',
	'edit_user_phone_label'                       => 'Telefonszám:',
	'edit_user_password_label'                    => 'Jelszó: (ha változik)',
	'edit_user_password_confirm_label'            => 'Jelszó megerősítése: (ha változik)',
	'edit_user_groups_heading'                    => 'Csoportok',
	'edit_user_submit_btn'                        => 'Felhasználó mentése',
	'edit_user_validation_fname_label'            => 'Keresztnév',
	'edit_user_validation_lname_label'            => 'Vezetéknév',
	'edit_user_validation_email_label'            => 'E-mail cím',
	'edit_user_validation_phone_label'            => 'Telefonszám',
	'edit_user_validation_company_label'          => 'Cég neve',
	'edit_user_validation_groups_label'           => 'Csoportok',
	'edit_user_validation_password_label'         => 'Jelszó',
	'edit_user_validation_password_confirm_label' => 'Jelszó megerősítése',

	// Create Group
	'create_group_title'                  => 'Csoport létrehozása',
	'create_group_heading'                => 'Csoport létrehozása',
	'create_group_subheading'             => 'Kérem adja meg a csoport adatait az alábbi űrlapon.',
	'create_group_name_label'             => 'Csoport neve:',
	'create_group_desc_label'             => 'Leírás:',
	'create_group_submit_btn'             => 'Csoport létrehozása',
	'create_group_validation_name_label'  => 'Csoport neve',
	'create_group_validation_desc_label'  => 'Leírás',

	// Edit Group
	'edit_group_title'                  => 'Csoport szerkesztése',
	'edit_group_saved'                  => 'Csoport mentve',
	'edit_group_heading'                => 'Csoport szerkesztése',
	'edit_group_subheading'             => 'Kérem adja meg a csoport adatait az alábbi űrlapon.',
	'edit_group_name_label'             => 'Csoport neve:',
	'edit_group_desc_label'             => 'Leírás:',
	'edit_group_submit_btn'             => 'Csoport mentése',
	'edit_group_validation_name_label'  => 'Csoport neve',
	'edit_group_validation_desc_label'  => 'Leírás',

	// Change Password
	'change_password_heading'                               => 'Jelszó változtatása',
	'change_password_old_password_label'                    => 'Régi jelszó:',
	'change_password_new_password_label'                    => 'Új jelszó (legalább %s karakter hosszúságú):',
	'change_password_new_password_confirm_label'            => 'Új jelszó megerősítése:',
	'change_password_submit_btn'                            => 'Változtat',
	'change_password_validation_old_password_label'         => 'Régi jelszó',
	'change_password_validation_new_password_label'         => 'Új jelszó',
	'change_password_validation_new_password_confirm_label' => 'Új jelszó megerősítése',

	// Forgot Password
	'forgot_password_heading'                 => 'Elfelejtett jelszó',
	'forgot_password_subheading'              => 'Kérem adja meg a(z) %sét, hogy egy e-mailt küldhessünk a jelszó beállítására.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Elküld',
	'forgot_password_validation_email_label'  => 'E-mail cím',
	'forgot_password_identity_label'          => 'Felhasználónév',
	'forgot_password_email_identity_label'    => 'E-mail',
	'forgot_password_email_not_found'         => 'Nem található ez az e-mail cím.',
	'forgot_password_identity_not_found'         => 'No record of that username address.',

	// Reset Password
	'reset_password_heading'                               => 'Jelszó változtatása',
	'reset_password_new_password_label'                    => 'Új jelszó (legalább %s karakter hosszúságú):',
	'reset_password_new_password_confirm_label'            => 'Új jelszó megerősítése:',
	'reset_password_submit_btn'                            => 'Változtat',
	'reset_password_validation_new_password_label'         => 'Új jelszó',
	'reset_password_validation_new_password_confirm_label' => 'Új jelszó megerősítése',
];
