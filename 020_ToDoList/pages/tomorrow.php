<?php
    include_once "../backend/connect.php";
    $today = date("Y-m-d");
    
    $next_day_times_tamp = strtotime($today. ' +1 day');
    // echo 1;
    $next_day = date("Y-m-d",$next_day_times_tamp);
    // echo 1;
    $tasks = $db_c -> prepare("SELECT `task-id`, `task-value`, `task-date`,`task-state` FROM `tasks` WHERE `task-date` = '$next_day';");
    // echo 1;
    $tasks -> execute();
    // echo 1;
    $tab = $tasks->fetchAll(PDO::FETCH_ASSOC);
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

    <title>Tomorrow</title>
</head>

<body>
    <?php   
        include ($IPath."/assets/php/header.html");
?>

    <main>
        <section class="tdl-background">
            <div>
                <p class="date-p">Date: <span class="day-date"><?=$next_day?></span></p>
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

                        <label for="cb-<?=$id?>" <?php 
                        if($state){
                            echo "style='text-decoration: line-through;'";
                        }
                        ?> class="form-label"><?=$value?></label>
                    </div>
                    <div class="task-action">
                        <button class="btn btn-warning" onclick="edit_fn(this)" data_id="<?=$id?>"
                            data_value="<?=$value?>">Edit</button>
                        <a onclick="return confirm('are u sure, you want delete this task ?')"
                            href="/PHP/020_ToDoList/backend/del.php?site=tomorrow&id=<?=$id?>"><button
                                class="btn btn-danger">Del</button></a>
                    </div>
                </div>

                <?php 
                    } 
                ?>
                <!-- ------------------- -->
            </div>
            <div class="div-add-button">
                <button class="btn btn-primary" id="add-btn" data_date=<?=$next_day?>>Add</button>
            </div>
        </section>
    </main>
    <?php   
        include ("../assets/php/footer.html");
?>

    <script src="/PHP/020_ToDoList/scripts/tomorrow_page_scripts.js"></script>
    <!-- <script src="/PHP/020_ToDoList/000_bootstrap/js/bootstrap.bundle.js"></script> -->




</body>

</html>