<?php 
    $note = array(
        
        "said" => 13,
        "badr" => 16,
        "najat"=>15,
         );
    print_r($note);
    $note["karim"] = 10;
    echo "<hr>";
    print_r($note);
    unset($note["badr"]);
    echo "<hr>";

    print_r($note);
    echo "<hr>";
    echo max($note);
    echo "<br>";
    echo min($note);
    echo "<hr>";
    ksort($note);
    print_r($note);
    echo "<hr>";
    arsort($note);
    print_r($note);
    echo "<hr>";
    $sum = round(array_sum($note)/count($note),2);
    print_r($sum);
    echo "<hr>";



?>