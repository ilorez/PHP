<?php
include_once "./connect.php";
if(isset($_GET["id"])){
    $value = $_GET["value"];
    $id = (int)$_GET["id"];
    $location = "location:/PHP/020_ToDoList/pages/".$_GET["site"].".php";
    $update = $db_c -> prepare("UPDATE `tasks` SET `task-value`='$value',`task-state`= 0 WHERE `task-id` = $id;");
    $update -> execute();
    if($update){
        header($location);
    }else{
        echo "error in updating a task";
    }
}
?>