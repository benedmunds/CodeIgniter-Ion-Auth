<?php
/**
* Name:  Ion Auth Lang - Lithuanian (UTF-8)
*
* Author: Ben Edmunds
*           ben.edmunds@gmail.com
*         @benedmunds
* Translation:  Radas7
*             radas7@gmail.com
*               Donatas Glodenis
*             dgvirtual@akl.lt
*
* Created:  2012-03-04
* Updated:  2020-04-14
*
* Description:  Lithuanian language file for Ion Auth messages and errors
*
*/

return [
    // Account Creation
	'account_creation_successful'              => 'Vartotojas sėkmingai sukurtas',
	'account_creation_unsuccessful'            => 'Neįmanoma sukurti vartotojo',
	'account_creation_duplicate_email'         => 'Toks el. pašto adresas jau yra, arba yra netaisyklingas',
	'account_creation_duplicate_identity'      => 'Prisijungimo vardas jau yra arba netaisyklingas',
	'account_creation_missing_defaultGroup'    => 'Nenustatyta numatytoji grupė',
	'account_creation_invalid_defaultGroup'    => 'Nustatytas neteisingas numatytosios grupės pavadinimas',

	// Password
	'password_change_successful'          => 'Slaptažodis sukurtas',
	'password_change_unsuccessful'        => 'Negalima pakeisti slaptažodžio',
	'forgot_password_successful'          => 'Slaptažodis keičiamas. Instrukcijos išsiųstos paštu.',
	'forgot_password_unsuccessful'        => 'Neįmanoma išsiųsti el. paštu slaptažodžio pakeitimo nuorodos',

	// Activation
	'activate_successful'                   => 'Paskyra aktyvuota',
	'activate_unsuccessful'                 => 'Nepavyko aktyvuoti paskyros',
	'deactivate_successful'                 => 'Paskyra deaktyvuota',
	'deactivate_unsuccessful'               => 'Nepavyko deaktyvuoti paskyros',
	'activation_email_successful'           => 'Aktyvavimo laiškas išsiųstas. Prašome patikrinti pašto dėžutę bei SPAM aplanką',
	'activation_email_unsuccessful'         => 'Nepavyok išsiųsti aktyvavimo laiško',
	'deactivate_current_user_unsuccessful'  => 'Negalima deaktyvuoti savo paskyros',

	// Login / Logout
	'login_successful'                => 'Sėkmingai prisijungėte',
	'login_unsuccessful'              => 'Prisijungti nepavyko',
	'login_unsuccessful_not_active'   => 'Paskyra yra neaktyvi',
	'login_timeout'                   => 'Laikinai užrakinta. Pabandykite iš naujo vėliau.',
	'logout_successful'               => 'Atsijungta sėkmingai',

	// Account Changes
	'update_successful'               => 'Vartotojo duomenys sėkmingai pakeisti',
	'update_unsuccessful'             => 'Neįmanoma pakeisti vartotojo duomenų',
	'delete_successful'               => 'Vartotojas pašalintas',
	'delete_unsuccessful'             => 'Neįmanoma pašalinti vartotojo',

	// Groups
	'group_creation_successful'       => 'Grupė sėkmingai sukurta',
	'group_already_exists'            => 'Grupės vardas jau naudojamas',
	'group_update_successful'         => 'Grupės detalės atnaujintos',
	'group_delete_successful'         => 'Grupė ištrinta',
	'group_delete_unsuccessful'       => 'Nepavyksta ištrinti grupės',
	'group_delete_notallowed'         => 'Administratorių grupės ištrinti negalima',
	'group_name_required'             => 'Grupės vardą užpildyti būtina',
	'group_name_admin_not_alter'      => 'Admin grupės pavadinimas negali būti pakeistas',

	// Activation Email
	'emailActivation_subject'  => 'Paskyros aktyvavimas',
	'emailActivate_heading'    => 'Aktyvuoti %s paskyrą',
	'emailActivate_subheading' => 'Prašome spragtelėti %s nuorodą.',
	'emailActivate_link'       => 'Aktyvuokite savo paskyrą',
	// Forgot Password Email
	'email_forgotten_password_subject'    => 'Pamiršto slaptažodžio patvirtinimas',
	'emailForgotPassword_heading'         => 'Iš naujo generuoti %s slaptažodį',
	'emailForgotPassword_subheading'      => 'Prašome paspausti nuorodą norėdami %s.',
    'emailForgotPassword_link'            => 'Perkrauti slaptažodį',
];
