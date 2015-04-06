<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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

// Errors
$lang['error_csrf'] = 'Acest formular nu a trecut de verificarile de securitate.';

// Login
$lang['login_heading']         = 'Logare';
$lang['login_subheading']      = 'Logati-va cu email-ul/numele de utilizator si parola.';
$lang['login_identity_label']  = 'Email/Nume utilizator:';
$lang['login_password_label']  = 'Parola:';
$lang['login_remember_label']  = 'Tine-ma minte:';
$lang['login_submit_btn']      = 'Logare';
$lang['login_forgot_password'] = 'Ati uitat parola?';

// Index
$lang['index_heading']           = 'Utilizatori';
$lang['index_subheading']        = 'Mai jos gasiti o lista cu utilizatorii.';
$lang['index_fname_th']          = 'Prenume';
$lang['index_lname_th']          = 'Nume';
$lang['index_email_th']          = 'Email';
$lang['index_groups_th']         = 'Grupuri';
$lang['index_status_th']         = 'Status';
$lang['index_action_th']         = 'Actiune';
$lang['index_active_link']       = 'Activ';
$lang['index_inactive_link']     = 'Inactiv';
$lang['index_create_user_link']  = 'Creeaza un nou utilizator';
$lang['index_create_group_link'] = 'Creeaza un nou grup';

// Deactivate User
$lang['deactivate_heading']                  = 'Dezactiveaza utilizator';
$lang['deactivate_subheading']               = 'Sunteti sigur ca vreti sa dezactivam utilizatorul \'%s\'';
$lang['deactivate_confirm_y_label']          = 'Da:';
$lang['deactivate_confirm_n_label']          = 'Nu:';
$lang['deactivate_submit_btn']               = 'Aproba';
$lang['deactivate_validation_confirm_label'] = 'confirmare';
$lang['deactivate_validation_user_id_label'] = 'ID utilizator';

// Create User
$lang['create_user_heading']                           = 'Creeaza utilizator';
$lang['create_user_subheading']                        = 'Va rugam sa introduceri informatiile de mai jos.';
$lang['create_user_fname_label']                       = 'Prenume:';
$lang['create_user_lname_label']                       = 'Nume:';
$lang['create_user_company_label']                     = 'Companie:';
$lang['create_user_email_label']                       = 'Email:';
$lang['create_user_phone_label']                       = 'Telefon:';
$lang['create_user_password_label']                    = 'Parola:';
$lang['create_user_password_confirm_label']            = 'Confirma parola:';
$lang['create_user_submit_btn']                        = 'Creeaza utilizator';
$lang['create_user_validation_fname_label']            = 'Prenume';
$lang['create_user_validation_lname_label']            = 'Nume';
$lang['create_user_validation_email_label']            = 'Adresa email';
$lang['create_user_validation_phone1_label']           = 'Prima parte a numarului de telefon';
$lang['create_user_validation_phone2_label']           = 'A doua parte a numarului de telefon';
$lang['create_user_validation_phone3_label']           = 'A treia parte a numarului de telefon';
$lang['create_user_validation_company_label']          = 'Companie';
$lang['create_user_validation_password_label']         = 'Parola';
$lang['create_user_validation_password_confirm_label'] = 'Confirmarea parolei';

// Edit User
$lang['edit_user_heading']                           = 'Editeaza date utilizator';
$lang['edit_user_subheading']                        = 'Va rugam sa introduceri informatiile utilizatorului de mai jos.';
$lang['edit_user_fname_label']                       = 'Prenume:';
$lang['edit_user_lname_label']                       = 'Nume:';
$lang['edit_user_company_label']                     = 'Companie:';
$lang['edit_user_email_label']                       = 'Email:';
$lang['edit_user_phone_label']                       = 'Telefon:';
$lang['edit_user_password_label']                    = 'Parola: (daca schimbati parola)';
$lang['edit_user_password_confirm_label']            = 'Confirma parola: (daca schimbati parola)';
$lang['edit_user_groups_heading']                    = 'Membru al grupurilor';
$lang['edit_user_submit_btn']                        = 'Salveaza utilizator';
$lang['edit_user_validation_fname_label']            = 'Prenume';
$lang['edit_user_validation_lname_label']            = 'Nume';
$lang['edit_user_validation_email_label']            = 'Adresa email';
$lang['edit_user_validation_phone1_label']           = 'Prima parte a numarului de telefon';
$lang['edit_user_validation_phone2_label']           = 'A doua parte a numarului de telefon';
$lang['edit_user_validation_phone3_label']           = 'A treia parte a numarului de telefon';
$lang['edit_user_validation_company_label']          = 'Companie';
$lang['edit_user_validation_groups_label']           = 'Grupuri';
$lang['edit_user_validation_password_label']         = 'Parola';
$lang['edit_user_validation_password_confirm_label'] = 'Confirmarea parolei';

// Create Group
$lang['create_group_title']                  = 'Creeaza grup';
$lang['create_group_heading']                = 'Creeaza grup';
$lang['create_group_subheading']             = 'Va rugam sa introduceti informatiile grupului mai jos.';
$lang['create_group_name_label']             = 'Numele grupului:';
$lang['create_group_desc_label']             = 'Descriere:';
$lang['create_group_submit_btn']             = 'Creeaza grupul';
$lang['create_group_validation_name_label']  = 'Numele Grupului';
$lang['create_group_validation_desc_label']  = 'Descriere';

// Edit Group
$lang['edit_group_title']                  = 'Editeaza datele grupului';
$lang['edit_group_saved']                  = 'Grup salvat';
$lang['edit_group_heading']                = 'Editeaza grupul';
$lang['edit_group_subheading']             = 'Va rugam sa introduceti informatiile grupului mai jos.';
$lang['edit_group_name_label']             = 'Numele grupului:';
$lang['edit_group_desc_label']             = 'Descriere:';
$lang['edit_group_submit_btn']             = 'Salveaza grupul';
$lang['edit_group_validation_name_label']  = 'Numele grupului';
$lang['edit_group_validation_desc_label']  = 'Descriere';

// Change Password
$lang['change_password_heading']                               = 'Schimba parola';
$lang['change_password_old_password_label']                    = 'Parola veche:';
$lang['change_password_new_password_label']                    = 'Noua parola (cel putin %s caractere):';
$lang['change_password_new_password_confirm_label']            = 'Confirma noua parola:';
$lang['change_password_submit_btn']                            = 'Schimba';
$lang['change_password_validation_old_password_label']         = 'Parola veche';
$lang['change_password_validation_new_password_label']         = 'Parola noua';
$lang['change_password_validation_new_password_confirm_label'] = 'Confirma noua parola';

// Forgot Password
$lang['forgot_password_heading']                 = 'Parola uitata';
$lang['forgot_password_subheading']              = 'Va rugam sa introduceti %s pentru a va putea trimite un email de resetare a parolei.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Trimite';
$lang['forgot_password_validation_email_label']  = 'Adresa de email';
$lang['forgot_password_username_identity_label'] = 'Utilizator';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'Nu exista nicio inregistrare cu acest email.';

// Reset Password
$lang['reset_password_heading']                               = 'Schimbare parola';
$lang['reset_password_new_password_label']                    = 'Parola noua (cel putin %s caractere):';
$lang['reset_password_new_password_confirm_label']            = 'Confirma noua parola:';
$lang['reset_password_submit_btn']                            = 'Schimba';
$lang['reset_password_validation_new_password_label']         = 'Parola noua';
$lang['reset_password_validation_new_password_confirm_label'] = 'Confirma noua parola';

// Activation Email
$lang['email_activate_heading']    = 'Activeaza contul pentru %s';
$lang['email_activate_subheading'] = 'Dati click pe acest link pentru %s.';
$lang['email_activate_link']       = 'Activarea contului';

// Forgot Password Email
$lang['email_forgot_password_heading']    = 'Reseteaza parola pentru %s';
$lang['email_forgot_password_subheading'] = 'Dati click pe acest link pentru %s.';
$lang['email_forgot_password_link']       = 'Resetarea parolei';

// New Password Email
$lang['email_new_password_heading']    = 'Noua parola pentru %s';
$lang['email_new_password_subheading'] = 'Parola a fost resetata pentru: %s';

