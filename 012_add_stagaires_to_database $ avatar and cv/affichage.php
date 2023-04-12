<?php 
include_once ".connect.php";
$select_s = mysqli_query($db_c,"SELECT * FROM `stagaire`");
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../bootstrap.min.css" />
    <title>Get $ Post</title>
</head>
<main class="container">

    <?php 
       
        ?>
    <style>
    td,
    th {
        vertical-align: middle !important;
    }
    </style>
    <table class="table table-striped text-center ">
        <tr class="thead-dark">

            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date Naissance</th>
            <th>Avatar</th>
            <th>CV</th>
            <th>Groupe</th>
            <th colspan="2">Actions</th>
        </tr>

        <?php
                    while($i=mysqli_fetch_assoc($select_s)){
        
            echo "
            <tr>
            <td> ".$i["id"]."</td>
            <td> ".$i["nom"]."</td>
            <td> ".$i["prenom"]."</td>
            <td> ".$i["date_naissance"]."</td>"?>
        <td><img src="<?=$i["avatar"]?>" alt="avatar" width="60px" height="60px" style="border-radius: 100%;"></td>
        <?php
            echo "<td> ".$i["cv"]."</td><td> ".$i["idGroup"]."</td>"?>
        <td><a href='modifySt.php?id=<?=$i["id"]?>'><button class='btn bg-warning'>Modifier</button></a></td>
        <td><a href='removeOneSt.php?id=<?=$i["id"]?>'><button class='btn bg-danger'
                    onclick="return confirm('are you sure ?') ">Suprimme</button></a></td>
        <?php
  }

        ?>
    </table>
</main>
</body>

</html>