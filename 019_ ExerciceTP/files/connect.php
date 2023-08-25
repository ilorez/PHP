<?php
    try{

        $db_c = new PDO("mysql:host=localhost;dbname=DB_ ExerciceTable","root","");

    }catch(PDOException $e){
        echo $e -> getMessage();
    }