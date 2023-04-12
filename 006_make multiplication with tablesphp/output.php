<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <title>Coefs</title>
</head>

<body>
    <style>
    body {
        padding: 3vw;

    }

    main {
        /* display: flex; */
        display: grid;
        
        flex-wrap: wrap;
    }


    div {
        display: flex;
        flex-direction: column;
    }
    </style>
    <main class="container">


        <?php
    $t = (int)$_GET["tables"];
    $c = (int)$_GET["coef"];
    for($i=1;$i<=$t;$i++){
        echo "<div class='from-group table-bordered col' >";
        for($j=1;$j<=$c;$j++){
            $m = $i*$j;
            echo " <span> $i x $j = $m </span>";
        }
        echo "</div>";
        echo "<hr>";
    }

?>
    </main>
</body>

</html>