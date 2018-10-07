<?php
/**
* Name:  Ion Auth Lang - Lithuanian (UTF-8)
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
* Translation:  Radas7
*             radas7@gmail.com
*               Donatas Glodenis
*             dgvirtual@akl.lt
*
* Created:  2012-03-04
* Updated:  2016-05-13
*
* Description:  Lithuanian language file for Ion Auth messages and errors
*
*/

return [
	// Account Creation
	'account_creation_successful' 	  	 => 'Vartotojas sėkmingai sukurtas',
	'account_creation_unsuccessful' 	 	 => 'Neįmanoma sukurti vartotojo',
	'account_creation_duplicate_email' 	 => 'El, pašto adresas jau yra arba neteisingas',
	'account_creation_duplicate_identity' 	 => 'Prisijungimo vardas jau yra arba nekorektiškas',

	// TODO Please Translate
	'account_creation_missing_defaultGroup' => 'Nenustatyta numatytoji grupė',
	'account_creation_invalid_defaultGroup' => 'Nustatytas neteisingas numatytosios grupės pavadinimas',

	// Password
	'password_change_successful' 	 	 => 'Slaptažodis sukurtas',
	'password_change_unsuccessful' 	  	 => 'Negalima paeisti slaptažodžio',
	'forgot_password_successful' 	 	 => 'Slaptažodis keičiamas. Instrukcijos išsiųstos paštu.',
	'forgot_password_unsuccessful' 	 	 => 'Neįmanoma pakeisti slaptažodžio',

	// Activation
	'activate_successful' 		  	 => 'Vartotojas aktyvuotas',
	'activate_unsuccessful' 		 	 => 'Nepavyko aktyvuoti',
	'deactivate_successful' 		  	 => 'Deaktyvuota',
	'deactivate_unsuccessful' 	  	 => 'Neįmanoma deaktyvuoti',
	'activation_email_successful' 	  	 => 'Išsiųstas pranešimas į el. paštą',
	'activation_email_unsuccessful'   	 => 'Neįmanoma išsiųsti',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful' 		  	 => 'Sėkminga autorizacija',
	'login_unsuccessful' 		  	 => 'Klaidingas prisijungimas',
	'login_unsuccessful_not_active' 		 => 'Paskyra yra neaktyvi',
	'login_timeout'                       => 'Laikinai užrakinta. Pabandykite iš naujo vėliau.',
	'logout_successful' 		 	 => 'Atsijungta sėkminga',

	// Account Changes
	'update_successful' 		 	 => 'Vartotojo duomenys sėkmingai pakeisti',
	'update_unsuccessful' 		 	 => 'Neįmanoma pakeisti vartotojo duoemnų',
	'delete_successful' 		 	 => 'Vartotojas pašalintas',
	'delete_unsuccessful' 		 	 => 'Neįmanoma pašalinti vartotojo',

	// Groups
	'group_creation_successful'  => 'Grupė sėkmingai sukurta',
	'group_already_exists'       => 'Grupės vardas jau naudojamas',
	'group_update_successful'    => 'Grupės detalės atnaujintos',
	'group_delete_successful'    => 'Grupė ištrinta',
	'group_delete_unsuccessful' 	=> 'Nepavyksta ištrinti grupės',
	'group_delete_notallowed'    => 'Administratorių grupės ištrinti negalima',
	'group_name_required' 		=> 'Grupės vardą užpildyti būtina',
	'group_name_admin_not_alter' => 'Admin grupė negali būti pakeista',

	// Activation Email
	'emailActivation_subject'            => 'Paskyros aktyvavimas',
	'emailActivate_heading'    => 'Aktyvuoti %s paskyrą',
	'emailActivate_subheading' => 'Prašome spragtelėti %s nuorodą.',
	'emailActivate_link'       => 'Aktyvuokite savo paskyrą',
	// Forgot Password Email
	'email_forgotten_password_subject'    => 'Pamiršto slaptažodžio patvirtinimas',
	'emailForgotPassword_heading'    => 'Iš naujo generuoti %s slaptažodį',
	'emailForgotPassword_subheading' => 'Prašome paspausti nuorodą norėdami %s.',
	'emailForgotPassword_link'       => 'Perkrauti slaptažodį',
];
