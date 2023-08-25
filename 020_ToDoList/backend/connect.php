<?php 
    try{
        $db_c = new PDO("mysql:host=localhost;dbname=todolist","root","");
        // echo "succes";
    }
    catch (PDOException $e){
        echo $e -> getMessage();
    }
?>