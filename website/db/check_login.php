<?php
require_once ('dbConnection.php');



// Process login if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $last_name = $_POST['last_name_id'];
    $resident_id = $_POST['resident_id'];

    // Get database connection
    $conn = DBConn::getConn();

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM Einwohner WHERE Nachname = ? AND EinwohnerID = ?");
    $stmt->bind_param("ss", $last_name, $resident_id);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) { // Check the number of rows returned
        // Set cookie if "Remember Me" is checked
        if(isset($_POST['remember']) && $_POST['remember'] == 'on') {
            setcookie('remember', 'true', time() + (86400 * 30), "/"); // 30 days
        }

        // Set session variable to indicate recent login
        $_SESSION['recent_login'] = true;

        // Redirect to widget.html on successful login
        header("Location: ../pages/widget.html");
        exit();
    } else {
        // Redirect back to login.php with a simple error message
        header("Location: ../pages/login.php?error=1");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
