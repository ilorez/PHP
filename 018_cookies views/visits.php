<?php
    $c_name = "visits";
    $new_c_value = date("d-m-Y H:i:s", time());
    $expiration = time() + (3600);

    if(!isset($_COOKIE[$c_name])){
        setcookie($c_name,$new_c_value,$expiration);
        $message = "<h4 class='list-title'>C'est votre premiere visite: $new_c_value </h4>";
    }
    else{
    $value = $_COOKIE[$c_name];
    $convert_tab = explode(",",$value);
    array_push($convert_tab,$new_c_value);
    $convert_str = implode(",",$convert_tab);
    setcookie($c_name,$convert_str,$expiration);
    $fois = count($convert_tab);
    $message = "<h4 class='list-title'>Vous avez consulte cette page $fois fois, voice les details:</h4><ul>";
    foreach($convert_tab as $date){
        $message .= "<li>$date</li>";
    }
    $message .= "</ul>";
        
}
    echo $message;


?>
<style>
.list-title {
    font-weight: bold;
    font-size: 18px;
    margin-bottom: 10px;
}
</style>