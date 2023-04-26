<?php
    include_once(".conx.php");
    
    if(isset($_POST['submit'])){
        session_start();
        extract($_POST);
        if ($stay_login){
            echo 'hello';
        }
        $serchQ = mysqli_query($db_c, "SELECT * FROM `users` USE INDEX (LP_user) WHERE email = '$email' AND psw = '$password'");
        if (mysqli_num_rows($serchQ)==0){
            $_SESSION['message'] = "login or passowrd incorect";
        }else{
            if ($stay_login){
                echo 'hello';
            }
            $us = mysqli_fetch_assoc($serchQ);
            $_SESSION['login'] = $us['email'];
            $_SESSION['psw'] = $password;
            $_SESSION['firstname']= $us['prenom'];
            $_SESSION['lastname']= $us['nom'];
            // header("Location:user_space.php");
            
            
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../000_bootstrap/css/bootstrap.min.css" />
    <title>Sing In</title>
</head>

<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" class="container">
        <!-- email -->
        <div class="form-group">
            <label for="email" class="col-form-label">Email </label>
            <input type="email" name="email" id="email" required placeholder="Email" class="form-control" />
        </div>
        <!-- psw -->
        <div class="form-group">
            <label for="password" class="col-form-label">Password </label>
            <input type="password" name="password" id="password" required placeholder="password" class="form-control" />
        </div>
        <!-- stay login  -->
        <div class="form-group">

            <input type="checkbox" name="stay_login" id="stay_login" class="form-check-input" />
            <label for="stay_login" class="form-check-label">Stay login </label>

        </div>
        <div class="form-group">
            <button type="reset" class="btn">Reset</button>
            <button type="submit" name="submit" class="btn btn-primary">
                Submit
            </button>
        </div>
        <div>
            <?php 
            if(isset($_SESSION['message'])){
                echo "<p class='text-danger'>".$_SESSION['message'];
            }?>
        </div>
    </form>
</body>

</html>