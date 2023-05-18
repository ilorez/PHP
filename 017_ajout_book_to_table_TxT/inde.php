<?php
if(isset($_POST["submit"])){
    extract($_POST);
    $row = "<tr><td>$genre</td><td>$auteur</td><td>$titre</td></tr>";
    echo "<table class='table table-dark table-striped'>$row</table>";

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
                <button type="submit" class="btn btn-primary">Ajout</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </main>
</body>

</html>