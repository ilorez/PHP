<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

</head>

<body>

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="logout.php"><span class='glyphicon glyphicon-user'> </span>logout</a>
    </nav>

    <div class="row" id="wrapper">
        <div class="col-md-1"></div>
        <div class="col-md-10">


            <?php
// if()
require_once "config.php";
require_once 'session.php';
echo $_SESSION['username'] . "  (" . $_SESSION['type'] . ")";
if (isset($_GET['id']) && !empty(trim($_GET['id']))) {

    mysqli_query($db, "DELETE FROM produit WHERE idprod =" . $_GET['id']);
}
$type = $_SESSION["type"];
$select = mysqli_query($db, "SELECT * FROM produit ");
?>

            <form enctype="multipart/form-data" id="uploadImageForm">
                <table class="table table-bordered" id="user_table">
                    <tr>
                        <th>Idprod</th>
                        <th>Refpdt</th>
                        <th>Libpdt</th>
                        <th>Prix</th>
                        <th>Qte</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    <?php
while ($row = mysqli_fetch_array($select)) {

    ?>
                    <tr>
                        <td><?php echo $row['idprod']; ?></td>
                        <td><?php echo $row['refpdt']; ?></td>
                        <td><?php echo $row['libpdt']; ?></td>
                        <td><?php echo $row['prix']; ?></td>
                        <td><?php echo $row['qte']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo "<img src=" . $row['image'] . " style='height:100px; width:100px;'>"; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td>
                            <?php echo " <a href='info.php?id=" . $row['idprod'] . "'> <span class='glyphicon glyphicon-eye-open'> </span> </a> " ?>
                            <?php if ($type == "administrateur") {echo " <a href='product.php?id=" . $row['idprod'] . "' onclick='return confirm(\"veuillez supprimer??\");'> <span class='glyphicon glyphicon-trash'> </span> </a> ";}?>
                        </td>
                    </tr>
                    <?php
}
?>

                </table>
                <a class="btn btn-primary" href="newproduct.php"><span class='glyphicon glyphicon-plus-sign'> </span>
                    Nouveau Produit</a>
            </form>
        </div>
    </div>
    <div class="col-md-1"></div>

</body>

</html>