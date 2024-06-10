<?php
session_start();

// Sitzung zurücksetzen, wenn die Seite neu geladen wird
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset_session'])) {
    session_unset();
    session_destroy();
    session_start();
}

// Initialisiere die Gesamtpunktzahl, wenn noch nicht gesetzt
if (!isset($_SESSION['total_score'])) {
    $_SESSION['total_score'] = 0;
}

// Verbindung zur Datenbank herstellen
require_once '../db/dbConnection.php'; // Stelle sicher, dass die Verbindungsdatei vorhanden ist
$conn = DBConn::getConn();

function getNewQuestion($conn) {
    // Initialisiere die Session-Variablen, wenn sie noch nicht gesetzt sind
    if (!isset($_SESSION['answered_questions'])) {
        $_SESSION['answered_questions'] = array();
    }
    if (!isset($_SESSION['current_question_index'])) {
        $_SESSION['current_question_index'] = 0;
    }

    // Alle Fragen-IDs abrufen
    $sql_all_questions = "SELECT fragen_ID FROM Einbürgerung";
    $result_all_questions = $conn->query($sql_all_questions);

    $all_questions = array();
    if ($result_all_questions->num_rows > 0) {
        while ($row = $result_all_questions->fetch_assoc()) {
            $all_questions[] = $row['fragen_ID'];
        }
    }

    // Mögliche Fragen-IDs filtern, die noch nicht beantwortet wurden
    $available_questions = array_diff($all_questions, $_SESSION['answered_questions']);

    // Prüfen, ob noch Fragen verfügbar sind
    if (empty($available_questions) || $_SESSION['current_question_index'] >= 10) {
        return null; // Keine neuen Fragen mehr oder maximal 10 Fragen erreicht
    }

    // Zufällige Frage-ID auswählen
    $randomQuestionID = $available_questions[array_rand($available_questions)];

    // Frage und Antworten abrufen
    $sql_question = "SELECT * FROM Einbürgerung WHERE fragen_ID = $randomQuestionID";
    $result_question = $conn->query($sql_question);

    if ($result_question->num_rows > 0) {
        $row_question = $result_question->fetch_assoc();

        $sql_correct_answer = "SELECT Antwort FROM Antworten WHERE fragen_ID = $randomQuestionID AND ist_richtig = 1";
        $result_correct_answer = $conn->query($sql_correct_answer);

        $answers = array();

        if ($result_correct_answer->num_rows > 0) {
            $row_correct_answer = $result_correct_answer->fetch_assoc();
            $answers[] = $row_correct_answer['Antwort'];
        }

        $sql_wrong_answers = "SELECT Antwort FROM Antworten WHERE fragen_ID = $randomQuestionID AND ist_richtig = 0 ORDER BY RAND() LIMIT 3";
        $result_wrong_answers = $conn->query($sql_wrong_answers);

        if ($result_wrong_answers->num_rows > 0) {
            while ($row_wrong_answer = $result_wrong_answers->fetch_assoc()) {
                $answers[] = $row_wrong_answer['Antwort'];
            }
        }

        shuffle($answers);
       

        $_SESSION['answered_questions'][] = $randomQuestionID;
        //Schwiergigkeitsgrad abrufen
	$sql_schwierigkeit = "SELECT schwierigkeitsgrad FROM Einbürgerung WHERE fragen_ID = $randomQuestionID";
	$result_schwierigkeit = $conn->query($sql_schwierigkeit);

	if ($result_schwierigkeit->num_rows > 0) {
	    $row_schwierigkeit = $result_schwierigkeit->fetch_assoc();
	    $schwierigkeit = $row_schwierigkeit['schwierigkeitsgrad'];
	}

        return array('frage' => $row_question["frage"], 'answers' => $answers, 'frage_id' => $randomQuestionID); // hinzugefügt
    } else {
        return null;
    }
}

$currentQuestion = getNewQuestion($conn);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fragebogen</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #f0f0f0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 90%;
            max-width: 800px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-sizing: border-box;
        }
        .points {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .point {
            width: 10px;
            height: 10px;
            margin: 0 5px;
            background-color: gray;
            border-radius: 50%;
        }
        .point.active {
            background-color: blue;
        }
        .question {
            margin-bottom: 20px;
            color: blue;
            text-align: left;
        }
        .answers {
            list-style-type: none;
            padding: 0;
            text-align: left;
        }
        .answers li {
            margin: 10px 0;
        }
        .answers input[type="radio"] {
            margin-right: 10px;
        }
        .submit-container {
            display: flex;
            justify-content: flex-end;
        }
        .submit-btn, .submit-all-btn {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .finished-text {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: green;
            display: none;
        }
    </style>
</head>
<body>
   <div class="container" style="position: relative;">
    <!-- PHP hier beibehalten -->
    <!-- HTML hier beibehalten -->
    <?php if ($currentQuestion): ?>
        <div class="question">
            <h2><?php echo $currentQuestion['frage']; ?></h2>
            <ul class="answers">
                <?php foreach ($currentQuestion['answers'] as $answer): ?>
                    <li><label><input type="radio" name="answer" value="<?php echo $answer; ?>"> <?php echo $answer; ?></label></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php else: ?>
        <div class="finished-text">Der Test ist abgeschlossen. Vielen Dank!</div>
    <?php endif; ?>
    <!-- HTML hier beibehalten -->
    <div class="submit-container">
        <?php if ($currentQuestion): ?>
            <button class="submit-btn" onclick="submitAnswer()">Absenden</button>
        <?php else: ?>
            <button class="submit-all-btn" onclick="submitAll()">Alles Absenden</button>
        <?php endif; ?>
    </div>
    <!-- Schwierigkeitsgrad wird links unten angezeigt -->
    <?php if (isset($schwierigkeit)) {
        echo "<p style=\"position: absolute; bottom: 10px; left: 10px;\">Schwierigkeitsgrad: $schwierigkeit</p>";
    } ?>
</div>
    </div>

    <form id="resetForm" method="POST" style="display: none;">
        <input type="hidden" name="reset_session" value="1">
    </form>

    <script>
        function submitAnswer() {
            // Fortschritt speichern und Seite neu laden, um eine neue Frage zu generieren
            fetch('update_progress.php', { method: 'POST' })
                .then(response => {
                    if (response.ok) {
                        return response.text();
                    } else {
                        throw new Error('Network response was not ok.');
                    }
                })
                .then(text => {
                    if (text === 'redirect') {
                        window.location.href = 'ergebnis.html';
                    } else {
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }

        function submitAll() {
            document.querySelector('.finished-text').style.display = 'block';
        }

        // Session zurücksetzen, wenn die Seite verlassen wird
        window.addEventListener('beforeunload', function() {
            document.getElementById('resetForm').submit();
        });
    </script>
</body>
</html>

