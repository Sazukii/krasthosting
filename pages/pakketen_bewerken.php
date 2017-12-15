<?php
    $idpakket = $_GET["idpakket"];

    $database = mysqli_connect("localhost", "root", "root", "krashosting");
    $sql = "SELECT * FROM pakket  WHERE idpakket = $idpakket";
    $query = mysqli_query($database, $sql);
    $line = '';
    while ($rij = mysqli_fetch_array($query)) {
        $line .= "<input type='text' name='pakketnaam' value='" . mysqli_escape_string($database, $rij['pakketnaam']) . "'>";
        $line .= "<input type='text' name='pakketduur' value='" . mysqli_escape_string($database, $rij['pakketduur']) . "'>";
        $line .= "<input type='text' name='webruimte' value='" . mysqli_escape_string($database, $rij['webruimte']) . "'>";
        $line .= "<input type='text' name='datapermaand' value='" . mysqli_escape_string($database, $rij['datapermaand']) . "'>";
        $line .= "<input type='text' name='databasje' value='" . mysqli_escape_string($database, $rij['databasje']) . "'>";
        $line .= "<input type='text' name='prijs' value='" . mysqli_escape_string($database, $rij['prijs']) . "'>";
        $line .= "<select name='visible'><option value='1'>ja</option><option value='0'>nee</option>";
    }
?>
<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <title>Pakket Aanpassen - Krashosting</title>
    </head>
    <body>
        <form action="../database/pakketten_bewerken_database.php" method="get">
            <?php echo($line); ?>
            <input type="hidden" readonly name="id" value="<?php echo $idpakket; ?>">
            <input type="submit" value="Aanpassen">
        </form>
    </body>
</html>
