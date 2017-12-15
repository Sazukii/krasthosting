<?php
$gebruikersnaam = $wachtwoord = $err = '';
session_start();
$foutje = 0;
$logout = $_GET['logout'];
if(!isset($_SESSION['fout'])) {
    $_SESSION['fout'] = 0;
}
//$_SESSION['fout'] = 2;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gebruikersnaam = $_POST['gnaam'];
    $wachtwoord = $_POST['ww'];

    if (isset($gebruikersnaam, $wachtwoord) && !empty($gebruikersnaam) && !empty($wachtwoord)) {
        $conn = new mysqli('localhost', 'root', 'root', 'krashosting');
        $query = 'SELECT * FROM gebruiker;';
        $res = $conn->query($query);

        while ($row = $res->fetch_assoc()) {
            if ($row['email'] === $gebruikersnaam && $row['password'] === $wachtwoord) {
                $_SESSION['email'] = $gebruikersnaam;
                header("Location: cms.php");
//            } else {
//                $foutje++;
//                continue;
//            }
        }
        $conn->close();
    }
        if($foutje != 0){
            $_SESSION['fout']++;
            //var_dump($_SESSION['fout']);
            header("Location: pages/login.php");
        }

    } else {
        header("Location: pages/login.php");
    }
} else if(isset($logout) && !empty($logout)){
    if($logout) {
        session_start();
       //session_destroy();
//            $out = 'Ur logged out!';
        header("Location: ../pages/login.php");
    }
}

