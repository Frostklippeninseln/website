<?php
session_start(); // Session starten oder fortsetzen

// Sicherstellen, dass die Session-Variablen gesetzt sind
if (isset($_SESSION['registration_data'])) {
    // Variablen aus der Session extrahieren
    $registration_data = $_SESSION['registration_data'];

    // Hier das HTML-Formular für den zweiten Schritt
    // Beispiel:
    ?>
    <form action="submit_upload.php" method="POST" enctype="multipart/form-data">
        <!-- Hier die Formularfelder für den Upload -->
        <input type="file" name="upload_file">
        <input type="submit" value="Hochladen">
    </form>
    <?php

} else {
    echo "Session-Daten fehlen. Bitte überprüfen Sie Ihre Formulareingaben.";
}
?>
