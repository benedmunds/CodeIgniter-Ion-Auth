<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Name:  Auth Lang - Greek
 *
 * Author: Konstantinos Gkanatsios
 * 		  kgkanatsios@gmail.com
 *
 * Location: https://github.com/benedmunds/CodeIgniter-Ion-Auth
 *
 * Created:  21.07.2020
 *
 * Description:  Greek language file for Ion Auth example views
 *
 */

// Errors
$lang['error_csrf'] = 'Η φόρμα δεν πέρασε με επιτυχία τους ελέγχους ασφαλείας.';

// Login
$lang['login_heading']         = 'Σύνδεση χρήστη';
$lang['login_subheading']      = 'Παρακαλούμε συμπληρώστε την διεύθυνση email/όνομα χρήστη και τον κωδικό πρόσβασης στην παρακάτω φόρμα, για να συνδεθείτε.';
$lang['login_identity_label']  = 'Διεύθυνση Email/Όνομα χρήστη:';
$lang['login_password_label']  = 'Κωδικός πρόσβασης:';
$lang['login_remember_label']  = 'Να με θυμάσαι:';
$lang['login_submit_btn']      = 'Σύνδεση';
$lang['login_forgot_password'] = 'Ξεχάσατε τον κωδικό σας;';

// Index
$lang['index_heading']           = 'Χρήστες';
$lang['index_subheading']        = 'Παρακάτω είναι η λίστα των χρηστών.';
$lang['index_fname_th']          = 'Όνομα';
$lang['index_lname_th']          = 'Επώνυμο';
$lang['index_email_th']          = 'Διεύθυνση Email';
$lang['index_groups_th']         = 'Ομάδες';
$lang['index_status_th']         = 'Κατάσταση';
$lang['index_action_th']         = 'Ενέργειες';
$lang['index_active_link']       = 'Ενεργός';
$lang['index_inactive_link']     = 'Ανενεργός';
$lang['index_edit']              = 'Επεξεργασία';
$lang['index_create_user_link']  = 'Δημιουργήστε ένα νέο χρήστη';
$lang['index_create_group_link'] = 'Δημιουργήστε μία νέα ομάδα';

// Deactivate User
$lang['deactivate_heading']                  = 'Απενεργοποίηση Χρήστη';
$lang['deactivate_subheading']               = 'Θέλετε σίγουρα να απενεργοποιήσετε τον χρήστη \'%s\'';
$lang['deactivate_confirm_y_label']          = 'Ναι:';
$lang['deactivate_confirm_n_label']          = 'Όχι:';
$lang['deactivate_submit_btn']               = 'Υποβολή';
$lang['deactivate_validation_confirm_label'] = 'επιβεβαίωση';
$lang['deactivate_validation_user_id_label'] = 'ID χρήστη';

// Create User
$lang['create_user_heading']                           = 'Δημιουργία Χρήστη';
$lang['create_user_subheading']                        = 'Παρακαλούμε συμπληρώστε παρακάτω τις πληροφορίες του χρήστη.';
$lang['create_user_fname_label']                       = 'Όνομα:';
$lang['create_user_lname_label']                       = 'Επώνυμο:';
$lang['create_user_identity_label']                    = 'Αναγνωριστικό:';
$lang['create_user_company_label']                     = 'Εταιρεία:';
$lang['create_user_email_label']                       = 'Διεύθυνση Email:';
$lang['create_user_phone_label']                       = 'Τηλέφωνο:';
$lang['create_user_password_label']                    = 'Κωδικός πρόσβασης:';
$lang['create_user_password_confirm_label']            = 'Επιβεβαίωση κωδικού πρόσβασης:';
$lang['create_user_submit_btn']                        = 'Δημιουργία Χρήστη';
$lang['create_user_validation_fname_label']            = 'Όνομα';
$lang['create_user_validation_lname_label']            = 'Επώνυμο';
$lang['create_user_validation_identity_label']         = 'Αναγνωριστικό';
$lang['create_user_validation_email_label']            = 'Διεύθυνση Email';
$lang['create_user_validation_phone_label']            = 'Τηλέφωνο';
$lang['create_user_validation_company_label']          = 'Εταιρεία';
$lang['create_user_validation_password_label']         = 'Κωδικός πρόσβασης';
$lang['create_user_validation_password_confirm_label'] = 'Επιβεβαίωση κωδικού πρόσβασης';

// Edit User
$lang['edit_user_heading']                           = 'Επεξεργασία Χρήστη';
$lang['edit_user_subheading']                        = 'Παρακαλούμε συμπληρώστε τα παρακάτω πεδία.';
$lang['edit_user_fname_label']                       = 'Όνομα:';
$lang['edit_user_lname_label']                       = 'Επώνυμο:';
$lang['edit_user_company_label']                     = 'Εταιρεία:';
$lang['edit_user_email_label']                       = 'Διεύθυνση Email:';
$lang['edit_user_phone_label']                       = 'Τηλέφωνο:';
$lang['edit_user_password_label']                    = 'Νέος Κωδικός πρόσβασης:';
$lang['edit_user_password_confirm_label']            = 'Επιβεβαίωση νέου κωδικού πρόσβασης:';
$lang['edit_user_groups_heading']                    = 'Μέλος των ομάδων';
$lang['edit_user_submit_btn']                        = 'Αποθήκευση Χρήστη';
$lang['edit_user_validation_fname_label']            = 'Όνομα';
$lang['edit_user_validation_lname_label']            = 'Επώνυμο';
$lang['edit_user_validation_email_label']            = 'Διεύθυνση Email';
$lang['edit_user_validation_phone_label']            = 'Τηλέφωνο';
$lang['edit_user_validation_company_label']          = 'Εταιρεία';
$lang['edit_user_validation_groups_label']           = 'Ομάδα';
$lang['edit_user_validation_password_label']         = 'Κωδικός πρόσβασης';
$lang['edit_user_validation_password_confirm_label'] = 'Επιβεβαίωση κωδικού πρόσβασης';

// Create Group
$lang['create_group_title']                  = 'Δημιουργία Ομάδας';
$lang['create_group_heading']                = 'Δημιουργία Ομάδας';
$lang['create_group_subheading']             = 'Παρακαλούμε συμπληρώστε τα παρακάτω πεδία.';
$lang['create_group_name_label']             = 'Όνομα Ομάδας:';
$lang['create_group_desc_label']             = 'Περιγραφή:';
$lang['create_group_submit_btn']             = 'Δημιουργία Ομάδας';
$lang['create_group_validation_name_label']  = 'Δημιουργία Ομάδας';
$lang['create_group_validation_desc_label']  = 'Περιγραφή';

// Edit Group
$lang['edit_group_title']                  = 'Επεξεργασία Ομάδας';
$lang['edit_group_saved']                  = 'Η ομάδα αποθηκεύτηκε';
$lang['edit_group_heading']                = 'Επεξεργασία Ομάδας';
$lang['edit_group_subheading']             = 'Παρακαλούμε συμπληρώστε τα παρακάτω πεδία.';
$lang['edit_group_name_label']             = 'Όνομα Ομάδας:';
$lang['edit_group_desc_label']             = 'Περιγραφή:';
$lang['edit_group_submit_btn']             = 'Αποθήκευση Ομάδας';
$lang['edit_group_validation_name_label']  = 'Όνομα Ομάδας';
$lang['edit_group_validation_desc_label']  = 'Περιγραφή';

// Change Password
$lang['change_password_heading']                               = 'Αλλαγή Κωδικού Πρόσβασης';
$lang['change_password_old_password_label']                    = 'Τρέχων Κωδικός Πρόσβασης:';
$lang['change_password_new_password_label']                    = 'Νέος Κωδικός Πρόσβασης (τουλάχιστον %s χαρακτήρες):';
$lang['change_password_new_password_confirm_label']            = 'Επιβεβαίωση Νέου Κωδικού Πρόσβασης:';
$lang['change_password_submit_btn']                            = 'Αλλαγή';
$lang['change_password_validation_old_password_label']         = 'Τρέχων Κωδικός Πρόσβασης';
$lang['change_password_validation_new_password_label']         = 'Νέος Κωδικός Πρόσβασης';
$lang['change_password_validation_new_password_confirm_label'] = 'Επιβεβαίωση Νέου Κωδικού Πρόσβασης';

// Forgot Password
$lang['forgot_password_heading']                 = 'Ανάκτηση κωδικού πρόσβασης';
$lang['forgot_password_subheading']              = 'Παρακαλούμε συμπληρώστε το %s σας, ώστε να σας αποστείλουμε οδηγίες για την ανάκτηση του κωδικού σας.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'Αποστολή';
$lang['forgot_password_validation_email_label']  = 'Email';
$lang['forgot_password_identity_label']          = 'Όνομα χρήστη';
$lang['forgot_password_email_identity_label']    = 'Διεύθυνση Email';
$lang['forgot_password_email_not_found']         = 'Η διεύθυνση email δεν αντιστοιχεί σε κάποιο εγγεγραμμένο χρήστη.';
$lang['forgot_password_identity_not_found']         = 'Το όνομα χρήστη δεν αντιστοιχεί σε κάποιο εγγεγραμμένο χρήστη.';

// Reset Password
$lang['reset_password_heading']                               = 'Αλλαγή Κωδικού Πρόσβασης';
$lang['reset_password_new_password_label']                    = 'Νέος Κωδικός Πρόσβασης (τουλάχιστον %s χαρακτήρες):';
$lang['reset_password_new_password_confirm_label']            = 'Επιβεβαίωση Νέου Κωδικού Πρόσβασης:';
$lang['reset_password_submit_btn']                            = 'Αλλαγή';
$lang['reset_password_validation_new_password_label']         = 'Νέος Κωδικός Πρόσβασης';
$lang['reset_password_validation_new_password_confirm_label'] = 'Επιβεβαίωση Νέου Κωδικού Πρόσβασης';

// Activation Email
$lang['email_activate_heading']    = 'Ενεργοποίηση του λογαριασμού %s';
$lang['email_activate_subheading'] = 'Παρακαλούμε ακολουθήστε τον σύνδεσμο %s.';
$lang['email_activate_link']       = 'Ενεργοποίηση λογαριασμού';

// Forgot Password Email
$lang['email_forgot_password_heading']    = 'Αλλαγή κωδικού πρόσβασης του %s';
$lang['email_forgot_password_subheading'] = 'Παρακαλούμε ακολουθήστε τον σύνδεσμο %s.';
$lang['email_forgot_password_link']       = 'Αλλαγή κωδικού πρόσβασης';
