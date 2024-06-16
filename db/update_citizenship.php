<?php
session_start();
require_once '../db/dbConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['einwohner_id'])) {
    $einwohner_id = $_POST['einwohner_id'];

    // Database connection
    $conn = DBConn::getConn();

    // Update the database
    $sql = "UPDATE einwohner SET ist_staatsbürger = 1, staatsangehoerigkeit = 'FKI' WHERE einwohner_id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Prepare failed: ' . $conn->error);
    }
    $stmt->bind_param("i", $einwohner_id);
    if ($stmt->execute() === false) {
        die('Execute failed: ' . $stmt->error);
    }
    $stmt->close();
    
    // Close the database connection
    DBConn::closeConn();

    // Destroy the session to clear the session variables
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session

    // Redirect to a success page or display a success message
    header('Location: ../pages/index.html'); // Replace with the actual success page
    exit();
} else {
    // Redirect to an error page if the request is invalid
    header('Location: einbuergerung.php');
    exit();
}
?>
