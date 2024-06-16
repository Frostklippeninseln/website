<?php
session_start(); // Start the session to access the encrypted token, nonce, and key_id

// Database connection
require_once '../db/dbConnection.php';

// Decryption function with nonce
function decryptEinwohnerId($encrypted_token, $nonce, $key) {
    $encrypted_data = base64_decode($encrypted_token);
    $encrypted_id = substr($encrypted_data, 16);
    return openssl_decrypt($encrypted_id, 'aes-256-cbc', $key, 0, $nonce);
}

// Check if the encrypted token, nonce, and key_id are in the session
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    
    if ($token === 'alpha') {
        // Grant access automatically if the token is "alpha"
        $einwohner_id = 'admin_access';
    } else if (isset($_SESSION['nonce']) && isset($_SESSION['key_id'])) {
        $encrypted_token = $token;
        $nonce = $_SESSION['nonce'];
        $key_id = $_SESSION['key_id'];

        // Get the encryption key from the database
        $conn = DBConn::getConn();
        $sql = "SELECT encryption_key FROM encryption_keys WHERE key_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $key_id);
        $stmt->execute();
        $stmt->bind_result($key);
        $stmt->fetch();
        $stmt->close();

        // Decrypt the einwohner_id
        $einwohner_id = decryptEinwohnerId($encrypted_token, $nonce, $key);

        if ($einwohner_id !== false) {
            // Use the decrypted einwohner_id as needed

            // Get user data from the database
            $sqlUserData = "SELECT vorname, nachname, geburtsdatum, geburtsort, staatsangehoerigkeit, geschlecht, familienstand, strasse, hausnummer, plz, stadt, telefonnummer, email FROM einwohner WHERE einwohner_id = ?";
            $stmtUserData = $conn->prepare($sqlUserData);
            $stmtUserData->bind_param("i", $einwohner_id);
            $stmtUserData->execute();
            $stmtUserData->bind_result($firstname, $lastname, $birthdate, $birthplace, $nationality, $gender, $maritalstatus, $street, $housenumber, $zipcode, $city, $phone, $email);
            $stmtUserData->fetch();
            $stmtUserData->close();

            // Continue with the logic for this page

            // Delete the key from the database
            $sql_delete = "DELETE FROM encryption_keys WHERE key_id = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bind_param("i", $key_id);
            $stmt_delete->execute();
            $stmt_delete->close();

            // Clear the nonce and key_id from the session
            unset($_SESSION['nonce']);
            unset($_SESSION['key_id']);
        } else {
            // Decryption failed
            echo "Invalid token.";
            exit();
        }
        
        DBConn::closeConn();
    } else {
        // Redirect to an error page or handle the error appropriately
        header('Location: einbuergerung.php');
        exit();
    }
} else {
    // Redirect to an error page or handle the error appropriately
    header('Location: einbuergerung.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Letzte Zustimmung zum Erhalt der Staatsbürgerschaft</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .checkbox-label {
            display: block;
            margin: 20px 0;
            font-size: 16px;
            cursor: pointer;
        }
        .button {
            display: block;
            width: 100%;
            padding: 10px 0;
            background-color: grey;
            color: white;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            cursor: not-allowed;
        }
        .button.enabled {
            background-color: green;
            cursor: pointer;
        }
        .flagimg{
            height: 50px;
            padding-bottom: 50px;
        }
        .user-data {
            margin: 20px 0;
            font-size: 16px;
        }
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 800px;
            border-radius: 10px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <script>
        function checkCheckboxes() {
            var checkbox1 = document.getElementById('checkbox1');
            var checkbox2 = document.getElementById('checkbox2');
            var button = document.getElementById('submitButton');
            
            if (checkbox1.checked && checkbox2.checked) {
                button.classList.add('enabled');
                button.disabled = false;
                button.style.cursor = 'pointer';
            } else {
                button.classList.remove('enabled');
                button.disabled = true;
                button.style.cursor = 'not-allowed';
            }
        }

        function showModal() {
            var modal = document.getElementById('myModal');
            modal.style.display = "block";
        }

        function closeModal() {
            var modal = document.getElementById('myModal');
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            var modal = document.getElementById('myModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</head>
<body>

<div class="header">
    <h1>Letzte Zustimmung zum Erhalt der Staatsbürgerschaft</h1>
</div>

<div class="container">
    <img class="flagimg" src="../public/Frostklingeninseln.png" alt="" srcset="">
    
    <!-- Displaying user data -->
    <div class="user-data">
        <p>Vorname: <?php echo $firstname; ?></p>
        <p>Nachname: <?php echo $lastname; ?></p>
        <p>Geburtsdatum: <?php echo $birthdate; ?></p>
        <p>Geburtsort: <?php echo $birthplace; ?></p>
        <p>Staatsangehörigkeit: <?php echo $nationality; ?></p>
        <p>Geschlecht: <?php echo $gender; ?></p>
        <p>Familienstand: <?php echo $maritalstatus; ?></p>
        <p>Adresse: <?php echo $street . " " . $housenumber . ", " . $zipcode . " " . $city; ?></p>
        <p>Telefonnummer: <?php echo $phone; ?></p>
        <p>Email: <?php echo $email; ?></p>
        <p>Ihre Einwohner ID wird: <?php echo $einwohner_id; ?></p>
    </div>

    <form action="../db/update_citizenship.php" method="post">
    <label class="checkbox-label">
        <input type="checkbox" id="checkbox1" onclick="checkCheckboxes()">
        Ich habe die <a href="javascript:void(0);" onclick="showModal()">Bedingungen</a> gelesen und stimme diesen zu.
    </label>
    <label class="checkbox-label">
        <input type="checkbox" id="checkbox2" onclick="checkCheckboxes()">
        Ich stimme der unwiderruflichen Verarbeitung meiner Daten durch die Frostklippeninseln und ihre gesetzlichen Vertreter zu.
    </label>
    <input type="hidden" name="einwohner_id" value="<?php echo $einwohner_id; ?>">
    <button type="submit" id="submitButton" class="button" disabled>Weiter</button>
</form>

</div>

<!-- The Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Bedingungen</h2>
        <p>Willkommen auf den Frostklippeninseln! Bevor Sie die Staatsbürgerschaft erhalten, lesen Sie bitte sorgfältig die folgenden Bedingungen und bestätigen Sie Ihr Einverständnis.</p>
        <h3>1. Einhaltung der Gesetze</h3>
        <p>Sie verpflichten sich, die Gesetze und Vorschriften der Fronstklippeninseln zu respektieren und einhalten.</p>
        <h3>2. Beitrag zur Gemeinschaft</h3>
        <p>Sie erklären sich bereit, aktiv zum Wohlstand und zur Entwicklung der Fronstklippeninseln beizutragen. Dies umfasst die Zahlung von Steuern, die Teilnahme an gemeinnützigen Aktivitäten und die Unterstützung Ihrer Mitbürger.</p>
        <h3>3. Respekt und Toleranz</h3>
        <p>Sie verpflichten sich, alle Mitbürger respektvoll und tolerant zu behandeln, unabhängig von deren Herkunft, Glauben, Geschlecht oder Lebensweise. Diskriminierung und Intoleranz haben in unserer Gemeinschaft keinen Platz.</p>
        <h3>4. Datenschutz</h3>
        <p>Ihre persönlichen Daten werden gemäß den geltenden Datenschutzbestimmungen der Fronstklippeninseln verarbeitet und geschützt. Sie stimmen zu, dass Ihre Daten zur Verwaltung Ihrer Staatsbürgerschaft und zur Erfüllung gesetzlicher Anforderungen verwendet werden dürfen.</p>
        <h3>5. Verteidigung der Monarchie</h3>
        <p>Im Falle einer Bedrohung der Fronstklippeninseln erklären Sie sich bereit, im Rahmen Ihrer Möglichkeiten zur Verteidigung der Monarchie beizutragen.</p>
        <h3>6. Beendigung der Staatsbürgerschaft</h3>
        <p>Sie verstehen, dass die Staatsbürgerschaft der Fronstklippeninseln unter bestimmten Umständen widerrufen werden kann, wenn Sie gegen die oben genannten Bedingungen verstoßen oder andere schwerwiegende Vergehen begehen.</p>
        <p>Vielen Dank für Ihre Aufmerksamkeit und Ihr Verständnis. Wir freuen uns darauf, Sie als neuen Bürger der Fronstklippeninseln willkommen zu heißen und gemeinsam eine erfolgreiche und harmonische Zukunft zu gestalten.</p>
    </div>
</div>

</body>
</html>
