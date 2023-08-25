<?php
    include_once "../backend/connect.php";
    $today = date("Y-m-d");
    $sel = $db_c -> prepare("SELECT `task-id`, `task-value`, `task-date`,`task-state` FROM `tasks` WHERE `task-date`< '$today' ORDER BY `task-date` DESC;");
    $sel -> execute();
    $tab = $sel -> fetchAll(PDO::FETCH_ASSOC);
    $last_date = $tab[0]['task-date'];
    // echo $last_date;
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
    <!-- all_tasks -->
    <link rel="stylesheet" href="../style/all_tasks.css">


    <title>All Tasks</title>
</head>

<body>
    <?php  
        include ($IPath."/assets/php/header.html");
?>

    <main>
        <section class="tdl-background">

            <div class="to-do-list">
                <?php
                    if(count($tab) == 0){ ?>
                <div>
                    <p class="date-p">There is no records :V</p>
                </div> <?php
                    }else{
                ?>
                <div>
                    <p class="date-p">&#128198; <span class="day-date"><?=$last_date?></span></p>
                </div>
                <?php } ?>
                <!-- ------------------- -->
                <?php foreach($tab as $row){
                    $id = $row["task-id"];
                    $value = $row["task-value"];
                    $state = $row['task-state'];
                    $date = $row['task-date'];
                    if ($date !== $last_date){?>
                <div>
                    <p class="date-p">&#128198; <span class="day-date"><?=$date?></span></p>
                </div>
                <?php
                $last_date = $date;
            }


            ?>

                <div class="task-row">
                    <div class="form-group task-checkbox task-inp-lbl">
                        <input type="checkbox" onclick="cb_changed(this)" class="form-check-input " id="cb-<?=$id?>"
                            disabled <?php
                        if($state){

                            echo "checked";
                        }
                        ?>>
                        <label for="cb-<?=$id?>" class="form-label"><?=$value?></label>
                    </div>

                </div>

                <?php 
                    } 
                ?>
                <!-- ------------------- -->
            </div>

        </section>
    </main>
    <?php   
        include ("../assets/php/footer.html");
?>


    <script src="/PHP/020_ToDoList/000_bootstrap/js/bootstrap.bundle.js"></script>

</body>

</html>