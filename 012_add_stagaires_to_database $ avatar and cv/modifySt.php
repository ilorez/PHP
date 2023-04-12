<?php

// use function PHPSTORM_META\type;

if (isset($_GET["id"])){
    // echo intval($_GET["id"]);
    $idS = intval($_GET["id"]);
}
include_once ".connect.php";
if(isset($_POST['submit'])){
  
  extract($_POST);
  if(!file_exists('./avatars')){
    mkdir ("avatars",0777,true);
  }
  if(!file_exists("./cvs")){
   
    mkdir ("cvs",0777,true);
  }
  $idS = intval($idS);
  
  $avatar_url = "./avatars/".$_FILES['avatar']['name'];
  $avatar_tmp = $_FILES['avatar']['tmp_name'];
  
  $cv_url = "./cvs/".$_FILES['cv']['name'];
  $cv_tmp = $_FILES['cv']['tmp_name'];
  

  $add_req = mysqli_query($db_c,"UPDATE `stagaire` SET `nom` = '$nom', `prenom` = '$prenom', `date_naissance` = '$date_naissance', `avatar` = '$avatar_url', `cv` = '$cv_url', `idGroup` = '$groupe' WHERE `stagaire`.`id`= $idS");
  
  if($add_req){
  
    move_uploaded_file($avatar_tmp,$avatar_url);
    move_uploaded_file($cv_tmp,$cv_url);

    ?><script>
alert("done")
</script> <?php
header("location:affichage.php");
  }
}
$select_g = mysqli_query($db_c,"SELECT * FROM `groupe`");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../bootstrap.min.css" />
    <title>SCHOOL DB</title>
</head>

<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" class="container" enctype="multipart/form-data">
        <input type="text" style="opacity: 0;" name='idS' value="<?=$idS?>" />
        <!-- nom -->
        <div class=" form-group">
            <label for="nom" class="col-form-label">Nom </label>
            <input type="text" name="nom" id="nom" require placeholder="nom" class="form-control" />
        </div>
        <!-- prenom -->
        <div class="form-group">
            <label for="prenom" class="col-form-label">Prenom </label>
            <input type="text" name="prenom" id="prenom" require placeholder="prenom" class="form-control" />
        </div>
        <!--date naissance-->
        <div class="form-group">
            <label for="date_naissance" class="col-form-label">Date Naissance </label>
            <input type="date" require name="date_naissance" id="date_naissance" class="form-control" />
        </div>
        <!--select group-->
        <div class="form-group">
            <label for="groupe" class="col-form-label">Groupe</label>
            <select name="groupe" id="groupe" class="form-select" aria-label="select groupe" require>
                <?php
                    while($i=mysqli_fetch_assoc($select_g)){
                        echo "<option value=".$i["idGroup"].">".$i["nomGroup"]."</option>";
                    } 
                ?>


            </select>
        </div>
        <!-- Avatar:<input type="file" name="avatar" accept="image/png,.jpeg,.jpg"><br><br>
        CV:<input type="file" name="cv" accept=".pdf"><br><br> -->
        <!--avatar-->
        <div class="form-group">
            <label for="avatar" class="col-form-label">Avatar </label>
            <input type="file" require name="avatar" id="avatar" accept="image/.png,.jpeg,.jpg" class="form-control" />
        </div>
        <!--CV-->
        <div class="form-group">
            <label for="cv" class="col-form-label">CV </label>
            <input type="file" require name="cv" id="cv" accept=".pdf" class="form-control" />
        </div>
        <!-- reset and submit button with svg icon -->
        <div class="form-group">
            <a href="./affichage.php" style="text-decoration: none;"><input type="button" class="btn" value="cancel" />
            </a>
            <button type="submit" name="submit" class="btn btn-primary">
                <div class='baseline_btn'><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                        fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                        <path
                            d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                    </svg> Confirm </div>
            </button>
        </div>


    </form>
</body>

</html>
<?php
mysqli_free_result($select_g);
mysqli_close($db_c);
?>