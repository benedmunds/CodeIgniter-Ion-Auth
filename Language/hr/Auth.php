<?php
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Translation: primjeri
*		info@primjeri.com
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  Croatian language file for Ion Auth example views
*
*/

return [
	// Errors
	'error_security' => 'Obrazac ne prolazi provjere.',

	// Login
	'login_heading'         => 'Prijava',
	'login_subheading'      => 'Prijavite se koristeći Vaš email/korisničko ime i lozinku.',
	'login_identity_label'  => 'Email/Korisničko ime:',
	'login_password_label'  => 'Lozinka:',
	'login_remember_label'  => 'Zapamti me:',
	'login_submit_btn'      => 'Prijava',
	'login_forgot_password' => 'Zaboravili ste lozinku?',

	// Index
	'index_heading'           => 'Korisnici',
	'index_subheading'        => 'Lista korisnika.',
	'index_fname_th'          => 'Ime',
	'index_lname_th'          => 'Prezime',
	'index_email_th'          => 'Email',
	'index_groups_th'         => 'Grupa',
	'index_status_th'         => 'Status',
	'index_action_th'         => 'Akcija',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'Aktivan',
	'index_inactive_link'     => 'Neaktivan',
	'index_create_user_link'  => 'Kreiraj novog korisnika',
	'index_create_group_link' => 'Kreiraj novu grupu',

	// Deactivate User
	'deactivate_heading'                  => 'Deaktiviraj korisnika',
	'deactivate_subheading'               => 'Da li ste sigurni da želite deaktivirati korisnika \'%s\'',
	'deactivate_confirm_y_label'          => 'Da:',
	'deactivate_confirm_n_label'          => 'Ne:',
	'deactivate_submit_btn'               => 'Pošalji',
	'deactivate_validation_confirm_label' => 'potvrda',
	'deactivate_validation_user_id_label' => 'korisnički ID',

	// Create User
	'create_user_heading'                           => 'Kreiraj korisnika',
	'create_user_subheading'                        => 'Ispuni podatke o korisniku ispod.',
	'create_user_fname_label'                       => 'Ime:',
	'create_user_lname_label'                       => 'Prezime:',
	'create_user_identity_label'                    => 'Identity:',
	'create_user_company_label'                     => 'Kompanija:',
	'create_user_email_label'                       => 'Email:',
	'create_user_phone_label'                       => 'Telefon:',
	'create_user_password_label'                    => 'Lozinka:',
	'create_user_password_confirm_label'            => 'Potvrda lozinke:',
	'create_user_submit_btn'                        => 'Kreiraj korisnika',
	'create_user_validation_fname_label'            => 'Ime',
	'create_user_validation_lname_label'            => 'Prezime',
	'create_user_validation_identity_label'         => 'Identity',
	'create_user_validation_email_label'            => 'Email',
	'create_user_validation_phone_label'            => 'Telefon',
	'create_user_validation_company_label'          => 'Kompanija',
	'create_user_validation_password_label'         => 'Lozinka',
	'create_user_validation_password_confirm_label' => 'Potvrda lozine',

	// Edit User
	'edit_user_heading'                           => 'Ažuriraj korisnika',
	'edit_user_subheading'                        => 'Ispuni podatke o korisniku ispod.',
	'edit_user_fname_label'                       => 'Ime:',
	'edit_user_lname_label'                       => 'Prezime:',
	'edit_user_company_label'                     => 'Kompanija:',
	'edit_user_email_label'                       => 'Email:',
	'edit_user_phone_label'                       => 'Telefon:',
	'edit_user_password_label'                    => 'Lozinka: (za novu lozinku)',
	'edit_user_password_confirm_label'            => 'Potvrda lozinke: (za novu lozinku)',
	'edit_user_groups_heading'                    => 'Član grupa',
	'edit_user_submit_btn'                        => 'Spremi korisnika',
	'edit_user_validation_fname_label'            => 'Ime',
	'edit_user_validation_lname_label'            => 'Prezime',
	'edit_user_validation_email_label'            => 'Email',
	'edit_user_validation_phone_label'            => 'Telefon',
	'edit_user_validation_company_label'          => 'Kompanija',
	'edit_user_validation_groups_label'           => 'Grupa',
	'edit_user_validation_password_label'         => 'Lozinka',
	'edit_user_validation_password_confirm_label' => 'Potvrda lozinke',

	// Create Group
	'create_group_title'                  => 'Kreiraj grupu',
	'create_group_heading'                => 'Kreiraj grupu',
	'create_group_subheading'             => 'Upišite podatke o grupi ispod.',
	'create_group_name_label'             => 'Naziv:',
	'create_group_desc_label'             => 'Opis:',
	'create_group_submit_btn'             => 'Kreiraj grupu',
	'create_group_validation_name_label'  => 'Naziv',
	'create_group_validation_desc_label'  => 'Opis',

	// Edit Group
	'edit_group_title'                  => 'Ažuriraj grupu',
	'edit_group_saved'                  => 'Grupa spremljena',
	'edit_group_heading'                => 'Ažuriraj grupu',
	'edit_group_subheading'             => 'Upišite podatke o grupi ispod.',
	'edit_group_name_label'             => 'Naziv:',
	'edit_group_desc_label'             => 'Opis:',
	'edit_group_submit_btn'             => 'Spremi grupu',
	'edit_group_validation_name_label'  => 'Naziv',
	'edit_group_validation_desc_label'  => 'Opis',

	// Change Password
	'change_password_heading'                               => 'Promjeni lozinku',
	'change_password_old_password_label'                    => 'Stara lozinka:',
	'change_password_new_password_label'                    => 'Nova lozinka (najmanje %s znakova):',
	'change_password_new_password_confirm_label'            => 'Potvrda nove lozinke:',
	'change_password_submit_btn'                            => 'Promjeni',
	'change_password_validation_old_password_label'         => 'Stara lozinka',
	'change_password_validation_new_password_label'         => 'Nova lozinka',
	'change_password_validation_new_password_confirm_label' => 'Potvrda nove lozinke',

	// Forgot Password
	'forgot_password_heading'                 => 'Zaboravljena lozinka',
	'forgot_password_subheading'              => 'Upišite %s nakon čega ćete dobiti email za poništavanje Vaše lozinke.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Pošalji',
	'forgot_password_validation_email_label'  => 'Email',
	'forgot_password_username_identity_label' => 'Korisničko ime',
	'forgot_password_email_identity_label'    => 'Email',
	'forgot_password_email_not_found'         => 'No record of that email address.',
	'forgot_password_identity_not_found'         => 'No record of that username address.',

	// Reset Password
	'reset_password_heading'                               => 'Promjena lozinke',
	'reset_password_new_password_label'                    => 'Nova lozinka (najmanje %s znakova):',
	'reset_password_new_password_confirm_label'            => 'Potvrdi novu lozinku:',
	'reset_password_submit_btn'                            => 'Promjeni',
	'reset_password_validation_new_password_label'         => 'Nova lozinka',
	'reset_password_validation_new_password_confirm_label' => 'Potvrdi novu lozinku',

	// Forgot Password Email
	'emailForgotPassword_heading'    => 'Poništi lozinku za %s',
	'emailForgotPassword_subheading' => 'Klikni ovaj link za %s.',
	'emailForgotPassword_link'       => 'Poništi lozinku',
];
