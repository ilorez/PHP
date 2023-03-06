<?php 
    $tab1=[[1,2],[3,4]];
    $tab2=[[5,6],[7,8]];
    // $tabf = [[0,0],[0,0]];
    for($i=0;$i<2;$i++){
        for($a=0;$a<2;$a++){
            $tabf[$i][$a] = 0;
            for($j=0;$j<2;$j++){
                $tabf[$i][$a] += $tab1[$i][$j] * $tab2[$j][$a] ;
                
            }
    }
    }
    print_r($tabf);
    echo "<br><hr><br>";
?>
<?php //coded by Othmane
    $tab1 = array(array(1,2),array(3,4));
    $tab2 = array(array(5,6),array(7,8));
    for($i=0;$i<count($tab1);$i++){
        for($j=0;$j<count($tab2);$j++){
            $stab[$i][$j] = $tab1[$i][$j] +$tab2[$i][$j] ;
            echo  $stab[$i][$j] ;
            echo "<br>";

        }
    }

    
    echo "<br>";
    print_r($stab);
    

?>