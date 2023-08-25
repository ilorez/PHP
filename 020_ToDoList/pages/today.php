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
                            data_value="<?=$value?>">Edit</button>
                        <a onclick="return confirm('are u sure, you want delete this task ?')"
                            href="/PHP/020_ToDoList/backend/del.php?id=<?=$id?>"><button
                                class="btn btn-danger">Del</button></a>
                    </div>
                </div>

                <?php 
                    } 
                ?>
                <!-- ------------------- -->
            </div>
            <div class="div-add-button">
                <button class="btn btn-primary" id="add-btn">Add</button>
            </div>
        </section>
    </main>
    <?php   
        include ("../assets/php/footer.html");
?>

    <script src="/PHP/020_ToDoList/scripts/today_page_scripts.js"></script>
    <script src="/PHP/020_ToDoList/000_bootstrap/js/bootstrap.bundle.js"></script>


    <!-- i added this script here because it's need loaded before called by onchage  -->
    <script>
    // add line-through to a label 
    function add_lt(inp) {
        const label = inp.parentNode.children[1];
        if (inp.checked) {
            label.style.textDecoration = 'line-through';
        } else {
            label.style.textDecoration = 'none';
        }
    }

    function executeInBackground(id, inp) {
        var xhr = new XMLHttpRequest();

        // Specify the PHP file's URL
        var url = "/PHP/020_ToDoList/backend/edit_state.php?id=" + id + "&state=" + inp.checked;


        // Open an asynchronous GET request to the PHP file
        xhr.open("GET", url, true);


        xhr.send();


    }

    function cb_changed(event, inp) {
        const id = inp.getAttribute("id").replace("cb-", ""); // Corrected this line
        add_lt(inp);
        executeInBackground(id, inp);
        if (event.shiftKey && inp.checked) {
            const inputs = [...document.querySelector(".to-do-list").querySelectorAll("input[type='checkbox']")];


            for (let i = inputs.length - 1; i >= 0; i--) { // Changed loop conditions and added 'let'
                const inputId = inputs[i].getAttribute("id").replace("cb-", ""); // Corrected getting input ID

                if (parseInt(inputId) < parseInt(id)) {

                    if (inputs[i].checked) {

                        return;
                    } else {
                        inputs[i].checked = true;
                        add_lt(inputs[i]);
                        executeInBackground(inputId, inputs[i]);

                    }
                }
            }

        }


    }
    </script>

</body>

</html>