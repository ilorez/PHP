<?php
require_once('session.php');
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
   
           
 require_once('config.php');
    
    
    $select =mysqli_query($db,"SELECT * FROM produit where idprod =".$_GET["id"]);

?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="logout.php"><span class='glyphicon glyphicon-user'> </span>logout</a>
</nav>
<table class="table table-bordered" id="tablavion">  
			
<?php
if($row=mysqli_fetch_array($select)) 
{
        
     ?>
        <tr >
    <td colspan="2">
        <h2> Les information sur le produi <?php echo $row['refpdt'];?></h2>
        </td>
    </tr>
 <tr>
     <td style="height: 300px;width:50%; "> <img src="<?php echo $row['image'];  ?>" style="height: 300px"></td>
     <td style="height: 300px">
         <table style="height: 300px">
             <tr>
                 <td>refpdt </td>
                 <td> <?php echo $row['refpdt'];?></td>
             </tr>
             <tr>
                 <td>libpdt </td>
                 <td> <?php echo $row['libpdt'];?></td>
             </tr>
             <tr>
                 <td>prix </td>
                 <td> <?php echo $row['prix'];?></td>
             </tr>
             <tr>
                 <td>qte </td>
                 <td>  <?php echo $row['qte'];?></td>
             </tr>
             <tr>
                 <td>description </td>
                 <td> <?php echo $row['description'];?></td>
             </tr>
             <tr>
                 <td>type </td>
                 <td> <?php echo $row['type'];?></td>
             </tr>
        </table>
     </td>
 </tr>
    <tr >
    <td colspan="2">
        <a href="product.php" class="btn btn-primary btn-lg btn-block">retour </a>
        </td>
    </tr>
 <?php
}

}
?>
</table>

