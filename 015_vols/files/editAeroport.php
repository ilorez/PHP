<?php
    include_once "./conx.php";
    if(isset($_GET["id"])){
        
        $id = $_GET["id"];
        $sel = $db_c->prepare("SELECT `idAeroport`, `nomAeroport` FROM `aeroports` WHERE idAeroport=$id");
        $sel->execute();
        $sel_Aero = $sel->fetchAll(PDO::FETCH_ASSOC)[0];
    }
    if(isset($_GET["submit"])){
        $id = $_GET["id"];
        $nomAeroport = $_GET["nomAeroport"];
        $upd = $db_c -> prepare("UPDATE `aeroports` SET `nomAeroport`='$nomAeroport' WHERE idAeroport=$id");
        $upd -> execute();
        header("location:./adminAeroports.php");
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Aeroport</title>
    <link rel="stylesheet" href="../../000_bootstrap/css/bootstrap.min.css" />

</head>

<body>
    <h2 class="w-100 bg-dark text-center mb-4 text-white p-2">modifie Aeroport</h2>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
        <input type="number" name="id" value="<?=@$id?>" hidden>
        <!-- nom aeroport  -->
        <div class="form-group">
            <label for="nomAeroport">Nom Aeroport:</label>
            <input type="text" name="nomAeroport" id="nomAeroport" class="form-control" required />
        </div>
        <!-- modifie and reset form  -->
        <div class="form-group mt-2 p-2">
            <input type="submit" name="submit" id="subtn" value="modifie" class="btn btn-primary p-2" />
            <input type="reset" name="reset" value="Reset" class="btn btn-secondary p-2" />
        </div>
    </form>
</body>

</html>