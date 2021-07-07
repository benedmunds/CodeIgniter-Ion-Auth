<?php
/**
* Name:  Auth Lang - Portuguese
*
* Author: Alfredo Braga
* 		  alphabraga@hotmail.com
*         @alphabraga
*
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  Portuguese language file
*
*/

return [
	// Errors
	'error_security' => 'O envio desse formulario não atendeu a requisitos de segurança.',

	// Login
	'login_heading'         => 'Login',
	'login_subheading'      => 'Por favor entre com seu login/email e senha abaixo.',
	'login_identity_label'  => 'Login/Email:',
	'login_password_label'  => 'Senha:',
	'login_remember_label'  => 'Lembre-me:',
	'login_submit_btn'      => 'Login',
	'login_forgot_password' => 'Esqueceu sua senha?',

	// Index
	'index_heading'           => 'Usuários',
	'index_subheading'        => 'Abaixo uma lista com os usuários.',
	'index_fname_th'          => 'Nome',
	'index_lname_th'          => 'Sobrenome',
	'index_email_th'          => 'Email',
	'index_groups_th'         => 'Grupos',
	'index_status_th'         => 'Estado',
	'index_action_th'         => 'Ação',
	'index_edit_link'         => 'Edit',
	'index_active_link'       => 'Ativo',
	'index_inactive_link'     => 'Inativo',
	'index_create_user_link'  => 'Criar novo usuário',
	'index_create_group_link' => 'Criar novo grupo',

	// Deactivate User
	'deactivate_heading'                  => 'Desativar Usuário',
	'deactivate_subheading'               => 'Você tem certeza que deseja desativar esse usuário \'%s\'',
	'deactivate_confirm_y_label'          => 'Sim:',
	'deactivate_confirm_n_label'          => 'Não:',
	'deactivate_submit_btn'               => 'Enviar',
	'deactivate_validation_confirm_label' => 'confirmação',
	'deactivate_validation_user_id_label' => 'user ID',

	// Create User
	'create_user_heading'                           => 'Criar Usuário',
	'create_user_subheading'                        => 'Por favor informe os dados do usuário.',
	'create_user_fname_label'                       => 'Nome:',
	'create_user_lname_label'                       => 'Sobrenome:',
	'create_user_identity_label'                    => 'Identity:',
	'create_user_company_label'                     => 'Empresa:',
	'create_user_email_label'                       => 'Email:',
	'create_user_phone_label'                       => 'Telefone:',
	'create_user_password_label'                    => 'Senha:',
	'create_user_password_confirm_label'            => 'Confirmar senha:',
	'create_user_submit_btn'                        => 'Criar Usuário',
	'create_user_validation_fname_label'            => 'Nome',
	'create_user_validation_lname_label'            => 'Sobrenome',
	'create_user_validation_identity_label'         => 'Identity',
	'create_user_validation_email_label'            => 'Email',
	'create_user_validation_phone1_label'           => 'Primeira parte do telefone',
	'create_user_validation_phone2_label'           => 'Segunda parte do telefone',
	'create_user_validation_phone3_label'           => 'Terceira parte do telefone',
	'create_user_validation_company_label'          => 'Empresa',
	'create_user_validation_password_label'         => 'Senha',
	'create_user_validation_password_confirm_label' => 'Confirmação de Senha',

	// Edit User
	'edit_user_heading'                           => 'Editar Usuário',
	'edit_user_subheading'                        => 'Por favor informe os dados sobre o usuário abaixo.',
	'edit_user_fname_label'                       => 'Nome:',
	'edit_user_lname_label'                       => 'Sobrenome:',
	'edit_user_company_label'                     => 'Empresa:',
	'edit_user_email_label'                       => 'Email:',
	'edit_user_phone_label'                       => 'Telefone:',
	'edit_user_password_label'                    => 'Senha: (se quiser mudar a senha)',
	'edit_user_password_confirm_label'            => 'Confirme a senha: (se quiser mudar a senha)',
	'edit_user_groups_heading'                    => 'Membro dos grupos',
	'edit_user_submit_btn'                        => 'Salvar Usuário',
	'edit_user_validation_fname_label'            => 'Nome',
	'edit_user_validation_lname_label'            => 'Sobrenome',
	'edit_user_validation_email_label'            => 'Email',
	'edit_user_validation_phone1_label'           => 'Primeira parte do fone',
	'edit_user_validation_phone2_label'           => 'Segunda parte do fone',
	'edit_user_validation_phone3_label'           => 'Terceira parte do fone',
	'edit_user_validation_company_label'          => 'Empresa',
	'edit_user_validation_groups_label'           => 'Grupos',
	'edit_user_validation_password_label'         => 'Senha',
	'edit_user_validation_password_confirm_label' => 'Confirme a senha',

	// Create Group
	'create_group_title'                  => 'Criar Grupo',
	'create_group_heading'                => 'Criar Grupo',
	'create_group_subheading'             => 'Por favor informe os dados sobre o grupo abaixo.',
	'create_group_name_label'             => 'Nome:',
	'create_group_desc_label'             => 'Descrição:',
	'create_group_submit_btn'             => 'Criar Grupo',
	'create_group_validation_name_label'  => 'Nome',
	'create_group_validation_desc_label'  => 'Descrição',

	// Edit Group
	'edit_group_title'                  => 'Editar Grupo',
	'edit_group_saved'                  => 'Grupo Salvo',
	'edit_group_heading'                => 'Editar Group',
	'edit_group_subheading'             => 'Por favor informe os dados sobre o grupo abaixo.',
	'edit_group_name_label'             => 'Nome:',
	'edit_group_desc_label'             => 'Descrição:',
	'edit_group_submit_btn'             => 'Salvar Grupo',
	'edit_group_validation_name_label'  => 'Nome',
	'edit_group_validation_desc_label'  => 'Descrição',

	// Change Password
	'change_password_heading'                               => 'Mudar Senha',
	'change_password_old_password_label'                    => 'Senha Antiga:',
	'change_password_new_password_label'                    => 'Nova senha: (mínimo de %s caracteres)',
	'change_password_new_password_confirm_label'            => 'Confirme sua Nova Senha:',
	'change_password_submit_btn'                            => 'Mudar',
	'change_password_validation_old_password_label'         => 'Senha Antiga',
	'change_password_validation_new_password_label'         => 'Nova Senha',
	'change_password_validation_new_password_confirm_label' => 'Confirme sua Nova Senha',

	// Forgot Password
	'forgot_password_heading'                 => 'Esqueceu a Senha',
	'forgot_password_subheading'              => 'Por favor, informe seu %s para que possamos enviar para você uma mensagem para recuparar sua senha.',
	'forgot_password_email_label'             => '%s:',
	'forgot_password_submit_btn'              => 'Enviar',
	'forgot_password_validation_email_label'  => 'Email',
	'forgot_password_username_identity_label' => 'Login',
	'forgot_password_email_identity_label'    => 'Email',
	'forgot_password_email_not_found'         => 'Este email não foi encontrado.',
	'forgot_password_identity_not_found'         => 'No record of that username address.',

	// Reset Password
	'reset_password_heading'                               => 'Mudar Senha',
	'reset_password_new_password_label'                    => 'Nova senha: (mínimo de %s caracteres)',
	'reset_password_new_password_confirm_label'            => 'Confirme sua Nova Senha:',
	'reset_password_submit_btn'                            => 'Mudar',
	'reset_password_validation_new_password_label'         => 'Senha Antiga',
	'reset_password_validation_new_password_confirm_label' => 'Confirme sua Nova Senha',
];
