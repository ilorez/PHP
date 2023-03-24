<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../bootstrap.min.css" />
    <title>Get $ Post</title>
</head>
<main class="container">

    <?php 
        $input_names = array_keys($_POST);
        if (isset($_POST['submit'])){
            $Motif[] = "/./"; #name
            $Motif[] = "/^.{1,}@.{1,}$/"; #email
            $Motif[] = "/^0(6|5) ([0-9]{2} ){3}[0-9]{2}$/"; # tele number
            $Motif[] = "/./"; #adresse
            $Motif[] = "/^[0-9]{5}$/"; # code postal 
        ?>

    <table class="table table-striped">
        <tr class="thead-dark">
            <th>Input name</th>
            <th>Value</th>
            <th>Valid</th>
        </tr>

        <?php
        for($i=0;$i<count($input_names)-1;$i++){
            if(preg_match($Motif[$i],$_POST[$input_names[$i]])){
                $valid = "True";
            }
            else{
               $valid = "False";
            }
            echo "<tr><td> ".$input_names[$i]."</td><td> ".$_POST[$input_names[$i]]."</td><td> ".$valid."</td></tr>";}
        }
        
    ?>
    </table>
</main>
</body>

</html>