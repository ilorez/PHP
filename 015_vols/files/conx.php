<?php
    try{
        $db_c = new PDO("mysql:host=localhost;dbname=vols_DB","root","");
        // echo "succes";
    }
    catch (PDOException $e){
        echo $e -> getMessage();
    }
?>