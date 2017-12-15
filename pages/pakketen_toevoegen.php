<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pakketnaam = $_POST["pakketnaam"];
    $pakketduur = $_POST["pakketduur"];
    $webruimte = $_POST["webruimte"];
    $datapermaand = $_POST["datapermaand"];
    $databasje = $_POST["databasje"];
    $prijs = $_POST["prijs"];
    $visible = $_POST["visible"];

    $link = new mysqli('localhost', 'root', 'root', 'krashosting');

    $sql = "INSERT INTO pakket (pakketnaam, pakketduur, webruimte, datapermaand, databasje, prijs, visible) VALUES ('$pakketnaam','$pakketduur','$webruimte','$datapermaand','$databasje','$prijs','$visible')";

    $result = $link->query($sql);
//        header("location:fans_tonen.php");
    $link->close();
    header("location: pakketen_tonen.php");
}
?>