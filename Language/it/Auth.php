<?php
/**
* Name:  Auth Lang - Italian
*
* Author: Ben Edmunds
*         ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  Italian language file for Ion Auth example views
*
*/

return [
	// Errors
	'error_security' => 'Il form non ha superato i controlli di sicurezza',

	// Login
	'login_heading'         => 'Accedi',
	'login_subheading'      => 'Si prega di accedere tramite email/username e password',
	'login_identity_label'  => 'Email/Username:',
	'login_password_label'  => 'Password:',
	'login_remember_label'  => 'Ricordami:',
	'login_submit_btn'      => 'Accedi',
	'login_forgot_password' => 'Dimenticata la password?',

	// Index
	'index_heading'           => 'Utenti',
	'index_subheading'        => 'Qua sotto troverete una lista degli utenti.',
	'index_fname_th'          => 'Nome',
	'index_lname_th'          => 'Cognome',
	'index_email_th'          => 'Email',
	'index_groups_th'         => 'Gruppi',
	'index_status_th'         => 'Stato',
	'index_action_th'         => 'Azione',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'Attivo',
	'index_inactive_link'     => 'Disattivo',
	'index_create_user_link'  => 'Crea un nuovo utente',
	'index_create_group_link' => 'Crea un nuovo gruppo',

	// Deactivate User
	'deactivate_heading'                  => 'Disattiva Utente',
	'deactivate_subheading'               => 'Sei sicuro di voler attivare l\'utente \'%s\'',
	'deactivate_confirm_y_label'          => 'S&igrave;:',
	'deactivate_confirm_n_label'          => 'No:',
	'deactivate_submit_btn'               => 'Invia',
	'deactivate_validation_confirm_label' => 'conferma',
	'deactivate_validation_user_id_label' => 'ID utente',

	// Create User
	'create_user_heading'                           => 'Crea l\'utente',
	'create_user_subheading'                        => 'Inserisci le informazioni sull\'utente qua sotto.',
	'create_user_fname_label'                       => 'Nome:',
	'create_user_lname_label'                       => 'Cognome:',
	'create_user_identity_label'                    => 'Identity:',
	'create_user_company_label'                     => 'Azienda:',
	'create_user_email_label'                       => 'Email:',
	'create_user_phone_label'                       => 'Telefono:',
	'create_user_password_label'                    => 'Password:',
	'create_user_password_confirm_label'            => 'Conferma Password:',
	'create_user_submit_btn'                        => 'Crea Utente',
	'create_user_validation_fname_label'            => 'Nome',
	'create_user_validation_lname_label'            => 'Cognome',
	'create_user_validation_identity_label'         => 'Identity',
	'create_user_validation_email_label'            => 'Indirizzo Email',
	'create_user_validation_phone1_label'           => 'Prima parte del Telefono',
	'create_user_validation_phone2_label'           => 'Seconda parte del Telefono',
	'create_user_validation_phone3_label'           => 'Terza parte del Telefono',
	'create_user_validation_company_label'          => 'Azienda',
	'create_user_validation_password_label'         => 'Password',
	'create_user_validation_password_confirm_label' => 'Conferma Password',

	// Edit User
	'edit_user_heading'                           => 'Modifica Utente',
	'edit_user_subheading'                        => 'Inserisci le informazioni sull\'utente qua sotto.',
	'edit_user_fname_label'                       => 'Nome:',
	'edit_user_lname_label'                       => 'Cognome:',
	'edit_user_company_label'                     => 'Azienda:',
	'edit_user_email_label'                       => 'Email:',
	'edit_user_phone_label'                       => 'Telefono:',
	'edit_user_password_label'                    => 'Password: (se la si vuole cambiare)',
	'edit_user_password_confirm_label'            => 'Conferma Password: (se la si vuole cambiare)',
	'edit_user_groups_heading'                    => 'Appartenente ai gruppi',
	'edit_user_submit_btn'                        => 'Salva Utente',
	'edit_user_validation_fname_label'            => 'Nome',
	'edit_user_validation_lname_label'            => 'Cognome',
	'edit_user_validation_email_label'            => 'Indirizzo Email',
	'edit_user_validation_phone1_label'           => 'Prima parte del Telefono',
	'edit_user_validation_phone2_label'           => 'Seconda parte del Telefono',
	'edit_user_validation_phone3_label'           => 'Terza parte del Telefono',
	'edit_user_validation_company_label'          => 'Azienda',
	'edit_user_validation_groups_label'           => 'Gruppi',
	'edit_user_validation_password_label'         => 'Password',
	'edit_user_validation_password_confirm_label' => 'Conferma Password',

	// Create Group
	'create_group_title'                  => 'Crea Gruppo',
	'create_group_heading'                => 'Crea Gruppo',
	'create_group_subheading'             => 'Inserisci le informazioni del gruppo qua sotto.',
	'create_group_name_label'             => 'Nome Gruppo:',
	'create_group_desc_label'             => 'Descrizione:',
	'create_group_submit_btn'             => 'Crea Gruppo',
	'create_group_validation_name_label'  => 'Nome Gruppo',
	'create_group_validation_desc_label'  => 'Descrizione',

	// Edit Group
	'edit_group_title'                  => 'Modifica Gruppo',
	'edit_group_saved'                  => 'Gruppo Salvato',
	'edit_group_heading'                => 'Modifica Gruppo',
	'edit_group_subheading'             => 'Inserisci le informazioni del gruppo qua sotto.',
	'edit_group_name_label'             => 'Nome Gruppo:',
	'edit_group_desc_label'             => 'Descrizione:',
	'edit_group_submit_btn'             => 'Salva Gruppo',
	'edit_group_validation_name_label'  => 'Nome Gruppo',
	'edit_group_validation_desc_label'  => 'Descrizione',

	// Change Password
	'change_password_heading'                               => 'Cambia Password',
	'change_password_old_password_label'                    => 'Vecchia Password:',
	'change_password_new_password_label'                    => 'Nuova Password (lunga almeno %s caratteri):',
	'change_password_new_password_confirm_label'            => 'Conferma Nuova Password:',
	'change_password_submit_btn'                            => 'Cambia',
	'change_password_validation_old_password_label'         => 'Vecchia Password',
	'change_password_validation_new_password_label'         => 'Nuova Password',
	'change_password_validation_new_password_confirm_label' => 'Conferma Nuova Password',

	// Forgot Password
	'forgot_password_heading'                 => 'Password Dimenticata',
	'forgot_password_subheading'              => 'Inserire la propria %s, vi verr&agrave; inviata una email per reimpostare la vostra password.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Invia',
	'forgot_password_validation_email_label'  => 'Indirizzo Email',
	'forgot_password_username_identity_label' => 'Username',
	'forgot_password_email_identity_label'    => 'Email',
	'forgot_password_email_not_found'         => 'Indirizzo email non presente nel database.',
	'forgot_password_identity_not_found'         => 'Nessuna registrazione per il nome utente.',

	// Reset Password
	'reset_password_heading'                               => 'Cambia Password',
	'reset_password_new_password_label'                    => 'Nuova Password (lunga almeno %s caratteri):',
	'reset_password_new_password_confirm_label'            => 'Conferma Nuova Password:',
	'reset_password_submit_btn'                            => 'Cambia',
	'reset_password_validation_new_password_label'         => 'Nuova Password',
	'reset_password_validation_new_password_confirm_label' => 'Conferma Nuova Password',

	// Forgot Password Email
	'emailForgotPassword_heading'    => 'Reimposta la Password per %s',
	'emailForgotPassword_subheading' => 'Cliccare il seguente link per %s.',
	'emailForgotPassword_link'       => 'Reimposta la tua Password',
];
