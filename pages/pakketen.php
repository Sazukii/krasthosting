<?php
    session_start();
    $gebruikersnaam = $_SESSION['name'];
    if (isset($gebruikersnaam) && !empty($gebruikersnaam)){
        $out = "<p style='color: #16b289; display: inline; font-size: 20px;'>Welcome $gebruikersnaam</p>" . '<a href="../database/login_database.php?logout=true">(LOGOUT)</a>';
    }else{
        $out = '<a href="login.php">LOGIN</a>';
    }

function showpakket(){
    $link = mysqli_connect('localhost', 'root', 'root', 'krashosting');
    $sql = "SELECT * FROM pakket WHERE visible = 1 LIMIT 3;";
    $r = '';
    $result = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $r .= '<div id="child_div1" class="child_div_mid">';
        $r .= '<div class="inner_child_div">';
        $r .= "<h1 class='title_inner_div'>{$row["pakketnaam"]}</h1>";
        $r .= "<p class='text_child_div'>
        - {$row['pakketduur']}<br>
        - {$row['webruimte']}<br>
        - {$row['datapermaand']}<br>
        - {$row['databasje']}
        - {$row[0]}
        </p>";
        $r .= '<hr class="line_child_div">';
        $r .= "<h1 class='price_tag'>&euro;{$row['prijs']}</h1>";
        $r .= '<a href="#" class="button_bestel">Meer info</a>';
        $r .= '</div>
    </div>';
    }
    return $r;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Krashosting - Pakketen</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/cssreset.css" type="text/css">
    <link rel="stylesheet" href="../CSS/pakketen.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,200,900" rel="stylesheet">
</head>
<body>
<header>
    <img src="../IMG/banner_krashosting.svg">
</header>
<nav>
    <ul>
        <li><a href="../index.php">HOME</a></li>
        <li><a href="pakketen.php">PAKKETTEN</a></li>
        <li><a href="over_ons.php">OVER ONS</a></li>
        <li><a href="contact.php">CONTACT</a></li>
    </ul>
</nav>
<div id="parent_div_mid">
    <? echo showpakket(); ?>
    <div id="child_div4" class="child_div_mid">
        <div class="inner_child_div">
            <h1 class="title_inner_div">Custom Pakket</h1>
            <p class="text_child_div">
                - Nader te bepalen<br>
                - Zelf te bepalen<br>
                - Zelf te bepalen<br>
                - Zelf te bepalen
            </p>
            <hr class="line_child_div">
            <h1 class="price_tag">...</h1>
            <a href="#" class="button_bestel">Contact</a>
        </div>
    </div>
    </div>
</div>
</body>
</html>