<?php
session_start(); // Start session to access previously stored session data

// Database connection
require_once '../db/dbConnection.php';

// Function to decrypt einwohner_id using stored session data
function decryptEinwohnerIdFromSession(&$einwohner_id) {
    // Check if encrypted token and einwohner_id are in session
    if (isset($_SESSION['encrypted_token']) && isset($_SESSION['einwohner_id'])) {
        $encrypted_token = $_SESSION['encrypted_token'];
        $einwohner_id = $_SESSION['einwohner_id'];

        // Get the nonce and key_id from session (if needed)
        $nonce = $_SESSION['nonce'];
        $key_id = $_SESSION['key_id'];

        // Get the encryption key from the database (if key_id is used)
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

        if ($einwohner_id === false) {
            // Decryption failed
            echo "Decryption failed. Please try again.";
            exit();
        }
    } else {
        // If session data is not complete, redirect or handle appropriately
        header('Location: einbuergerung.php');
        exit();
    }
}

// Initialize einwohner_id variable
$einwohner_id = null;

// Decrypt einwohner_id from session
decryptEinwohnerIdFromSession($einwohner_id);

// Close database connection
DBConn::closeConn();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Writer</title>
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
    </style>
</head>
<body>

<div class="header">
    <h1>Document Writer</h1>
</div>

<div class="container">
    <h2>Decrypted Einwohner ID:</h2>
    <p><?php echo htmlspecialchars($einwohner_id); ?></p>
    
    <a href="final_step.php" class="button enabled">Proceed to Final Step</a>
</div>

</body>
</html>
