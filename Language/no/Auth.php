<?php
/**
* Name: Auth Lang - Norwegian
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Author: Yngve Høiseth
* 		  yngve.hoiseth@gmail.com
*         @yhoiseth
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:   03.09.2013
* Last-Edit: 16.11.2014
*
* Description: Norwegian language file for Ion Auth example views
*
*/

return [
	// Errors
	'error_security' => 'Dette skjemaet ble stoppet i sikkerhetskontrollen vår.',

	// Login
	'login_heading'         => 'Logg inn',
	'login_subheading'      => 'Vennligst logg inn med din email/brukernavn og passord nedenfor.',
	'login_identity_label'  => 'Email/brukernavn:',
	'login_password_label'  => 'Passord:',
	'login_remember_label'  => 'Husk meg:',
	'login_submit_btn'      => 'Logg inn',
	'login_forgot_password' => 'Glemt passordet?',

	// Index
	'index_heading'           => 'Brukere',
	'index_subheading'        => 'Nedenfor er en liste over brukerne.',
	'index_fname_th'          => 'Fornavn',
	'index_lname_th'          => 'Etternavn',
	'index_email_th'          => 'Email',
	'index_groups_th'         => 'Grupper',
	'index_status_th'         => 'Status',
	'index_action_th'         => 'Handling',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'Aktive',
	'index_inactive_link'     => 'Inaktiv',
	'index_create_user_link'  => 'Lag ny bruker',
	'index_create_group_link' => 'Lag ny gruppe',

	// Deactivate User
	'deactivate_heading'                  => 'Deaktivér bruker',
	'deactivate_subheading'               => 'Er du sikker på at du vil deaktivere brukeren \'%s\'',
	'deactivate_confirm_y_label'          => 'Ja:',
	'deactivate_confirm_n_label'          => 'Nei:',
	'deactivate_submit_btn'               => 'Fullfør',
	'deactivate_validation_confirm_label' => 'bekreftelse',
	'deactivate_validation_user_id_label' => 'bruker-ID',

	// Create User
	'create_user_heading'                           => 'Lag ny bruker',
	'create_user_subheading'                        => 'Legg inn informasjon om brukeren nedenfor.',
	'create_user_fname_label'                       => 'Fornavn:',
	'create_user_lname_label'                       => 'Etternavn:',
	'create_user_company_label'                     => 'Firmanavn:',
	'create_user_identity_label'                    => 'Identity:',
	'create_user_email_label'                       => 'Email:',
	'create_user_phone_label'                       => 'Telefon:',
	'create_user_password_label'                    => 'Passord:',
	'create_user_password_confirm_label'            => 'Bekreft passord:',
	'create_user_submit_btn'                        => 'Lag ny bruker',
	'create_user_validation_fname_label'            => 'Fornavn',
	'create_user_validation_lname_label'            => 'Etternavn',
	'create_user_validation_identity_label'         => 'Identity',
	'create_user_validation_email_label'            => 'Email',
	'create_user_validation_phone1_label'           => 'Første del av telefonnummer',
	'create_user_validation_phone2_label'           => 'Andre del av telefonnummer',
	'create_user_validation_phone3_label'           => 'Tredje del av telefonnummer',
	'create_user_validation_company_label'          => 'Firmanavn',
	'create_user_validation_password_label'         => 'Passord',
	'create_user_validation_password_confirm_label' => 'Bekreftelse av passord',

	// Edit User
	'edit_user_heading'                           => 'Redigér bruker',
	'edit_user_subheading'                        => 'Vennligst legg inn informasjon om brukeren nedenfor.',
	'edit_user_fname_label'                       => 'Fornavn:',
	'edit_user_lname_label'                       => 'Etternavn:',
	'edit_user_company_label'                     => 'Firmanavn:',
	'edit_user_email_label'                       => 'Email:',
	'edit_user_phone_label'                       => 'Telefon:',
	'edit_user_password_label'                    => 'Passord: (hvis passordet skal endres)',
	'edit_user_password_confirm_label'            => 'Bekreft passord: (hvis passordet skal endres)',
	'edit_user_groups_heading'                    => 'Medlem av grupper',
	'edit_user_submit_btn'                        => 'Lagre bruker',
	'edit_user_validation_fname_label'            => 'Fornavn',
	'edit_user_validation_lname_label'            => 'Etternavn',
	'edit_user_validation_email_label'            => 'Email',
	'edit_user_validation_phone1_label'           => 'Første del av telefonnummer',
	'edit_user_validation_phone2_label'           => 'Andre del av telefonnummer',
	'edit_user_validation_phone3_label'           => 'Tredje del av telefonnummer',
	'edit_user_validation_company_label'          => 'Firmanavn',
	'edit_user_validation_groups_label'           => 'Grupper',
	'edit_user_validation_password_label'         => 'Passord',
	'edit_user_validation_password_confirm_label' => 'Bekreftelse av passord',

	// Create Group
	'create_group_title'                 => 'Lag gruppe',
	'create_group_heading'               => 'Lag gruppe',
	'create_group_subheading'            => 'Legg inn informasjon om gruppen nedenfor.',
	'create_group_name_label'            => 'Gruppenavn:',
	'create_group_desc_label'            => 'Beskrivelse:',
	'create_group_submit_btn'            => 'Lag gruppe',
	'create_group_validation_name_label' => 'Gruppenavn',
	'create_group_validation_desc_label' => 'Beskrivelse',

	// Edit Group
	'edit_group_title'                 => 'Redigér gruppe',
	'edit_group_saved'                 => 'Gruppe lagret',
	'edit_group_heading'               => 'Redigér gruppe',
	'edit_group_subheading'            => 'Legg inn informasjon om gruppen nedenfor.',
	'edit_group_name_label'            => 'Gruppenavn:',
	'edit_group_desc_label'            => 'Beskrivelse:',
	'edit_group_submit_btn'            => 'Lagre gruppe',
	'edit_group_validation_name_label' => 'Gruppenavn',
	'edit_group_validation_desc_label' => 'Beskrivelse',

	// Change Password
	'change_password_heading'                               => 'Endre passord',
	'change_password_old_password_label'                    => 'Gammelt passord:',
	'change_password_new_password_label'                    => 'Nytt passord (minst %s tegn):',
	'change_password_new_password_confirm_label'            => 'Bekreft nytt passord:',
	'change_password_submit_btn'                            => 'Endre',
	'change_password_validation_old_password_label'         => 'Gammelt passord',
	'change_password_validation_new_password_label'         => 'Nytt passord',
	'change_password_validation_new_password_confirm_label' => 'Bekreft nytt passord',

	// Forgot Password
	'forgot_password_heading'                 => 'Glemt passord',
	'forgot_password_subheading'              => 'Legg inn din %s så vi kan sende deg en email for å tilbakestille passordet.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Send inn',
	'forgot_password_validation_email_label'  => 'Email',
	'forgot_password_identity_label'          => 'Brukernavn',
	'forgot_password_email_identity_label'    => 'Email',
	'forgot_password_email_not_found'         => 'Vi fant ikke emailen du oppgav.',
	'forgot_password_identity_not_found'         => 'No record of that username address.',

	// Reset Password
	'reset_password_heading'                               => 'Endre passord',
	'reset_password_new_password_label'                    => 'Nytt passord (minst %s tegn):',
	'reset_password_new_password_confirm_label'            => 'Bekreft nytt passord:',
	'reset_password_submit_btn'                            => 'Endre',
	'reset_password_validation_new_password_label'         => 'Nytt passord',
	'reset_password_validation_new_password_confirm_label' => 'Bekreft nytt passord',

	// Forgot Password Email
	'emailForgotPassword_heading'    => 'Tilbakestill passord for %s',
	'emailForgotPassword_subheading' => 'Klikk denne linken for å %s.',
	'emailForgotPassword_link'       => 'Tilbakestill passordet ditt',
];
