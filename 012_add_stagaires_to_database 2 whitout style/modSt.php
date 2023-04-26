<?php 
    
    include_once "./.connect.php";
    $groupe_db = mysqli_query($db_c,"SELECT * FROM `groupe`");
    if(isset($_GET['id'])){
        $id_m =$_GET['id']; 
        $req_st = mysqli_query($db_c,"SELECT `id`, `nom`, `prenom`, `date_naissance`, `avatar`, `cv`, `idGroup` FROM `stagaire` WHERE id=$id_m"); 
    }
    if(isset($_POST['submit'])){
        extract($_POST);
        $avatar_url = "./avatars/".$_FILES["avatar"]["name"];
        $avatar_tmp = $_FILES["avatar"]["tmp_name"];
        $cv_url = "./cvs/".$_FILES["cv"]["name"];
        $cv_tmp = $_FILES["cv"]["tmp_name"];

        
        $req_up = mysqli_query($db_c,"UPDATE `stagaire` SET `nom`='$nom',`prenom`='$prenom',`date_naissance`='$date_nais',`avatar`='$avatar_url',`cv`='$cv_url',`idGroup`='$groupe' WHERE `stagaire`.`id`= $id_mo");
        if($req_up){
            move_uploaded_file($avatar_tmp,$avatar_url);
            move_uploaded_file($cv_tmp,$cv_url);
            header("location:afficheSts.php");
        }
    }

?>


<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data">
    <input type="number" name="id_mo" value=<?=@$id_m?> style="display:none;">
    nom:<input type="text" name="nom" value="<?=@$req_st["nom"]?>"><br>
    prenom:<input type="text" name="prenom" value="<?=@$req_st["prenom"]?>"><br>
    date naissance:<input type="date" name="date_nais" value="<?=@$req_st["date_naissance"]?>"><br>
    Group: <select name="groupe">
        <?php
        while($gr=mysqli_fetch_assoc($groupe_db)){
            echo "<option value=\"".$gr["idGroup"]."\"".(@$req_st["idGroup"]==$gr['idGroup'] ? "selected":"" ).">".$gr["nomGroup"]."</option>";
        }
    ?>
    </select><br>

    Avatar:<input type="file" name="avatar" accept="image/.png,.jpg" /><br>
    cv:<input type="file" name="cv" accept=".pdf" /><br>
    <a href="afficheSts."><input type="button" value="cancel"></a>
    <input type="submit" name="submit" value="confirm" />


</form>