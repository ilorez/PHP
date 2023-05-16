<?php
include_once "./conx.php";
$sel = $db_c->prepare("SELECT `idAeroport`, `nomAeroport` FROM `aeroports`");
$sel->execute();
$sel_tab = $sel->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sup and edit aeroports</title>
    <link rel="stylesheet" href="../../000_bootstrap/css/bootstrap.min.css" />

</head>

<body>


    <table class="table table-dark table-striped text-center">
        <thead>
            <th>Id</th>
            <th>Nom</th>
            <th colspan="2">Action</th>
        </thead>
        <tbody>
            <?php
    foreach ($sel_tab as $row) {
        $idAe = $row['idAeroport'];
        $nomAe = $row['nomAeroport'];
    ?>
            <tr>
                <td><?=$idAe?></td>
                <td><?=$nomAe?></td>
                <td><a href="./editAeroport.php?id=<?=$idAe?>">Edit</a></td>
                <td><a href="./suppAeroport.php?id=<?=$idAe?>"
                        onclick="return confirm('by click yes you will delete <?=$nomAe?>!')">Sup</a></td>
            </tr>
            <?php
    }
   ?>

        </tbody>
    </table>
</body>

</html>