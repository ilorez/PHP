<?php
    include "connect.php";
    $data=mysqli_query($bdd,"SELECT * FROM produit");
    
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border=2>
        <tr>
            <th>Reférence</th>
            <th>Libellé</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Description </th>
            <th>Type produit</th>
            <th>Photo produit</th>
            <th>Action</th>
        </tr>
        <?php
        while ($produit=mysqli_fetch_assoc($data)){?>
        <tr>
            <td><?= $produit['RefPdt']?></td>
            <td><?= $produit['libPdt']?></td>
            <td><?= $produit['Prix']?></td>
            <td><?= $produit['Qte']?></td>
            <td><?= $produit['description']?></td>
            <td><?= $produit['type']?></td>
            <td><img src="<?= $produit['image'] ?>" alt="" width="80px" height="80px"></td>
            <td>
                <?php
                    if ($_COOKIE["login"]=="admin" && $_COOKIE["password"]=="admin"){
                        ?>
                <a href="suprimer.php?id=<?= $produit['RefPdt'] ?>">SUP</a>
                <a href="visual.php?id=<?= $produit['RefPdt'] ?>">AFF</a>
                <a href="edit.php?id=<?= $produit['RefPdt'] ?>">EDIT</a>
                <?php
                    }
                    else{ ?>
                <a href="visual.php?id=<?= $produit['RefPdt'] ?>">AFF</a>
                <?php }
                ?>
            </td>
        </tr>
        <?php } ?>
    </table>
    <a href="delecokie.php">log out</a>
</body>

</html>