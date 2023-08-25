<?php
include_once "./files/connect.php";
if(isset($_GET["submit"])){
  extract($_GET);
  $titre = addslashes(htmlentities($titre));
  $auteur = addslashes(htmlentities($auteur));
  $date = addslashes(htmlentities($date));
  $query = "INSERT INTO `exercice`(`id`, `titre`, `auteur`, `date_naissance`) VALUES (NULL,'$titre','$auteur','$date')";
  $ins = $db_c -> prepare($query);
  $ins -> execute();
  if($ins){
    $message = "L'exercice a ete ajoute avec succes";
  }
}
$query = "SELECT * FROM `exercice`";

$sel = $db_c -> prepare($query);
$sel -> execute();
$tab_sel = $sel -> fetchAll(PDO::FETCH_ASSOC);
// print_r($tab_sel);
$message = isset($_GET["message"]) ?  $_GET["message"]: $message;
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Exercice</title>
    <!-- bootsratp -->
    <link rel="stylesheet" href="../000_bootstrap/css/bootstrap.min.css" />
</head>

<body class="container m-4">
    <span class="bg-danger text-white p-2 me-2  w-100 d-block"><?=@$message?></span>
    <fieldset>
        <legend>Ajout un exercice</legend>

        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="get">
            <!-- titre  -->
            <div class="form-group">
                <label for="titre" class="form-label">Titre de l'exercice</label>
                <input type="text" name="titre" id="titer" class="form-control" required>
            </div>
            <!-- auteur  -->
            <div class="form-group">
                <label for="auteur" class="form-label">Auteur de l'exercice</label>
                <input type="text" name="auteur" id="auteur" class="form-control" required>
            </div>
            <!-- date  -->
            <div class="form-group">
                <label for="date" class="form-label">Date create</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <!-- submit  -->
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary m-3 me-1" value="Ajout">
                <input type="reset" name="reset" class="btn btn-secondary m-3 ms-0" value="Reset">
            </div>
        </form>
    </fieldset>
    <table class="table table-primary table-striped text-center">
        <thead>
            <tr>
                <th>id</th>
                <th>titre</th>
                <th>auteur</th>
                <th>date</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
              foreach($tab_sel as $row){
                $id = $row["id"];
                $titre = $row["titre"];
                $auteur = $row["auteur"];
                $date = $row["date_naissance"];
            ?>
            <tr>
                <td><?=$id?></td>
                <td><?=$titre?></td>
                <td><?=$auteur?></td>
                <td><?=$date?></td>
                <td><a href="./files/modifier.php?id=<?=$id?>" class="btn btn-warning d-flex align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" height="1em" viewBox="0 0 512 512">
                            <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                        </svg>
                        Modifier</a></td>
                <td><a onclick="return confirm('Vous voulez vraiment supprime cet exercice')"
                        href="./files/supprimer.php?id=<?=$id?>"
                        class="btn btn-danger d-flex align-items-center gap-2 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" height="1em" viewBox=" 0 0 448 512">
                            <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                        </svg>
                        Supprimer
                    </a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>