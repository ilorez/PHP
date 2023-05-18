<?php
// create numbers and push it in numbers.txt
    $numbers = fopen("numbers.txt","a+");
    for($i=1;$i<=100;$i+=1){
        fwrite($numbers,"$i\n");
    }
    fclose($numbers);
   
// converst numbers in numbers.txt to bainary
    $numbers = fopen("numbers.txt","r");
    $bainry = fopen("./bainry","a+");
    while (!feof($numbers)){
        $num = fgets($numbers);
        $bin = base_convert($num,10,2);
        fwrite($bainry,"$bin\n");
    }
    fclose($numbers);
    fclose($bainry);

?>






<!-- <?php

    // $fr = fopen("./file.txt","r"); 
    // $fw = fopen("./fileW.txt","a+");
    // while(!feof($fr)){
    //     $l = fgets($fr);
    //     $l = base_convert($l,10,2);
    //     fwrite($fw,"$l\n");
        
    // }
    // fclose($fr);
?> -->