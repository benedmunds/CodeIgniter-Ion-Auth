<?php
/**
* Name:  Auth Lang - Swedish
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
* Description:  Swedish language file for Ion Auth example views
*
*/

return [
	// Errors
	'error_security' => 'Detta formulär klarade inte av våra säkerhetskontroller.',

	// Login
	'login_heading'         => 'Logga in',
	'login_subheading'      => 'Logga in med email/användarnamn och lösenord nedanför.',
	'login_identity_label'  => 'Email/Användarnamn:',
	'login_password_label'  => 'Lösenord:',
	'login_remember_label'  => 'Kom ihåg mig:',
	'login_submit_btn'      => 'Logga in',
	'login_forgot_password' => 'Glömt lösenord?',

	// Index
	'index_heading'           => 'Användare',
	'index_subheading'        => 'Lista över användare nedanför.',
	'index_fname_th'          => 'Förnamn',
	'index_lname_th'          => 'Efternamn',
	'index_email_th'          => 'Email',
	'index_groups_th'         => 'Grupper',
	'index_status_th'         => 'Status',
	'index_action_th'         => 'Åtgärder',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'Aktiv',
	'index_inactive_link'     => 'Inaktiv',
	'index_create_user_link'  => 'Skapa ny användare',
	'index_create_group_link' => 'Skapa ny grupp',

	// Deactivate User
	'deactivate_heading'                  => 'Inaktivera Användare',
	'deactivate_subheading'               => 'Är du säker att du vill inaktivera användaren \'%s\'',
	'deactivate_confirm_y_label'          => 'Ja:',
	'deactivate_confirm_n_label'          => 'Nej:',
	'deactivate_submit_btn'               => 'Skicka',
	'deactivate_validation_confirm_label' => 'bekräftelse',
	'deactivate_validation_user_id_label' => 'användar ID',

	// Create User
	'create_user_heading'                           => 'Skapa Användare',
	'create_user_subheading'                        => 'Ange användarens uppgifter nedanför.',
	'create_user_fname_label'                       => 'Förnamn:',
	'create_user_lname_label'                       => 'Efternamn:',
	'create_user_identity_label'                    => 'Identity:',
	'create_user_company_label'                     => 'Företagsnamn:',
	'create_user_email_label'                       => 'Email:',
	'create_user_phone_label'                       => 'Telefon:',
	'create_user_password_label'                    => 'Lösenord:',
	'create_user_password_confirm_label'            => 'Bekräfta Lösenord:',
	'create_user_submit_btn'                        => 'Skapa Användare',
	'create_user_validation_fname_label'            => 'Förnamn',
	'create_user_validation_lname_label'            => 'Efternamn',
	'create_user_validation_identity_label'         => 'Identity',
	'create_user_validation_email_label'            => 'Email Adress',
	'create_user_validation_phone_label'            => 'Telefonnummer',
	'create_user_validation_company_label'          => 'Företagsnamn',
	'create_user_validation_password_label'         => 'Lösenord',
	'create_user_validation_password_confirm_label' => 'Lösenordsbekräftelse',

	// Edit User
	'edit_user_heading'                           => 'Ändra användare',
	'edit_user_subheading'                        => 'Ange användarens uppgifter nedanför.',
	'edit_user_fname_label'                       => 'Förnamn:',
	'edit_user_lname_label'                       => 'Efternamn:',
	'edit_user_company_label'                     => 'Företagsnamn:',
	'edit_user_email_label'                       => 'Email:',
	'edit_user_phone_label'                       => 'Telefon:',
	'edit_user_password_label'                    => 'Lösenord: (om lösenord ändras)',
	'edit_user_password_confirm_label'            => 'Bekräfta Lösenord: (om lösenord ändras)',
	'edit_user_groups_heading'                    => 'Medlem i grupper',
	'edit_user_submit_btn'                        => 'Spara Användare',
	'edit_user_validation_fname_label'            => 'Förnamn',
	'edit_user_validation_lname_label'            => 'Efternamn',
	'edit_user_validation_email_label'            => 'Email Adress',
	'edit_user_validation_phone_label'            => 'Telefonnummer',
	'edit_user_validation_company_label'          => 'Företagsnamn',
	'edit_user_validation_groups_label'           => 'Grupper',
	'edit_user_validation_password_label'         => 'Lösenord',
	'edit_user_validation_password_confirm_label' => 'Lösenordsbekräftelse',

	// Create Group
	'create_group_title'                  => 'Skapa Grupp',
	'create_group_heading'                => 'Skapa Grupp',
	'create_group_subheading'             => 'Ange gruppuppgifter nedan.',
	'create_group_name_label'             => 'Gruppnamn:',
	'create_group_desc_label'             => 'Beskrivning:',
	'create_group_submit_btn'             => 'Skapa Grupp',
	'create_group_validation_name_label'  => 'Gruppnamn',
	'create_group_validation_desc_label'  => 'Beskrivning',

	// Edit Group
	'edit_group_title'                  => 'Ändra Grupp',
	'edit_group_saved'                  => 'Grupp Sparad',
	'edit_group_heading'                => 'Ändra Grupp',
	'edit_group_subheading'             => 'Ange gruppuppgifter nedan.',
	'edit_group_name_label'             => 'Gruppnamn:',
	'edit_group_desc_label'             => 'Beskrivning:',
	'edit_group_submit_btn'             => 'Spara Grupp',
	'edit_group_validation_name_label'  => 'Gruppnamn',
	'edit_group_validation_desc_label'  => 'Beskrivning',

	// Change Password
	'change_password_heading'                               => 'Ändra Lösenord',
	'change_password_old_password_label'                    => 'Gammalt lösenord:',
	'change_password_new_password_label'                    => 'Nytt lösenord (åtminstone %s karaktärer långt):',
	'change_password_new_password_confirm_label'            => 'Bekräfta nytt lösenord:',
	'change_password_submit_btn'                            => 'Ändra',
	'change_password_validation_old_password_label'         => 'Gammalt lösenord',
	'change_password_validation_new_password_label'         => 'Nytt Lösenord',
	'change_password_validation_new_password_confirm_label' => 'Bekräfta nytt lösenord',

	// Forgot Password
	'forgot_password_heading'                 => 'Glömt lösenord',
	'forgot_password_subheading'              => 'Ange %s så vi kan skicka email om lösenordsåterställning.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Skicka',
	'forgot_password_validation_email_label'  => 'Email Adress',
	'forgot_password_identity_label'          => 'Användarnamn',
	'forgot_password_email_identity_label'    => 'Email',
	'forgot_password_email_not_found'         => 'Email adressen finns inte i vårt register.',
	'forgot_password_identity_not_found'         => 'No record of that username address.',

	// Reset Password
	'reset_password_heading'                               => 'Ändra Lösenord',
	'reset_password_new_password_label'                    => 'Nytt Lösenord (åtminstone %s karaktärer långt):',
	'reset_password_new_password_confirm_label'            => 'Bekräfta nytt lösenord:',
	'reset_password_submit_btn'                            => 'Ändra',
	'reset_password_validation_new_password_label'         => 'Nytt Lösenord',
	'reset_password_validation_new_password_confirm_label' => 'Bekräfta nytt lösenord',
];
