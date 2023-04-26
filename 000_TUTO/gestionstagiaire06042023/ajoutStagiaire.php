<?php
include_once "cnx.ini.php";
$resultats = mysqli_query($bdd, "SELECT * FROM `groupe`");

if (isset($_POST["sb"])) {
 
    if (!file_exists("./cvs")) {
        mkdir("cvs");
    }
    if (!file_exists("./avatars")) {
        mkdir("avatars");
    }
     extract($_POST); //$nom,$prenom,$date_naissance,$groupe
    $avatarnom = $_FILES["avatar"]["name"];
    $tmpnameavatar = $_FILES["avatar"]["tmp_name"];
    $typeavatar = $_FILES["avatar"]["type"];
    $pathavatar = "./avatars/$avatarnom";

    $cvnom = $_FILES["cv"]["name"];
    $tmpnamecv = $_FILES["cv"]["tmp_name"];
    $typecv = $_FILES["cv"]["type"];
    $pathcv = "./cvs/$cvnom";
    $req = mysqli_query($bdd, "insert into stagiaire
    (nom,
    prenom,
    date_nais,
    avatarurl,
    avatartype,
    cvurl,
    cvtype,
    idg) values(
        '$nom',
        '$prenom',
        '$date_naissance',
        '$pathavatar',
        '$typeavatar',
        '$pathcv',
        '$typecv',
        $groupe) ");
    if ($req) {
        move_uploaded_file($tmpnameavatar, $pathavatar);
        move_uploaded_file($tmpnamecv, $pathcv);
        $id = mysqli_insert_id($bdd);
        echo "Stagiaire $id ajouté avec succes";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Document</title>
    <script>
    // function initialiser() {
    //     let blstext = document.getElementsByClassName("text");
    //     for (let i = 0; i < blstext.length; i++) {
    //         blstext[i].value = "";
    //     }
    //     document.getElementById("slc").value = 1;
    // }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="ajoutStagiaire.php">Ajouter Stagiaire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listeStagiaires.php">List des stagiaires</a>
                </li>

            </ul>

        </div>
    </nav>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
        Nom:<input type="text" name="nom" class="text" value="<?php echo @$nom; ?>" require
            style="width:200px;"><br><br>
        Prenom:<input type="text" name="prenom" class="text" require value="<?php echo @$prenom; ?>"
            style="width:200px;"><br><br>
        date de naissance:<input type="date" name="date_naissance" class="text" require
            value="<?php echo @$date_naissance; ?>" style="width:200px;"><br><br>
        Groupe: <select name="groupe" style="width:200px;" id="slc">
            <?php
while ($lg = mysqli_fetch_assoc($resultats)) {
    ?>
            <option value="<?php echo $lg["id"]; ?>" <?php if (@$groupe == $lg["id"]) {
        echo "selected";
    }
    ?>>
                <?php echo $lg["nomg"]; ?>
            </option>
            <?php }?> 
        </select><br><br>

        Avatar:<input type="file" name="avatar" accept="image/png,.jpeg,.jpg"><br><br>
        CV:<input type="file" name="cv" accept=".pdf"><br><br>

        <input type="submit" name="sb" style="width:100px;">
        <input type="submit" name="rst" value="réinitialiser" style="width:100px;">
    </form>
</body>

</html>

<?php

mysqli_free_result($resultats);
mysqli_close($bdd);
?>