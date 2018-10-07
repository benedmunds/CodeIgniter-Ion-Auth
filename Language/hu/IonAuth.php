<?php
/**
* Name:  Ion Auth Lang - Hungarian
* 
* Author: Balazs Bosternak
* 		    b.bosternak@gmail.com
* 
* Location: http://github.com/benedmunds/ion_auth/
*          
* Created:  07.19.2015 
* 
* Description:  Hungarian language file for Ion Auth messages and errors
* 
*/

return [
	// Account Creation
	'account_creation_successful' 	  	      => 'Felhasználói fiók sikeresen létrehozva',
	'account_creation_unsuccessful' 	 	 	    => 'Nem lehet létrehozni a felhasználói fiókot',
	'account_creation_duplicate_email' 	 	  => 'Az email cím használatban van vagy érvénytelen',
	'account_creation_duplicate_identity' 	  => 'A felhasználó név használatban van vagy érvénytelen',
	'account_creation_missing_defaultGroup' => 'Alapértelmezett csoport nincs megadva',
	'account_creation_invalid_defaultGroup' => 'Érvénytelen alapértelmezett csoport név',

	// Password
	'password_change_successful' 	 	 	=> 'A jelszó sikeresen megváltoztatva',
	'password_change_unsuccessful'     => 'Nem lehet megváltoztatni a jelszót',
	'forgot_password_successful' 	 	 	=> 'A jelszó törlő email elküldve',
	'forgot_password_unsuccessful' 	  => 'Nem lehet törölni a jelszót',

	// Activation
	'activate_successful'					  => 'Felhasználói fiók aktiválva',
	'activate_unsuccessful' 		 	  	=> 'Nem lehet a felhasználói fiókot aktiválni',
	'deactivate_successful' 		    	=> 'Felhasználói fiók inaktiválva',
	'deactivate_unsuccessful' 	      => 'Nem lehet a felhasználói fiókot inaktiválni',
	'activation_email_successful' 	  => 'Aktivációs email elküldve',
	'activation_email_unsuccessful'  => 'Nem lehet elküldeni az aktivációs emailt',
	'deactivate_current_user_unsuccessful'=> 'You cannot De-Activate your self.',

	// Login / Logout
	'login_successful' 		  	 			=> 'Sikeres bejelentkés',
	'login_unsuccessful' 		  	 		=> 'Sikertelen bejelentkezés',
	'login_unsuccessful_not_active'  => 'Felhasználói fiók inaktív',
	'login_timeout'                  => 'Ideiglenesen zárolva... Próbálja meg később.',
	'logout_successful' 		 	 			  => 'Sikeres kijelentkezés',

	// Account Changes
	'update_successful' 		 	 			=> 'Felhasználói fiók adatai sikeresen módosítva',
	'update_unsuccessful' 		 	 		=> 'Nem lehet a felhasználói fiók adatait módosítani',
	'delete_successful' 		 	 			=> 'Felhasználó törölve',
	'delete_unsuccessful' 		 	 		=> 'Nem lehet a felhasználót törölni',

	// Groups
	'group_creation_successful'  			=> 'Csoport sikeresen létrehozva',
	'group_already_exists'       			=> 'A csoport már létezik',
	'group_update_successful'    			=> 'Csoport adatai sikeresen módosítva',
	'group_delete_successful'    			=> 'Csoport törölve',
	'group_delete_unsuccessful' 				=> 'Nem lehet a csoportot törölni',
	'group_delete_notallowed'    			=> 'Az adminisztrátorok csoport nem törölhető',
	'group_name_required' 				    	=> 'A csoport neve kötelező mező',
	'group_name_admin_not_alter' 			=> 'Az admin csoport neve nem változtatható meg',

	// Activation Email
	'emailActivation_subject'         => 'Felhasználói fiók aktiválása',
	'emailActivate_heading'    				=> '%s felhasználói fiókjának aktiválása',
	'emailActivate_subheading' 				=> 'Kattintson a linkre, hogy %s.',
	'emailActivate_link'       				=> 'Aktiválja felhasználói fiókját',

	// Forgot Password Email
	'email_forgotten_password_subject'    	=> 'Elfelejtett jelszó visszaigazolása',
	'emailForgotPassword_heading'    		=> 'Új jelszó beállítása %s számára',
	'emailForgotPassword_subheading' 		=> 'Kattintson a linkre az %s érdekében.',
	'emailForgotPassword_link'       		=> 'Új jelszó beállítása',
];
