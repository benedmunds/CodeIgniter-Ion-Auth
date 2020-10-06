<?php
/**
* Name:  Auth Lang - Romanian
*
* Author: Adrian Voicu
* 		  avenir.ro@gmail.com
*         @avenirer
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  10.09.2013
*
* Description:  Romanian language file for Ion Auth example views
*
*/

return [
	// Errors
	'error_security' => 'Acest formular nu a trecut de verificările de securitate.',

	// Login
	'login_heading'         => 'Conectare',
	'login_subheading'      => 'Conectează-te cu email-ul/numele de utilizator și parola.',
	'login_identity_label'  => 'Email/Nume utilizator:',
	'login_password_label'  => 'Parolă:',
	'login_remember_label'  => 'Ține-mă minte:',
	'login_submit_btn'      => 'Conectare',
	'login_forgot_password' => 'Ați uitat parola?',

	// Index
	'index_heading'           => 'Utilizatori',
	'index_subheading'        => 'Mai jos găsiți o listă cu utilizatorii.',
	'index_fname_th'          => 'Prenume',
	'index_lname_th'          => 'Nume',
	'index_email_th'          => 'Email',
	'index_groups_th'         => 'Grupuri',
	'index_status_th'         => 'Status',
	'index_action_th'         => 'Acțiune',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'Activ',
	'index_inactive_link'     => 'Inactiv',
	'index_create_user_link'  => 'Creează un nou utilizator',
	'index_create_group_link' => 'Creează un nou grup',

	// Deactivate User
	'deactivate_heading'                  => 'Dezactivează utilizator',
	'deactivate_subheading'               => 'Sunteți sigur că vreți să dezactivăm utilizatorul \'%s\'',
	'deactivate_confirm_y_label'          => 'Da:',
	'deactivate_confirm_n_label'          => 'Nu:',
	'deactivate_submit_btn'               => 'Aprobă',
	'deactivate_validation_confirm_label' => 'confirmare',
	'deactivate_validation_user_id_label' => 'ID utilizator',

	// Create User
	'create_user_heading'                           => 'Creează utilizator',
	'create_user_subheading'                        => 'Vă rugăm să introduceți informațiile de mai jos.',
	'create_user_fname_label'                       => 'Prenume:',
	'create_user_lname_label'                       => 'Nume:',
	'create_user_identity_label'                    => 'Identitate:',
	'create_user_company_label'                     => 'Companie:',
	'create_user_email_label'                       => 'Email:',
	'create_user_phone_label'                       => 'Telefon:',
	'create_user_password_label'                    => 'Parolă:',
	'create_user_password_confirm_label'            => 'Confirmă parola:',
	'create_user_submit_btn'                        => 'Creează utilizator',
	'create_user_validation_fname_label'            => 'Prenume',
	'create_user_validation_lname_label'            => 'Nume',
	'create_user_validation_identity_label'         => 'Identitate',
	'create_user_validation_email_label'            => 'Adresă email',
	'create_user_validation_phone_label'            => 'Telefon',
	'create_user_validation_company_label'          => 'Companie',
	'create_user_validation_password_label'         => 'Parolă',
	'create_user_validation_password_confirm_label' => 'Confirmarea parolei',

	// Edit User
	'edit_user_heading'                           => 'Editează utilizatorul',
	'edit_user_subheading'                        => 'Vă rugăm să introduceți informațiile utilizatorului de mai jos.',
	'edit_user_fname_label'                       => 'Prenume:',
	'edit_user_lname_label'                       => 'Nume:',
	'edit_user_company_label'                     => 'Companie:',
	'edit_user_email_label'                       => 'Email:',
	'edit_user_phone_label'                       => 'Telefon:',
	'edit_user_password_label'                    => 'Parolă: (dacă schimbați parola)',
	'edit_user_password_confirm_label'            => 'Confirmă parola: (dacă schimbați parola)',
	'edit_user_groups_heading'                    => 'Membru al grupurilor',
	'edit_user_submit_btn'                        => 'Salvează utilizator',
	'edit_user_validation_fname_label'            => 'Prenume',
	'edit_user_validation_lname_label'            => 'Nume',
	'edit_user_validation_email_label'            => 'Adresa email',
	'edit_user_validation_phone_label'            => 'Telefon',
	'edit_user_validation_company_label'          => 'Companie',
	'edit_user_validation_groups_label'           => 'Grupuri',
	'edit_user_validation_password_label'         => 'Parolă',
	'edit_user_validation_password_confirm_label' => 'Confirmarea parolei',

	// Create Group
	'create_group_title'                  => 'Creează grup',
	'create_group_heading'                => 'Creează grup',
	'create_group_subheading'             => 'Vă rugăm să introduceți informațiile grupului mai jos.',
	'create_group_name_label'             => 'Numele grupului:',
	'create_group_desc_label'             => 'Descriere:',
	'create_group_submit_btn'             => 'Creează grupul',
	'create_group_validation_name_label'  => 'Numele grupului',
	'create_group_validation_desc_label'  => 'Descriere',

	// Edit Group
	'edit_group_title'                  => 'Editează datele grupului',
	'edit_group_saved'                  => 'Grup salvat',
	'edit_group_heading'                => 'Editează grupul',
	'edit_group_subheading'             => 'Vă rugăm să introduceți informațiile grupului mai jos.',
	'edit_group_name_label'             => 'Numele grupului:',
	'edit_group_desc_label'             => 'Descriere:',
	'edit_group_submit_btn'             => 'Salvează grupul',
	'edit_group_validation_name_label'  => 'Numele grupului',
	'edit_group_validation_desc_label'  => 'Descriere',

	// Change Password
	'change_password_heading'                               => 'Schimbă parola',
	'change_password_old_password_label'                    => 'Parola veche:',
	'change_password_new_password_label'                    => 'Noua parolă (cel puțin %s caractere):',
	'change_password_new_password_confirm_label'            => 'Confirmă noua parolă:',
	'change_password_submit_btn'                            => 'Schimbă',
	'change_password_validation_old_password_label'         => 'Parola veche',
	'change_password_validation_new_password_label'         => 'Parola nouă',
	'change_password_validation_new_password_confirm_label' => 'Confirmă noua parola',

	// Forgot Password
	'forgot_password_heading'                 => 'Parolă uitată',
	'forgot_password_subheading'              => 'Vă rugăm să introduceți %s pentru a vă putea trimite un email de resetare a parolei.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Trimite',
	'forgot_password_validation_email_label'  => 'Adresa de email',
	'forgot_password_identity_label'          => 'Utilizator',
	'forgot_password_email_identity_label'    => 'Email',
	'forgot_password_email_not_found'         => 'Nu există nicio înregistrare cu acest email.',
	'forgot_password_identity_not_found'         => 'No record of that username address.',

	// Reset Password
	'reset_password_heading'                               => 'Schimbare parolă',
	'reset_password_new_password_label'                    => 'Parola nouă (cel puțin %s caractere):',
	'reset_password_new_password_confirm_label'            => 'Confirmă noua parolă:',
	'reset_password_submit_btn'                            => 'Schimbă',
	'reset_password_validation_new_password_label'         => 'Parola nouă',
	'reset_password_validation_new_password_confirm_label' => 'Confirmă noua parolă',
];
