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
* Author: Josue Ibarra
*         @josuetijuana
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  Spanish language file for Ion Auth example views
*
*/

return [
	// Errors
	'error_security' => 'Este formulario no pasó nuestras pruebas de seguridad.',

	// Login
	'login_heading'         => 'Ingresar',
	'login_subheading'      => 'Por favor, introduce tu email/usuario y contraseña.',
	'login_identity_label'  => 'Email/Usuario:',
	'login_password_label'  => 'Contraseña:',
	'login_remember_label'  => 'Recuérdame:',
	'login_submit_btn'      => 'Ingresar',
	'login_forgot_password' => '¿Has olvidado tu contraseña?',

	// Index
	'index_heading'           => 'Usuarios',
	'index_subheading'        => 'Debajo está la lista de usuarios.',
	'index_fname_th'          => 'Nombre',
	'index_lname_th'          => 'Apellidos',
	'index_email_th'          => 'Email',
	'index_groups_th'         => 'Grupos',
	'index_status_th'         => 'Estado',
	'index_action_th'         => 'Acción',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'Activo',
	'index_inactive_link'     => 'Inactivo',
	'index_create_user_link'  => 'Crear nuevo usuario',
	'index_create_group_link' => 'Crear nuevo grupo',

	// Deactivate User
	'deactivate_heading'                  => 'Desactivar usuario',
	'deactivate_subheading'               => '¿Estás seguro que quieres desactivar el usuario \'%s\'',
	'deactivate_confirm_y_label'          => 'Sí:',
	'deactivate_confirm_n_label'          => 'No:',
	'deactivate_submit_btn'               => 'Enviar',
	'deactivate_validation_confirm_label' => 'confirmación',
	'deactivate_validation_user_id_label' => 'ID de usuario',

	// Create User
	'create_user_heading'                           => 'Crear Usuario',
	'create_user_subheading'                        => 'Por favor, introduzce la información del usuario.',
	'create_user_fname_label'                       => 'Nombre:',
	'create_user_lname_label'                       => 'Apellidos:',
	'create_user_identity_label'                    => 'Identity:',
	'create_user_company_label'                     => 'Compañía:',
	'create_user_email_label'                       => 'Email:',
	'create_user_phone_label'                       => 'Teléfono:',
	'create_user_password_label'                    => 'Contraseña:',
	'create_user_password_confirm_label'            => 'Confirmar contraseña:',
	'create_user_submit_btn'                        => 'Crear Usuario',
	'create_user_validation_fname_label'            => 'Nombre',
	'create_user_validation_lname_label'            => 'Apellidos',
	'create_user_validation_identity_label'         => 'Identity',
	'create_user_validation_email_label'            => 'Correo electrónico',
	'create_user_validation_phone_label'            => 'Teléfono',
	'create_user_validation_company_label'          => 'Nombre de la compañía',
	'create_user_validation_password_label'         => 'Contraseña',
	'create_user_validation_password_confirm_label' => 'Confirmación de contraseña',

	// Edit User
	'edit_user_heading'                           => 'Editar Usuario',
	'edit_user_subheading'                        => 'Por favor introduzca la nueva información del usuario.',
	'edit_user_fname_label'                       => 'Nombre:',
	'edit_user_lname_label'                       => 'Apellidos:',
	'edit_user_company_label'                     => 'Compañía:',
	'edit_user_email_label'                       => 'Email:',
	'edit_user_phone_label'                       => 'Teléfono:',
	'edit_user_password_label'                    => 'Contraseña: (si quieres cambiarla)',
	'edit_user_password_confirm_label'            => 'Confirmar contraseña: (si quieres cambiarla)',
	'edit_user_groups_heading'                    => 'Miembro de grupos',
	'edit_user_submit_btn'                        => 'Guardar Usuario',
	'edit_user_validation_fname_label'            => 'Nombre',
	'edit_user_validation_lname_label'            => 'Apellidos',
	'edit_user_validation_email_label'            => 'Correo electrónico',
	'edit_user_validation_phone_label'            => 'Teléfono',
	'edit_user_validation_company_label'          => 'Compañía',
	'edit_user_validation_groups_label'           => 'Grupos',
	'edit_user_validation_password_label'         => 'Contraseña',
	'edit_user_validation_password_confirm_label' => 'Confirmación de contraseña',

	// Create Group
	'create_group_title'                  => 'Crear Grupo',
	'create_group_heading'                => 'Crear Grupo',
	'create_group_subheading'             => 'Por favor introduce la información del grupo.',
	'create_group_name_label'             => 'Nombre de Grupo:',
	'create_group_desc_label'             => 'Descripción:',
	'create_group_submit_btn'             => 'Crear Grupo',
	'create_group_validation_name_label'  => 'Nombre de Grupo',
	'create_group_validation_desc_label'  => 'Descripcion',

	// Edit Group
	'edit_group_title'                  => 'Editar Grupo',
	'edit_group_saved'                  => 'Grupo Guardado',
	'edit_group_heading'                => 'Editar Grupo',
	'edit_group_subheading'             => 'Por favor, registra la informacion del grupo.',
	'edit_group_name_label'             => 'Nombre de Grupo:',
	'edit_group_desc_label'             => 'Descripción:',
	'edit_group_submit_btn'             => 'Guardar Grupo',
	'edit_group_validation_name_label'  => 'Nombre de Grupo',
	'edit_group_validation_desc_label'  => 'Descripción',

	// Change Password
	'change_password_heading'                               => 'Cambiar Contraseña',
	'change_password_old_password_label'                    => 'Antigua Contraseña:',
	'change_password_new_password_label'                    => 'Nueva Contraseña (de al menos %s caracteres de longitud):',
	'change_password_new_password_confirm_label'            => 'Confirmar Nueva Contraseña:',
	'change_password_submit_btn'                            => 'Cambiar',
	'change_password_validation_old_password_label'         => 'Antigua Contraseña',
	'change_password_validation_new_password_label'         => 'Nueva Contraseña',
	'change_password_validation_new_password_confirm_label' => 'Confirmar Nueva Contraseña',

	// Forgot Password
	'forgot_password_heading'                 => 'He olvidado mi Contraseña',
	'forgot_password_subheading'              => 'Por favor, introduce tu %s para que podamos enviarte un email para restablecer tu contraseña.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Enviar',
	'forgot_password_validation_email_label'  => 'Correo Electrónico',
	'forgot_password_identity_label'          => 'Usuario',
	'forgot_password_email_identity_label'    => 'Email',
	'forgot_password_email_not_found'         => 'El correo electrónico no existe.',
	'forgot_password_identity_not_found'         => 'No record of that username address.',

	// Reset Password
	'reset_password_heading'                               => 'Cambiar Contraseña',
	'reset_password_new_password_label'                    => 'Nueva Contraseña (de al menos %s caracteres de longitud):',
	'reset_password_new_password_confirm_label'            => 'Confirmar Nueva Contraseña:',
	'reset_password_submit_btn'                            => 'Guardar',
	'reset_password_validation_new_password_label'         => 'Nueva Contraseña',
	'reset_password_validation_new_password_confirm_label' => 'Confirmar Nueva Contraseña',

	// Forgot Password Email
	'emailForgotPassword_heading'    => 'Reestablecer contraseña para %s',
	'emailForgotPassword_subheading' => 'Por favor ingresa en este link para %s.',
	'emailForgotPassword_link'       => 'Restablecer Tu Contraseña',
];
