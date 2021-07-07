<?php
/**
* Name:  Auth Lang - German
*
* Author: Ben Edmunds
* 		    ben.edmunds@gmail.com
*         @benedmunds
*
* Translation: Benjamin Neu (benny@duxu.de), Max Vogl mail@max-vogl.de
*
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  29.07.2013
* Last-Edit: 23.04.2016
*
* Description:  German language file for Ion Auth example views
* Beschreibung:  Deutsche Sprach-Datei für Ion Auth Beispielansichten
*
*/

return [
	// Errors
	'error_security' => 'Dieses Formular hat unsere Sicherheitskontrollen nicht bestanden.',

	// Login
	'login_heading'         => 'Einloggen',
	'login_subheading'      => 'Bitte loggen Sie sich ein mit Ihrer/n Email/Benutzernamen und Kennwort unten ein.',
	'login_identity_label'  => 'Email/Benutzername:',
	'login_password_label'  => 'Kennwort:',
	'login_remember_label'  => 'Merken Sie mich:',
	'login_submit_btn'      => 'Einloggen',
	'login_forgot_password' => 'Ihr Kennwort vergessen?',

	// Index
	'index_heading'           => 'Benutzer',
	'index_subheading'        => 'Im Folgenden werden alle Benutzer aufgelistet.',
	'index_fname_th'          => 'Vorname',
	'index_lname_th'          => 'Nachname',
	'index_email_th'          => 'Email',
	'index_groups_th'         => 'Gruppen',
	'index_status_th'         => 'Status',
	'index_action_th'         => 'Aktion',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'Aktiv',
	'index_inactive_link'     => 'Inaktiv',
	'index_inactive_link'     => 'Inaktiv',
	'index_create_user_link'  => 'Einen neuen Benutzer anlegen',
	'index_create_group_link' => 'Eine neue Gruppe anlegen',

	// Deactivate User
	'deactivate_heading'                  => 'Benutzer deaktivieren',
	'deactivate_subheading'               => 'Sind Sie sicher dass Sie den Benutzer \'%s\' deaktivieren möchten',
	'deactivate_confirm_y_label'          => 'Ja:',
	'deactivate_confirm_n_label'          => 'Nein:',
	'deactivate_submit_btn'               => 'Eingeben',
	'deactivate_validation_confirm_label' => 'bestätigung',
	'deactivate_validation_user_id_label' => 'Benutzer ID',

	// Create User
	'create_user_heading'                           => 'Benutzer anlegen',
	'create_user_subheading'                        => 'Bitte geben Sie die Daten zum Benutzer unten ein.',
	'create_user_fname_label'                       => 'Vorname:',
	'create_user_lname_label'                       => 'Nachname:',
	'create_user_identity_label'                    => 'Benutzername:',
	'create_user_company_label'                     => 'Firmenname:',
	'create_user_email_label'                       => 'Email:',
	'create_user_phone_label'                       => 'Telefon:',
	'create_user_password_label'                    => 'Kennwort:',
	'create_user_password_confirm_label'            => 'Kennwort bestätigen:',
	'create_user_submit_btn'                        => 'Benutzer anlegen',
	'create_user_validation_fname_label'            => 'Vorname',
	'create_user_validation_lname_label'            => 'Nachname',
	'create_user_validation_identity_label'         => 'Benutzername',
	'create_user_validation_email_label'            => 'Email',
	'create_user_validation_phone1_label'           => 'Erster Teil der Telefonnummer',
	'create_user_validation_phone2_label'           => 'Zweiter Teil der Telefonnummer',
	'create_user_validation_phone3_label'           => 'Dritter Teil der Telefonnummer',
	'create_user_validation_company_label'          => 'Firmenname',
	'create_user_validation_password_label'         => 'Kennwort',
	'create_user_validation_password_confirm_label' => 'Kennwort bestätigen',

	// Edit User
	'edit_user_heading'                           => 'Benutzer bearbeiten',
	'edit_user_subheading'                        => 'Bitte geben Sie die Daten zum Benutzer unten ein.',
	'edit_user_fname_label'                       => 'Vorname:',
	'edit_user_lname_label'                       => 'Nachname:',
	'edit_user_company_label'                     => 'Firmenname:',
	'edit_user_email_label'                       => 'Email:',
	'edit_user_phone_label'                       => 'Telefon:',
	'edit_user_password_label'                    => 'Kennwort: (falls Sie es ändern)',
	'edit_user_password_confirm_label'            => 'Kennwort bestätigen: (falls Sie es ändern)',
	'edit_user_groups_heading'                    => 'Mitglied der Gruppen',
	'edit_user_submit_btn'                        => 'Benutzerdaten speichern',
	'edit_user_validation_fname_label'            => 'Vorname',
	'edit_user_validation_lname_label'            => 'Nachname',
	'edit_user_validation_email_label'            => 'Email',
	'edit_user_validation_phone1_label'           => 'Erster Teil der Telefonnummer',
	'edit_user_validation_phone2_label'           => 'Zweiter Teil der Telefonnummer',
	'edit_user_validation_phone3_label'           => 'Dritter Teil der Telefonnummer',
	'edit_user_validation_company_label'          => 'Firmenname',
	'edit_user_validation_groups_label'           => 'Gruppen',
	'edit_user_validation_password_label'         => 'Kennwort',
	'edit_user_validation_password_confirm_label' => 'Kennwort bestätigen',

	// Create Group
	'create_group_title'                  => 'Gruppe anlegen',
	'create_group_heading'                => 'Gruppe anlegen',
	'create_group_subheading'             => 'Bitte geben Sie die Daten zur Gruppe unten ein.',
	'create_group_name_label'             => 'Gruppenname:',
	'create_group_desc_label'             => 'Beschreibung:',
	'create_group_submit_btn'             => 'Gruppe anlegen',
	'create_group_validation_name_label'  => 'Gruppenname',
	'create_group_validation_desc_label'  => 'Beschreibung',

	// Edit Group
	'edit_group_title'                  => 'Gruppe bearbeiten',
	'edit_group_saved'                  => 'Gruppe gespeichert',
	'edit_group_heading'                => 'Gruppe bearbeiten',
	'edit_group_subheading'             => 'Bitte geben Sie die Daten zur Gruppe unten ein.',
	'edit_group_name_label'             => 'Gruppenname:',
	'edit_group_desc_label'             => 'Beschreibung:',
	'edit_group_submit_btn'             => 'Gruppe speichern',
	'edit_group_validation_name_label'  => 'Gruppenname',
	'edit_group_validation_desc_label'  => 'Beschreibung',

	// Change Password
	'change_password_heading'                               => 'Kennwort Ändern',
	'change_password_old_password_label'                    => 'Altes Kennwort:',
	'change_password_new_password_label'                    => 'Neues Kennwort (mindestens %s Zeichen lang):',
	'change_password_new_password_confirm_label'            => 'Neues Kennwort bestätigen:',
	'change_password_submit_btn'                            => 'Ändern',
	'change_password_validation_old_password_label'         => 'Altes Kennwort',
	'change_password_validation_new_password_label'         => 'Neues Kennwort',
	'change_password_validation_new_password_confirm_label' => 'Neues Kennwort bestätigen',

	// Forgot Password
	'forgot_password_heading'                 => 'Kennwort vergessen',
	'forgot_password_subheading'              => 'Bitte geben Sie Ihre %s ein damit wir Ihnen eine Mail schicken können um das Kennwort zu ändern.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Eingabe',
	'forgot_password_validation_email_label'  => 'Email',
	'forgot_password_identity_label'          => 'Benutzername',
	'forgot_password_email_identity_label'    => 'Email',
	'forgot_password_email_not_found'         => 'No record of that email address.',
	'forgot_password_identity_not_found'         => 'No record of that username address.',


	// Reset Password
	'reset_password_heading'                               => 'Kennwort ändern',
	'reset_password_new_password_label'                    => 'Neues Kennwort (mindestens %s Zeichen lang):',
	'reset_password_new_password_confirm_label'            => 'Neues Kennwort bestätigen:',
	'reset_password_submit_btn'                            => 'Ändern',
	'reset_password_validation_new_password_label'         => 'Neues Kennwort',
	'reset_password_validation_new_password_confirm_label' => 'Neues Kennwort bestätigen',

	// Forgot Password Email
	'emailForgotPassword_heading'    => 'Kennwort für %s zurücksetzen',
	'emailForgotPassword_subheading' => 'Bitte drücken Sie diese Link um zu %s.',
	'emailForgotPassword_link'       => 'Ihr Kennwort zurückstellen',
];
