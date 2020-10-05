<?php

/**
 * Name:  Auth Lang - English
 *
 * Author: Ben Edmunds
 * 		  ben.edmunds@gmail.com
 *         @benedmunds
 *
 * Author: Benoit LIETAER
 *         @gmail.com
 *
 * Adjustments by ggallon
 *
 *  Location: http://github.com/benedmunds/ion_auth/
 *
 * Created:  14.02.2014
 *
 * Description:  French language file for Ion Auth example views
 *
 * @package Codeigniter-Ion-Auth
 */

return [
	// Errors
	'error_security' => 'La validation de ce formulaire a échoué.',

	// Login
	'login_heading'         => 'Se connecter',
	'login_subheading'      => 'Veuillez vous connecter avec votre nom d\'utilisateur et votre mot de passe.',
	'login_identity_label'  => 'E-mail/Nom d\'utilisateur :',
	'login_password_label'  => 'Mot de passe :',
	'login_remember_label'  => 'Rester connecté :',
	'login_submit_btn'      => 'Se connecter',
	'login_forgot_password' => 'Mot de passe oublié ?',

	// Index
	'index_heading'           => 'Utilisateurs',
	'index_subheading'        => 'Ci-dessous se trouve la liste des utilisateurs.',
	'index_fname_th'          => 'Prénom',
	'index_lname_th'          => 'Nom',
	'index_email_th'          => 'Email',
	'index_groups_th'         => 'Groupes',
	'index_status_th'         => 'Statut',
	'index_action_th'         => 'Action',
	'index_edit_link'         => 'Éditer',
	'index_active_link'       => 'Activer',
	'index_inactive_link'     => 'Désactiver',
	'index_create_user_link'  => 'Créer un nouvel utilisateur',
	'index_create_group_link' => 'Créer un nouveau groupe',

	// Deactivate User
	'deactivate_heading'                  => 'Désactiver un utilisateur',
	'deactivate_subheading'               => 'Êtes-vous certain de vouloir désactiver l\'utilisateur : %s',
	'deactivate_confirm_y_label'          => 'Oui :',
	'deactivate_confirm_n_label'          => 'Non :',
	'deactivate_submit_btn'               => 'Envoyer',
	'deactivate_validation_confirm_label' => 'Confirmation',
	'deactivate_validation_user_id_label' => 'Identifiant',

	// Create User
	'create_user_heading'                           => 'Créer un utilisateur',
	'create_user_subheading'                        => 'Veuillez entrer les informations ci-dessous.',
	'create_user_fname_label'                       => 'Prénom :',
	'create_user_lname_label'                       => 'Nom :',
	'create_user_identity_label'                    => 'Identité :',
	'create_user_company_label'                     => 'Société :',
	'create_user_email_label'                       => 'Email :',
	'create_user_phone_label'                       => 'Téléphone :',
	'create_user_password_label'                    => 'Mot de passe :',
	'create_user_password_confirm_label'            => 'Confirmer le mot de passe :',
	'create_user_submit_btn'                        => 'Créer l\'utilisateur',
	'create_user_validation_fname_label'            => 'Prénom',
	'create_user_validation_lname_label'            => 'Nom',
	'create_user_validation_identity_label'         => 'Identité :',
	'create_user_validation_email_label'            => 'Adresse Email',
	'create_user_validation_phone_label'            => 'Téléphone',
	'create_user_validation_company_label'          => 'Société',
	'create_user_validation_password_label'         => 'Mot de passe',
	'create_user_validation_password_confirm_label' => 'Confirmation du mot de passe',

	// Edit User
	'edit_user_heading'                           => 'Éditer l\'utilisateur',
	'edit_user_subheading'                        => 'Veuillez entrer les données de l\'utilisateur ci-dessous.',
	'edit_user_fname_label'                       => 'Prénom :',
	'edit_user_lname_label'                       => 'Nom :',
	'edit_user_company_label'                     => 'Société :',
	'edit_user_email_label'                       => 'E-mail :',
	'edit_user_phone_label'                       => 'Téléphone :',
	'edit_user_password_label'                    => 'Mot de passe (si modifié) :',
	'edit_user_password_confirm_label'            => 'Confirmer le mot de passe :',
	'edit_user_groups_heading'                    => 'Membre du groupe',
	'edit_user_submit_btn'                        => 'Enregistrer les modifications',
	'edit_user_validation_fname_label'            => 'Prénom',
	'edit_user_validation_lname_label'            => 'Nom',
	'edit_user_validation_email_label'            => 'Adresse email',
	'edit_user_validation_phone_label'            => 'Téléphone',
	'edit_user_validation_company_label'          => 'Société',
	'edit_user_validation_groups_label'           => 'Groupes',
	'edit_user_validation_password_label'         => 'Mot de passe',
	'edit_user_validation_password_confirm_label' => 'Confirmation du Mot de passe',

	// Create Group
	'create_group_title'                  => 'Créer le Groupe',
	'create_group_heading'                => 'Créer le Groupe',
	'create_group_subheading'             => 'Veuillez entrer les informations du groupe ci-dessous.',
	'create_group_name_label'             => 'Nom du groupe :',
	'create_group_desc_label'             => 'Description :',
	'create_group_submit_btn'             => 'Créer le Groupe',
	'create_group_validation_name_label'  => 'Nom du Groupe',
	'create_group_validation_desc_label'  => 'Description',

	// Edit Group
	'edit_group_title'                  => 'Éditer le Groupe',
	'edit_group_saved'                  => 'Groupe enregistré',
	'edit_group_heading'                => 'Éditer le  Groupe',
	'edit_group_subheading'             => 'Veuillez entrer les informations du groupe ci-dessous.',
	'edit_group_name_label'             => 'Nom du Groupe :',
	'edit_group_desc_label'             => 'Description :',
	'edit_group_submit_btn'             => 'Enregister les mofifications',
	'edit_group_validation_name_label'  => 'Nom du Groupe',
	'edit_group_validation_desc_label'  => 'Description',

	// Change Password
	'change_password_heading'                               => 'Changer le mot de passe',
	'change_password_old_password_label'                    => 'Ancien mot de passe :',
	'change_password_new_password_label'                    => 'Le nouveau mot de passe (doit contenir %s caractères minimum) :',
	'change_password_new_password_confirm_label'            => 'Confirmer le nouveau mot de passe :',
	'change_password_submit_btn'                            => 'Enregistrer',
	'change_password_validation_old_password_label'         => 'Ancien mot de passe',
	'change_password_validation_new_password_label'         => 'Nouveau mot de passe',
	'change_password_validation_new_password_confirm_label' => 'Confirmer le nouveau mot de passe',

	// Forgot Password
	'forgot_password_heading'                 => 'Mot de passe oublié',
	'forgot_password_subheading'              => 'Veuillez entrer votre %s pour que nous puissions vous envoyer votre nouveau mot de passe.',
	'forgot_password_email_label'             => '%s :',
	'forgot_password_submit_btn'              => 'Envoyer',
	'forgot_password_validation_email_label'  => 'Adresse Email',
	'forgot_password_identity_label'          => 'Nom d\'utilisateur',
	'forgot_password_email_identity_label'    => 'Email',
	'forgot_password_email_not_found'         => 'Cette adresse email n\'est pas enregistrée chez nous.',
	'forgot_password_identity_not_found'      => 'Ce nom d\'utilisateur n\'est pas enregistré chez nous.',

	// Reset Password
	'reset_password_heading'                               => 'Modifier le mot de passe',
	'reset_password_new_password_label'                    => 'Nouveau mot de passe (doit contenir %s caractères minimum) :',
	'reset_password_new_password_confirm_label'            => 'Confirmez le nouveau mot de passe :',
	'reset_password_submit_btn'                            => 'Enregistrer',
	'reset_password_validation_new_password_label'         => 'Nouveau mot de passe',
	'reset_password_validation_new_password_confirm_label' => 'Confirmer le nouveau mot de passe',

	// Forgot Password Email
	'emailForgotPassword_heading'    => 'Changer le mot de passe pour %s',
	'emailForgotPassword_subheading' => 'Veuillez cliquer sur ce lien pour %s',
	'emailForgotPassword_link'       => 'Changer votre mot de passe',
];
