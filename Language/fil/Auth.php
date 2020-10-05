<?php
/**
* Name:  Auth Lang - Filipino
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
* Deskripsyon:  Filipino language file for Ion Auth example views
*
*/

return [
	// Errors
	'error_security' => 'Ang form na ito post ay hindi pumasa sa aming mga pagsusuri ng seguridad.',

	// Login
	'login_heading'         => 'Mag-login',
	'login_subheading'      => 'Mangyaring mag-login sa iyong email/username at password sa ibaba.',
	'login_identity_label'  => 'Email/Username:',
	'login_password_label'  => 'Password:',
	'login_remember_label'  => 'Tandaan mo ako:',
	'login_submit_btn'      => 'Mag-Login',
	'login_forgot_password' => 'Nakalimutan ang password?',

	// Index
	'index_heading'           => 'Users',
	'index_subheading'        => 'Sa ibaba ay isang listahan ng mga users.',
	'index_fname_th'          => 'Pangalan',
	'index_lname_th'          => 'Huling pangalan',
	'index_email_th'          => 'Email',
	'index_groups_th'         => 'Gropo',
	'index_status_th'         => 'katayuan',
	'index_action_th'         => 'aksyon',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'aktibo',
	'index_inactive_link'     => 'Hindi aktibo',
	'index_create_user_link'  => 'Lumikha ng isang bagong user',
	'index_create_group_link' => 'Lumikha ng isang bagong grupo',

	// Deactivate User
	'deactivate_heading'                  => 'Huwag paganahin ang User',
	'deactivate_subheading'               => 'Sigurado ka bang gusto mong i-deactivate ang user \'%s\'',
	'deactivate_confirm_y_label'          => 'Oo:',
	'deactivate_confirm_n_label'          => 'Hindi:',
	'deactivate_submit_btn'               => 'Ipasa',
	'deactivate_validation_confirm_label' => 'pagpapatibay',
	'deactivate_validation_user_id_label' => 'user ID',

	// Create User
	'create_user_heading'                           => 'Lumikha User',
	'create_user_subheading'                        => 'Mangyaring ipasok ang impormasyon ng user sa ibaba.',
	'create_user_fname_label'                       => 'Pangalan:',
	'create_user_lname_label'                       => 'Huling pangalan:',
	'create_user_company_label'                     => 'Pangalan ng Kumpanya:',
	'create_user_identity_label'                    => 'Identity:',
	'create_user_email_label'                       => 'Email:',
	'create_user_phone_label'                       => 'Telepono:',
	'create_user_password_label'                    => 'Password:',
	'create_user_password_confirm_label'            => 'kumparahin ang Password:',
	'create_user_submit_btn'                        => 'Lumikha User',
	'create_user_validation_fname_label'            => 'Pangalan',
	'create_user_validation_lname_label'            => 'Huling pangalan',
	'create_user_validation_identity_label'         => 'Identity',
	'create_user_validation_email_label'            => 'Email Address',
	'create_user_validation_phone_label'            => 'Telepono',
	'create_user_validation_company_label'          => 'Pangalan ng Kumpanya',
	'create_user_validation_password_label'         => 'Password',
	'create_user_validation_password_confirm_label' => 'Password Confirmation',

	// Edit User
	'edit_user_heading'                           => 'Edit User',
	'edit_user_subheading'                        => 'Please enter the user\'s information below.',
	'edit_user_fname_label'                       => 'Pangalan:',
	'edit_user_lname_label'                       => 'Huling pangalan:',
	'edit_user_company_label'                     => 'Pangalan ng Kumpanya:',
	'edit_user_email_label'                       => 'Email:',
	'edit_user_phone_label'                       => 'Telepono:',
	'edit_user_password_label'                    => 'Password: (kung ang pagbabago password)',
	'edit_user_password_confirm_label'            => 'Kumpirmahin ang Password: (kung pagbabago ng password)',
	'edit_user_groups_heading'                    => 'Miyembro ng grupo',
	'edit_user_submit_btn'                        => 'I-save ang User',
	'edit_user_validation_fname_label'            => 'Pangalan',
	'edit_user_validation_lname_label'            => 'Huling pangalan',
	'edit_user_validation_email_label'            => 'Email Address',
	'edit_user_validation_phone_label'            => 'Telepono',
	'edit_user_validation_company_label'          => 'Pangalan ng Kumpanya',
	'edit_user_validation_groups_label'           => 'Grupo',
	'edit_user_validation_password_label'         => 'Password',
	'edit_user_validation_password_confirm_label' => 'Password Confirmation',

	// Gumawa ng Grupo
	'create_group_title'                  => 'Gumawa ng Grupo',
	'create_group_heading'                => 'Gumawa ng Grupo',
	'create_group_subheading'             => 'Mangyaring ipasok ang impormasyon ng grupo sa ibaba.',
	'create_group_name_label'             => 'Pangalan ng Grupo:',
	'create_group_desc_label'             => 'Deskripsyon:',
	'create_group_submit_btn'             => 'Gumawa ng Grupo',
	'create_group_validation_name_label'  => 'Pangalan ng Grupo',
	'create_group_validation_desc_label'  => 'Deskripsyon',

	// Baguhin ang Grupo
	'edit_group_title'                  => 'Baguhin ang Grupo',
	'edit_group_saved'                  => 'Group Nai-save na',
	'edit_group_heading'                => 'Baguhin ang Grupo',
	'edit_group_subheading'             => 'Mangyaring ipasok ang impormasyon ng grupo sa ibaba.',
	'edit_group_name_label'             => 'Pangalan ng Grupo:',
	'edit_group_desc_label'             => 'Deskripsyon:',
	'edit_group_submit_btn'             => 'I-save ang Group',
	'edit_group_validation_name_label'  => 'Pangalan ng Grupo',
	'edit_group_validation_desc_label'  => 'Deskripsyon',

	// Palitan ang Password
	'change_password_heading'                               => 'Palitan ang Password',
	'change_password_old_password_label'                    => 'Lumang Password:',
	'change_password_new_password_label'                    => 'Bagong Password (at least %s characters long):',
	'change_password_new_password_confirm_label'            => 'kumparahin ang Bagong Password:',
	'change_password_submit_btn'                            => 'Palitan',
	'change_password_validation_old_password_label'         => 'Lumang Password',
	'change_password_validation_new_password_label'         => 'Bagong Password',
	'change_password_validation_new_password_confirm_label' => 'kumparahin ang Bagong Password',

	// Forgot Password
	'forgot_password_heading'                 => 'Forgot Password',
	'forgot_password_subheading'              => 'Pakipasok ang iyong %s upang maaari naming ipasa sa iyong email ang mensahe upang i-reset ang iyong password.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Submit',
	'forgot_password_validation_email_label'  => 'Email Address',
	'forgot_password_identity_label'          => 'Identity',
	'forgot_password_email_identity_label'    => 'Email',
	'forgot_password_email_not_found'         => 'Walang record ng email address.',
	'forgot_password_identity_not_found'         => 'Walang record ng username.',

	// Reset Password
	'reset_password_heading'                               => 'Palitan ang Password',
	'reset_password_new_password_label'                    => 'Bagong Password (at least %s characters long):',
	'reset_password_new_password_confirm_label'            => 'kumparahin ang Bagong Password:',
	'reset_password_submit_btn'                            => 'Palitan',
	'reset_password_validation_new_password_label'         => 'Bagong Password',
	'reset_password_validation_new_password_confirm_label' => 'kumparahin ang Bagong Password',
];
