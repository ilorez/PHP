<?php
    include_once "../backend/connect.php";
    $today = date("Y-m-d");
    
    $tasks = $db_c -> prepare("SELECT `task-id`, `task-value`, `task-date`,`task-state` FROM `tasks` WHERE `task-date` = '$today';");
    $tasks -> execute();
    $tab = $tasks->fetchAll(PDO::FETCH_ASSOC);
    // print_r($tab);
    $IPath = $_SERVER["DOCUMENT_ROOT"]."/PHP/020_ToDoList";
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php   
        include ($IPath."/assets/php/head.html");
        
?>
    <!-- style main section -->
    <link rel="stylesheet" href="../style/main_section.css">

    <title>Today</title>
</head>

<body>
    <?php  
        include ($IPath."/assets/php/header.html");
?>

    <main>
        <section class="tdl-background">
            <div>
                <p class="date-p">Date: <span class="day-date"><?=$today?></span></p>
            </div>
            <div class="to-do-list">

                <!-- ------------------- -->
                <?php foreach($tab as $row){
                    $id = $row["task-id"];
                    $value = $row["task-value"];
                    $state = $row['task-state'];
                ?>
                <div class="task-row">
                    <div class="form-group task-checkbox">
                        <input type="checkbox" onclick="cb_changed(event,this)" class="form-check-input"
                            id="cb-<?=$id?>" <?php
                        if($state){

                            echo "checked";
                        }
                        ?>>
                        <label for="cb-<?=$id?>" <?php 
                        if($state){
                            echo "style='text-decoration: line-through;'";
                        }
                        ?> class="form-label"><?=$value?></label>
                    </div>
                    <div class="task-action">
                        <button class="btn btn-warning" onclick="edit_fn(this)" data_id="<?=$id?>"
                            data_value="<?=$value?>" data_site="today"><i
                                class="fa-solid fa-pen-to-square"></i></button>
                        <a onclick="return confirm('are u sure, you want delete this task ?')"
                            href="/PHP/020_ToDoList/backend/del.php?id=<?=$id?>"><button class="btn btn-danger"><i
                                    class="fa-solid fa-trash"></i></button></a>
                    </div>
                </div>

                <?php 
                    } 
                ?>
                <!-- ------------------- -->
            </div>
            <div class="div-add-button">
                <button class="btn btn-primary" id="add-btn" data_date=<?=$today?>><i
                        class="fa-sharp fa-solid fa-plus"></i></button>
            </div>
        </section>
    </main>
    <?php   
        include ("../assets/php/footer.html");
?>

    <script src="/PHP/020_ToDoList/scripts/scripts.js"></script>


</body>

</html>