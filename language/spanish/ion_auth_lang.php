<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Spanish
* 
* Author: Wilfrido Garc�a Espinosa
* 		  contacto@wilfridogarcia.com
*         @wilfridogarcia
* 
* Location: http://github.com/benedmunds/ion_auth/
*          
* Created:  05.04.2010 
* 
* Description:  Spanish language file for Ion Auth messages and errors
* 
*/

// Account Creation
$lang['account_creation_successful'] 	  	 = 'Cuenta creada con éxito';
$lang['account_creation_unsuccessful'] 	 	 = 'No se ha podido crear la cuenta';
$lang['account_creation_duplicate_email'] 	 = 'Email en uso o inválido';
$lang['account_creation_duplicate_username'] = 'Nombre de usuario en uso o inválido';

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';


// Password
$lang['password_change_successful'] 	 	 = 'Contraseña renovada con éxito';
$lang['password_change_unsuccessful'] 	  	 = 'No se ha podido cambiar la contraseña';
$lang['forgot_password_successful'] 	 	 = 'Nueva contraseña enviada por email';
$lang['forgot_password_unsuccessful'] 	 	 = 'No se ha podido crear una nueva contraseña';

// Activation
$lang['activate_successful'] 		  	     = 'Cuenta activada con éxito';
$lang['activate_unsuccessful'] 		 	     = 'No se ha podido activar la cuenta';
$lang['deactivate_successful'] 		  	     = 'Cuenta desactivada con éxito';
$lang['deactivate_unsuccessful'] 	  	     = 'No se ha podido desactivar la cuenta';
$lang['activation_email_successful'] 	  	 = 'Email de activación enviado';
$lang['activation_email_unsuccessful']   	 = 'No se ha podido enviar el email de activación';

// Login / Logout
$lang['login_successful'] 		      	     = 'Sesión iniciada con éxito';
$lang['login_unsuccessful'] 		  	     = 'No se ha podido iniciar sesión';
$lang['logout_successful'] 		 	         = 'Sesión finalizada con éxito';

// Account Changes
$lang['update_successful'] 		 	         = 'Información de la cuenta actualizada con éxito';
$lang['update_unsuccessful'] 		 	     = 'No se ha podido actualizar la información de la cuenta';
$lang['delete_successful'] 		 	         = 'Usuario eliminado';
$lang['delete_unsuccessful'] 		 	     = 'No se ha podido Eliminar el usuario';

// Email Subjects
$lang['email_forgotten_password_subject']    = 'Verificación de contraseña olvidada';
$lang['email_new_password_subject']          = 'Nueva Contraseña';
$lang['email_activation_subject']            = 'Activación de la cuenta';
