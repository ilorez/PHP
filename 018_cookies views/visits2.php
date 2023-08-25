<?php
    $namecookie="visual";
    

    if(!isset($_COOKIE[$namecookie])){
        $date=date("d-m-Y H:i:s");
        setcookie($namecookie,$date,time()+3600);
        echo "this is my first visite in".$date;
    }
    else{
        $cooki=$_COOKIE[$namecookie];
        $date=explode(",",$cooki);
        $date[]=date("d-m-Y H:i:s");
        setcookie($namecookie,implode(",",$date),time()+3600);
        echo "this is your".count($date)."visit<br>";
            for($i=0;$i<count($date);$i++){
            echo "$date[$i].<br>";
            }      
    }
?>