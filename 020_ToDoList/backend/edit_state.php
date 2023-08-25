<?php
include_once "./connect.php";
if(isset($_GET["id"])){
    $state = $_GET["state"];
    $id = (int)$_GET["id"];
    $update = $db_c -> prepare("UPDATE `tasks` SET `task-state`= $state WHERE `task-id` = $id;");
    // echo 1;
    $update -> execute();
    
    if($update){
        
        echo '<script>window.close()</script>';
    }else{
        echo "error in updating a task";
    }
}
?>