<!-- <?php

if (isset($_COOKIE["username"])) {
    $username = $_COOKIE["username"];
    echo "Welcome back, $username!";
} else {
    $cookie_name = "username";
    $cookie_value = "John Dodde";
    $expiration = time() + (24 * 60 * 60); // 24 hours from now
    setcookie($cookie_name, $cookie_value, $expiration);
}
?> -->


<!-- <?php
// Set the timezone
date_default_timezone_set('UTC');

// Get the current timestamp
$current_time = time();

// Convert the timestamp to the desired format
$formatted_time = date("D d M, H:i", $current_time);

// Print the result
echo $formatted_time;
?> -->

<?php
$str = implode(",",[1,2,3,4]);
$tab = explode(',',$str);
array_push($tab,5);
print_r($tab);


?>