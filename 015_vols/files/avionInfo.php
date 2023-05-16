<?php
    if(isset($_GET["id"])){
        include_once "./conx.php";
        $id = $_GET["id"];
        // $avion = $db_c -> prepare("SELECT * FROM `avions` WHERE idAvions=$id");
        // $avion->execute();
        // $row = $avion->fetchAll(PDO::FETCH_ASSOC)[0];
        // $categorie = $row['categorieAvion'];
        // $places = $row['nombrePlace'];
        // $photoURL = $row['photo'];
        // $id = $row['idAvions'];
        $vols = $db_c -> prepare("SELECT V.idVol as 'Numero vol' , A1.nomAeroport as 'Aeroport depart', A2.nomAeroport as 'Aeroport arrive', A3.nomAeroport as Escale FROM (((( vols as V LEFT JOIN aeroports as A1 on A1.idAeroport = V.aeroportDepart ) LEFT JOIN aeroports as A2 on A2.idAeroport = V.aeroportArrive ) LEFT JOIN escales as E on E.idVol = V.IdVol) LEFT JOIN aeroports as A3 on A3.idAeroport = E.idAeroport) WHERE V.idAvion = 20;");
        $vols -> execute();
        // $vols->setFetchMode(PDO::FETCH_ASSOC);
        $tab = $vols->fetchAll(PDO::FETCH_ASSOC);
        


    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../000_bootstrap/css/bootstrap.min.css" />

</head>

<body>
    <table class="table table-dark table-striped text-center">
        <thead>
            <th>Numero vol</th>
            <th>Aeroport depart</th>
            <th>Aeroport depart</th>
            <th>Escale</th>
        </thead>
        <tbody>
            <?php
    foreach ($tab as $row) {
        // Access individual fields using column names
        $num = $row['Numero vol'];
        $depart= $row['Aeroport depart'];
        $arrive = $row['Aeroport arrive'];
        $escale = $row['Escale'];
    ?>
            <tr>
                <td><?=$num?></td>
                <td><?=$depart?></td>
                <td><?=$arrive?></td>
                <td><?=$escale?></td>
            </tr>
            <?php
    }
   ?>