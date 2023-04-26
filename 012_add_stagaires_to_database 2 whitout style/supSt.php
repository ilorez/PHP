<?php
    include_once "./.connect.php";
    extract($_GET);
    $req_st = mysqli_query($db_c,"SELECT avatar,cv FROM `stagaire` WHERE id=$id");
    $st = mysqli_fetch_assoc($req_st);
    $req_del_st = mysqli_query($db_c,"DELETE FROM `stagaire` WHERE id=$id");
    if($req_del_st){
    if(file_exists($st["avatar"])){
        unlink($st["avatar"]);
    }
    if(file_exists($st["cv"])){
        unlink($st["cv"]);
    }
header("location:afficheSts.php");}
?>