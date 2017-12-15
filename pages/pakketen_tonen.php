<?php
    $link = mysqli_connect('localhost', 'root', 'root', 'krashosting');
    $sql = "SELECT * FROM pakket";
    $result = mysqli_query($link, $sql);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    </head>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        table {
            width: 100%;
            position: absolute;
            top: 0;
        }
        td {
            background-color: #3AB795;
            text-align: center;
            padding: 10px;
        }
        tr {
            border-collapse: collapse;
        }
        th {
            padding: 5px;
            background-color: #3AB795;
        }
    </style>
    <body>
        <table>
            <tr>
                <th>Pakketnaam</th>
                <th>Pakketduur</th>
                <th>Web Ruimte</th>
                <th>Data per Maand </th>
                <th>Database</th>
                <th>Prijs</th>
                <th>Visible</th>
                <th><?php echo "<a href='pakketen_toevoegen.html'>Toevoegen</a>" ?></th>
                <th></th>
            </tr>
            <?php
            while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $row['pakketnaam'] ?></td>
                    <td><?php echo $row['pakketduur'] ?></td>
                    <td><?php echo $row['webruimte'] ?></td>
                    <td><?php echo $row['datapermaand'] ?></td>
                    <td><?php echo $row['databasje'] ?></td>
                    <td><?php echo $row['prijs'] ?></td>
                    <td><?php echo $row['visible'] ?></td>
                    <td><?php echo "<a href='pakketen_bewerken.php?idpakket=".$row['idpakket']."'>Aanpassen</a>" ?></td>
                    <td><?php echo "<a href='pakketten_verwijderen.php?idpakket=".$row['idpakket']."'>Verwijderen</a>" ?></td>
                </tr>
                <br />
                <?php
            }
            ?>
        </table>
    </body>
</html>
