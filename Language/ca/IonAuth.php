<?php
/**
* Name:  Ion Auth Lang - Catalan
*
* Author: Wilfrido García Espinosa
* 		    contacto@wilfridogarcia.com
*         @wilfridogarcia
*
* Translation: Oriol Navascuez & duub qnnp
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  05.04.2010
*
* Description:  Catalan language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful'            => 'Compte creat amb èxit',
	'account_creation_unsuccessful'          => 'No ha estat possible crear el compte',
	'account_creation_duplicate_email'       => 'Email en ús o invàlid',
	'account_creation_duplicate_identity'    => 'Nom d&#39;usuari en ús o invàlid',
	'account_creation_missing_defaultGroup' => 'No s&#39;ha establert grup per defecte',
	'account_creation_invalid_defaultGroup' => 'Conjunt de noms de grup per defecte invalid',


	// Password
	'password_change_successful'				      => 'Contrasenya canviada amb èxit',
	'password_change_unsuccessful'			      => 'No ha estat possible canviar la contrasenya',
	'forgot_password_successful'				      => 'Nova contrasenya enviada per email',
	'forgot_password_unsuccessful'			      => 'No ha estat possible crear una nova contrasenya',

	// Activation
	'activate_successful'					          => 'Compte activat',
	'activate_unsuccessful'			            => 'No ha estat possible activar el compte',
	'deactivate_successful'                  => 'Compte desactivat',
	'deactivate_unsuccessful'				        => 'No ha estat possible desactivar el compte',
	'activation_email_successful'		        => 'Email d&#39;activació enviat',
	'activation_email_unsuccessful'			    => 'No ha estat possible enviar l&#39;email d&#39;activació',
	'deactivate_current_user_unsuccessful'   => 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful'						            => 'Sessió iniciada amb èxit',
	'login_unsuccessful'						          => 'No ha estat possible iniciar sessió',
	'login_unsuccessful_not_active' 		      => 'Compte inactiu',
	'login_timeout'                          => 'Temporalment bloquejat. Torna-ho a provar més tard.',
	'logout_successful'						          => 'Sessió finalitzada amb èxit',

	// Account Changes
	'update_successful'						=> 'Informació del compte actualitzat amb èxit',
	'update_unsuccessful'					=> 'No s&#39;ha pogut actualitzar la informació del compte',
	'delete_successful'						=> 'Usuari eliminat',
	'delete_unsuccessful'					=> 'No s&#39;ha pogut Eliminar l&#39;usuari',

	// Groups
	'group_creation_successful'  => 'Grup creat amb èxit',
	'group_already_exists'       => 'Nom de grup no disponible',
	'group_update_successful'    => 'Actualitzats detalls de grup',
	'group_delete_successful'    => 'Grup esborrat',
	'group_delete_unsuccessful' 	=> 'No s&#39;ha pogut esborrar el grup',
	'group_delete_notallowed'    => 'No es pot eliminar el grup dels administradors',
	'group_name_required' 		    => 'El nom de grup és un camp necessari',
	'group_name_admin_not_alter' => 'El nom del grup Admin no es pot canviar',

	// Activation Email
	'emailActivation_subject'            => 'Activació del compte',
	'emailActivate_heading'    => 'Activar el compte de %s',
	'emailActivate_subheading' => 'Si us plau, cliqueu el link per %s.',
	'emailActivate_link'       => 'Activa el teu compte',
	// Forgot Password Email
	'email_forgotten_password_subject'    => 'Verificació de contrasenya oblidada',
	'emailForgotPassword_heading'    => 'Restableix contrasenya a %s',
	'emailForgotPassword_subheading' => 'Si us plau, cliqueu el link per %s.',
	'emailForgotPassword_link'       => 'Restableix la teva contrasenya',
];
