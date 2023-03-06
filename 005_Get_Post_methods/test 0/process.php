<?php
if (isset($_POST['submit'])) {
    // get all the input names
    $input_names = array_keys($_POST)[0];
    print_r($input_names);
    // array(name, email, submit)
}
?>