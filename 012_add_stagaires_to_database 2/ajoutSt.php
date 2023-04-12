<?php
include_once ("./.connect.php");
if (isset($_POST["submit"])){
    extract($_POST);
    if(!file_exists('./avatars')){
        mkdir("avatars",0777,true);
    }
    if(!file_exists("./cvs")){
        mkdir("cvs",0777,true);
    }
    
    
    $avatar_url = "./avatars/".$_FILES["avatar"]["name"];
    $avatar_tmp = $_FILES["avatar"]["tmp_name"];
    $cv_url = "./cvs/".$_FILES["cv"]["name"];
    $cv_tmp = $_FILES["cv"]["tmp_name"];

    $insert_req = mysqli_query($db_c,"INSERT INTO `stagaire` (`id`, `nom`, `prenom`, `date_naissance`, `avatar`, `cv`, `idGroup`) VALUES (NULL, '$nom', '$prenom', '$date_nais', '$avatar_url', '$cv_url', '$groupe')");
    if($insert_req){
        move_uploaded_file($avatar_tmp,$avatar_url);
        move_uploaded_file($cv_tmp,$cv_url);
    }
}
$groupe_db = mysqli_query($db_c,"SELECT * FROM `groupe`")
?>


<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data">
    nom:<input type="text" name="nom" value="<?=@$nom?>"><br>
    prenom:<input type="text" name="prenom" value="<?=@$prenom?>"><br>
    date naissance:<input type="date" name="date_nais" value="<?=@$date_nais?>"><br>
    Group: <select name="groupe">
        <?php
        while($gr=mysqli_fetch_assoc($groupe_db)){
            echo "<option value=\"".$gr["idGroup"]."\"".(@$groupe==$gr['idGroup'] ? "selected":"" ).">".$gr["nomGroup"]."</option>";
        }
    ?>
    </select><br>
    Avatar:<input type="file" name="avatar" accept="image/.png,.jpg" /><br>
    cv:<input type="file" name="cv" accept=".pdf" /><br>
    <input type="submit" name="submit" value="Envoye" />
    <a href="afficheSts.php"><input type="button" value="affiche Stagiaires"></a>
</form>