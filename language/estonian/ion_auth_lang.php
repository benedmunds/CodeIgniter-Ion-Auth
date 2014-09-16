<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Name:  Ion Auth Lang - Estonian
 *
 * Author: Esko Lehtme
 *         esko@tsoon.com
 *         @eskolehtme
 *
 * Location: http://github.com/benedmunds/ion_auth/
 *
 * Created:  01.09.2011
 *
 * Description:  Estonian language file for Ion Auth messages and errors
 *
 */

// Account Creation
$lang['account_creation_successful']         = 'Konto on loodud';
$lang['account_creation_unsuccessful']       = 'Konto loomine ebaõnnestus';
$lang['account_creation_duplicate_email']    = 'E-posti aadress on juba kasutusel või vigane.';
$lang['account_creation_duplicate_username'] = 'Kasutajanimi on juba kasutusel või vigane.';

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Default group is not set';
$lang['account_creation_invalid_default_group'] = 'Invalid default group name set';


// Password
$lang['password_change_successful']          = 'Salasõna on muudetud.';
$lang['password_change_unsuccessful']        = 'Salasõna muutmine ebaõnnestus.';
$lang['forgot_password_successful']          = 'Sinu e-postile saadeti kiri edasise juhendiga.';
$lang['forgot_password_unsuccessful']        = 'Salasõna muutmine ebaõnnestus.';

// Activation
$lang['activate_successful']                 = 'Konto on aktiveeritud';
$lang['activate_unsuccessful']               = 'Konto aktiveerimine ebaõnnestus.';
$lang['deactivate_successful']               = 'Konto on taas aktiivne';
$lang['deactivate_unsuccessful']             = 'Konto aktiveerimine ebaõnnestus.';
$lang['activation_email_successful']         = 'Sinu e-postile saadeti kiri edasise juhendiga.';
$lang['activation_email_unsuccessful']       = 'Aktiveerimiskirja saatmine ebaõnnestus.';

// Login / Logout
$lang['login_successful']                    = 'Oled sisse logitud';
$lang['login_unsuccessful']                  = 'Sisenemine ebaõnnestus.';
$lang['logout_successful']                   = 'Oled välja logitud';

// Account Changes
$lang['update_successful']                   = 'Sinu andmed on muudetud';
$lang['update_unsuccessful']                 = 'Andmete muutmine ebaõnnestus.';
$lang['delete_successful']                   = 'Kasutaja on eemaldatud';
$lang['delete_unsuccessful']                 = 'Kasutajat eemaldamine ebaõnnestus.';

// Email Subjects - TODO Please Translate
$lang['email_forgotten_password_subject']    = 'Forgotten Password Verification';
$lang['email_new_password_subject']          = 'New Password';
$lang['email_activation_subject']            = 'Account Activation';