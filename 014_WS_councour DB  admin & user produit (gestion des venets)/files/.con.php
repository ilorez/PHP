<?php
// $bdd = mysqli_connect('localhost','root','','WS_Concours') or die("conexion error");
try {
    $db_c = new PDO('mysql:host=localhost;dbname=WS_Concours', 'root', '');
} catch (PDOException $e) {
    echo $e->getMessage();
}