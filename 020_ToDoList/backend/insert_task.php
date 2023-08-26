<?php
include_once "./connect.php";
if(isset($_GET["value"])){
    $value = $_GET["value"];
    $day = date("Y-m-d");
    $location = "location:/PHP/020_ToDoList/pages/today.php";
    if ($_GET['date'] != $day){
        $day = $_GET['date'];
        $location = "location:/PHP/020_ToDoList/pages/tomorrow.php";
    }
    $ins = $db_c -> prepare("INSERT into `tasks`(`task-id`,`task-value`,`task-date`,`task-state`) values (NULL,'$value','$day',0);");
    $ins -> execute();
    if($ins){
        header($location);
    }else{
        echo "error in inserting a task";
    }
}
?>