<?php
    if(isset($_GET['submit'])){
        switch ($_GET['periode']){
            case 'j':
                header("location:Bonjour.php?indice=".$_GET["indice"]);
                break;
            case 's':
                header("location:Bonsoir.php?indice=".$_GET["indice"]);
                break;
    }}
    ?>