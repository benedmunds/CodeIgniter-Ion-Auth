<?php
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		    ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  English language file for Ion Auth example views
*
*/

return [
	// Errors
	'error_security' => 'Aquest formulari no ha passat els controls de seguretat.',

	// Login
	'login_heading'         => 'Inicia sessió',
	'login_subheading'      => 'Si us plau, entra amb el teu correu-e/nom d\'usuari i contrasenya a continuació.',
	'login_identity_label'  => 'Correu-e/Nom d\'usuari:',
	'login_password_label'  => 'Contrasenya:',
	'login_remember_label'  => 'Recorda\'m:',
	'login_submit_btn'      => 'Entra',
	'login_forgot_password' => 'Has oblidat la teva contrasenya?',

	// Index
	'index_heading'           => 'Usuaris',
	'index_subheading'        => 'A continuació es mostra una llista dels usuaris.',
	'index_fname_th'          => 'Nom',
	'index_lname_th'          => 'Cognom',
	'index_email_th'          => 'Correu-e',
	'index_groups_th'         => 'Grups',
	'index_status_th'         => 'Estat',
	'index_action_th'         => 'Acció',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'Actiu',
	'index_inactive_link'     => 'Inactiu',
	'index_create_user_link'  => 'Crea un nou usuari',
	'index_create_group_link' => 'Crea un nou grup',

	// Deactivate User
	'deactivate_heading'                  => 'Desactivar usuari',
	'deactivate_subheading'               => 'Estàs segur que vols desactivar l\'usuari \'%s\'',
	'deactivate_confirm_y_label'          => 'Sí:',
	'deactivate_confirm_n_label'          => 'No:',
	'deactivate_submit_btn'               => 'Envia',
	'deactivate_validation_confirm_label' => 'confirmació',
	'deactivate_validation_user_id_label' => 'ID d\'usuari',

	// Create User
	'create_user_heading'                           => 'Crea Usuari',
	'create_user_subheading'                        => 'Si us plau, introdueix la informació dels usuaris a continuació.',
	'create_user_fname_label'                       => 'Nom:',
	'create_user_lname_label'                       => 'Cognom:',
	'create_user_company_label'                     => 'Nom de l\'empresa:',
	'create_user_identity_label'                    => 'Identitat:',
	'create_user_email_label'                       => 'Correu-e:',
	'create_user_phone_label'                       => 'Telèfon:',
	'create_user_password_label'                    => 'Contrasenya:',
	'create_user_password_confirm_label'            => 'Confirma Contrasenya:',
	'create_user_submit_btn'                        => 'Crea Usuari',
	'create_user_validation_fname_label'            => 'Nom',
	'create_user_validation_lname_label'            => 'Cognom',
	'create_user_validation_identity_label'         => 'Identitat',
	'create_user_validation_email_label'            => 'Adreça de correu-e',
	'create_user_validation_phone_label'            => 'Telèfon',
	'create_user_validation_company_label'          => 'Nom de l\'empresa',
	'create_user_validation_password_label'         => 'Contrasenya',
	'create_user_validation_password_confirm_label' => 'Confirma Contrasenya',

	// Edit User
	'edit_user_heading'                           => 'Editar Usuari',
	'edit_user_subheading'                        => 'Si us plau, introdueix la informació dels usuaris a continuació.',
	'edit_user_fname_label'                       => 'Nom:',
	'edit_user_lname_label'                       => 'Cognom:',
	'edit_user_company_label'                     => 'Nom de l\'empresa:',
	'edit_user_email_label'                       => 'Correu-e:',
	'edit_user_phone_label'                       => 'Telèfon:',
	'edit_user_password_label'                    => 'Contrasenya: (si es canvia la contrasenya)',
	'edit_user_password_confirm_label'            => 'Confirm Contrasenya: (si es canvia la contrasenya)',
	'edit_user_groups_heading'                    => 'Membre dels grups',
	'edit_user_submit_btn'                        => 'Desar Usuari',
	'edit_user_validation_fname_label'            => 'Nom',
	'edit_user_validation_lname_label'            => 'Cognom',
	'edit_user_validation_email_label'            => 'Adreça de Correu-e',
	'edit_user_validation_phone_label'            => 'Telèfon',
	'edit_user_validation_company_label'          => 'Nom de l\'empresa',
	'edit_user_validation_groups_label'           => 'Grups',
	'edit_user_validation_password_label'         => 'Contrasenya',
	'edit_user_validation_password_confirm_label' => 'Confirmació de la Contrasenya',

	// Create Group
	'create_group_title'                  => 'Crea Grup',
	'create_group_heading'                => 'Crea Grup',
	'create_group_subheading'             => 'Si us plau, introdueix la informació del grup a continuació.',
	'create_group_name_label'             => 'Nom del Grup:',
	'create_group_desc_label'             => 'Descripció:',
	'create_group_submit_btn'             => 'Crea Grup',
	'create_group_validation_name_label'  => 'Nom del Grup',
	'create_group_validation_desc_label'  => 'Descripció',

	// Edit Group
	'edit_group_title'                  => 'Edita Grup',
	'edit_group_saved'                  => 'Grup Desat',
	'edit_group_heading'                => 'Edita Grup',
	'edit_group_subheading'             => 'Si us plau, introdueix la informació del grup a continuació.',
	'edit_group_name_label'             => 'Nom del Grup:',
	'edit_group_desc_label'             => 'Descripció:',
	'edit_group_submit_btn'             => 'Desa Grup',
	'edit_group_validation_name_label'  => 'Nom del Grup',
	'edit_group_validation_desc_label'  => 'Descripció',

	// Change Password
	'change_password_heading'                               => 'Canvi de Contrasenya',
	'change_password_old_password_label'                    => 'Contrasenya antiga:',
	'change_password_new_password_label'                    => 'Contrasenya nova (mínim %s caràcters):',
	'change_password_new_password_confirm_label'            => 'Confirmar Contrasenya nova:',
	'change_password_submit_btn'                            => 'Canvia',
	'change_password_validation_old_password_label'         => 'Contrasenya antiga',
	'change_password_validation_new_password_label'         => 'Contrasenya nova',
	'change_password_validation_new_password_confirm_label' => 'Confirmar Contrasenya nova',

	// Forgot Password
	'forgot_password_heading'                => 'Contrasenya oblidada',
	'forgot_password_subheading'             => 'Introdueix el teu %s perquè puguem enviar un correu electrònic per restablir la contrasenya.',
	'forgot_password_email_label'            => '%s:',
	'forgot_password_submit_btn'             => 'Envia',
	'forgot_password_validation_email_label' => 'Adreça de Correu-e',
	'forgot_password_identity_label'         => 'Usuari',
	'forgot_password_email_identity_label'   => 'Correu-e',
	'forgot_password_email_not_found'        => 'No hi ha registre d\'aquesta adreça de correu electrònic.',
	'forgot_password_identity_not_found'         => 'No record of that username address.',

	// Reset Password
	'reset_password_heading'                               => 'Canvia Contrasenya',
	'reset_password_new_password_label'                    => 'Contrasenya nova (mínim %s caràcters):',
	'reset_password_new_password_confirm_label'            => 'Confirmar Contrasenya nova:',
	'reset_password_submit_btn'                            => 'Canvia',
	'reset_password_validation_new_password_label'         => 'Contrasenya nova',
	'reset_password_validation_new_password_confirm_label' => 'Confirmar nova Contrasenya',
];
