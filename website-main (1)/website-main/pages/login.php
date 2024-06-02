<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: lightblue;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .loginpage {
            width: 100%;
            height: 100%;
            background-image: url(../public/nebellogin.jpg);
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .darklayer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            opacity: 0.5;
            z-index: 1;
        }
        .login-form-container {
            position: relative;
            z-index: 2;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-form input[type="text"],
        .login-form input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .login-form input[type="submit"] {
            background-color: #57C0F2;
            color: white;
            border: none;
            cursor: pointer;
        }
        .remember-me {
            margin-top: 10px;
            text-align: left;
        }
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            text-align: center;
        }
        .flagimg {
            max-width: 10%;
            position: absolute;
            top: 0;
            left: 0;
            margin: 2%;
            z-index: 3;
        }
        .urldemo {
            color: white;
            font-size: 35px;
            font-weight: bold;
            position: absolute;
            margin-left: 0;
            margin-top: 2%;
            z-index: 3;
            left: 13%;
            top: 2%;
        }
    </style>
</head>
<body>
    <div class="loginpage">
        <div class="darklayer"></div>
        <a href="index.html"><img class="flagimg" src="../public/Frostklingeninseln.png" alt=""></a>
        <div class="login-form-container">
            <?php
            if (isset($_GET['error'])) {
                echo '<div class="error-message">Login failed</div>';
            }
            ?>
            <form class="login-form" action="../db/check_login.php" method="post">
                <input type="text" name="last_name_id" placeholder="Nachname" required>
                <input type="text" name="resident_id" placeholder="Bewohner Identifikation" required pattern="[0-9]*">
                <input type="submit" value="Login">
            </form>
        </div>
        <p class="urldemo">.fki</p>
    </div>
</body>
</html>
