<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli('localhost', 'root', 'root', 'krashosting');

    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = mysqli_escape_string($conn, $_POST['password']);

    $sql = "INSERT INTO gebruiker (email, password) VALUES ('$email','$password')";

    $arr = array(
        'email'=>array('(\<(/?[^\>]+)\>)', '/script/'),
        'password'=>array('(\<(/?[^\>]+)\>)', '/script/'),
    );

    $ok = true;

    foreach ($arr as $k=>$v) {
        if (empty($_POST[$k])) {
            echo "nee";
            die();
        } elseif (preg_match($v[0], $_POST[$k])) {
            echo "nee";
            die();
        }
    };
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        die();
    }
    $result = $conn->query($sql);
    $conn->close();
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Krashosting</title>
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
    <form action="register.php" method="post">
        <input name="email" type="text" placeholder="E-mail">
        <input type="text" placeholder="Confirm E-mail">
        <input name="password" type="password" placeholder="Password">
        <input type="password" placeholder="Confirm Password">
        <input id="submit" type="submit" value="Register">
        <p class="message">Already have an account? <a href="login.php">Login</a> here</p>
    </form>
</body>
</html>
