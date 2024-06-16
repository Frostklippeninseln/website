<?php
session_start();
require_once ('dbConnection.php');

// Function to log session variables
function logSessionVariables() {
    $logFile = "../logs/session_log.txt";
    $currentTime = date('Y-m-d H:i:s');
    $logData = "Session variables set at $currentTime:\n";

    foreach ($_SESSION as $key => $value) {
        $logData .= "$key: $value\n";
    }

    $logData .= "-------------------------\n";

    // Append session log data to the log file
    file_put_contents($logFile, $logData, FILE_APPEND | LOCK_EX);
}

// Function to log redirect URLs with tokens
function logRedirectURL($url) {
    $logFile = "../logs/logtokens.txt";
    $currentTime = date('Y-m-d H:i:s');
    $logData = "Redirected to $url at $currentTime\n";

    // Append redirect log data to the log file
    file_put_contents($logFile, $logData, FILE_APPEND | LOCK_EX);
}

// Process login if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $last_name = $_POST['last_name_id'];
    $resident_id = $_POST['resident_id'];

    // Get database connection
    $conn = DBConn::getConn();

    // Prepare and execute SQL query
    $stmt = $conn->prepare("SELECT * FROM einwohner WHERE nachname = ? AND einwohner_id = ?");
    $stmt->bind_param("ss", $last_name, $resident_id);
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if exactly one row was returned
    if ($result->num_rows === 1) {
        // Fetch user data
        $user = $result->fetch_assoc();

        // Set session variables for logged in user
        $_SESSION['loggedin'] = true;
        $_SESSION['einwohner_ID'] = $user['einwohner_id']; // Ensure this matches the column name in your database

        // Set cookie if "Remember Me" is checked
        if (isset($_POST['remember']) && $_POST['remember'] == 'on') {
            setcookie('remember', 'true', time() + (86400 * 30), "/"); // 30 days
        }

        // Log session variables
        logSessionVariables();

        // Redirect to widget.php with token (einwohner_ID)
        $token = $user['einwohner_id'];
        $redirectURL = "../pages/widget.php?token=$token";
        logRedirectURL($redirectURL); // Log the redirect URL

        header("Location: $redirectURL");
        exit();
    } else {
        // Redirect back to login page with error message
        header("Location: ../pages/login.php?error=1");
        exit();
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>
