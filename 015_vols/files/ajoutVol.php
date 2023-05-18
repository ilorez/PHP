<?php
    include_once "./conx.php";
    // aeroports 
    $aeroports = $db_c -> prepare("SELECT `idAeroport`, `nomAeroport` FROM `aeroports` ORDER BY nomAeroport");
    $aeroports -> execute();
    $tab_aero = $aeroports->fetchAll(PDO::FETCH_ASSOC);
    // avions 
    $avions = $db_c -> prepare("SELECT `idAvions`, `categorieAvion`, `nombrePlace` FROM `avions`");
    $avions -> execute();
    $tab_avions = $avions->fetchAll(PDO::FETCH_ASSOC);
   
    if(isset($_POST["submit"])){
        extract($_POST);
        $timeFormat = sprintf("%02d:00:00", $heurDepart);
        $ins_vol = $db_c->prepare("INSERT INTO `vols`(`IdVol`, `aeroportDepart`, `aeroportArrive`, `dateDepart`, `heurDepart`, `idAvion`) VALUES (NULL,'$aeroportDepart','$aeroportArrive','$dateDepart','$timeFormat','$idAvion')");
        // $ins_vol -> execute();
        if ($ins_vol->execute()) {
            $last_id = $db_c->lastInsertId();
            ?><script>
alert("la vol numero <?=$last_id?> est ajoute avec succes")
</script><?php
        } else {
            $errorInfo = $ins_vol->errorInfo();
            echo "Error executing statement: " . $errorInfo[2];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout vol</title>
    <link rel="stylesheet" href="../../000_bootstrap/css/bootstrap.min.css" />

</head>

<body>
    <h2 class="w-100 bg-dark text-center mb-4 text-white p-2">Ajout vol</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <!-- aeroport depart -->
        <div class="form-group">
            <label for="a_depart">Aeroport Depart:</label>
            <select name="aeroportDepart" id="a_depart" class="form-control">
                <?php
                foreach ($tab_aero as $row) {
                    // Access individual fields using column names
                    $idAe = $row['idAeroport'];
                    $nomAe = $row['nomAeroport'];
                ?>
                <option value="<?=$idAe?>"><?=$nomAe?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <!-- aeroport Arrive -->
        <div class="form-group">
            <label for="a_Arrive">Aeroport Arrive:</label>
            <select name="aeroportArrive" id="a_Arrive" class="form-control">
                <?php
                foreach ($tab_aero as $row) {
                    // Access individual fields using column names
                    $idAe = $row['idAeroport'];
                    $nomAe = $row['nomAeroport'];
                ?>
                <option value="<?=$idAe?>"><?=$nomAe?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <!-- date depart -->
        <div class="form-group">
            <label for="d_depart">Date Depart:</label>
            <input type="date" name="dateDepart" id="d_depart" class="form-control" required />
        </div>
        <!-- heurDepart -->
        <div class="form-group">
            <label for="heurDepart">Heur Depart:</label>
            <input type="number" name="heurDepart" min="0" max="23" id="heurDepart" class="form-control" required />
        </div>

        <!-- Avion -->
        <div class="form-group">
            <label for="avion">Avion:</label>
            <select name="idAvion" id="avion" class="form-control">
                <?php
                foreach ($tab_avions as $row) {
                    // Access individual fields using column names
                    $idAv = $row['idAvions'];
                    $placesAv = $row['nombrePlace'];
                    $cateAv = $row['categorieAvion'];
                ?>
                <option value="<?=$idAv?>"><?=$placesAv?> - <?=$cateAv?></option>
                <?php
                    }
                ?>
            </select>
        </div>

        <!-- ajout and reset form  -->
        <div class="form-group mt-2 p-2">
            <input type="submit" name="submit" id="subtn" value="Ajout" class="btn btn-primary p-2" />
            <input type="reset" name="reset" value="Reset" class="btn btn-secondary p-2" />
        </div>
    </form>
    <div class="form-group mt-2 p-2">
        <a class="btn btn-success" href="./afficheAvion.php"> Affiche avions </a>
    </div>
</body>

</html>