<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Spanish
*
* Author: Julio Napurí
* 		  julionc@gmail.com
*         @julionc
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.14.2010
*
* Description:  Spanish language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'La cuenta ha sido creada';
$lang['account_creation_unsuccessful'] 	 	 = 'No se puede crear la cuenta';
$lang['account_creation_duplicate_email'] 	 = 'Email en uso o inválido';
$lang['account_creation_duplicate_username'] = 'Nombre de usuario en uso o inválido';

// Password
$lang['password_change_successful'] 	 	 = 'La contraseña ha sido cambiada correctamente';
$lang['password_change_unsuccessful'] 	  	 = 'No se puede cambiar la constraseña';
$lang['forgot_password_successful'] 	 	 = 'Enviado correo electrónico para restablecer contraseña';
$lang['forgot_password_unsuccessful'] 	 	 = 'No se puede restablecer la contraseña';

// Activation
$lang['activate_successful'] 		  	     = 'Cuenta activada';
$lang['activate_unsuccessful'] 		 	     = 'No se puede activar la cuenta';
$lang['deactivate_successful'] 		  	     = 'Cuenta desactivada';
$lang['deactivate_unsuccessful'] 	  	     = 'No se puede desactivar la cuenta';
$lang['activation_email_successful'] 	  	 = 'Recibirás un correo electrónico de activación de la cuenta';
$lang['activation_email_unsuccessful']   	 = 'No se puede enviar el correo electrónico de activación';

// Login / Logout
$lang['login_successful'] 		  	         = 'Sesión iniciada';
$lang['login_unsuccessful'] 		  	     = 'Inicio de sesión incorrecto';
$lang['login_unsuccessful_not_active'] 		 = 'La cuenta está inactiva';
$lang['logout_successful'] 		 	         = 'Se ha cerrado la sesión';

// Account Changes
$lang['update_successful'] 		 	         = 'La información de la cuenta se ha actualizado correctamente';
$lang['update_unsuccessful'] 		 	     = 'No se puede actualizar la información de la cuenta';
$lang['delete_successful'] 		 	         = 'El usuario ha sido borrado';
$lang['delete_unsuccessful'] 		 	     = 'No se puede borrar el usuario';

// Email Subjects
$lang['email_forgotten_password_subject']    = 'Verificación de la contraseña';
$lang['email_new_password_subject']          = 'Nueva contraseña';
$lang['email_activation_subject']            = 'Activación de la cuenta';