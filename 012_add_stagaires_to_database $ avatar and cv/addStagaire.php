<?php
include_once ".connect.php";
if(isset($_POST['submit'])){
  extract($_POST);
  if(!file_exists('./avatars')){
    mkdir ("avatars",0777,true);
  }
  if(!file_exists("./cvs")){
   
    mkdir ("cvs",0777,true);
  }

  
  $avatar_url = "./avatars/".$_FILES['avatar']['name'];
  $avatar_tmp = $_FILES['avatar']['tmp_name'];
  
  $cv_url = "./cvs/".$_FILES['cv']['name'];
  $cv_tmp = $_FILES['cv']['tmp_name'];

 
  $add_req = mysqli_query($db_c,"INSERT INTO `stagaire` (`id`, `nom`, `prenom`, `date_naissance`, `avatar`, `cv`, `idGroup`) VALUES (NULL, '$nom', '$prenom', '$date_naissance', '$avatar_url', '$cv_url', '$groupe')");
  if($add_req){
  echo $avatar_tmp."<br>";
  echo $avatar_url;
    move_uploaded_file($avatar_tmp,$avatar_url);
    move_uploaded_file($cv_tmp,$cv_url);
    ?><script>
alert("done")
</script> <?php
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
            <button type="reset" class="btn">
                <div class='baseline_btn'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                        class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                        <path
                            d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                    </svg>Reset
                </div>
            </button>
            <button type="submit" name="submit" class="btn btn-primary">
                <div class='baseline_btn'><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                        fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                        <path
                            d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                    </svg> Submit </div>
            </button>
        </div>
        <style>
        .baseline_btn {
            display: flex;
            align-items: stretch;
            gap: 5px;
        }

        a div {
            padding: 10px;
            border-radius: 5px;
            width: fit-content;
        }

        a {
            text-decoration: none;
            color: white;
        }

        a:hover {
            text-decoration: none;
            color: white;
        }

        a div:hover {
            scale: 1.03;
            background-color: #1f7e35 !important;
        }
        </style>
        <div class="form-group">
            <a href="./affichage.php" target="_blank" rel="noopener noreferrer">
                <div class="bg-success baseline_btn">

                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                        class="bi bi-database-fill-up" viewBox="0 0 16 16">
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0ZM8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z" />
                        <path
                            d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7Zm6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.552 4.552 0 0 1 .23-2.002Zm-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.507 4.507 0 0 1-1.3-1.905Z" />
                    </svg>
                    View Database
                </div>
            </a>
        </div>

    </form>
</body>

</html>
<?php
mysqli_free_result($select_g);
mysqli_close($db_c);
?>