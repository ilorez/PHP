<?php
    echo $_GET["name"];
?>
<hr>
<?php
    
    $i = 0;
    do{
        
        echo $_GET["name"]."<br>";
        if ($i >= (int)$_GET['range']){
            break;
        }
        $i++;
        
    }while(true);
?>