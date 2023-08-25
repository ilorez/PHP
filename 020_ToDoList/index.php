<?php
    $IPath = $_SERVER["DOCUMENT_ROOT"]."/PHP/020_ToDoList";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/PHP/020_ToDoList/000_bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/PHP/020_ToDoList/style/footer_style.css">

    <?php   
        include ($IPath."/assets/php/head.html");
        
?>
    <title>ToDoList</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        color: #333;
    }

    .main-section {
        max-width: 800px;
        margin: 2em auto;
        padding: 2em;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    h1 {
        color: #444;
        font-size: 2.5em;
        margin-bottom: 0.5em;
    }

    h2 {
        color: #333;
        font-size: 1.8em;
        margin-top: 1.5em;
    }

    p {
        font-size: 1.1em;
        line-height: 1.6;
        margin-top: 1em;
    }

    img {
        max-width: 100%;
        height: auto;
        margin: 1.5em 0;
        border-radius: 5px;
        box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
    }
    </style>
</head>

<body>
    <?php   
        include ($IPath."/assets/php/header.html");
        
?>




    <main>
        <div class="main-section">
            <h1>The Benefits of Using Daily To-Do Lists</h1>

            <h2>Increased Productivity</h2>
            <p>Organizing tasks into a daily to-do list can significantly boost your productivity. Prioritization and
                focus lead to efficient task completion.</p>
            <img src="./imgs/productivity.jpg" alt="Productivity" />

            <h2>Goal Achievement</h2>
            <p>Breaking down goals into smaller tasks with to-do lists makes tracking progress easier. This strategy
                enhances your chances of successfully achieving your objectives.</p>
            <img src="./imgs/goal.jpg" alt="Goal Achievement" />

            <h2>Reduced Stress</h2>
            <p>Clear planning provided by daily to-do lists reduces stress. Having a structured approach minimizes
                last-minute rushes and uncertainties.</p>
            <img src="./imgs/stress.avif" alt="Reduced Stress" />

            <h2>Time Management</h2>
            <p>Effective time management is facilitated by to-do lists. Allocating time for each task helps you stay on
                track and make the most of your day.</p>
            <img src="./imgs/time.png" alt="Time Management" />

            <h2>Improved Focus</h2>
            <p>With a well-organized to-do list, you can stay focused on current tasks without getting overwhelmed by
                the bigger picture.</p>
            <img src="./imgs/focus.png" alt="Improved Focus" />
        </div>
    </main>




    <?php   
        include ($IPath."/assets/php/footer.html");
?>



</body>

</html>