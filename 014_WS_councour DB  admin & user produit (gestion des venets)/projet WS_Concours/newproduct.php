<?php 
    require_once('session.php');
    include("config.php");
if(isset($_POST['ins'])) {

        if (!file_exists('productimg')){
            mkdir ('productimg',0777,true);
        }

	$refpdt = $_POST['refpdt'];
	$libpdt = $_POST['libpdt'];
	$prix = $_POST['prix'];
	$qte = $_POST['qte'];
	$description = $_POST['description'];
	$type = $_POST['type'];

	$image =$_FILES['image']['name'];
	$urlimage = 'productimg/' . $image;
			if(move_uploaded_file($_FILES['image']['tmp_name'], $urlimage)) {

				$sql = "INSERT INTO produit (refpdt,libpdt, prix,qte,description,image,type ) VALUES ('$refpdt','$libpdt', '$prix','$qte','$description','$urlimage','$type')";
                
                $ins =  mysqli_query($db,$sql);
                if($ins){
                    
                    header("location:product.php");
                       
                    }
                else 'note inserted !!! ';
                exit();
			}}

?>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style>

</style>

<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="logout.php"><span class='glyphicon glyphicon-user'> </span>logout</a>
    </nav>
    <form method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="center">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    <div class="form-group row">
                        <label for="refpdt" class="col-sm-2 col-form-label">Refpdt</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="refpdt" name="refpdt" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="libpdt" class="col-sm-2 col-form-label">Libpdt</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="libpdt" name="libpdt" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="prix" class="col-sm-2 col-form-label">Prix</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="prix" name="prix" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="qte" class="col-sm-2 col-form-label">Qte</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="qte" name="qte" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="description" name="description" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="image" name="image" accept=".jpg,.png" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">

                            <select name='type' class="form-control">
                                <?php  
 $result =mysqli_query($db,"SELECT * FROM `type produit` ");
while($row=mysqli_fetch_assoc($result)){
?>
                                <option value="<?php echo $row['type']?>"><?php echo $row['type']?></option>

                                <?php
                      }
                      ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="submit" name="ins" value="Ajouter Produit" class="btn btn-primary col-sm-12">
                    </div>
                </div>
            </div>
        </div>

    </form>
</body>

</html>