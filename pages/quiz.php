<?php
session_start(); // Start the session to access saved questions and score

// Database connection
require_once '../db/dbConnection.php';

// Check if the token is provided and valid
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $conn = DBConn::getConn(); // Get the database connection

    try {
        // Prepare SQL statement to check the token
        $sql = "SELECT einwohner_id FROM tokens WHERE token = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $stmt->store_result();

        // Check if a record is found
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($einwohner_id);
            $stmt->fetch();
            $_SESSION['einwohner_id'] = $einwohner_id; // Store user ID in session
            $_SESSION['token'] = $token; // Store token in session

            // Clear the questions and max score from the session to ensure new questions are generated
            unset($_SESSION['fragen']);
            unset($_SESSION['maximalpunktzahl']);
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
} elseif (!isset($_SESSION['token'])) {
    // If no token is provided and no token in session, redirect to initial setup
    header('Location: einbuergerung.php');
    exit();
}

// Einbürgerungstest class
class Einbuergerungstest {

    // Method to get a random question from the database
    public static function getRandomQuestion() {
        $conn = DBConn::getConn();

        // SQL query for random questions with difficulty level (here 10 questions)
        $sql_question = "SELECT fragen_ID, frage, schwierigkeitsgrad FROM einbürgerung ORDER BY RAND() LIMIT 10";
        $result_question = $conn->query($sql_question);

        $fragen = [];

        if ($result_question && $result_question->num_rows > 0) {
            // Convert query results to an array
            while ($row_question = $result_question->fetch_assoc()) {
                $fragen_ID = $row_question['fragen_ID'];

                // SQL query for random answers to the given question
                $sql_answers = "SELECT antwort, ist_richtig FROM antworten WHERE fragen_ID = $fragen_ID ORDER BY RAND() LIMIT 4";
                $result_answers = $conn->query($sql_answers);

                if ($result_answers && $result_answers->num_rows == 4) {
                    $answers = [];
                    while ($row_answer = $result_answers->fetch_assoc()) {
                        $answers[] = $row_answer;
                    }

                    shuffle($answers); // Shuffle answers to ensure correct answer is not always first

                    // Add question and answers to the questions array
                    $fragen[$fragen_ID] = [
                        'frage' => $row_question['frage'],
                        'schwierigkeitsgrad' => $row_question['schwierigkeitsgrad'],
                        'antworten' => $answers,
                        'richtige_antwort' => array_search(1, array_column($answers, 'ist_richtig'))
                    ];
                }
            }
        }

        return $fragen; // Return array with questions (empty if none found)
    }
}

// Function to calculate the total score
function berechneGesamtpunktzahl($antworten, $fragen) {
    $gesamtpunktzahl = 0;
    foreach ($antworten as $frage_ID => $antwort) {
        if ($antwort == $fragen[$frage_ID]['richtige_antwort']) {
            $gesamtpunktzahl += $fragen[$frage_ID]['schwierigkeitsgrad'];
        }
    }
    return $gesamtpunktzahl;
}

// Function to calculate the maximum possible score
function berechneMaximalpunktzahl($fragen) {
    $maximalpunktzahl = 0;
    foreach ($fragen as $frage) {
        $maximalpunktzahl += $frage['schwierigkeitsgrad'];
    }
    return $maximalpunktzahl;
}

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['antworten']) && is_array($_POST['antworten'])) {
        $antworten = $_POST['antworten'];
        $_SESSION['punktzahl'] = berechneGesamtpunktzahl($antworten, $_SESSION['fragen']);

        header('Location: ergebnis.php');
        exit();
    }
}

// Get random questions and answers if not already stored in the session
if (!isset($_SESSION['fragen']) || empty($_SESSION['fragen'])) {
    $_SESSION['fragen'] = Einbuergerungstest::getRandomQuestion();
    $_SESSION['maximalpunktzahl'] = berechneMaximalpunktzahl($_SESSION['fragen']);
}

if (empty($_SESSION['fragen'])) {
    echo "Es wurden keine Fragen gefunden. Bitte versuchen Sie es später erneut.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Einbürgerungstest</title>
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
        .timer-bar {
            background-color: #4CAF50;
            height: 10px;
            width: 100%;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .frage-box {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            position: relative;
        }
        .frage-box h3 {
            margin-bottom: 10px;
            font-size: 18px;
        }
        .antworten {
            margin-bottom: 10px;
        }
        .antworten label {
            display: block;
            margin-bottom: 10px;
        }
        .punkte {
            position: absolute;
            bottom: 5px;
            right: 5px;
            font-size: 14px;
            color: #666;
        }
        .absenden {
            text-align: center;
            margin-top: 20px;
        }
        .absenden button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .absenden button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Einbürgerungstest</h1>
</div>

<div class="timer-bar"></div>

<div class="container">
    <form id="fragebogenForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <?php foreach ($_SESSION['fragen'] as $frage_ID => $frage): ?>
        <div class="frage-box">
            <h3><?php echo $frage['frage']; ?></h3>
            <p class="schwierigkeit">Punkte: <?php echo $frage['schwierigkeitsgrad']; ?></p>
            <div class="antworten">
                <?php foreach ($frage['antworten'] as $index => $antwort): ?>
                <label>
                    <input type="radio" name="antworten[<?php echo $frage_ID; ?>]" value="<?php echo $index; ?>">
                    <?php echo $antwort['antwort']; ?>
                </label>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>
        <div class="absenden">
            <button type="submit">Absenden</button>
        </div>
    </form>
</div>

</body>
</html>
