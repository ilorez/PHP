<?php
    $IPath = $_SERVER["DOCUMENT_ROOT"]."/PHP/020_ToDoList";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php   
        include ($IPath."/assets/php/head.html");
        
?>
    <title>Home</title>
    <link rel="stylesheet" href="./style/home_page.css">
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