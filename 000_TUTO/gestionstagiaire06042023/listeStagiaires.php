<?php
$fname='';
$lname='';
if(isset($_POST["sb"])){

    extract($_POST);
    $fname=$nom;
    $lname=$prenom;
}
include_once "cnx.ini.php";

$rsltStagiaires = mysqli_query($bdd, "select * from stagiaire where nom like '%$fname%' and prenom like '%$lname%'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Document</title>
    <style>
    table,
    tr,
    th,
    td {
        border: 2px solid black;
        border-collapse: collapse;
    }

    td,
    th {
        text-align: center;
    }

    .aln {
        text-align: left;
    }

    div {
        display: flex;
        justify-content: center;
    }
    </style>
    <script>
    function slcall(chkall) {

        let elts = document.getElementsByClassName("selectst");
        for (let i = 0; i < elts.length; i++) {
            elts[i].checked = chkall.checked;
        }

    }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="ajoutStagiaire.php">Ajouter Stagiaire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listeStagiaires.php">List des stagiaires</a>
                </li>

            </ul>

        </div>
    </nav>
    <h2>Filtre :</h2>
    <form action="#" method="post">
        Nom:<input type="text" name="nom" class="text" value="<?=@$nom?>" require style="width:200px;">
        Prenom:<input type="text" name="prenom" class="text" value="<?=@$prenom?>" require style="width:200px;">
        <input type="submit" name="sb" style="width:100px;">
    </form><br><br>
    <form action="supprimerTout.php" method="post">
        <div>
            <table width="80%">
                <tr>
                    <th width=" 5%"><input type="checkbox" name="selectall" onclick="slcall(this)"></th>
                    <th width=" 5%">id</th>
                    <th width="10%">Nom</th>
                    <th width="10%">Prenom</th>
                    <th width="12%">Date de naissance</th>
                    <th width="7%">Groupe</th>
                    <th width="25%">Avatar</th>
                    <th width="15%">Cv</th>
                    <th>Action</th>
                </tr>
                <!-- boucle php             -->
                <?php while ($lg = mysqli_fetch_assoc($rsltStagiaires)) {

    $infoCv = pathinfo($lg["cvurl"]);

    ?>
                <tr>
                    <td><input type="checkbox" class="selectst" name="stagiaires[]" value="select_<?=$lg["id"]?>"></td>
                    <td>
                        <?=$lg["id"]?>
                    </td>
                    <td class="aln">
                        <?=$lg["nom"]?>
                    </td>
                    <td class="aln">
                        <?=$lg["prenom"]?>
                    </td>
                    <td>
                        <?=$lg["date_nais"]?>
                    </td>
                    <td>
                        <?=$lg["idg"]?>
                    </td>
                    <td><img src="<?=$lg["avatarurl"]?>" title="
                    <?=$lg["nom"]?>" width="60px" height="60px">
                    </td>
                    <td><a href="<?=$lg["cvurl"]?>" download>
                            <?=$infoCv["basename"]?>
                        </a></td>
                    <td><a href="supprimerSt.php?id=<?=$lg["id"]?>"
                            onclick="return confirm('Voulez vous Supprimer  <?=$lg["nom"]?>?');">Supprimer
                        </a></td>
                </tr>
                <?php }?>
                <!-- fin boucle php             -->
            </table>

        </div>

        <br><input type="submit" name="sb" value="supprimerTout"
            onclick="return confirm('Voulez vous Supprimer la liste selectionnée?');">
    </form>

</body>

</html>