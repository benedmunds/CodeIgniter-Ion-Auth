<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Catalan
*
* Author: Wilfrido García Espinosa
* 		  contacto@wilfridogarcia.com
*         @wilfridogarcia
*
* Translation: Oriol Navascuez
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  05.04.2010
*
* Description:  Catalan language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful']			= 'Compte creat amb èxit';
$lang['account_creation_unsuccessful']			= 'No ha estat possible crear al compte';
$lang['account_creation_duplicate_email']		= 'Email en ús o invàlid';
$lang['account_creation_duplicate_identity']	= 'Nom d&#39;usuari en ús o invàlid';

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';


// Password
$lang['password_change_successful']				= 'Contrasenya canviada amb èxit';
$lang['password_change_unsuccessful']			= 'No ha estat possible canviar la contrasenya';
$lang['forgot_password_successful']				= 'Nova contrasenya enviada per email';
$lang['forgot_password_unsuccessful']			= 'No ha estat possible crear una nova contrasenya';

// Activation
$lang['activate_successful']					= 'Compte activat';
$lang['activate_unsuccessful']					= 'No ha estat possible activar el compte';
$lang['deactivate_successful']					= 'Compte desactivat';
$lang['deactivate_unsuccessful']				= 'No ha estat possible desactivar el compte';
$lang['activation_email_successful']			= 'Email d&#39;activació enviat';
$lang['activation_email_unsuccessful']			= 'No ha estat possible enviar l&#39;email d&#39;activació';
$lang['deactivate_current_user_unsuccessful']= 'You cannot De-Activate your self.';

// Login / Logout
$lang['login_successful']						= 'Sessió iniciada amb èxit';
$lang['login_unsuccessful']						= 'No ha estat possible iniciar sessió';
//TO DO Please translate
$lang['login_unsuccessful_not_active'] 		 = 'Account is inactive';
$lang['login_timeout']                       = 'Temporarily Locked Out.  Try again later.';
$lang['logout_successful']						= 'Sessiò finalitzada amb èxit';

// Account Changes
$lang['update_successful']						= 'Informació del compte actualitzat amb èxit';
$lang['update_unsuccessful']					= 'No s&#39;ha pogut actualitzar la informació del compte';
$lang['delete_successful']						= 'Usuari eliminat';
$lang['delete_unsuccessful']					= 'No s&#39;ha pogut Eliminar l&#39;usuari';

//TO DO Please translate
// Groups
$lang['group_creation_successful']  = 'Group created Successfully';
$lang['group_already_exists']       = 'Group name already taken';
$lang['group_update_successful']    = 'Group details updated';
$lang['group_delete_successful']    = 'Group deleted';
$lang['group_delete_unsuccessful'] 	= 'Unable to delete group';
$lang['group_delete_notallowed']    = 'Can\'t delete the administrators\' group';
$lang['group_name_required'] 		    = 'Group name is a required field';
$lang['group_name_admin_not_alter'] = 'Admin group name can not be changed';

// Activation Email
$lang['email_activation_subject']            = 'Activació del compte';
$lang['email_activate_heading']    = 'Activate account for %s';
$lang['email_activate_subheading'] = 'Please click this link to %s.';
$lang['email_activate_link']       = 'Activate Your Account';
// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Verificació de contrasenya oblidada';
$lang['email_forgot_password_heading']    = 'Reset Password for %s';
$lang['email_forgot_password_subheading'] = 'Please click this link to %s.';
$lang['email_forgot_password_link']       = 'Reset Your Password';
// New Password Email
$lang['email_new_password_subject']          = 'Nova contrasenya';
$lang['email_new_password_heading']    = 'New Password for %s';
$lang['email_new_password_subheading'] = 'Your password has been reset to: %s';
