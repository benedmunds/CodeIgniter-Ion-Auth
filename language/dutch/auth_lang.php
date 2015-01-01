<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - English
*
* Author: Ben Edmunds
* 		  ben.edmunds@gmail.com
*         @benedmunds
*
* Author: Daniel Davis
*         @ourmaninjapan
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.09.2013
*
* Description:  Dutch language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'Dit formulier is niet door onze veiligheidscontrole geraakt.';

// Login
$lang['login_heading']         = 'Login';
$lang['login_subheading']      = 'Gelieve in te loggen met je email/gebruikersnaam en wachtwoord.';
$lang['login_identity_label']  = 'Email/Gebruikersnaam:';
$lang['login_password_label']  = 'Wachtwoord:';
$lang['login_remember_label']  = 'Onthoud mij:';
$lang['login_submit_btn']      = 'Login';
$lang['login_forgot_password'] = 'Wachtwoord vergeten?';

// Index
$lang['index_heading']           = 'Gebruikers';
$lang['index_subheading']        = 'Hieronder vindt u een lijst van de gebruikers.';
$lang['index_fname_th']          = 'Voornaam';
$lang['index_lname_th']          = 'Achternaam';
$lang['index_email_th']          = 'Email';
$lang['index_groups_th']         = 'Groepen';
$lang['index_status_th']         = 'Status';
$lang['index_action_th']         = 'Actie';
$lang['index_active_link']       = 'Actief';
$lang['index_inactive_link']     = 'Inactief';
$lang['index_create_user_link']  = 'Nieuwe gebruiker aanmaken';
$lang['index_create_group_link'] = 'Nieuwe groep aanmaken';

// Deactivate User
$lang['deactivate_heading']                  = 'Gebruiker deactiveren';
$lang['deactivate_subheading']               = 'Bent u zeker dat u gebruiker \'%s\' wil deactiveren?';
$lang['deactivate_confirm_y_label']          = 'Ja:';
$lang['deactivate_confirm_n_label']          = 'Neen:';
$lang['deactivate_submit_btn']               = 'Verzenden';
$lang['deactivate_validation_confirm_label'] = 'bevestiging';
$lang['deactivate_validation_user_id_label'] = 'Gebruikers ID';

// Create User
$lang['create_user_heading']                           = 'Gebruiker aanmaken';
$lang['create_user_subheading']                        = 'Gelieve hieronder de gebruikersinformatie in te vullen.';
$lang['create_user_fname_label']                       = 'Voornaam:';
$lang['create_user_lname_label']                       = 'Achternaam:';
$lang['create_user_company_label']                     = 'Bedrijfsnaam:';
$lang['create_user_email_label']                       = 'Email:';
$lang['create_user_phone_label']                       = 'Telefoon:';
$lang['create_user_password_label']                    = 'Wachtwoord:';
$lang['create_user_password_confirm_label']            = 'Bevestig wachtwoord:';
$lang['create_user_submit_btn']                        = 'Gebruiker Aanmaken';
$lang['create_user_validation_fname_label']            = 'Voornaam';
$lang['create_user_validation_lname_label']            = 'Achternaam';
$lang['create_user_validation_email_label']            = 'Email Adres';
$lang['create_user_validation_phone1_label']           = 'Eerste gedeelte Telefoon';
$lang['create_user_validation_phone2_label']           = 'Tweede gedeelte Telefoon';
$lang['create_user_validation_phone3_label']           = 'Derde gedeelte Telefoon';
$lang['create_user_validation_company_label']          = 'Bedrijfsnaam';
$lang['create_user_validation_password_label']         = 'Wachtwoord';
$lang['create_user_validation_password_confirm_label'] = 'Wachtwoord Bevestiging';

// Edit User
$lang['edit_user_heading']                           = 'Gebruiker Bewerken';
$lang['edit_user_subheading']                        = 'Gelieve hieronder de gebruikersinformatie in te vullen.';
$lang['edit_user_fname_label']                       = 'Voornaam:';
$lang['edit_user_lname_label']                       = 'Achternaam:';
$lang['edit_user_company_label']                     = 'Bedrijfsnaam:';
$lang['edit_user_email_label']                       = 'Email:';
$lang['edit_user_phone_label']                       = 'Telefoon:';
$lang['edit_user_password_label']                    = 'Wachtwoord: (indien wijzigen)';
$lang['edit_user_password_confirm_label']            = 'Bevestig Wachtwoord: (indien wijzigen)';
$lang['edit_user_groups_heading']                    = 'Lid van groepen';
$lang['edit_user_submit_btn']                        = 'Gebruiker Opslaan';
$lang['edit_user_validation_fname_label']            = 'Voornaam';
$lang['edit_user_validation_lname_label']            = 'Achternaam';
$lang['edit_user_validation_email_label']            = 'Email Adres';
$lang['edit_user_validation_phone1_label']           = 'Eerste gedeelte Telefoon';
$lang['edit_user_validation_phone2_label']           = 'Tweede gedeelte Telefoon';
$lang['edit_user_validation_phone3_label']           = 'Derde gedeelte Telefoon';
$lang['edit_user_validation_company_label']          = 'Bedrijfsnaam';
$lang['edit_user_validation_groups_label']           = 'Groepen';
$lang['edit_user_validation_password_label']         = 'Wachtwoord';
$lang['edit_user_validation_password_confirm_label'] = 'Wachtwoord Bevestiging';

// Create Group
$lang['create_group_title']                  = 'Groep Aanmaken';
$lang['create_group_heading']                = 'Groep Aanmaken';
$lang['create_group_subheading']             = 'Gelieve hieronder de groep informatie aan te vullen.';
$lang['create_group_name_label']             = 'Groep Naam:';
$lang['create_group_desc_label']             = 'Beschrijving:';
$lang['create_group_submit_btn']             = 'Groep Aanmaken';
$lang['create_group_validation_name_label']  = 'Groep Naam';
$lang['create_group_validation_desc_label']  = 'Beschrijving';

// Edit Group
$lang['edit_group_title']                  = 'Groep Bewerken';
$lang['edit_group_saved']                  = 'Groep Opgeslagen';
$lang['edit_group_heading']                = 'Groep Bewerken';
$lang['edit_group_subheading']             = 'Gelieve hieronder de groep informatie aan te vullen.';
$lang['edit_group_name_label']             = 'Groep Naam:';
$lang['edit_group_desc_label']             = 'Beschrijving:';
$lang['edit_group_submit_btn']             = 'Groep Opslaan';
$lang['edit_group_validation_name_label']  = 'Groep Naam';
$lang['edit_group_validation_desc_label']  = 'Beschrijving';

// Change Password
$lang['change_password_heading']                               = 'Wachtwoord wijzigen';
$lang['change_password_old_password_label']                    = 'Oud wachtwoord:';
$lang['change_password_new_password_label']                    = 'Nieuw Wachtwoord(minstens %s tekens lang):';
$lang['change_password_new_password_confirm_label']            = 'Bevestig nieuw wachtwoord:';
$lang['change_password_submit_btn']                            = 'Wijzig';
$lang['change_password_validation_old_password_label']         = 'Oud Wachtwoord';
$lang['change_password_validation_new_password_label']         = 'Nieuw Wachtwoord';
$lang['change_password_validation_new_password_confirm_label'] = 'Bevestig Nieuw Wachtwoord';

// Forgot Password
$lang['forgot_password_heading']                 = 'Wachtwoord Vergeten';
$lang['forgot_password_subheading']              = 'Gelieve uw %sadres in te vullen zodat we u een email kunnen sturen om je wachtwoord te wijzigen.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Verzenden';
$lang['forgot_password_validation_email_label']  = 'Email Adres';
$lang['forgot_password_username_identity_label'] = 'Gebruikersnaam';
$lang['forgot_password_email_identity_label']    = 'Email';
$lang['forgot_password_email_not_found']         = 'Het opgegeven email adres werd niet terug gevonden.';

// Reset Password
$lang['reset_password_heading']                               = 'Wachtwoord wijzigen';
$lang['reset_password_new_password_label']                    = 'Nieuw Wachtwoord(minstens %s tekens lang):';
$lang['reset_password_new_password_confirm_label']            = 'Bevestig nieuw wachtwoord:';
$lang['reset_password_submit_btn']                            = 'Verander';
$lang['reset_password_validation_new_password_label']         = 'Nieuw Wachtwoord';
$lang['reset_password_validation_new_password_confirm_label'] = 'Bevestig nieuw Wachtwoord';

// Activation Email
$lang['email_activate_heading']    = 'Activeer account voor %s';
$lang['email_activate_subheading'] = 'Gelieve op deze link te klikken om %s.';
$lang['email_activate_link']       = 'Activeer uw account';

// Forgot Password Email
$lang['email_forgot_password_heading']    = 'Wachtwoord resetten voor %s';
$lang['email_forgot_password_subheading'] = 'Gelieve op deze link te klikken om %s.';
$lang['email_forgot_password_link']       = 'Reset uw wachtwoord';

// New Password Email
$lang['email_new_password_heading']    = 'Nieuw wachtwoord voor %s';
$lang['email_new_password_subheading'] = 'Je wachtwoord werd gereset naar: %s';

