<?php
/**
* Name:  Auth Lang - Slovenian
*
* Author: Žiga Drnovšček
* 		  ziga.drnovscek@gmail.com
*
*
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  12.5.2013
*
* Description:  Slovenian language file for Ion Auth example views
*
*/

return [
	// Napaka
	'error_security' => 'Slednji obrazec ni ustrezal našim varnostnim zahtevam.',

	// Prijava
	'login_heading'         => 'Prijava',
	'login_subheading'      => 'Prosimo, spodaj se prijavite z vašim e-naslovom/uporabniškim imenom in geslom',
	'login_identity_label'  => 'E-naslov/Uporabniško ime:',
	'login_password_label'  => 'Geslo:',
	'login_remember_label'  => 'Zapomni si me:',
	'login_submit_btn'      => 'Prijava',
	'login_forgot_password' => 'Pozabljeno geslo?',

	// Index
	'index_heading'           => 'Uporabniki',
	'index_subheading'        => 'Spodaj je lista uporabnikov.',
	'index_fname_th'          => 'Ime',
	'index_lname_th'          => 'Priimek',
	'index_email_th'          => 'E-naslov',
	'index_groups_th'         => 'Skupine',
	'index_status_th'         => 'Status',
	'index_action_th'         => 'Akcija',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'Aktiven',
	'index_inactive_link'     => 'Neaktiven',
	'index_create_user_link'  => 'Ustvari novega uporabnika',
	'index_create_group_link' => 'Ustvari novo skupino',

	// Deaktiviraj uporabnika
	'deactivate_heading'                  => 'Deaktiviraj uporabnika',
	'deactivate_subheading'               => 'Ali ste prepričani, da želite deaktivirati uporabnika \'%s\'',
	'deactivate_confirm_y_label'          => 'Da:',
	'deactivate_confirm_n_label'          => 'Ne:',
	'deactivate_submit_btn'               => 'Pošlji',
	'deactivate_validation_confirm_label' => 'potrditev',
	'deactivate_validation_user_id_label' => 'uporabniški ID',

	// Ustvari uporabnika
	'create_user_heading'                           => 'Ustvari uporabnika',
	'create_user_subheading'                        => 'Prosimo, vnesite podatke o uporabniku.',
	'create_user_fname_label'                       => 'Ime:',
	'create_user_lname_label'                       => 'Priimek:',
	'create_user_identity_label'                    => 'Identity:',
	'create_user_company_label'                     => 'Ime podjetja:',
	'create_user_email_label'                       => 'E-naslov:',
	'create_user_phone_label'                       => 'Telefon:',
	'create_user_password_label'                    => 'Geslo:',
	'create_user_password_confirm_label'            => 'Potrdite geslo:',
	'create_user_submit_btn'                        => 'Ustvari uporabnika',
	'create_user_validation_fname_label'            => 'Ime',
	'create_user_validation_lname_label'            => 'Priimek',
	'create_user_validation_identity_label'         => 'Identity',
	'create_user_validation_email_label'            => 'E-naslov',
	'create_user_validation_phone_label'           => 'Telefon',
	'create_user_validation_company_label'          => 'Podjetje',
	'create_user_validation_password_label'         => 'Geslo',
	'create_user_validation_password_confirm_label' => 'Potrditev gesla',

	// Spremeni uporabnika
	'edit_user_heading'                           => 'Spremeni uporabnika',
	'edit_user_subheading'                        => 'Prosimo, spodaj vnesite podatke o uporabniku.',
	'edit_user_fname_label'                       => 'Ime:',
	'edit_user_lname_label'                       => 'Priimek:',
	'edit_user_company_label'                     => 'Podjetje:',
	'edit_user_email_label'                       => 'E-naslov:',
	'edit_user_phone_label'                       => 'Telefon:',
	'edit_user_password_label'                    => 'Geslo: (če spreminjate geslo)',
	'edit_user_password_confirm_label'            => 'Potrdi geslo: (če spreminjate geslo)',
	'edit_user_groups_heading'                    => 'Član skupin',
	'edit_user_submit_btn'                        => 'Shrani uporabnika',
	'edit_user_validation_fname_label'            => 'Ime',
	'edit_user_validation_lname_label'            => 'Priimek',
	'edit_user_validation_email_label'            => 'E-naslov',
	'edit_user_validation_phone_label'            => 'Telefon',
	'edit_user_validation_company_label'          => 'Podjetje',
	'edit_user_validation_groups_label'           => 'Skupine',
	'edit_user_validation_password_label'         => 'Geslo',
	'edit_user_validation_password_confirm_label' => 'Potrditev gesla',

	// Ustvari skupino
	'create_group_title'                  => 'Ustvari skupino',
	'create_group_heading'                => 'Ustvari skupino',
	'create_group_subheading'             => 'Prosmo, vnesite podatke o skupini.',
	'create_group_name_label'             => 'Ime skupine:',
	'create_group_desc_label'             => 'Opis:',
	'create_group_submit_btn'             => 'Ustvari skupino',
	'create_group_validation_name_label'  => 'Ime skupine',
	'create_group_validation_desc_label'  => 'Opis',

	// Spremeni skupino
	'edit_group_title'                  => 'Spremeni skupino',
	'edit_group_saved'                  => 'Skupina shranjena',
	'edit_group_heading'                => 'Spremeni skupino',
	'edit_group_subheading'             => 'Prosmo, vnesite podatke o skupini.',
	'edit_group_name_label'             => 'Ime skupine:',
	'edit_group_desc_label'             => 'Opis:',
	'edit_group_submit_btn'             => 'Shrani skupino',
	'edit_group_validation_name_label'  => 'Ime skupine',
	'edit_group_validation_desc_label'  => 'Opis',

	// Spremeni geslo
	'change_password_heading'                               => 'Spremeni geslo',
	'change_password_old_password_label'                    => 'Staro geslo:',
	'change_password_new_password_label'                    => 'Novo geslo (vsaj %s znakov dolgo):',
	'change_password_new_password_confirm_label'            => 'Potrdi novo geslo:',
	'change_password_submit_btn'                            => 'Spremeni',
	'change_password_validation_old_password_label'         => 'Staro geslo',
	'change_password_validation_new_password_label'         => 'Novo geslo',
	'change_password_validation_new_password_confirm_label' => 'Potrdi novo geslo',

	// Pozabljeno geslo
	'forgot_password_heading'                 => 'Pozabljeno geslo',
	'forgot_password_subheading'              => 'Prosimo vnesite %s, da vam lahko pošljemo e-sporočilo za ponastavitev gesla.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Pošlji',
	'forgot_password_validation_email_label'  => 'Elektronski naslov',
	'forgot_password_username_identity_label' => 'Uporabniško ime',
	'forgot_password_email_identity_label'    => 'E-naslov',
	'forgot_password_email_not_found'         => 'No record of that email address.',
	'forgot_password_identity_not_found'         => 'No record of that username address.',

	// Ponastavi geslo
	'reset_password_heading'                               => 'Spremeni geslo',
	'reset_password_new_password_label'                    => 'Novo geslo (vsaj %s znakov dolgo):',
	'reset_password_new_password_confirm_label'            => 'Potrdi novo geslo:',
	'reset_password_submit_btn'                            => 'Spremeni',
	'reset_password_validation_new_password_label'         => 'Novo geslo',
	'reset_password_validation_new_password_confirm_label' => 'Potrdi novo geslo',

	// Pozabljeno geslo sporočilo
	'emailForgotPassword_heading'    => 'Ponastavite geslo za %s',
	'emailForgotPassword_subheading' => 'Prosimo, sledite povezavi do %s.',
	'emailForgotPassword_link'       => 'Ponastavite geslo',

	// Novo geslo sporočilo
];
