<?php
    include "connect.php";
    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }
    
    if (isset($_POST["sub"])){
        extract($_POST);

            $namephoto = $_FILES['photo']['name'];
            $tmpphoto = $_FILES['photo']['tmp_name'];
            $pathphoto = "./photos/$namephoto";

            move_uploaded_file($tmpphoto, $pathphoto);
        
            mysqli_query($bdd,"UPDATE `produit` SET `RefPdt`='$ref',`libPdt`='$lib',`Prix`='$prix',`Qte`='$qua',`description`='$des',`image`='$pathphoto',`type`='$type' WHERE RefPdt='$id' " );
            header("location:./produit.php");
    }

?>
<form action="<?= $_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data">
    <input type="text" hidden name="id" value="<?=@$id?>">
    <label for="">REFERENCE</label>
    <input type="text" name="ref">

    <label for="">LIBELLE</label>
    <input type="text" name="lib">

    <label for="">PRIX</label>
    <input type="text" name="prix">

    <label for="">QUANTITE</label>
    <input type="text" name="qua">

    <label for="">DESCRIPTION</label>
    <input type="text" name="des">

    <label for="">TYPE PRODUIT</label>
    <input type="text" name="type">

    <label for="">PHOTO PRODUIT</label>
    <input type="file" name="photo">

    <input type="submit" name="sub">
</form>