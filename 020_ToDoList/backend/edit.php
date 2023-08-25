<?php
include_once "./connect.php";
if(isset($_GET["id"])){
    $value = $_GET["value"];
    $id = (int)$_GET["id"];
    $location = "location:/PHP/020_ToDoList/pages/today.php";
    // print_r($_GET);
    // echo $_GET["site"];
    if(isset($_GET["site"])){
        $location = "location:/PHP/020_ToDoList/pages/tomorrow.php";
    }
    // echo 1;
    
    $update = $db_c -> prepare("UPDATE `tasks` SET `task-value`='$value',`task-state`= 0 WHERE `task-id` = $id;");
    // echo 1;
    $update -> execute();
    // echo 2;
    
    if($update){
        // echo $location;
        header($location);
    }else{
        echo "error in updating a task";
    }
}
?>