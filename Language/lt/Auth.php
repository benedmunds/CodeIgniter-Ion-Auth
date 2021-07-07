<?php
/**
* Name:  Auth Lang - Lithuanian
*
* Translator: Donatas Glodenis
* 		  dgvirtual@akl.lt
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  10.05.2016
* Updated: 14.04.2020
*
* Description:  Lithuanian language file for Ion Auth example views
*
*/

return [
	// Errors
	'error_security' => 'Šis formos įrašas nepraėjo mūsų saugumo patikrų.',

	// Login
	'login_heading'         => 'Prisijungimas',
	'login_subheading'      => 'Prašome prisijungti įrašant el. pašto adresą arba prisijungimo vardą ir slaptažodį.',
	'login_identity_label'  => 'El. pašto adresas / vartotojo vardas:',
	'login_password_label'  => 'Slaptažodis:',
	'login_remember_label'  => 'Atsiminti mane:',
	'login_submit_btn'      => 'Prisijungti',
	'login_forgot_password' => 'Pamiršote slaptažodį?',

	// Index
	'index_heading'           => 'Vartotojai',
	'index_subheading'        => 'Žemiau pateikiamas vartotojų sąrašas.',
	'index_fname_th'          => 'Vardas',
	'index_lname_th'          => 'Pavardė',
	'index_email_th'          => 'El. pašto adresas',
	'index_groups_th'         => 'Grupės',
	'index_status_th'         => 'Būsena',
	'index_action_th'         => 'Veiksmas',
	'index_active_link'       => 'Aktyvus',
	'index_edit_link'         => 'Keisti',
	'index_inactive_link'     => 'Neaktyvus',
	'index_create_user_link'  => 'Sukurti naują vartotoją',
	'index_create_group_link' => 'Sukurti naują grupę',

	// Deactivate User
	'deactivate_heading'                  => 'Išjungti vartotoją',
	'deactivate_subheading'               => 'Ar tikrai norite išjungti vartotoją \'%s\'',
	'deactivate_confirm_y_label'          => 'Taip:',
	'deactivate_confirm_n_label'          => 'Ne:',
	'deactivate_submit_btn'               => 'Pateikti',
	'deactivate_validation_confirm_label' => 'patvirtinimas',
	'deactivate_validation_user_id_label' => 'vartotojo ID',

	// Create User
	'create_user_heading'                           => 'Sukurti vartotoją',
	'create_user_subheading'                        => 'Prašome įrašyti vartotojo informaciją.',
	'create_user_fname_label'                       => 'Vardas:',
	'create_user_lname_label'                       => 'Pavardė:',
	'create_user_company_label'                     => 'Įmonė:',
	'create_user_identity_label'                    => 'Tapatybė:',
	'create_user_email_label'                       => 'El. p. adresas:',
	'create_user_phone_label'                       => 'Telefonas:',
	'create_user_password_label'                    => 'Slaptažodis:',
	'create_user_password_confirm_label'            => 'Patvirtinti slaptažodį:',
	'create_user_submit_btn'                        => 'Sukurti vartotoją',
	'create_user_validation_fname_label'            => 'Vardas',
	'create_user_validation_lname_label'            => 'Pavardė',
	'create_user_validation_identity_label'         => 'Tapatybė',
	'create_user_validation_email_label'            => 'El. p. adresas:',
	'create_user_validation_phone_label'            => 'Telefonas',
	'create_user_validation_company_label'          => 'Įmonės pavadinimas',
	'create_user_validation_password_label'         => 'Slaptažodis',
	'create_user_validation_password_confirm_label' => 'Pakartokite slaptažodį',

	// Edit User
	'edit_user_heading'                           => 'Keisti vartotojo duomenis',
	'edit_user_subheading'                        => 'Prašome įrašyti vartotojo informaciją.',
	'edit_user_fname_label'                       => 'Vardas:',
	'edit_user_lname_label'                       => 'Pavardė:',
	'edit_user_company_label'                     => 'Įmonės pavadinimas:',
	'edit_user_email_label'                       => 'El. p. adresas:',
	'edit_user_phone_label'                       => 'Telefono Nr.:',
	'edit_user_password_label'                    => 'Slaptažodis: (jei keičiamas slaptažodis)',
	'edit_user_password_confirm_label'            => 'Patvirtinti slaptažodį: (jei keičiamas slaptažodis)',
	'edit_user_groups_heading'                    => 'Grupių narys',
	'edit_user_submit_btn'                        => 'Įrašyti vartotoją',
	'edit_user_validation_fname_label'            => 'Vardas',
	'edit_user_validation_lname_label'            => 'Pavardė',
	'edit_user_validation_email_label'            => 'El. p. adresas',
	'edit_user_validation_phone_label'            => 'Telefono Nr.',
	'edit_user_validation_company_label'          => 'Įmonės pavadinimas',
	'edit_user_validation_groups_label'           => 'Grupės',
	'edit_user_validation_password_label'         => 'Slaptažodis',
	'edit_user_validation_password_confirm_label' => 'Pakartotinai įveskite slaptažodį',

	// Create Group
	'create_group_title'                  => 'Sukurti grupę',
	'create_group_heading'                => 'Sukurti grupę',
	'create_group_subheading'             => 'Prašome įrašyti grupės informaciją.',
	'create_group_name_label'             => 'Grupės pavadinimas:',
	'create_group_desc_label'             => 'Aprašymas:',
	'create_group_submit_btn'             => 'Sukurti grupę',
	'create_group_validation_name_label'  => 'Grupės pavadinimas',
	'create_group_validation_desc_label'  => 'Aprašymas',

	// Edit Group
	'edit_group_title'                  => 'Keisti grupę',
	'edit_group_saved'                  => 'Grupė įrašyta',
	'edit_group_heading'                => 'Keisti grupę',
	'edit_group_subheading'             => 'Prašome įrašyti grupės informaciją.',
	'edit_group_name_label'             => 'Grupės pavadinimas:',
	'edit_group_desc_label'             => 'Aprašymas:',
	'edit_group_submit_btn'             => 'Įrašyti grupę',
	'edit_group_validation_name_label'  => 'Grupės pavadinimas',
	'edit_group_validation_desc_label'  => 'Aprašymas',

	// Change Password
	'change_password_heading'                               => 'Pakeisti slaptažodį',
	'change_password_old_password_label'                    => 'Senas slaptažodis:',
	'change_password_new_password_label'                    => 'Naujas slaptažodis (mažiausiai %s simbolių):',
	'change_password_new_password_confirm_label'            => 'Patvirtinti naują slaptažodį:',
	'change_password_submit_btn'                            => 'Pakeisti',
	'change_password_validation_old_password_label'         => 'Senas slaptažodis',
	'change_password_validation_new_password_label'         => 'Naujas slaptažodis',
	'change_password_validation_new_password_confirm_label' => 'Patvirtinti naują slaptažodį',

	// Forgot Password
	'forgot_password_heading'                 => 'Pamiršus slaptažodį',
	'forgot_password_subheading'              => 'Prašome įrašyti savo %s kad galėtume išsiųsti Jums el. laišką slaptažodžio atkūrimui.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Pateikti',
	'forgot_password_validation_email_label'  => 'El. p. adresas',
	'forgot_password_identity_label'          => 'Vartotojo vardas',
	'forgot_password_email_identity_label'    => 'El. p. adresas',
	'forgot_password_email_not_found'         => 'Duomenų bazėje tokio el. pašto adreso nėra.',
	'forgot_password_identity_not_found'      => 'Nėra įrašo apie su šiuo vartotojo vardu susietą adresą.',

	// Reset password
	'reset_password_heading'                               => 'Pakeisti slaptažodį',
	'reset_password_new_password_label'                    => 'Naujas slaptažodis (mažiausiai %s simboliai/-ių):',
	'reset_password_new_password_confirm_label'            => 'Patvirtinti naują slaptažodį:',
	'reset_password_submit_btn'                            => 'Keisti',
	'reset_password_validation_new_password_label'         => 'Naujas slaptažodis',
	'reset_password_validation_new_password_confirm_label' => 'Patvirtinti naują slaptažodį',
];
