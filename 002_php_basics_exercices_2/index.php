<!-- exercice I -->
<!-- 1 -->
<?php
    echo "______________exercices I:________________<br>";
    echo "______________1________________<br>";
    $note = 12;
    if($note>=18 && $note<=20){
        echo $note." E [18-20]<br>";
    }
    elseif($note>=14 && $note<18){
        echo $note." E [14-18[<br>";
    }
    elseif($note>=10 && $note<14){
        echo $note." E [10-14[<br>";
    }
    elseif($note==0){
        echo $note." = 0<br>";
    }
    else{
        echo $note." E ]-infiny,0[U]0,10[U]20,+infinyt<br>";
    }



?>
<!-- 2 -->
<?php
    echo "______________2________________<br>";
    echo "are ".$note." % 3 or 7:<br>";
    echo ($note%3)||($note%7)? 1:0;
    echo "<br>";
?>
<!-- 3 -->
<?php
    echo "______________3________________<br>";
    $operator= "*";
    $nomber1 = 10;
    $nomber2 = 11;
    switch ($operator){
        case "*":
            echo $nomber1 * $nomber2;
            break;
        case "-":
            echo $nomber1 - $nomber2;
            break;
        case "+":
            echo $nomber1 + $nomber2;
            break;
        case "/":
            echo $nomber1 / $nomber2;
            break;
        default:
            echo $operator." use one of this /*-+";
            break; 
    
    } 
    echo "<br>";
    
     
?>
<!-- exercice II -->
<!-- 1 -->
<?php
    echo "______________exercices II:________________<br>";
    echo "______________1________________<br>";
    $inital = 300;
    $i = 0;
    while ($i <= $inital) {
        $i++;
        
    }
    echo "le nomber d'iterations realisees aver while est ".$i;
    echo " .<br>";

    
    
    $i = 0;
    do {
        $i++;
        
    }while($i <= $inital);
    echo "le nomber d'iterations realisees aver do while est ".$i;
    echo " .<br>";
    


?>
<!-- 2 -->
<?php
    echo "______________2________________<br>";
    $num_donne = 15;
    echo "Les multiples du nombre 3 enter ]0,$num_donne] est: <br>";
    for($i=1;$i<=$num_donne;$i++){
        if ($i%3==0){
            echo $i."<br>";
        }
    }
   
    
     
?>
<!-- 3 -->
<?php
    echo "______________3________________<br>";
    echo "$num_donne ";
    $l = 0;
    for($i=2;$i<$num_donne;$i++){
        if ($num_donne%$i==0){
            echo "ne pas premier";
            
            $l = 1;
            break;
        }
        
    }
    if($l == 0){
        echo "premier";
    }
    echo "<br>";
    
     
?>