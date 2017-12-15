<?php
$idpakket = $_GET["idpakket"];

$database = mysqli_connect("localhost", "root", "root", "krashosting");
$sql = "DELETE FROM pakket WHERE idpakket = '$idpakket'";

$query = mysqli_query($database, $sql);

header("Location: pakketen_tonen.php");