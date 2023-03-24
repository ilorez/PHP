<?php
    if(isset($_POST["submit"])){
        
        echo "hi <br>";
        echo $_FILES['monfichier']['name'].'<br>';
        echo $_FILES['monfichier']['type'].'<br>';
        echo $_FILES['monfichier']['size'].'<br>';
        echo $_FILES['monfichier']['tmp_name'].'<br>';
        echo $_FILES['monfichier']['error'].'<br>';
    }
?>

<hr>
<hr>
<?php
// Testons si le fichier a bien été envoyé et s'il n'y a pas
// d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error']
== 0){
// Testons si le fichier n'est pas trop gros
if ($_FILES['monfichier']['size'] <= 1000000){
    print('the size under 1000000');
}
}
?>

<hr>
<hr>


<?php
    $infosfichier = pathinfo($_FILES['monfichier']['name']);
    $extension_upload = $infosfichier['extension'];
    echo $extension_upload;
?>