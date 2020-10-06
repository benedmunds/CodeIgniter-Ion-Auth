<?php
/**
* Name:  Auth Lang - Danish
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         daniel@kyokodaniel.com
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  05.09.2013
*
* Description:  Danish language file for Ion Auth example views
*
*/

return [
	// Errors
	'error_security' => 'Formularet bestod ikke vores sikkerhedskontrol.',

	// Login
	'login_heading'         => 'Login',
	'login_subheading'      => 'Login med din email og kodeord herunder.',
	'login_identity_label'  => 'Email:',
	'login_password_label'  => 'Kodeord:',
	'login_remember_label'  => 'Husk mig:',
	'login_submit_btn'      => 'Login',
	'login_forgot_password' => 'Glemt dit kodeord?',

	// Index
	'index_heading'           => 'Brugere',
	'index_subheading'        => 'Nedeunder er der en liste af brugere.',
	'index_fname_th'          => 'Øgenavn',
	'index_lname_th'          => 'Efternavn',
	'index_email_th'          => 'Email',
	'index_groups_th'         => 'Grupper',
	'index_status_th'         => 'Status',
	'index_action_th'         => 'Aktion',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'Aktiv',
	'index_inactive_link'     => 'Inaktiv',
	'index_inactive_link'     => 'Inaktiv',
	'index_create_user_link'  => 'Opret en ny bruger',
	'index_create_group_link' => 'Opret en ny gruppe',

	// Deactivate User
	'deactivate_heading'                  => 'Deaktivér Bruger',
	'deactivate_subheading'               => 'Er du sikker på at du ønsker at deaktivere brugeren \'%s\'',
	'deactivate_confirm_y_label'          => 'Ja:',
	'deactivate_confirm_n_label'          => 'Nej:',
	'deactivate_submit_btn'               => 'Afsend',
	'deactivate_validation_confirm_label' => 'bekræftelse',
	'deactivate_validation_user_id_label' => 'bruger ID',

	// Create User
	'create_user_heading'                           => 'Opret Bruger',
	'create_user_subheading'                        => 'Indtast brugerinformationerne nedeunder.',
	'create_user_fname_label'                       => 'Øgenavn:',
	'create_user_lname_label'                       => 'Efternavn:',
	'create_user_identity_label'                    => 'Identity:',
	'create_user_company_label'                     => 'Firmanavn:',
	'create_user_email_label'                       => 'Email:',
	'create_user_phone_label'                       => 'Telefon:',
	'create_user_password_label'                    => 'Kodeord:',
	'create_user_password_confirm_label'            => 'Bekræft Kodeord:',
	'create_user_submit_btn'                        => 'Opret Bruger',
	'create_user_validation_fname_label'            => 'Øgenavn',
	'create_user_validation_lname_label'            => 'Efternavn',
	'create_user_validation_identity_label'         => 'Identity',
	'create_user_validation_email_label'            => 'Email-adresse',
	'create_user_validation_phone1_label'           => 'Første del af telefonnummeret',
	'create_user_validation_phone2_label'           => 'Anden del af telefonnummeret',
	'create_user_validation_phone3_label'           => 'Tredje del af telefonnummeret',
	'create_user_validation_company_label'          => 'Firmanavn',
	'create_user_validation_password_label'         => 'Kodeord',
	'create_user_validation_password_confirm_label' => 'Bekræft Kodeord',

	// Edit User
	'edit_user_heading'                           => 'Rediger Bruger',
	'edit_user_subheading'                        => 'Indtast brugerinformationerne nedeunder.',
	'edit_user_fname_label'                       => 'Øgenavn:',
	'edit_user_lname_label'                       => 'Efternavn:',
	'edit_user_company_label'                     => 'Firmanavn:',
	'edit_user_email_label'                       => 'Email:',
	'edit_user_phone_label'                       => 'Telefon:',
	'edit_user_password_label'                    => 'Kodeord: (hvis du skifter det nu)',
	'edit_user_password_confirm_label'            => 'Bekræft Kodeord: (hvis du skifter det nu)',
	'edit_user_groups_heading'                    => 'Medlem af gruppe',
	'edit_user_submit_btn'                        => 'Gem Bruger',
	'edit_user_validation_fname_label'            => 'Øgenavn',
	'edit_user_validation_lname_label'            => 'Efternavn',
	'edit_user_validation_email_label'            => 'Email-adresse',
	'create_user_validation_phone1_label'         => 'Første del af telefonnummeret',
	'create_user_validation_phone2_label'         => 'Anden del af telefonnummeret',
	'create_user_validation_phone3_label'         => 'Tredje del af telefonnummeret',
	'edit_user_validation_company_label'          => 'Firmanavn',
	'edit_user_validation_groups_label'           => 'Grupper',
	'edit_user_validation_password_label'         => 'Kodeord',
	'edit_user_validation_password_confirm_label' => 'Bekræft Kodeord',

	// Create Group
	'create_group_title'                  => 'Opret gruppe',
	'create_group_heading'                => 'Opret gruppe',
	'create_group_subheading'             => 'Indtast gruppeinformationerne herunder.',
	'create_group_name_label'             => 'Gruppenavn:',
	'create_group_desc_label'             => 'Beskrivelse:',
	'create_group_submit_btn'             => 'Opret Gruppe',
	'create_group_validation_name_label'  => 'Gruppenavn',
	'create_group_validation_desc_label'  => 'Beskrivelse',

	// Edit Group
	'edit_group_title'                  => 'Ret Gruppen',
	'edit_group_saved'                  => 'Gruppen er gemt',
	'edit_group_heading'                => 'Ret Gruppen',
	'edit_group_subheading'             => 'Indtast gruppeinformationerne herunder.',
	'edit_group_name_label'             => 'Gruppenavn:',
	'edit_group_desc_label'             => 'Beskrivelse:',
	'edit_group_submit_btn'             => 'Gem Gruppe',
	'edit_group_validation_name_label'  => 'Gruppenavn',
	'edit_group_validation_desc_label'  => 'Beskrivelse',

	// Change Password
	'change_password_heading'                               => 'Skift Kodeord',
	'change_password_old_password_label'                    => 'Gammelt Kodeord:',
	'change_password_new_password_label'                    => 'Nyt Kodeord (mindst % bogstaver langt):',
	'change_password_new_password_confirm_label'            => 'Bekræft nyt kodeord:',
	'change_password_submit_btn'                            => 'Skift',
	'change_password_validation_old_password_label'         => 'Gammelt Kodeord',
	'change_password_validation_new_password_label'         => 'Nyt Kodeord',
	'change_password_validation_new_password_confirm_label' => 'Bekræft nyt kodeord',

	// Forgot Password
	'forgot_password_heading'                 => 'Glemt kodeordet',
	'forgot_password_subheading'             	=> 'Indtast din %s så vi kan sende dig en mail for at nulstille dit kodeord.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Afsend',
	'forgot_password_validation_email_label'  => 'Email-adresse',
	'forgot_password_identity_label'          => 'Brugernavn',
	'forgot_password_email_identity_label'    => 'Email',
	'forgot_password_email_not_found'         => 'No record of that email address.',
	'forgot_password_identity_not_found'         => 'No record of that username address.',

	// Reset Password
	'reset_password_heading'                               => 'Skift Kodeord',
	'reset_password_new_password_label'                    => 'Nyt Kodeord (mindst % bogstaver langt):',
	'reset_password_new_password_confirm_label'            => 'Bekræft nyt kodeord:',
	'reset_password_submit_btn'                            => 'Skift',
	'reset_password_validation_new_password_label'         => 'Nyt Kodeord',
	'reset_password_validation_new_password_confirm_label' => 'Bekræft nyt kodeord',

	// Forgot Password Email
	'emailForgotPassword_heading'    => 'Nulstil kodeordet for %s',
	'emailForgotPassword_subheading' => 'Tryk på dette link for at %s.',
	'emailForgotPassword_link'       => 'Nulstil Dit Kodeordet',
];
