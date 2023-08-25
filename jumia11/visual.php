<?php
    include "connect.php";
    extract($_GET) ;

    $data=mysqli_query($bdd,"SELECT * FROM produit WHERE RefPdt='$id' ");

    $produit=mysqli_fetch_assoc($data);
    ?>

    <img src="<?= $produit["image"] ?>" alt="" width='100px'>

    <table border=1>
        <tr>
            <th>Reférence</th>
            <td><?= $produit["RefPdt"] ?></td>
        </tr>
        <tr>
            <th>Libellé</th>
            <td><?= $produit["libPdt"] ?></td>
        </tr>
        <tr>
            <th>Prix</th>
            <td><?= $produit["Prix"] ?></td>
        </tr>
        <tr>
            <th>Quantité</th>
            <td><?= $produit["Qte"] ?></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><?= $produit["description"] ?></td>
        </tr>
        <tr>
            <th>Type produit</th>
            <td><?= $produit["type"] ?></td>
        </tr>
    </table>
    <button><a href="produit.php">Return</a></button>

