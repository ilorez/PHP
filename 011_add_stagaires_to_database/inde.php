<?php
include_once ".connect.php";
if(isset($_POST['submit'])){
  extract($_POST);
  mysqli_query($db_c,"INSERT INTO `stagaire` (`id`, `nom`, `prenom`, `date_naissance`, `idGroup`) VALUES (NULL, '$nom', '$prenom', '$date_naissance', '$groupe')");
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
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" class="container">
        <!-- nom -->
        <div class="form-group">
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

        </div>
        <div class="form-group">
            <button type="reset" class="btn">Reset</button>
            <button type="submit" name="submit" class="btn btn-primary">
                Submit
            </button>
        </div>
        <style>
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
                <div class="bg-success"> view stagaire database </div>
            </a>
        </div>

    </form>
</body>

</html>
<?php
mysqli_free_result($select_g);
mysqli_close($db_c);
?>