<?php 
    include_once ("connect.php");
    if(isset($_GET["id"])  && !empty($_GET["id"])){
        $id = $_GET["id"];
        $query = "SELECT `id`, `titre`, `auteur`, `date_naissance` FROM `exercice` WHERE id = $id";

        $sel = $db_c -> prepare($query);
        $sel -> execute();
        $sel_tab = $sel -> fetchAll(PDO::FETCH_ASSOC);
        if (!count($sel_tab) == 1 ){
            echo "id not found";
            die();
        }
        // print_r($sel_tab[0]);
        extract($sel_tab[0]);
    }
    if(isset($_GET['titre'])){
        extract($_GET);
        $query ="UPDATE `exercice` SET `titre`='$titre',`auteur`='$auteur',`date_naissance`='$date' WHERE id = $id";
        $upd = $db_c -> prepare($query);
        $upd -> execute();
        if ($upd){
            $message = "L'exercice a ete mis a jour avec succes";
            header("location:../index.php?message=$message");
        }
        else{
            echo "error in update changes";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modifier</title>
    <!-- bootsratp -->
    <link rel="stylesheet" href="../../000_bootstrap/css/bootstrap.min.css" />
</head>

<body class="container">
    <fieldset>
        <legend>Ajout un exercice</legend>

        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
            <input type="number" name="id" value="<?=@$id?>" hidden>
            <!-- titre  -->
            <div class="form-group">
                <label for="titre" class="form-label">Titre de l'exercice</label>
                <input type="text" name="titre" id="titer" class="form-control" required value="<?=@$titre?>" />
            </div>
            <!-- auteur  -->
            <div class="form-group">
                <label for="auteur" class="form-label">Auteur de l'exercice</label>
                <input type="text" name="auteur" id="auteur" class="form-control" required value="<?=@$auteur?>" />
            </div>
            <!-- date  -->
            <div class="form-group">
                <label for="date" class="form-label">Date create</label>
                <input type="date" name="date" id="date" class="form-control" required value="<?=@$date_naissance?>">
            </div>
            <!-- submit  -->
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary m-3 me-1" value="Modifier">
            </div>
        </form>
    </fieldset>
</body>

</html>