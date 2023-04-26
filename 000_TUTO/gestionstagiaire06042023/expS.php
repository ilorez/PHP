<?php

include_once "cnx.ini.php";
$resultats = mysqli_query($bdd, "SELECT * FROM `groupe`");

if (isset($_POST["sb"])) {
    echo $_POST["grp"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="post">
        <select name="grp">
            <?php while ($lg = mysqli_fetch_assoc($resultats)) {?>
            <option value="<?=$lg["id"];?>" <?php
            if(@$_POST["grp"]==$lg["id"]){
                echo "selected";
            }
            
            ?>><?=$lg["nomg"];?></option>
            <?php
}
?>
        </select>
        <input type="submit" name="sb" value="envoyer">
    </form>
</body>

</html>