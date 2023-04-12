<?php
include_once "./.connect.php";
$sts = mysqli_query($db_c, "SELECT * FROM `stagaire`")
?>


<table border="1">
    <thead>
        <tr>
            <th>
                id
            </th>
            <th>
                nom
            </th>
            <th>
                prenom
            </th>
            <th>
                date naissance
            </th>
            <th>
                avatar
            </th>
            <th>
                cv
            </th>
            <th>
                Groupe
            </th>
            <th colspan="2">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>

        <?php
            while($st = mysqli_fetch_assoc($sts)){
            echo "<tr>
            <td>".$st["id"]."</td>
            <td>".$st["nom"]."</td>
            <td>".$st["prenom"]."</td>
            <td>".$st["date_naissance"]."</td>";
            ?>
        <td><img src="<?=$st["avatar"]?>" alt="avatar" width="60px" height="60px" /></td>
        <td><a href="<?=$st["cv"]?>" download><?=$st["cv"]?></a></td>
        <td><?=$st["idGroup"]?></td>
        <td><a href="supSt.php?id=<?=$st["id"]?>" onclick="return confirm('are you sure ?')"><input type="button"
                    value="suprimme"></a></td>
        <td><a href="modSt.php?id=<?=$st["id"]?>"><input type="button" value="modifie"></a></td>
        </tr>

        <?php } ?>



    </tbody>
</table>