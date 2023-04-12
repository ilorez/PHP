<?php
// import file commands
    // require >> stop on error
    // include >> affiche error on found and doesn't stop
    // require_once
    // include_once
    include_once "connect.php" ;
    $re = mysqli_query($bdd ,"SELECT * FROM `groupe`");
    while ($lg = mysqli_fetch_assoc($re)){
        echo $lg["idg"]. "==>" . $lg["nomg"]."<br>"; 
}
mysqli_free_result($re);
mysqli_close($bdd);
?>