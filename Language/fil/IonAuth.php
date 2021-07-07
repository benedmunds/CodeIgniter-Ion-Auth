<?php
/**
* Name:  Ion Auth Lang - Filipino
*
* Author: Ben Edmunds
*         ben.edmunds@gmail.com
*         @benedmunds
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.14.2010
*
* Description:  Filipino language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful'            => 'Matagumpay na nagawa ang account',
	'account_creation_unsuccessful'          => 'Hindi magawang i-Lumikha ng Account',
	'account_creation_duplicate_email'       => 'Email ay Nagamit na o Hindi wastong',
	'account_creation_duplicate_identity'    => 'Pagkakakilanlan ay Nagamit na o Hindi wastong',
	'account_creation_missing_defaultGroup' => 'Default na grupo ay hindi nakatakda',
	'account_creation_invalid_defaultGroup' => 'Hindi wasto ang default na ngalan ng grupo',


	// Password
	'password_change_successful'          => 'Password Matagumpay Binago',
	'password_change_unsuccessful'        => 'Hindi ma-Baguhin ang Password',
	'forgot_password_successful'          => 'Password Reset ay na-send na sa Email',
	'forgot_password_unsuccessful'        => 'Hindi ma-reset ang Password',

	// Activation
	'activate_successful'                 => 'Account napagana na',
	'activate_unsuccessful'               => 'Hindi ma-activate Account',
	'deactivate_successful'               => 'Account De-Activated',
	'deactivate_unsuccessful'             => 'Hindi ma-De-Activate Account',
	'activation_email_successful'         => 'Activation Email Sent. Mangyaring suriin ang iyong inbox o spam',
	'activation_email_unsuccessful'       => 'Hindi magawang Magpadala Activation Email',
	'deactivate_current_user_unsuccessful'=> 'Hindi mo Maaaring De-activate ang iyong sarili.',

	// Login / Logout
	'login_successful'                    => 'Tagumpay na Naka-Login',
	'login_unsuccessful'                  => 'Maling Login',
	'login_unsuccessful_not_active'       => 'Account ay hindi aktibo',
	'login_timeout'                       => 'Pansamantalang Naka-lock Out. Subukan ulit mamaya.',
	'logout_successful'                   => 'Matagumpay na Naka-log Out',

	// Account Changes
	'update_successful'                   => 'Impormasyon ng Account Matagumpay Na-Bago',
	'update_unsuccessful'                 => 'Hindi ma-update ang Impormasyon ng Account',
	'delete_successful'                   => 'User Natanggal na',
	'delete_unsuccessful'                 => 'Hindi magawang alisin User',

	// Groups
	'group_creation_successful'           => 'Matagumpay na Nalikha ang Grupo',
	'group_already_exists'                => 'Ang pangalan ng grupo nagamit na',
	'group_update_successful'             => 'Detalye sa Grupo Na-Bago na',
	'group_delete_successful'             => 'Ang Grupo Na-Tanggal na',
	'group_delete_unsuccessful'           => 'Hindi matanggal ang grupo',
	'group_delete_notallowed'             => 'Hindi Maaaring tanggalin ang Grupo Administrator',
	'group_name_required'                 => 'Ang Ngalan sa Grupo ay Kailangan',
	'group_name_admin_not_alter'          => 'Hndi Maaaring Palitan ang Ngalan sa Grupo',

	// Activation Email
	'emailActivation_subject'            => 'Account Activation',
	'emailActivate_heading'              => 'I-activate account para sa %s',
	'emailActivate_subheading'           => 'Mangyaring i-click ang link na ito  %s.',
	'emailActivate_link'                 => 'I-activate ang Iyong Account',

	// Forgot Password Email
	'email_forgotten_password_subject'    => 'Nakalimutan mo ba ang Verification Password',
	'emailForgotPassword_heading'       => 'I-reset ang Password para sa %s',
	'emailForgotPassword_subheading'    => 'Mangyaring i-click ang link na ito  %s.',
	'emailForgotPassword_link'          => 'I-reset ang Iyong Password',
];
