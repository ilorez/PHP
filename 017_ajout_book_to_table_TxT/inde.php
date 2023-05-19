<?php
if(isset($_POST["submit"])){
    extract($_POST);
    $row = "<tr><td>".htmlentities($genre)."</td><td>".htmlentities($auteur)."</td><td>".htmlentities($titre)."</td></tr>";
    #open file
    $file_path = "./table.html";
    $file = fopen($file_path,"r");
    if ($file){
        $file_size = filesize($file_path);
        $text = fread($file,$file_size);
        #close file
        fclose($file);
        $pstb = strpos($text,"</tbody>");
        $deb = substr($text,0,$pstb );
        $fin = substr($text,$pstb );
        $sum ="$deb $row $fin";
        
        $file = fopen($file_path,"w");
        if ($file){
            fwrite($file,$sum);
            fclose($file);
        header("location:table.html");

        }
        // header("location:table.html");
    }else{
        echo "unnable to opoen this file";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documet</title>
    <link rel="stylesheet" href="../000_bootstrap/css/bootstrap.min.css">
</head>

<body>
    <main class="container">
        <h2 class="bg-dark text-white p-2 text-center">Bibliotheqye: Saisie d'un livre</h2>
        <form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
            <!-- genre  -->
            <div class="form-group">
                <label for="genre" class="form-label">Genre:</label>
                <select name="genre" id="genre" class="form-control">
                    <option value="Roman">Roman</option>
                    <option value="Policier">Policier</option>
                    <option value="Essai">Essai</option>
                </select>
            </div>
            <!-- Auteur -->
            <div class="form-group">
                <label for="auteur" class="form-labe">Auteur:</label>
                <input type="text" name="auteur" id="auteur" class="form-control">
            </div>
            <!-- titre -->
            <div class="form-group">
                <label for="titre" class="form-labe">Titre:</label>
                <input type="text" name="titre" id="titre" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Ajout</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </main>
</body>

</html>