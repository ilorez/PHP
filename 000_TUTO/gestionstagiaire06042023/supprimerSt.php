<?php

if (isset($_GET["id"])) {
    include_once "cnx.ini.php";
    $id = $_GET["id"];
    $rsltst = mysqli_query($bdd, "select avatarurl,cvurl FROM `stagiaire` WHERE id=$id");
    $st = mysqli_fetch_assoc($rsltst);

    $req = mysqli_query($bdd, "DELETE FROM `stagiaire` WHERE id=$id");
    if ($req) {
        if (file_exists($st["avatarurl"])) {
            unlink($st["avatarurl"]);
        }

        if (file_exists($st["cvurl"])) {
            unlink($st["cvurl"]);
        }
        header("location:listeStagiaires.php");
    }
}