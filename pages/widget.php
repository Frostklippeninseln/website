<?php
session_start();
require_once('../db/dbConnection.php');

// Check if einwohner_ID token is set in the URL
if (isset($_GET['token'])) {
    $einwohner_ID = $_GET['token'];
    
    // Validating einwohner_ID against the database
    if (isValidEinwohnerID(DBConn::getConn(), $einwohner_ID)) {
        // Get user data from database
        $userData = getUserData(DBConn::getConn(), $einwohner_ID);
        
        // Ensure user data is retrieved
        if ($userData) {
            $vorname = $userData['vorname'];
            $nachname = $userData['nachname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+FR+Moderne:wght@100..400&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('../public/backgroundimage.png'); /* Replace with your background image */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Align items to the left */
            padding: 20px; /* Spacing around app boxes */
            overflow: hidden;
        }
        .dashboard {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start; /* Align items to the left */
            align-items: center; /* Center items vertically */
            margin-bottom: 20px;
        }
        .welcome-message {
            font-size: 120px; /* Larger font size */
            font-weight: bold;
            margin-bottom: 10px;
            white-space: nowrap; /* Prevent line break */
        }
        .user-info {
            font-size: 24px; /* Font size for user info */
            margin-bottom: 20px;
        }
        .app-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-right: 200px; /* Spacing between app containers */
            margin-bottom: 20px; /* Spacing between app containers */
        }
        .app-box {
            width: 120px; /* Adjust size if necessary */
            height: 120px; /* Adjust size if necessary */
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden; /* Ensure image does not overflow */
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }
        .app-box:hover {
            transform: scale(1.1);
        }
        .app-box img {
            width: 100%; /* Image should fill entire box */
            height: auto; /* Maintain aspect ratio */
        }
        .app-name {
            margin-top: 5px; /* Space between app box and app name */
            font-size: 14px;
            text-align: center;
        }
        .playwrite-fr-moderne-welcometext {
            font-family: "Playwrite FR Moderne", cursive;
            font-weight: 300;
            font-style: normal;
            color: white;
            margin-bottom: 10px;
            white-space: nowrap;
            font-size: 80px;
            opacity: 0.8;
            text-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3); /* Adjust the values for smoothness */
            text-align: center; /* Center text horizontally */
            width: 100%; /* Ensure text takes full width */
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fefefe;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            width: 90%;
            height: 90%;
            max-width: none;
            max-height: none;
            overflow: hidden;
        }
        .close {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 28px;
            cursor: pointer;
        }
        .minimize {
            position: absolute;
            top: 10px;
            right: 60px;
            font-size: 28px;
            cursor: pointer;
        }
        #app1Frame {
            width: 100%;
            height: 100%;
            border: none;
        }
        #app3Frame {
            width: 100%;
            height: 100%;
            border: none;
        }
        #app4Frame {
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="playwrite-fr-moderne-welcometext">
            Wilkommen, <?php echo "$vorname $nachname"; ?>
        </div>
    </div>
    
    <div class="dashboard">
        <div class="app-container">
            <div class="app-box" id="app1">
                <img src="../public/newswallpaper.jpg" alt="App 1 Logo">
            </div>
            <div class="app-name">FKI News Hub</div>
        </div>
        <div id="app1Modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeAppModal('app1Modal')">&times;</span>
                <span class="minimize" onclick="minimizeAppModal('app1Modal')">-</span>
                <iframe id="app1Frame" src="" frameborder="0"></iframe>
            </div>
        </div>
        <div class="app-container">
    <div class="app-box" id="app2">
        <img src="../public/socialwallpaper.jpg" alt="App 2 Logo">
    </div>
    <div class="app-name">Fooorum (By Bricked)</div>
</div>

<div id="app2Modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeAppModal('app2Modal')">&times;</span>
        <span class="minimize" onclick="minimizeAppModal('app2Modal')">-</span>
        <iframe id="app2Frame" src="" frameborder="0"></iframe>
    </div>
</div>
        <div class="app-container">
    <div class="app-box" id="app3">
        <img src="../public//bankingicon.jpg" alt="App 3 Logo">
    </div>
    <div class="app-name">Banking</div>
</div>

<div id="app3Modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeAppModal('app3Modal')">&times;</span>
        <span class="minimize" onclick="minimizeAppModal('app3Modal')">-</span>
        <iframe id="app3Frame" src="" frameborder="0"></iframe>
    </div>
</div>
<div class="app-container">
    <div class="app-box" id="app4">
        <img src="../public/Frostklingeninseln.png" alt="App 4 Logo">
    </div>
    <div class="app-name">Homepage</div>
</div>

<div id="app4Modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeAppModal('app4Modal')">&times;</span>
        <span class="minimize" onclick="minimizeAppModal('app4Modal')">-</span>
        <iframe id="app4Frame" src="" frameborder="0"></iframe>
    </div>
</div>
    </div>

    <script>
// Define global functions for closing and minimizing the modals
function closeAppModal(modalId) {
    console.log("Closing ", modalId);
    const modal = document.getElementById(modalId);
    console.log("Closing ", modal);
    if (modal) {
        modal.style.display = 'none';
        console.log("Closed ", modal);
    }
}

function minimizeAppModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';  // Hide the modal when minimizing
        // Additional code for minimizing functionality if needed
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const app1 = document.getElementById('app1');
    const app1Modal = document.getElementById('app1Modal');
    const app1Frame = document.getElementById('app1Frame');

    app1.addEventListener('dblclick', function() {
        app1Modal.style.display = 'block';
        app1Frame.src = 'news.php';
        writeToLog("User double-clicked App 1.");
    });

    const app3 = document.getElementById('app3');
    const app3Modal = document.getElementById('app3Modal');
    const app3Frame = document.getElementById('app3Frame');

    if (app3) {
        app3.addEventListener('dblclick', function() {
            app3Modal.style.display = 'block';
            app3Frame.src = 'banking.php'; // Adjust to the correct path for banking.php
            writeToLog("User double-clicked App 3.");
        });
    }
    const app2 = document.getElementById('app2');
    const app2Modal = document.getElementById('app2Modal');
    const app2Frame = document.getElementById('app2Frame');

    if (app2) {
        app2.addEventListener('dblclick', function() {
            app3Modal.style.display = 'block';
            app3Frame.src = 'https://fooorum.vercel.app/posts/list';
            writeToLog("User double-clicked App 2.");
        });
    }
    const app4 = document.getElementById('app4');
    const app4Modal = document.getElementById('app4Modal');
    const app4Frame = document.getElementById('app4Frame');

    if (app4) {
        app4.addEventListener('dblclick', function() {
            app4Modal.style.display = 'block';
            app4Frame.src = 'index.html';
            writeToLog("User double-clicked App 4.");
        });
    }

    // Add event listeners for additional apps as needed

});

function writeToLog(message) {
    // AJAX request to send log message to server and write to file
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'write_to_log.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('message=' + encodeURIComponent(message));
}

    </script>
</body>
</html>

<?php
        } else {
            // User data not found, redirect to login page
            header("Location: login.php");
            exit;
        }
    } else {
        // Invalid einwohner_ID, redirect to login page
        header("Location: login.php");
        exit;
    }
} else {
    // If einwohner_ID token is not set, redirect to login page
    header("Location: login.php");
    exit;
}

// Function to validate einwohner_ID in the database
function isValidEinwohnerID($conn, $einwohner_ID) {
    $stmt = $conn->prepare("SELECT einwohner_ID FROM einwohner WHERE einwohner_ID = ?");
    $stmt->bind_param("i", $einwohner_ID);
    $stmt->execute();
    $stmt->store_result();
    $count = $stmt->num_rows;
    $stmt->close();
    return $count === 1;
}

// Function to get user data from database
function getUserData($conn, $einwohner_ID) {
    $stmt = $conn->prepare("SELECT vorname, nachname FROM einwohner WHERE einwohner_ID = ?");
    $stmt->bind_param("i", $einwohner_ID);
    $stmt->execute();
    $result = $stmt->get_result();
    $userData = $result->fetch_assoc();
    $stmt->close();
    return $userData;
}
?>
