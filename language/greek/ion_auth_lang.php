<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Name:  Ion Auth Lang - Greek
 *
 * Author: Konstantinos Gkanatsios
 * 		  kgkanatsios@gmail.com
 *
 * Location: https://github.com/benedmunds/CodeIgniter-Ion-Auth
 *
 * Created:  21.07.2020
 *
 * Description:  Greek language file for Ion Auth messages and errors
 *
 */

// Account Creation
$lang['account_creation_successful']            = 'Ο Λογαριασμός Δημιουργήθηκε Επιτυχώς';
$lang['account_creation_unsuccessful']           = 'Αδυναμία Δημιουργίας Λογαριασμού';
$lang['account_creation_duplicate_email']      = 'Η διεύθυνση Email χρησιμοποιείται ήδη ή είναι λάθος';
$lang['account_creation_duplicate_identity']      = 'Το όνομα χρήστη υπάρχει ήδη ή είναι λάθος';

// TODO Please Translate
$lang['account_creation_missing_default_group'] = 'Δεν έχετε ορίσει προεπιλεγμένη ομάδα';
$lang['account_creation_invalid_default_group'] = 'Μη έγκυρο όνομα προεπιλεγμένης ομάδας';


// Password
$lang['password_change_successful']           = 'Επιτυχής Αλλαγή Κωδικού Πρόσβασης';
$lang['password_change_unsuccessful']            = 'Αδυναμία Αλλαγής Κωδικού Πρόσβασης';
$lang['forgot_password_successful']           = 'Εστάλη Email για την Επαναφορά του Κωδικού Πρόσβασης';
$lang['forgot_password_unsuccessful']           = 'Αδυναμία Επαναφοράς Κωδικού Πρόσβασης';

// Activation
$lang['activate_successful']                = 'Ο Λογαριασμός Ενεργοποιήθηκε Επιτυχώς';
$lang['activate_unsuccessful']               = 'Αδυναμία Ενεργοποίησης Λογαριασμού';
$lang['deactivate_successful']                = 'Ο Λογαριασμός Απενεργοποιήθηκε Επιτυχώς';
$lang['deactivate_unsuccessful']            = 'Αδυναμία Απενεργοποίησης Λογαριασμού';
$lang['activation_email_successful']            = 'Εστάλη Email για την Ενεργοποίηση του Λογαριασμού';
$lang['activation_email_unsuccessful']        = 'Αδυναμία Αποστολής Email Ενεργοποίησης του Λογαριασμού';

// Login / Logout
$lang['login_successful']                = 'Συνδεθήκατε Επιτυχώς';
$lang['login_unsuccessful']                = 'Λάθος Στοιχεία Σύνδεσης';
$lang['login_unsuccessful_not_active']          = 'Ο Λογαριασμός σας είναι ανενεργός';
$lang['login_timeout']                       = 'Ο Λογαριασμός σας έχει Κλειδωθεί Προσωρινά. Παρακαλούμε Δοκιμάστε αργότερα.';
$lang['logout_successful']               = 'Αποσυνδεθήκατε Επιτυχώς';

// Account Changes
$lang['update_successful']               = 'Οι Πληροφορίες του Λογαριασμού Ενημερώθηκαν Επιτυχώς';
$lang['update_unsuccessful']               = 'Αδυναμία Ενημέρωσης Πληροφοριών Λογαριασμού';
$lang['delete_successful']               = 'Ο Λογαριασμός Διαγράφηκε Επιτυχώς';
$lang['delete_unsuccessful']               = 'Αδυναμία Διαγραφής Λογαριασμού';
$lang['deactivate_current_user_unsuccessful'] = 'Δεν Μπορείτε να Απενεργοποιήσετε τον Λογαριασμό σας.';

// Groups
$lang['group_creation_successful']  = 'Η Ομάδα Δημιουργήθηκε Επιτυχώς';
$lang['group_already_exists']       = 'Υπάρχει ήδη ομάδα με το συγκεκριμένο όνομα';
$lang['group_update_successful']    = 'Η Ομάδα Ανανεώθηκε Επιτυχώς';
$lang['group_delete_successful']    = 'Η Ομάδα Διαγράφηκε Επιτυχώς';
$lang['group_delete_unsuccessful']     = 'Αδυναμία Διαγραφής Ομάδας';
$lang['group_delete_notallowed']    = 'Δεν μπορείτε να διαγράψετε την ομάδα των διαχειριστών';
$lang['group_name_required']         = 'Το Όνομα Ομάδας είναι Υποχρεωτικό';
$lang['group_name_admin_not_alter'] = 'Το Όνομα της Ομάδας των Διαχειριστών δεν Μπορεί να Τροποποιηθεί';

// Activation Email
$lang['email_activation_subject']            = 'Ενεργοποίηση Λογαριασμού';
$lang['email_activate_heading']    = 'Ενεργοποίηση του λογαριασμού %s';
$lang['email_activate_subheading'] = 'Παρακαλούμε ακολουθήστε τον σύνδεσμο %s.';
$lang['email_activate_link']       = 'Ενεργοποίηση λογαριασμού';
// Forgot Password Email
$lang['email_forgotten_password_subject']    = 'Ανάκτηση κωδικού πρόσβασης';
$lang['email_forgot_password_heading']    = 'Αλλάξτε τον κωδικό πρόσβαση του %s';
$lang['email_forgot_password_subheading'] = 'Παρακαλούμε ακολουθήστε τον σύνδεσμο %s.';
$lang['email_forgot_password_link']       = 'Αλλαγή κωδικού πρόσβασης';
