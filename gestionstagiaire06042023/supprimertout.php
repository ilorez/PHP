<?php

if(isset($_POST["sb"])){
    include_once "cnx.ini.php";
    
    foreach($_POST["stagiaires"] as $v){
    $id = str_replace("select_","",$v);
    $rsltst = mysqli_query($bdd, "select avatarurl,cvurl FROM `stagiaire` WHERE id=$id");
    $st = mysqli_fetch_assoc($rsltst);

    $req = mysqli_query($bdd, "DELETE FROM `stagiaire` WHERE id=$id");
    if ($req) {
        if (file_exists($st["avatarurl"])) {
            unlink($st["avatarurl"]);
        }

        if (file_exists($st["cvurl"])) {
            unlink($st["cvurl"]);
        }
       
    }
}
    header("location:listeStagiaires.php");
}