<!-- /* script1 */ -->
<?php 
    echo "-script 1:<br>";
    $a = "Les";
    $b="7 merveilles du monde";
    $c=$a.$b;
    $d=$b+13;
    $b=&$c;
    echo $a."<br>";
    echo $b."<br>";
    echo $c."<br>";
    echo $d."<br>";
    echo "_____________________________<br>";
?>
<!-- /* script2 */ -->
<?php
    echo "-script 2:<br>";
    $a="5+5";
    $b="2E2";
    $c=$a+$b;
    $d=(double)$b;
    echo $a."<br>";
    echo $b."<br>";
    echo $c."<br>";
    echo $d."<br>";
    echo (200 == 2E2)? 1:0 ;
    echo "<br>";
    echo "_____________________________<br>";
?>
<?php 
    echo "-gettype execrice <br>";
    $x="3 fois";
    echo gettype($x)."<br>";
    $x*=5.2;
    echo gettype($x)."<br>";
    $z=$x%5;
    echo gettype($z)."<br>";
    $x= "0" || 1;
    echo gettype($x)."<br>";
    $y=is_string($x);
    echo gettype($y)."<br>";
    echo "_____________________________<br>";
?>
<?php 
    function bool($var){
        if($var) echo 'TRUE<br>';
        else echo 'FALSE<br>';
        }
    bool(""==FALSE);
    bool("0"=="");
    bool(0=="");
    bool(0===FALSE);
    bool("0"==FALSE);
?>