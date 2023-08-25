<?php
    setcookie("login",$login,1);
    setcookie("password",$password,1);

    header("Location:index.php");
?>