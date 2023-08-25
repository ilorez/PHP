<?php
include_once "./connect.php";
if(isset($_GET["id"])){
    $id = (int)$_GET["id"];
    $location = "location:/PHP/020_ToDoList/pages/today.php";
    if(isset($_GET["site"])){
        $location = "location:/PHP/020_ToDoList/pages/tomorrow.php";
    }
    $del = $db_c -> prepare("DELETE FROM `tasks` WHERE `task-id` = $id;");
    $del -> execute();
    if($del){
        header($location);
    }else{
        echo "error when tring to delte task number $id";
    }
}
?>