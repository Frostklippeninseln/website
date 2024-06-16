<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['message'])) {
    $message = $_POST['message'];
    $logFile = '../logs/widgetlog.txt';
    
    // Öffnen oder erstellen Sie die Log-Datei im Schreibmodus (append)
    $fp = fopen($logFile, 'a');
    
    // Schreiben Sie die Nachricht in die Datei mit Datum/Uhrzeit
    fwrite($fp, "[" . date('Y-m-d H:i:s') . "] " . $message . PHP_EOL);
    
    // Datei schließen
    fclose($fp);
    
    // Rückmeldung an den Client, dass die Nachricht erfolgreich geloggt wurde
    echo "Log message successfully recorded.";
} else {
    // Fehlerbehandlung, falls Nachricht nicht übergeben wurde oder Methode nicht POST ist
    echo "Error: Invalid request.";
}
?>
