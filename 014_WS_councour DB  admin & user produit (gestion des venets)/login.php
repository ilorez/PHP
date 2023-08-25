<?php
session_start();
if (isset($_SESSION["login"])) {
    header("location:files/products.php");

}
if (isset($_POST["submit"])) {
    extract($_POST);
    include_once("./files/.con.php");
    $query = "SELECT `login`, `password`, `type` FROM `login` WHERE login = '$login' AND password = '$password'";
    $req_login = $db_c->prepare($query);
    $req_login->execute();
    $result = $req_login->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($result) > 0) {
        $_SESSION["login"] = $login;
        $_SESSION["type"] = $result[0]["type"];
        
    }
    echo "fin";

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../000_bootstrap/css/bootstrap.min.css">
    <title>login</title>
</head>

<body>
    <fieldset>
        <center>
            <h2>
                Se conecter
            </h2>

            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">


                Login: <input type="text" name="login" placeholder="username" value="<?=@$login?>" /><br>
                Password: <input type="password" name="password" placeholder="user password" /><br>
                <input type="submit" name="submit" value="login" />

            </form>
        </center>
    </fieldset>

</body>

</html>