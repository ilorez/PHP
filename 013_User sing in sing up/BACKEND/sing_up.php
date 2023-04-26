<?php

if (isset($_POST['submit'])){
    
    include_once('.conx.php');
    // // echo '000';
    extract($_POST);
    // // echo '111';
    // $test_mail = mysqli_query($db_c,"SELECT * FROM `users` WHERE email = '$email'");
    // // echo '222';
    
    // if(mysqli_num_rows($test_mail)==0){
    //     echo 'deja';
    // }
    // else{
    $stockQ =  mysqli_query($db_c,"INSERT INTO `users`(`id`, `nom`, `prenom`, `joinDate`, `email`, `psw`) VALUES (NULL,'$lastname','$firstname',CURRENT_DATE(),'$email','$password')");
    if($stockQ){
        header("Location:./sing_in.php");
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
    <title>Sing Up</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="container">
        <!-- firstname -->
        <div class="form-group">
            <label for="firstname" class="col-form-label">First Name: </label>
            <input type="text" name="firstname" id="firstname" required placeholder="First Name" class="form-control"
                value="<?=@$firstname?>" />
        </div>
        <!-- lastname -->
        <div class="form-group">
            <label for="lastname" class="col-form-label">Last Name: </label>
            <input type="text" name="lastname" id="lastname" required placeholder="Last Name" class="form-control"
                value="<?=@$lastname?>" />
        </div>
        <!-- email -->
        <div class="form-group">
            <label for="email" class="col-form-label">Email </label>
            <input type="email" name="email" id="email" required placeholder="Email" class="form-control"
                value="<?=@$email?>" />
        </div>
        <!-- psw -->
        <div class="form-group">
            <label for="password" class="col-form-label">Password </label>
            <input type="password" name="password" id="password" required placeholder="password" class="form-control"
                minlength="8" />
        </div>
        <div class="form-group">
            <button type="reset" class="btn">Reset</button>
            <button type="submit" name="submit" class="btn btn-primary">
                Submit
            </button>
        </div>
    </form>
</body>

</html>