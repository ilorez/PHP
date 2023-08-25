<?php
   session_start();
   include_once("config.php");
   $erreur="";
   if(isset($_POST['sub'])) {
       $myusername = $_POST['username'];
       $mypassword = $_POST['password'];
      $sql = "SELECT * FROM utilisateur WHERE login = '$myusername' and pass = '$mypassword' limit 1";
      $result = mysqli_query($db,$sql);
       $num = mysqli_num_rows($result);
      if($num == 1){
          $row=mysqli_fetch_array($result);
         $_SESSION['username'] = $myusername; 
         $_SESSION['type']=$row[3];
         header("location: product.php");
      }else {
        $erreur="Votre login et/ou mot de passe est/sont invalide(s)!!";
      }
   }
?>
<html>
   <head>
       <title>Se connecter</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <style>
            .login-container{
                margin-top: 5%;
                margin-bottom: 5%;
            }
            .login-form{
                padding: 5%;
                box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
            }
            .login-form h3{
                text-align: center;
                color: #333;
            }
            .login-container form{
                padding: 10%;
            }
            .btnSubmit
            {
                width: 50%;
                border-radius: 1rem;
                padding: 3.5%;
                border: none;
                cursor: pointer;
                font-weight: 600;
                color: #fff;
                background-color: #0062cc;
            }
            .centerSubmit{
                text-align:center;
            }
        </style>
   </head>
      <body>
    <div class="container login-container">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6 login-form">
                    <h3>Se Connecter</h3>
                    <form method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Your Login *" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Your Password *" />
                        </div>
                        <div class="form-group centerSubmit">
                            <input type="submit" name="sub" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group" style="color:red;">
                            <?php echo $erreur; ?>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                </div>
            </div>
        </div>
    </body>
</html>