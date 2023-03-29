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

    <table class="table table-striped">
        <tr class="thead-dark">
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date Naissance</th>
            <th>Groupe</th>
        </tr>

        <?php
                    while($i=mysqli_fetch_assoc($select_s)){
        
            echo "<tr><td> ".$i["id"]."</td><td> ".$i["nom"]."</td><td> ".$i["prenom"]."</td><td> ".$i["date_naissance"]."</td><td> ".$i["idGroup"]."</td></tr>";}
        
    ?>
    </table>
</main>
</body>

</html>