<?php
session_start();

// Fortschritt um 1 erhöhen
if (!isset($_SESSION['current_question_index'])) {
    $_SESSION['current_question_index'] = 0;
}
$_SESSION['current_question_index']++;

// Prüfen, ob alle Fragen beantwortet wurden
if ($_SESSION['current_question_index'] >= 10) {
    session_unset(); // Session-Daten löschen
    session_destroy(); // Session zerstören
    echo 'redirect'; // Signalisiert dem Client, zur ergebnis.html weiterzuleiten
} else {
    echo 'OK';
}
?>

