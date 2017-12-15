<?php
    session_start();
    if ($_SESSION['fout'] >= 3) {
        echo "<p style='text-align: center; color: red;'>You have 3 failed attempts at logging in. You will now have to contact support to be able to login again.</p>";
        $_SESSION['fout'] = 0;

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Krashosting</title>
    <link rel="stylesheet" href="../CSS/cssreset.css" type="text/css">
    <link rel="stylesheet" href="../CSS/stylesheet.css" type="text/css">
    <style>
        body {
            background-color: #3ab795;
        }
        form {
            margin-left: 34%;
            position: absolute;
            margin-top: 17%;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
        input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }
        #submit {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #3ab795;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            cursor: pointer;
        }
        .message {
            color: #b3b3b3;
            font-size: 15px;
        }
        .message a {
            color: #3ab795;
            text-decoration: none;
        }
    </style>
</head>
<body>
<form action="../database/login_database.php" method="post">
    <input name="gnaam" type="text" placeholder="E-mail">
    <input name="ww" type="password" placeholder="Password">
    <input id="submit" type="submit" value="Login"><br>
<!--    <p class="message">Don't have an account yet? <a href="register.php">Register</a> here</p>-->
</form>
</body>
</html>
