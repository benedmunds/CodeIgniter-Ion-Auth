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
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  Dutch language file for Ion Auth example views
*
*/

return [
	// Errors
	'error_security' => 'Het CSRF token is verlopen of ongeldig.',

	// Login
	'login_heading'         => 'Login',
	'login_subheading'      => 'Gebruikt uw e-mailadres/gebruikersnaam en wachtwoord om in te loggen.',
	'login_identity_label'  => 'E-mail/Gebruikersnaam:',
	'login_password_label'  => 'Wachtwoord:',
	'login_remember_label'  => 'Onthoud mij:',
	'login_submit_btn'      => 'Login',
	'login_forgot_password' => 'Wachtwoord vergeten?',

	// Index
	'index_heading'           => 'Gebruikers',
	'index_subheading'        => 'Hieronder vindt u een lijst van de gebruikers.',
	'index_fname_th'          => 'Voornaam',
	'index_lname_th'          => 'Achternaam',
	'index_email_th'          => 'E-mailadres',
	'index_groups_th'         => 'Groepen',
	'index_status_th'         => 'Status',
	'index_action_th'         => 'Actie',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'Actief',
	'index_inactive_link'     => 'Inactief',
	'index_create_user_link'  => 'Nieuwe gebruiker aanmaken',
	'index_create_group_link' => 'Nieuwe groep aanmaken',

	// Deactivate User
	'deactivate_heading'                  => 'Gebruiker deactiveren',
	'deactivate_subheading'               => 'Wilt u gebruiker \'%s\' deactiveren?',
	'deactivate_confirm_y_label'          => 'Ja:',
	'deactivate_confirm_n_label'          => 'Nee:',
	'deactivate_submit_btn'               => 'Verzenden',
	'deactivate_validation_confirm_label' => 'bevestiging',
	'deactivate_validation_user_id_label' => 'Gebruikers ID',

	// Create User
	'create_user_heading'                           => 'Gebruiker aanmaken',
	'create_user_subheading'                        => 'Gelieve hieronder de gebruikersinformatie in te vullen.',
	'create_user_fname_label'                       => 'Voornaam:',
	'create_user_lname_label'                       => 'Achternaam:',
	'create_user_identity_label'                    => 'Identiteit:',
	'create_user_company_label'                     => 'Bedrijfsnaam:',
	'create_user_email_label'                       => 'E-mailadres:',
	'create_user_phone_label'                       => 'Telefoonnummer:',
	'create_user_password_label'                    => 'Wachtwoord:',
	'create_user_password_confirm_label'            => 'Bevestig wachtwoord:',
	'create_user_submit_btn'                        => 'Gebruiker aanmaken',
	'create_user_validation_fname_label'            => 'Voornaam',
	'create_user_validation_lname_label'            => 'Achternaam',
	'create_user_validation_identity_label'         => 'Identity',
	'create_user_validation_email_label'            => 'E-mailadres',
	'create_user_validation_phone1_label'           => 'Eerste gedeelte telefoonnummer',
	'create_user_validation_phone2_label'           => 'Tweede gedeelte telefoonnummer',
	'create_user_validation_phone3_label'           => 'Derde gedeelte telefoonnummer',
	'create_user_validation_company_label'          => 'Bedrijfsnaam',
	'create_user_validation_password_label'         => 'Wachtwoord',
	'create_user_validation_password_confirm_label' => 'Wachtwoord bevestiging',

	// Edit User
	'edit_user_heading'                           => 'Gebruiker bewerken',
	'edit_user_subheading'                        => 'Gelieve hieronder de gebruikersinformatie in te vullen.',
	'edit_user_fname_label'                       => 'Voornaam:',
	'edit_user_lname_label'                       => 'Achternaam:',
	'edit_user_company_label'                     => 'Bedrijfsnaam:',
	'edit_user_email_label'                       => 'E-mailadres:',
	'edit_user_phone_label'                       => 'Telefoonnummer:',
	'edit_user_password_label'                    => 'Wachtwoord: (indien wijzigen)',
	'edit_user_password_confirm_label'            => 'Bevestig wachtwoord: (indien wijzigen)',
	'edit_user_groups_heading'                    => 'Lid van groepen',
	'edit_user_submit_btn'                        => 'Gebruiker opslaan',
	'edit_user_validation_fname_label'            => 'Voornaam',
	'edit_user_validation_lname_label'            => 'Achternaam',
	'edit_user_validation_email_label'            => 'E-mailadres',
	'edit_user_validation_phone1_label'           => 'Eerste gedeelte telefoonnummer',
	'edit_user_validation_phone2_label'           => 'Tweede gedeelte telefoonnummer',
	'edit_user_validation_phone3_label'           => 'Derde gedeelte telefoonnummer',
	'edit_user_validation_company_label'          => 'Bedrijfsnaam',
	'edit_user_validation_groups_label'           => 'Groepen',
	'edit_user_validation_password_label'         => 'Wachtwoord',
	'edit_user_validation_password_confirm_label' => 'Wachtwoord bevestiging',

	// Create Group
	'create_group_title'                  => 'Groep aanmaken',
	'create_group_heading'                => 'Groep aanmaken',
	'create_group_subheading'             => 'Gelieve hieronder de groep informatie aan te vullen.',
	'create_group_name_label'             => 'Groepsnaam:',
	'create_group_desc_label'             => 'Beschrijving:',
	'create_group_submit_btn'             => 'Groep aanmaken',
	'create_group_validation_name_label'  => 'Groepsnaam',
	'create_group_validation_desc_label'  => 'Beschrijving',

	// Edit Group
	'edit_group_title'                  => 'Groep bewerken',
	'edit_group_saved'                  => 'Groep opgeslagen',
	'edit_group_heading'                => 'Groep bewerken',
	'edit_group_subheading'             => 'Gelieve hieronder de groep informatie aan te vullen.',
	'edit_group_name_label'             => 'Groepsnaam:',
	'edit_group_desc_label'             => 'Beschrijving:',
	'edit_group_submit_btn'             => 'Groep opslaan',
	'edit_group_validation_name_label'  => 'Groepsnaam',
	'edit_group_validation_desc_label'  => 'Beschrijving',

	// Change Password
	'change_password_heading'                               => 'Wachtwoord wijzigen',
	'change_password_old_password_label'                    => 'Oud wachtwoord:',
	'change_password_new_password_label'                    => 'Nieuw wachtwoord (minstens %s tekens lang):',
	'change_password_new_password_confirm_label'            => 'Bevestig nieuw wachtwoord:',
	'change_password_submit_btn'                            => 'Wijzig',
	'change_password_validation_old_password_label'         => 'Oud wachtwoord',
	'change_password_validation_new_password_label'         => 'Nieuw wachtwoord',
	'change_password_validation_new_password_confirm_label' => 'Bevestig nieuw wachtwoord',

	// Forgot Password
	'forgot_password_heading'                 => 'Wachtwoord vergeten',
	'forgot_password_subheading'              => 'Gelieve uw %sadres in te vullen zodat we u een e-mail kunnen sturen om uw wachtwoord te wijzigen.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Verzenden',
	'forgot_password_validation_email_label'  => 'E-mailadres',
	'forgot_password_identity_label'          => 'Gebruikersnaam',
	'forgot_password_email_identity_label'    => 'E-mail',
	'forgot_password_email_not_found'         => 'Het opgegeven e-mailadres werd niet terug gevonden.',
	'forgot_password_identity_not_found'      => 'De opgegeven identiteit kon niet gevonden worden.',

	// Reset Password
	'reset_password_heading'                               => 'Wachtwoord wijzigen',
	'reset_password_new_password_label'                    => 'Nieuw wachtwoord (minstens %s tekens lang):',
	'reset_password_new_password_confirm_label'            => 'Bevestig nieuw wachtwoord:',
	'reset_password_submit_btn'                            => 'Verander',
	'reset_password_validation_new_password_label'         => 'Nieuw wachtwoord',
	'reset_password_validation_new_password_confirm_label' => 'Bevestig nieuw wachtwoord',

	// Forgot Password Email
	'emailForgotPassword_heading'    => 'Wachtwoord resetten voor %s',
	'emailForgotPassword_subheading' => 'Gelieve op deze link te klikken om %s.',
	'emailForgotPassword_link'       => 'Reset uw wachtwoord',
];
