<?php
session_start(); // Start the session to access saved score and max score

// Database connection
require_once '../db/dbConnection.php';

// Encryption function with nonce
function encryptEinwohnerId($einwohner_id, &$nonce, &$key_id) {
    $key = bin2hex(random_bytes(16)); // Generate a random key
    $nonce = openssl_random_pseudo_bytes(16);
    $encrypted = openssl_encrypt($einwohner_id, 'aes-256-cbc', $key, 0, $nonce);
    $encrypted_token = base64_encode($nonce . $encrypted);

    // Store the key in the database
    $conn = DBConn::getConn();
    $sql = "INSERT INTO encryption_keys (encryption_key) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $key);
    $stmt->execute();
    $key_id = $stmt->insert_id;
    $stmt->close();

    return $encrypted_token;
}

// Check if the total score and max score are in the session
if (isset($_SESSION['punktzahl'])) {
    $gesamtpunktzahl = $_SESSION['punktzahl'];
} else {
    $gesamtpunktzahl = 0; // Default value if no score is saved
}

if (isset($_SESSION['maximalpunktzahl'])) {
    $maximalpunktzahl = $_SESSION['maximalpunktzahl'];
} else {
    $maximalpunktzahl = 0; // Default value if no max score is saved
}

// Calculate percentage
if ($maximalpunktzahl > 0) {
    $percent = ($gesamtpunktzahl / $maximalpunktzahl) * 100;
} else {
    $percent = 0;
}

// Determine if user passed or not
if ($percent >= 80) {
    $message = "Herzlichen Glückwunsch! Sie haben $percent% richtig beantwortet und können fortfahren.";
    $button_text = "Weiter";
    $button_color = "green";
} else {
    $message = "Leider haben Sie nur $percent% von den geforderten 80% erreicht. Leider können wir Ihnen derzeit keinen Platz anbieten.";
    $button_text = "Zurück";
    $button_color = "red";
}

// Check if the token is in the session
if (isset($_SESSION['token'])) {
    $token = $_SESSION['token'];
    $conn = DBConn::getConn(); // Get the database connection

    try {
        // Prepare SQL statement to get the einwohner_id from the token
        $sql = "SELECT einwohner_id FROM tokens WHERE token = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $stmt->store_result();

        // Check if a record is found
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($einwohner_id);
            $stmt->fetch();

            // Encrypt the einwohner_id with a random nonce and key
            $nonce = '';
            $key_id = 0;
            $encrypted_einwohner_id = encryptEinwohnerId($einwohner_id, $nonce, $key_id);

            // Store the nonce and key_id in the session for decryption on the next page
            $_SESSION['nonce'] = $nonce;
            $_SESSION['key_id'] = $key_id;

            // Remove the token from the database to ensure it can't be used again
            $sql_delete = "DELETE FROM tokens WHERE token = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bind_param("s", $token);
            $stmt_delete->execute();
            $stmt_delete->close();

            // Store the encrypted token in the session
            $_SESSION['new_token'] = $encrypted_einwohner_id;
        } else {
            // Token not found or invalid
            header('Location: einbuergerung.php');
            exit();
        }

        $stmt->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    DBConn::closeConn(); // Close the database connection
} else {
    // If no token is provided in session, redirect to initial setup
    header('Location: einbuergerung.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ergebnis des Einbürgerungstests</title>
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
            text-align: center;
        }
        .score {
            font-size: 24px;
            margin: 20px 0;
        }
        .max-score {
            font-size: 20px;
            margin: 20px 0;
            color: #666;
        }
        .message {
            margin-bottom: 20px;
            color: <?php echo $button_color === 'green' ? 'green' : 'red'; ?>;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: <?php echo $button_color; ?>;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Ergebnis des Einbürgerungstests</h1>
</div>

<div class="container">
    <div class="score">
        <p>Ihre Punktzahl: <?php echo $gesamtpunktzahl; ?></p>
    </div>
    <div class="max-score">
        <p>Maximale Punktzahl: <?php echo $maximalpunktzahl; ?></p>
    </div>
    <div class="message">
        <p><?php echo $message; ?></p>
    </div>
    <div class="next-page">
    <a href="<?php echo $button_text === 'Weiter' ? 'welcome_inside.php?token=' . $_SESSION['new_token'] : 'einbuergerung.php'; ?>" class="button"><?php echo $button_text; ?></a>
</div>
</div>

</body>
</html>
