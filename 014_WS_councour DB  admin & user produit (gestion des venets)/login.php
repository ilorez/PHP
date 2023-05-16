<?php

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
    <fieldset>
        <center>
            <h2>
                Se conecter
            </h2>

            <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
                Login: <input type="text" name="login" placeholder="username" /><br>
                Password: <input type="password" name="password" placeholder="user password" /><br>
                <input type="submit" name="submit" value="login" />

            </form>
        </center>
    </fieldset>

</body>

</html>