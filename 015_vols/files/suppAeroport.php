<?php
    if(isset($_GET["id"])){
        include_once "./conx.php";
        $id = $_GET["id"];
        $sel = $db_c -> prepare("DELETE FROM `aeroports` WHERE idAeroport=$id");
        $sel -> execute();
        header("location:./adminAeroports.php");
    }

?>