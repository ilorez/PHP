<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <title>Get $ Post</title>
</head>
<main class="container">






    <?php 
        $input_names = array_keys($_POST);
        if (isset($_POST['submit'])){
        for($i=0;$i<count($input_names)-1;$i++)
            echo "<span class='text-info'>Your ".$input_names[$i]."</span> : ".$_POST[$input_names[$i]]."<br>";
        }
    ?>









</main>
</body>

</html>