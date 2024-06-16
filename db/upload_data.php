<?php
session_start(); // Session starten oder fortsetzen

// Überprüfen, ob die Session-Daten gesetzt sind, ansonsten Weiterleitung zur Registrierung
if (!isset($_SESSION['registration_data'])) {
    header("Location: registrierung.php");
    exit();
}

// Verbindung zur Datenbank herstellen
require_once 'dbConnection.php';

if (!$conn) {
    die("Connection failed: " . $conn->errorInfo());
}

try {
    // Variablen aus der Session extrahieren
    $registration_data = $_SESSION['registration_data'];

    // Vorbereitung des SQL-Statements für die Registrierung
    $sql = "INSERT INTO applicant_details 
            (firstname, lastname, birthdate, birthplace, nationality, gender, maritalstatus, street, housenumber, zipcode, city, phone, email, education, education_year, occupation, occupation_since, amount, bank_name, main_income, additional_income, organization_name, position, member_since)
            VALUES 
            (:firstname, :lastname, :birthdate, :birthplace, :nationality, :gender, :maritalstatus, :street, :housenumber, :zipcode, :city, :phone, :email, :education, :education_year, :occupation, :occupation_since, :amount, :bank_name, :main_income, :additional_income, :organization_name, :position, :member_since)";

    // Statement vorbereiten
    $stmt = $conn->prepare($sql);

    // Parameter binden
    $stmt->bindParam(':firstname', $registration_data['firstname']);
    $stmt->bindParam(':lastname', $registration_data['lastname']);
    $stmt->bindParam(':birthdate', $registration_data['birthdate']);
    $stmt->bindParam(':birthplace', $registration_data['birthplace']);
    $stmt->bindParam(':nationality', $registration_data['nationality']);
    $stmt->bindParam(':gender', $registration_data['gender']);
    $stmt->bindParam(':maritalstatus', $registration_data['maritalstatus']);
    $stmt->bindParam(':street', $registration_data['street']);
    $stmt->bindParam(':housenumber', $registration_data['housenumber']);
    $stmt->bindParam(':zipcode', $registration_data['zipcode']);
    $stmt->bindParam(':city', $registration_data['city']);
    $stmt->bindParam(':phone', $registration_data['phone']);
    $stmt->bindParam(':email', $registration_data['email']);
    $stmt->bindParam(':education', $registration_data['education']);
    $stmt->bindParam(':education_year', $registration_data['education_year']);
    $stmt->bindParam(':occupation', $registration_data['occupation']);
    $stmt->bindParam(':occupation_since', $registration_data['occupation_since']);
    $stmt->bindParam(':amount', $registration_data['amount']);
    $stmt->bindParam(':bank_name', $registration_data['bank_name']);
    $stmt->bindParam(':main_income', $registration_data['main_income']);
    $stmt->bindParam(':additional_income', $registration_data['additional_income']);
    $stmt->bindParam(':organization_name', $registration_data['organization_name']);
    $stmt->bindParam(':position', $registration_data['position']);
    $stmt->bindParam(':member_since', $registration_data['member_since']);

    // Statement ausführen
    $stmt->execute();

    echo "Daten erfolgreich in die Datenbank eingetragen.";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Verbindung schließen
$conn = null;

// Session-Daten löschen, da sie nicht mehr benötigt werden
unset($_SESSION['registration_data']);
?>
