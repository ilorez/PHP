<?php
  session_start();
  if(!isset($_SESSION["type"])){
      header("location:../login.php");
  }
  include_once("./.con.php");
  $type = $_SESSION["type"];
  $username = $_SESSION["login"];
  $query = "SELECT `RefPdt`, `LibPdt`, `Prix`, `Qte`, `description`, `image`, `type` FROM `produit`";
  $req_prods = $db_c -> prepare($query);
  $req_prods -> execute();
  $result_tab = $req_prods -> fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>products</title>
    <link rel="stylesheet" href="../../000_bootstrap/css/bootstrap.min.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-1 ps-5 pe-5 d-flex justify-content-between">
        <a class="navbar-brand" href="#">List des produits</a>
        <div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome <?=$username?></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="table-responsive">
        <table class="table table-dark table-striped text-center">
            <thead>
                <th>Reference</th>
                <th>libelle</th>
                <th>Prix</th>
                <th>Quantite</th>
                <th>Description</th>
                <th>Type</th>
                <th>Photo produit</th>
                <th colspan="3">actions</th>

            </thead>
            <tbody>
                <?php
          foreach ($result_tab as $row){
            $ref = $row["RefPdt"];
            $libelle = $row["LibPdt"];
            $prix = $row["Prix"];
            $qte = $row["Qte"];
            $desc = $row["description"];
            $image = $row["image"];
            $type = $row["type"];
        ?>
                <tr>
                    <td><?=$ref?></td>
                    <td><?=$libelle?></td>
                    <td><?=$prix?></td>
                    <td><?=$qte?></td>
                    <td><?=$desc?></td>
                    <td><?=$image?></td>
                    <td><?=$type?></td>
                    <td>sup</td>
                    <td>edit</td>
                    <td>view</td>
                </tr>


                <?php } ?>

            </tbody>
        </table>
    </div>
</body>

</html>