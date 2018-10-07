<?php
/**
* Name:  Ion Auth Lang - Portuguese (UTF-8)
*
* Author: André Brás Simões
*       andrebrassimoes@gmail.com
*
* Adjustments by @Dentxinho and @MichelAlonso and @marcelod
*
* Location: http://github.com/benedmunds/CodeIgniter-Ion-Auth
*
* Created:  17.05.2010
*
* Description:  Portuguese language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful'         	=> 'Conta criada com sucesso',
	'account_creation_unsuccessful'       	=> 'Não foi possível criar a conta',
	'account_creation_duplicate_email'    	=> 'Email em uso ou inválido',
	'account_creation_duplicate_identity' 	=> 'Nome de usuário em uso ou inválido',
	'account_creation_missing_defaultGroup' => 'Grupo padrão não está definido',
	'account_creation_invalid_defaultGroup' => 'Nome padrão do grupo definido é inválido',

	// Password
	'password_change_successful'         => 'Senha alterada com sucesso',
	'password_change_unsuccessful'       => 'Não foi possível alterar a senha',
	'forgot_password_successful'         => 'Nova senha enviada por email',
	'forgot_password_unsuccessful'       => 'Não foi possível criar uma nova senha',

	// Activation
	'activate_successful'                => 'Conta ativada',
	'activate_unsuccessful'              => 'Não foi possível ativar a conta',
	'deactivate_successful'              => 'Conta desativada',
	'deactivate_unsuccessful'            => 'Não foi possível desativar a conta',
	'activation_email_successful'        => 'Email de ativação enviado com sucesso',
	'activation_email_unsuccessful'      => 'Não foi possível enviar o email de ativação',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful'                   => 'Sessão iniciada com sucesso',
	'login_unsuccessful'                 => 'Usuário ou senha inválidos',
	'login_unsuccessful_not_active'      => 'A conta está desativada',
	'login_timeout'                      => 'Conta temporariamente bloqueada. Tente novamente mais tarde',
	'logout_successful'            		=> 'Sessão encerrada com sucesso',

	// Account Changes
	'update_successful'                  => 'Informações da conta atualizadas com sucesso',
	'update_unsuccessful'                => 'Não foi possível atualizar as informações da conta',
	'delete_successful'                  => 'Usuário excluído com sucesso',
	'delete_unsuccessful'                => 'Não foi possível excluir o usuário',

	// Groups
	'group_creation_successful'          => 'Grupo criado com sucesso',
	'group_already_exists'               => 'Um grupo com este nome já existe',
	'group_update_successful'            => 'Dados do grupo atualizados com sucesso',
	'group_delete_successful'            => 'Grupo excluído com sucesso',
	'group_delete_unsuccessful'          => 'Não foi possível excluir o grupo',
	'group_delete_notallowed'    		=> 'Não é possível excluir o grupo de administradores',
	'group_name_required' 				=> 'Nome do grupo é um campo obrigatório',
	'group_name_admin_not_alter' 		=> 'Nome do grupo administrador não pode ser alterado',

	// Activation Email
	'emailActivation_subject'           => 'Ativação da conta',
	'emailActivate_heading'    			=> 'Ative sua conta para %s',
	'emailActivate_subheading' 			=> 'Por favor, clique neste link para %s.',
	'emailActivate_link'       			=> 'Ative sua conta',

	// Forgot Password Email
	'email_forgotten_password_subject'   => 'Esqueci a senha',
	'emailForgotPassword_heading'    	=> 'Redefinido a senha para %s',
	'emailForgotPassword_subheading' 	=> 'Por favor, clique neste link para %s.',
	'emailForgotPassword_link'       	=> 'Redefina sua senha',
];
