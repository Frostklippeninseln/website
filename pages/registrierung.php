<?php
session_start();

require '../vendor/autoload.php';
use PragmaRX\Countries\Package\Countries;

$countries = new Countries();
$countryList = [];
foreach ($countries->all() as $country) {
    $countryList[$country->cca2] = $country->name->common;
}

// Prüfen, ob das Formular abgeschickt wurde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hier sollten Sie Ihre Validierungslogik einfügen

    // Beispiel: Wenn das Formular valide ist, setzen wir die Session-Variable
    $_SESSION['form_submitted'] = true;

    // Hier können Sie Ihre Logik zum Speichern der Daten hinzufügen

    // Optional: Weiterleitung zur Bestätigungsseite oder einer Dankesseite
    exit();
}

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewerbungsformular</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        textarea,
        select {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        #submit-btn {
            margin-top: 20px;
        }

        .half-width {
            width: calc(50% - 12px);
            display: inline-block;
            margin-right: 10px;
        }

        .gender-group {
            margin-bottom: 10px;
        }

        .gender-label {
            margin-right: 10px;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        /* Unterstützung für Safari */
        * {
            -webkit-user-select: none; /* Safari 3.1+ */
            -moz-user-select: none;    /* Firefox 2+ */
            -ms-user-select: none;     /* IE 10+ */
            user-select: none;         /* Standard-Syntax */
        }
    </style>
</head>
<body>
    <h2>Bewerbungsformular</h2>
    <form id="form1" action="../db/submit_step1.php" method="POST">
        <h3>Persönliche Informationen:</h3>
        <label for="firstname">Vorname:</label>
        <input type="text" id="firstname" name="firstname" required><br>

        <label for="lastname">Nachname:</label>
        <input type="text" id="lastname" name="lastname" required><br>

        <label for="birthdate">Geburtsdatum:</label>
        <input type="date" id="birthdate" name="birthdate" required><br>

        <label for="birthplace">Geburtsort:</label>
        <input type="text" id="birthplace" name="birthplace" required><br>

        <label for="nationality">Staatsangehörigkeit:</label>
        <select id="nationality" name="nationality" required>
            <option value="">Bitte wählen</option>
            <?php
            foreach ($countryList as $code => $name) {
                echo '<option value="' . $code . '">' . $name . '</option>';
            }
            ?>
        </select><br>

        <div class="gender-group">
            <label class="gender-label">Geschlecht:</label>
            <input type="radio" id="male" name="gender" value="male" required>
            <label for="male">Männlich</label>
            <input type="radio" id="female" name="gender" value="female" required>
            <label for="female">Weiblich</label>
            <input type="radio" id="other" name="gender" value="other" required>
            <label for="other">Andere</label>
        </div>

        <label for="maritalstatus">Familienstand:</label>
        <select id="maritalstatus" name="maritalstatus" required>
            <option value="single">Single</option>
            <option value="married">Verheiratet</option>
            <option value="divorced">Geschieden</option>
            <option value="widowed">Verwitwet</option>
        </select><br>

        <h3>Kontaktdaten:</h3>
        <label for="street">Straße:</label>
        <input type="text" id="street" name="street" required><br>
        
        <label for="housenumber">Hausnummer:</label>
        <input type="text" id="housenumber" name="housenumber" required><br>

        <label for="zipcode">PLZ:</label>
        <input type="text" id="zipcode" name="zipcode" required maxlength="5" pattern="[0-9]{5}" title="Bitte geben Sie eine gültige PLZ ein."><br>
        
        <label for="city">Stadt:</label>
        <input type="text" id="city" name="city" required><br>

        <label for="phone">Telefonnummer:</label>
        <input type="tel" id="phone" name="phone" required pattern="[0-9]{10,14}" title="Bitte geben Sie eine gültige Telefonnummer ein (10-14 Ziffern)."><br>

        <label for="email">E-Mail:</label>
        <input type="email" id="email" name="email" required><br>

        <h3>Bildungsabschlüsse</h3>
        <label for="education">Bildungsabschluss:</label>
        <select id="education" name="education" required>
            <option value="" selected disabled>Bitte wählen</option>
            <option value="Hauptschulabschluss">Hauptschulabschluss</option>
            <option value="Mittlere Reife">Mittlere Reife</option>
            <option value="Fachhochschulreife">Fachhochschulreife</option>
            <option value="Abitur">Abitur</option>
            <option value="Bachelor">Bachelor</option>
            <option value="Master">Master</option>
            <option value="Doktor">Doktor</option>
            <option value="Bachelor of Arts">Bachelor of Arts</option>
            <option value="Bachelor of Science">Bachelor of Science</option>
            <option value="Bachelor of Engineering">Bachelor of Engineering</option>
            <option value="Master of Arts">Master of Arts</option>
            <option value="Master of Science">Master of Science</option>
            <option value="Master of Business Administration">Master of Business Administration</option>
            <option value="Doctor of Philosophy">Doctor of Philosophy</option>
            <option value="Doctor of Medicine">Doctor of Medicine</option>
            <option value="Andere">Andere</option>
            <option value="Keine">Keine</option>
        </select><br>

        <label for="education_year">Datum des Bildungsabschlusses:</label>
        <input type="date" id="education_year" name="education_year" required><br>

        <h3>Beruflicher Werdegang</h3>
        <label for="occupation">Beruf:</label>
        <input type="text" id="occupation" name="occupation"><br>

        <label for="occupation_since">Jahr seit wann:</label>
        <input type="number" id="occupation_since" name="occupation_since"><br>

        <h3>Finanzielle Situation</h3>
        <label for="amount">Vermögen (in $):</label>
        <input type="number" id="amount" name="amount" required><br>

        <label for="bank_name">Name der Bank:</label>
        <input type="text" id="bank_name" name="bank_name" required><br>

        <label for="main_income">Haupteinkünfte aus dem angegebenen Beruf (Brutto in $ im Monat):</label>
        <input type="text" id="main_income" name="main_income" required><br>

        <label for="additional_income">Sonstige Nebeneinkünfte (Brutto in $ im Monat):</label>
        <input type="text" id="additional_income" name="additional_income" required><br>

        <h3>Soziale Integration</h3>
        <label for="organization_name">Name der Organisation (falls Mitglied):</label>
        <input type="text" id="organization_name" name="organization_name"><br>

        <label for="position">Position in der Organisation:</label>
        <input type="text" id="position" name="position"><br>

        <label for="member_since">Mitglied seit (Datum):</label>
        <input type="date" id="member_since" name="member_since"><br>

        <input id="submit-btn" type="submit" value="Absenden">
    </form>
</body>
</html>
