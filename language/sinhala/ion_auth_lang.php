<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - English
*
* Author: Ben Edmunds
*         ben.edmunds@gmail.com
*         @benedmunds
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  03.14.2010
*
* Description:  English language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful']            = 'ගිණුම සැකසුම සාර්ථකයි';
$lang['account_creation_unsuccessful']          = 'ගිණුම සැකසීමට නොහැක';
$lang['account_creation_duplicate_email']       = 'ඊමේල් ලිපිනය දැනටමත් භාවිතයේ හෝ අවලංගුයි';
$lang['account_creation_duplicate_identity']    = 'අනන්‍යතාව දැනටමත් භාවිතයේ හෝ අවලංගුයි';
$lang['account_creation_missing_default_group'] = 'සම්මත සමූහය සකසා නැත';
$lang['account_creation_invalid_default_group'] = 'අවලංගු සම්මත සමූහ නාමයකි';


// Password
$lang['password_change_successful']          = 'මුර පදය වෙනස් කිරීම සාර්ථකයි';
$lang['password_change_unsuccessful']        = 'මුර පදය වෙනස් කල නොහැක';
$lang['forgot_password_successful']          = 'මුර පදය නැවත සැකසුම් ඊමේලය යවා ඇත';
$lang['forgot_password_unsuccessful']        = 'මුර පදය නැවත සැකසීමට නොහැක';

// Activation
$lang['activate_successful']                 = 'ගිණුම සක්‍රීය කර ඇත';
$lang['activate_unsuccessful']               = 'ගිණුම සක්‍රීය කල නොහැක';
$lang['deactivate_successful']               = 'ගිණුම අක්‍රීය කර ඇත';
$lang['deactivate_unsuccessful']             = 'ගිණුම අක්‍රීය කල නොහැක';
$lang['activation_email_successful']         = 'ගිණුම සක්‍රීය ඊමේලය යවා ඇත';
$lang['activation_email_unsuccessful']       = 'ගිණුම සක්‍රීය ඊමේලය යැවීමට නොහැක';

// Login / Logout
$lang['login_successful']                    = 'ඇතුලු වීම සාර්ථකයි';
$lang['login_unsuccessful']                  = 'ඇතුලු වීම වැරදි';
$lang['login_unsuccessful_not_active']       = 'ගිණුම සක්‍රීය නැත';
$lang['login_timeout']                       = 'ඇතුලු කාලය ඉක්මවා ඇත. නැවත උත්සාහ කරන්න.';
$lang['logout_successful']                   = 'පිටවීම සාර්ථකයි';

// Account Changes
$lang['update_successful']                   = 'ගිණුම් තොරතුරු සාර්ථකව යාවත්කාලීන කර ඇත';
$lang['update_unsuccessful']                 = 'ගිණුම් තොරතුරු යාවත්කාලීන කල නොහැක';
$lang['delete_successful']                   = 'පරිශීලක ඉවත් කර ඇත';
$lang['delete_unsuccessful']                 = 'පරිශීලක ඉවත් කල නොහැක';

// Groups
$lang['group_creation_successful']           = 'සමූහය සාර්ථකව සකස් කර ඇත';
$lang['group_already_exists']                = 'සමූහය නාමය දැනටමත් භාවිතයේ පවතී';
$lang['group_update_successful']             = 'සමූහ තොරතුරු යාවත්කලීන කර ඇත';
$lang['group_delete_successful']             = 'සමූහය ඉවත් කර ඇත';
$lang['group_delete_unsuccessful']           = 'සමූහය ඉවත් කල නොහැක';
$lang['group_delete_notallowed']             = 'පාලක සමූහය ඉවත් කල නොහැක';
$lang['group_name_required']                 = 'සමූහ නාමය අනිවාර්යයි';
$lang['group_name_admin_not_alter']          = 'පාලක සමූහ නාමය වෙනස් කල නොහැක';

// Activation Email
$lang['email_activation_subject']            = 'ගිණුම සක්‍රීය කිරීම';
$lang['email_activate_heading']              = '%s සදහා ගිණුම සක්‍රීය කරන්න';
$lang['email_activate_subheading']           = 'කරුණාකර මෙම යොමුව මත ක්ලික් කරන්න %s.';
$lang['email_activate_link']                 = 'ඔබගේ ගිණුම සක්‍රීය කරන්න';

// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'අමතක වූ මුර පදය  තහවුරු කිරීම';
$lang['email_forgot_password_heading']       = '%s සදහා නැවත මුර පදය සැකසුම';
$lang['email_forgot_password_subheading']    = 'කරුණාකර මෙම යොමුව මත ක්ලික් කරන්න %s.';
$lang['email_forgot_password_link']          = 'ඔබගේ මුර පදය නැවත සැකසුම';

// New Password Email
$lang['email_new_password_subject']          = 'නව මුර පදය';
$lang['email_new_password_heading']          = '%s සදහා නව මුර පදය';
$lang['email_new_password_subheading']       = 'ඔබගේ මුර පදය නැවත සකස් කර ඇත: %s';
