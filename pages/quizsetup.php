<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Setup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 90%;
        }
        h1 {
            color: #333333;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Überprüfen, ob ein gültiges Token übergeben wurde
        if (isset($_GET['token'])) {
            $token = $_GET['token'];

            // Verbindung zur Datenbank herstellen
            require_once '../db/dbConnection.php';
            $conn = DBConn::getConn(); // Datenbankverbindung erhalten

            try {
                // SQL-Statement vorbereiten
                $sql = "SELECT einwohner_id FROM tokens WHERE token = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $token);
                $stmt->execute();
                $stmt->store_result();

                // Überprüfen, ob ein Datensatz gefunden wurde
                if ($stmt->num_rows > 0) {
                    // Token ist gültig
                    $stmt->bind_result($einwohner_id);
                    $stmt->fetch();
                    $isValidToken = true;
                } else {
                    // Token nicht gefunden oder ungültig
                    $isValidToken = false;
                }

                $stmt->close();

                if ($isValidToken) {
                    echo "<h1>Willkommen zum Quiz Setup</h1>";
                    // Link zur quiz.php mit Token
                    echo "<a class='button' href='quiz.php?token=$token'>Test Starten</a>";
                } else {
                    // Token ist ungültig
                    header('Location: einbuergerung.php');
                    exit();
                }

            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }

            // Verbindung schließen
            DBConn::closeConn(); // Datenbankverbindung schließen

        } else {
            // Token wurde nicht übergeben
            header('Location: einbuergerung.php');
            exit();
        }
        ?>
    </div>
</body>
</html>
