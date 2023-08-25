<?php
    include "connect.php";
    extract($_GET);

    mysqli_query($bdd,"DELETE FROM produit WHERE `RefPdt`='$id'");

    header("Location:produit.php")
    
?>