<?php 
    include_once ("connect.php");
    if(isset($_GET["id"])  && !empty($_GET["id"])){
        $id = $_GET["id"];
        $query = "DELETE FROM `exercice` WHERE id = $id";

        $del = $db_c -> prepare($query);
        $del -> execute();
        if ($del){
            $message = "L'exercice a ete supprime avec succes";
            header("location:../index.php?message=$message");
        }
    }