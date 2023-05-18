<?php
  if(isset($_POST["submit"])){
    include_once("./conx.php");
    if(!file_exists("./avionsImg")){
      mkdir("avionsImg",0777,true);
    //   linux note : to make this (mkdir) code running in linux you need to add premision a+rwx to this file by sudo chmod a+rwx [file/path]
    }
    extract($_POST);
    $timestamp = time();
    $file_ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
    $photoURL = "./avionsImg/$timestamp".".$file_ext";

    $ajout_req = $db_c->prepare("INSERT INTO `avions`(`idAvions`, `categorieAvion`, `nombrePlace`, `photo`) VALUES (NULL,'$categorieAvion','$nombrePlace','$photoURL')");
    $ajout_req -> execute();
    if($ajout_req){
      move_uploaded_file($_FILES["photo"]["tmp_name"],$photoURL);
      $last_id = $db_c->lastInsertId();
      ?><script>
alert("l'avion numero <?=$last_id?> est ajoute avec succes")
</script><?php
    }
  else{
    echo "error";
  }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../000_bootstrap/css/bootstrap.min.css" />
</head>

<body class="p-4">
    <h2>Ajout Avoin</h2>
    <!-- categorie -->
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="categorie">Categorie:</label>
            <select name="categorieAvion" id="categorie" class="form-control">
                <option value="economy">Economy Class Aviation</option>
                <option value="business">Business Class Aviation</option>
                <option value="first">First Class Aviation</option>
                <option value="premium">Premium Economy Class Aviation</option>
            </select>
        </div>
        <!-- numero de places -->
        <div class="form-group">
            <label for="places">Numero de places:</label>
            <input type="number" name="nombrePlace" id="places" class="form-control" required />
        </div>
        <!-- avion photo -->
        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" name="photo" id="photo" accept="image/.png,.jpg,.jpeg" class="form-control" required />
        </div>
        <!-- ajout and reset form  -->
        <div class="form-group mt-2 p-2">
            <input type="submit" onclick="return nbPlace()" name="submit" id="subtn" value="Ajout"
                class="btn btn-primary p-2" />
            <input type="reset" name="reset" value="Reset" class="btn btn-secondary p-2" />
        </div>



    </form>
    <div class="form-group mt-2 p-2">
        <a class="btn btn-success" href="./afficheAvion.php"> Affiche avions </a>
    </div>
    <script>
    function nbPlace() {
        const pl = parseInt(document.getElementById("places").value);
        if (pl < 200 || pl > 300) {
            alert("numero de places 200<places<300")
            return false;
        }
        return true;
    }
    const inputs = [...document.querySelectorAll('input[type="number"]')];

    function zoneSelection(inp) {
        inp.target.style.background = "#eee";

    }
    inputs.forEach(input => {
        input.addEventListener('focus', (event) => {
            zoneSelection(event);

        });
        input.addEventListener("blur", (event) => {
            event.target.style.background = "";
        });
    });
    </script>
</body>

</html>