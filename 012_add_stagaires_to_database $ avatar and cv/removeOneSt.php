<?php
if (isset($_GET["id"])){
    include_once ("./.connect.php");
    extract($_GET);
    $st_files = mysqli_query($db_c,"SELECT avatar,cv FROM `stagaire` WHERE id=$id");
    $st_filesc = mysqli_fetch_assoc($st_files);
    $req = mysqli_query($db_c,"DELETE FROM `stagaire` WHERE id=$id");
    if($req){
    if(file_exists($st_filesc["avatar"])){
        unlink($st_filesc["avatar"]);
    }
    if(file_exists($st_filesc["cv"])){
        unlink($st_filesc["cv"]);
    }
    header("location:affichage.php");
}
}