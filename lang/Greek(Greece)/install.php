<?php
/*
 *
 * OGP - Open Game Panel
 * Copyright (C) 2008 - 2018 The OGP Development Team
 *
 * http://www.opengamepanel.org/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 */

define('OGP_LANG_install_lang', "Επιλέξτε τη γλώσσα που προτιμάτε");
define('OGP_LANG_install_welcome', "Καλώς ήρθατε στον εγκαταστάτη Open Game Panel");
define('OGP_LANG_file_permission_check', "Έλεγχος των απαιτούμενων δικαιωμάτων αρχείων");
define('OGP_LANG_OK', "OK");
define('OGP_LANG_write_permission_required', "Απαιτείται άδεια εγγραφής");
define('OGP_LANG_execute_permission_required', "Απαιτείται άδεια εκτέλεσης");
define('OGP_LANG_create_an_empty_file', "Δημιουργήστε ένα κενό αρχείο.");
define('OGP_LANG_found', "Βρέθηκε");
define('OGP_LANG_not_found', "Δεν βρέθηκε");
define('OGP_LANG_pear_xxtea_info', "Το Pear Crypt_XXTEA απαιτείται για χρήση OGP. Στις περισσότερες διανομές Linux αυτή η λειτουργική μονάδα μπορεί να εγκατασταθεί με την ακόλουθη εντολή Pear 'pear install Crypt_XXTEA-beta'.");
define('OGP_LANG_refresh', "Ανανεώστε");
define('OGP_LANG_checking_required_modules', "Έλεγχος των απαιτούμενων λειτουργικών μονάδων");
define('OGP_LANG_checking_optional_modules', "Έλεγχος προαιρετικών λειτουργικών μονάδων");
define('OGP_LANG_database_type', "Τύπος βάσης δεδομένων");
define('OGP_LANG_database_settings', "Ρυθμίσεις πρόσβασης βάσης δεδομένων");
define('OGP_LANG_database_hostname', "Όνομα κεντρικού υπολογιστή βάσης δεδομένων");
define('OGP_LANG_database_username', "Όνομα χρήστη βάσης δεδομένων");
define('OGP_LANG_database_password', "Κωδικός πρόσβασης βάσης δεδομένων");
define('OGP_LANG_database_name', "Ονομα βάσης δεδομένων");
define('OGP_LANG_database_prefix', "Πρόθεμα βάσης δεδομένων");
define('OGP_LANG_next', "Επόμενο");
define('OGP_LANG_encryption_key', "Κλειδί κρυπτογράφησης (Agent)");
define('OGP_LANG_agent_port', "Θύρα (Agent)");
define('OGP_LANG_unable_to_write_config', "Δεν είναι δυνατή η εγγραφή στο αρχείο διαμορφώσεων. Ελέγξτε ξανά την άδεια εγγραφής.");
define('OGP_LANG_admin_login_details', "Στοιχεία σύνδεσης για διαχειριστές");
define('OGP_LANG_config_written', "Τα αρχεία διαμορφώσεων δημιουργήθηκαν με επιτυχία.");
define('OGP_LANG_database_created', "Οι πίνακες βάσης δεδομένων δημιουργήθηκαν με επιτυχία.");
define('OGP_LANG_admin_login_details_info', "Τώρα δημιουργούμε το χρήστη διαχειριστή για το Open Game Panel σας.");
define('OGP_LANG_username', "Όνομα χρήστη");
define('OGP_LANG_repeat_password', "Επαναλάβετε τον κωδικό πρόσβασης");
define('OGP_LANG_email', "Διεύθυνση ηλεκτρονικού ταχυδρομείου");
define('OGP_LANG_back', "Πίσω");
define('OGP_LANG_database_setup_failure', "Η εγκατάσταση δεν μπόρεσε να δημιουργήσει τη βάση δεδομένων. Ελέγξτε ξανά τα αρχεία διαμορφώσεων της βάσης δεδομένων.");
define('OGP_LANG_php_version_check', "Έλεγχος της έκδοσης PHP");
define('OGP_LANG_invalid_username', "Πληκτρολογήσατε μη έγκυρο όνομα χρήστη.");
define('OGP_LANG_password_too_short', "Ο κωδικός πρόσβασής σας είναι πολύ μικρός. Πρέπει να έχει μήκος τουλάχιστον '%d' χαρακτήρες.");
define('OGP_LANG_password_contains_invalid_characters', "Ο κωδικός πρόσβασής σας περιέχει μη έγκυρους χαρακτήρες.");
define('OGP_LANG_invalid_email_address', "Εισήγατε μη έγκυρη διεύθυνση ηλεκτρονικού ταχυδρομείου.");
define('OGP_LANG_setup_complete', "Η εγκατάσταση ολοκληρώθηκε με επιτυχία. Το Open Game Panel είναι έτοιμο για χρήση.");
define('OGP_LANG_remove_install_and_secure_config', "Θα πρέπει να διαγράψετε το install.php από το διακομιστή σας και να κάνετε chmod το includes/config.inc.php πίσω σε 644 για λόγους ασφαλείας.");
define('OGP_LANG_go_to_panel', "Κάντε κλικ εδώ για να συνδεθείτε στο OGP σας.");
define('OGP_LANG_unable_to_resolve', "Αν δεν μπορείτε να επιλύσετε αυτό το πρόβλημα, παρακαλώ επισκεφθείτε την ιστοσελίδα του OGP.");
define('OGP_LANG_slogan', "Αυτό του ανοιχτού κώδικα!");
define('OGP_LANG_default_welcome_title_message', "Καλως ήρθατε! <b style='font-size:12px; font-weight:normal;'>Μπορείτε να αλλάξετε αυτόν τον τίτλο στις '<a href='?m=settings&p=themes'>Ρυθμίσεις Θέματος</a>' κάτω από την καρτέλα '<a href='?m=administration&p=main'>Διαχείριση</a>'.</b>");
?>
