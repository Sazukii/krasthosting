<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$idpakket = $_GET["id"];
$pakketnaam = $_GET["pakketnaam"];
$pakketduur = $_GET["pakketduur"];
$webruimte = $_GET["webruimte"];
$datapermaand = $_GET["datapermaand"];
$databasje = $_GET["databasje"];
$prijs = $_GET["prijs"];
$visible = $_GET["visible"];

//echo $visible ;
$database = mysqli_connect("localhost", "root", "root", "krashosting");
$sql = "UPDATE pakket SET 
pakketnaam = '$pakketnaam', 
pakketduur = '$pakketduur', 
webruimte = '$webruimte',
datapermaand = '$datapermaand',
databasje = '$databasje',
prijs = '$prijs',
visible = '$visible'
WHERE idpakket = '$idpakket'";

$query = mysqli_query($database, $sql);
header("Location: ../pages/pakketen_tonen.php");
?>
