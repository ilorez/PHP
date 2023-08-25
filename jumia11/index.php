<?php
    include "connect.php";

    if (isset($_COOKIE['login']) && isset($_COOKIE['login'])){
        header("Location:produit.php");
        exit();

    }
    else{
    if(isset($_POST["sub"])){

    extract($_POST);
    $data=mysqli_query($bdd,"SELECT * FROM utilisateur");
    
    while($produit=mysqli_fetch_assoc($data)){
    if($produit["login"]==$login && $produit["password"]==$password){
        if($data){
        setcookie("login",$login,time()+3600);
        setcookie("password",$password,time()+3600);

        header("Location:produit.php");
    }
}
    else{
        echo "Errer";
    }

}
}
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
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label for="login">Login</label>
        <input type="text" name="login">

        <label for="password">password</label>
        <input type="text" name="password">

        <input type="submit" name="sub" value="connect">
    </form>
</body>

</html>