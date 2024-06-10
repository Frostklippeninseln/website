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
    <div class="container">
        <div class="points">
            <div class="point"></div>
            <div class="point"></div>
            <div class="point"></div>
            <div class="point"></div>
            <div class="point"></div>
            <div class="point"></div>
            <div class="point"></div>
            <div class="point"></div>
            <div class="point"></div>
            <div class="point"></div>
        </div>
        
        <?php
    // Verbindung zur Datenbank herstellen
    require_once '../db/dbConnection.php'; // Stelle sicher, dass die Verbindungsdatei vorhanden ist
    $conn = DBConn::getConn();

    // Generiere eine Zufallszahl zwischen 1 und 20
    $randomQuestionID = mt_rand(1, 20);

    // Debugging-Nachricht für die generierte Zufallszahl
    echo "Zufallszahl für Frage-ID: " . $randomQuestionID . "<br>";

    // SQL-Abfrage, um die Frage mit der generierten Zufalls-ID abzurufen
    $sql_question = "SELECT * FROM Einbürgerung WHERE fragen_ID = $randomQuestionID";
    $result_question = $conn->query($sql_question);

    // Debugging-Nachricht für die SQL-Abfrage der Frage
    echo "SQL-Abfrage für Frage: " . $sql_question . "<br>";

    // Prüfe, ob die Frage vorhanden ist
    if ($result_question->num_rows > 0) {
        // Frage aus dem Abfrageergebnis abrufen
        $row_question = $result_question->fetch_assoc();

        // Die richtige Antwort für die Frage aus der Datenbank abrufen
        $sql_correct_answer = "SELECT Antwort FROM Antworten WHERE fragen_ID = $randomQuestionID AND ist_richtig = 1";
        $result_correct_answer = $conn->query($sql_correct_answer);

        // Debugging-Nachricht für die Frage aus der Datenbank
        echo "Frage aus Datenbank: " . $row_question["frage"] . "<br>";

        // Array zum Speichern aller Antwortmöglichkeiten initialisieren
        $answers = array();

        // Die richtige Antwort hinzufügen
        if ($result_correct_answer->num_rows > 0) {
            $row_correct_answer = $result_correct_answer->fetch_assoc();
            $answers[] = $row_correct_answer['Antwort'];
        }

        // Falsche Antworten aus der Datenbank abrufen
        $sql_wrong_answers = "SELECT Antwort FROM Antworten WHERE fragen_ID != $randomQuestionID ORDER BY RAND() LIMIT 2";
        $result_wrong_answers = $conn->query($sql_wrong_answers);

        // Falsche Antworten hinzufügen
        if ($result_wrong_answers->num_rows > 0) {
            while ($row_wrong_answer = $result_wrong_answers->fetch_assoc()) {
                $answers[] = $row_wrong_answer['Antwort'];
            }
        }

        // Die Antworten mischen, um sicherzustellen, dass die richtige Antwort nicht immer an der gleichen Stelle ist
        shuffle($answers);

        // Debugging-Nachricht für die richtige Antwort
        echo "Richtige Antwort: " . $row_correct_answer['Antwort'] . "<br>";

        // Debugging-Nachricht für die falschen Antworten
        echo "Falsche Antworten: <br>";
        foreach ($answers as $answer) {
            echo $answer . "<br>";
        }

        // Frage und Antworten anzeigen
        echo '<div class="question">';
        echo '<h2>' . $row_question["frage"] . '</h2>'; // Anpassung des Schlüssels an fragen_ID
        echo '<ul class="answers">';
        foreach ($answers as $answer) {
            echo '<li><label><input type="radio" name="answer" value="' . $answer . '"> ' . $answer . '</label></li>';
        }
        echo '</ul>';
        echo '</div>';
    } else {
        echo "Frage nicht gefunden.";
    }
?>






        
        <div class="submit-container">
            <button class="submit-btn" onclick="submitAnswer()">Absenden</button>
            <button class="submit-all-btn" onclick="submitAll()" style="display: none;">Alles Absenden</button>
        </div>
        <div class="finished-text">Der Test ist abgeschlossen. Vielen Dank!</div>
    </div>

    <script>
        function submitAnswer() {
            const points = document.querySelectorAll('.point');
            let activePoint = -1;
            points.forEach((point, index) => {
                if (point.classList.contains('active')) {
                    activePoint = index;
                }
            });

            if (activePoint < points.length - 1) {
                points[activePoint + 1].classList.add('active');
            }

            if (activePoint + 1 === points.length - 1) {
                document.querySelector('.submit-btn').style.display = 'none';
                document.querySelector('.submit-all-btn').style.display = 'block';
            }
        }

        function submitAll() {
            document.querySelector('.finished-text').style.display = 'block';
        }
    </script>
</body>
</html>
