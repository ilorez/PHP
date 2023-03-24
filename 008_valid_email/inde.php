<?php 
$email = "zobairnajdaoui@gmail.com";
if (filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo  "valid";
}
else{
    echo "Invalid";
}
?>