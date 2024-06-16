<?php
// PHP-Skript zur Verarbeitung von Formulardaten und Speicherung in der Datenbank

session_start(); // Session starten oder fortsetzen

// Überprüfen, ob die Formular-Daten gesendet wurden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Funktion zur Bereinigung der Eingaben
    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Daten bereinigen und in Session speichern
    $_SESSION['registration_data'] = [
        'firstname' => clean_input($_POST["firstname"]),
        'lastname' => clean_input($_POST["lastname"]),
        'birthdate' => clean_input($_POST["birthdate"]),
        'birthplace' => clean_input($_POST["birthplace"]),
        'nationality' => clean_input($_POST["nationality"]),
        'gender' => clean_input($_POST["gender"]),
        'maritalstatus' => clean_input($_POST["maritalstatus"]),
        'street' => clean_input($_POST["street"]),
        'housenumber' => clean_input($_POST["housenumber"]),
        'zipcode' => clean_input($_POST["zipcode"]),
        'city' => clean_input($_POST["city"]),
        'phone' => clean_input($_POST["phone"]),
        'email' => clean_input($_POST["email"]),
        'education' => clean_input($_POST["education"]),
        'education_year' => clean_input($_POST["education_year"]),
        'occupation' => clean_input($_POST["occupation"]),
        'occupation_since' => clean_input($_POST["occupation_since"]),
        'amount' => clean_input($_POST["amount"]),
        'bank_name' => clean_input($_POST["bank_name"]),
        'main_income' => clean_input($_POST["main_income"]),
        'additional_income' => clean_input($_POST["additional_income"]),
        'organization_name' => clean_input($_POST["organization_name"]),
        'position' => clean_input($_POST["position"]),
        'member_since' => clean_input($_POST["member_since"])
    ];

    // Verbindung zur Datenbank herstellen
    require_once 'dbConnection.php';
    $conn = DBConn::getConn(); // Datenbankverbindung erhalten

    try {
        // Variablen aus der Session extrahieren
        $registration_data = $_SESSION['registration_data'];

        // SQL-Statements für INSERTs in verschiedene Tabellen vorbereiten
        $sqlEinwohner = "INSERT INTO einwohner 
                (vorname, nachname, geburtsdatum, geburtsort, staatsangehoerigkeit, geschlecht, familienstand, strasse, hausnummer, plz, stadt, telefonnummer, email)
                VALUES 
                (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $sqlBildung = "INSERT INTO bildung 
                (bildungsabschluss, jahr_bildungsabschluss, einwohner_id)
                VALUES 
                (?, ?, ?)";
        
        $sqlBeruf = "INSERT INTO beruf 
                (beruf, jahr_seit_wann, haupteinkuenfte, einwohner_id)
                VALUES 
                (?, ?, ?, ?)";
        
        $sqlFinanzen = "INSERT INTO finanzen
                (geldsumme, name_der_bank, sonstige_nebeneinkuenfte, einwohner_id)
                VALUES 
                (?, ?, ?, ?)";
        
        $sqlMitgliedschaft = "INSERT INTO mitgliedschaft 
                (name_der_organisation, position, seit_datum, einwohner_id)
                VALUES 
                (?, ?, ?, ?)";

        // Statements vorbereiten
        $stmtEinwohner = $conn->prepare($sqlEinwohner);
        $stmtBildung = $conn->prepare($sqlBildung);
        $stmtBeruf = $conn->prepare($sqlBeruf);
        $stmtFinanzen = $conn->prepare($sqlFinanzen);
        $stmtMitgliedschaft = $conn->prepare($sqlMitgliedschaft);

        // Parameter binden und Statements ausführen
        // Tabelle "einwohner"
        $stmtEinwohner->bind_param("sssssssssssss",
            $registration_data['firstname'],
            $registration_data['lastname'],
            $registration_data['birthdate'],
            $registration_data['birthplace'],
            $registration_data['nationality'],
            $registration_data['gender'],
            $registration_data['maritalstatus'],
            $registration_data['street'],
            $registration_data['housenumber'],
            $registration_data['zipcode'],
            $registration_data['city'],
            $registration_data['phone'],
            $registration_data['email']
        );
        $stmtEinwohner->execute();

        // ID des letzten eingefügten Datensatzes in "einwohner" abrufen
        $einwohner_id = $stmtEinwohner->insert_id;

        // Tabelle "bildung"
        $stmtBildung->bind_param("ssi",
            $registration_data['education'],
            $registration_data['education_year'],
            $einwohner_id
        );
        $stmtBildung->execute();

        // Tabelle "beruf"
        $stmtBeruf->bind_param("sssi",
            $registration_data['occupation'],
            $registration_data['occupation_since'],
            $registration_data['main_income'],
            $einwohner_id
        );
        $stmtBeruf->execute();

        // Tabelle "finanzen"
        $stmtFinanzen->bind_param("sssi",
            $registration_data['amount'],
            $registration_data['bank_name'],
            $registration_data['additional_income'],
            $einwohner_id
        );
        $stmtFinanzen->execute();

        // Tabelle "mitgliedschaft"
        $stmtMitgliedschaft->bind_param("sssi",
            $registration_data['organization_name'],
            $registration_data['position'],
            $registration_data['member_since'],
            $einwohner_id
        );
        $stmtMitgliedschaft->execute();

        echo "Daten erfolgreich in die Datenbank eingetragen.";

        // Token generieren
        $token = bin2hex(random_bytes(16)); // Erzeugt ein zufälliges 32-Zeichen Hexadezimal-Token

        // SQL-Statement zum Einfügen des Tokens in die Tabelle "tokens"
        $sqlToken = "INSERT INTO tokens (token, einwohner_id) VALUES (?, ?)";
        $stmtToken = $conn->prepare($sqlToken);
        $stmtToken->bind_param("si", $token, $einwohner_id);
        $stmtToken->execute();

        // Weiterleitung zur quizsetup.php mit Token
        $redirect_url = '../pages/quizsetup.php?token=' . $token;
        header('Location: ' . $redirect_url);
        exit();

    } catch(mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }

    // Verbindung schließen
    DBConn::closeConn(); // Datenbankverbindung schließen

    exit();
}
?>
