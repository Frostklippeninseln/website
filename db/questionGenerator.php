<?php
session_start();

require_once 'dbConnection.php'; 

// Überprüfe, ob der Benutzer bereits eine Frage beantwortet hat
if (!isset($_SESSION['answered_questions'])) {
    $_SESSION['answered_questions'] = array();
}

// Überprüfe, ob alle Fragen beantwortet wurden
if (count($_SESSION['answered_questions']) >= 20) { // Annahme: Es gibt insgesamt 20 Fragen
    header("Location: result.php"); // Weiterleitung an die Ergebnisseite, wenn alle Fragen beantwortet wurden
    exit();
}

// Funktion zum Generieren einer zufälligen Frage-ID, die der Benutzer noch nicht beantwortet hat
function generateRandomQuestion() {
    $conn = DBConn::getConn(); 

    // Annahme: Es gibt insgesamt 20 Fragen
    $totalQuestions = 10;
    $answeredQuestions = isset($_SESSION['answered_questions']) ? $_SESSION['answered_questions'] : array();

    // Generiere eine zufällige Frage-ID, die der Benutzer noch nicht beantwortet hat
    do {
        $randomQuestionID = mt_rand(1, $totalQuestions);
    } while (in_array($randomQuestionID, $answeredQuestions));

    return $randomQuestionID;
}

// Generiere eine Zufallszahl für eine neue Frage, die der Benutzer noch nicht beantwortet hat
$randomQuestionID = generateRandomQuestion();

// Füge die Frage-ID zur Liste der beantworteten Fragen hinzu
$_SESSION['answered_questions'][] = $randomQuestionID;

// Verbindung zur Datenbank herstellen
$conn = DBConn::getConn();

// SQL-Abfrage, um die Frage mit der generierten Zufalls-ID abzurufen
$sql_question = "SELECT * FROM Einbürgerung WHERE fragen_ID = $randomQuestionID";
$result_question = $conn->query($sql_question);

// Prüfe, ob die Frage vorhanden ist
if ($result_question->num_rows > 0) {
    // Frage aus dem Abfrageergebnis abrufen
    $row_question = $result_question->fetch_assoc();

    // Die richtige Antwort für die Frage aus der Datenbank abrufen
    $sql_correct_answer = "SELECT Antwort FROM Antworten WHERE fragen_ID = $randomQuestionID AND ist_richtig = 1";
    $result_correct_answer = $conn->query($sql_correct_answer);

    // Array zum Speichern aller Antwortmöglichkeiten initialisieren
    $answers = array();

    // Die richtige Antwort hinzufügen
    if ($result_correct_answer->num_rows > 0) {
        $row_correct_answer = $result_correct_answer->fetch_assoc();
        $answers[] = $row_correct_answer['Antwort'];
    }

    // Falsche Antworten aus der Datenbank abrufen
    $sql_wrong_answers = "SELECT Antwort FROM Antworten WHERE fragen_ID = $randomQuestionID ORDER BY RAND() LIMIT 3";
    $result_wrong_answers = $conn->query($sql_wrong_answers);

    // Falsche Antworten hinzufügen
    if ($result_wrong_answers->num_rows > 0) {
        while ($row_wrong_answer = $result_wrong_answers->fetch_assoc()) {
            $answers[] = $row_wrong_answer['Antwort'];
        }
    }

    // Die Antworten mischen, um sicherzustellen, dass die richtige Antwort nicht immer an der gleichen Stelle ist
    shuffle($answers);

    // Frage und Antworten anzeigen
    echo json_encode(array(
        'question' => $row_question["frage"],
        'answers' => $answers,
        'answered_questions_count' => count($_SESSION['answered_questions'])
    ));
} else {
    echo json_encode(array('error' => 'Frage nicht gefunden.'));
}
?>
