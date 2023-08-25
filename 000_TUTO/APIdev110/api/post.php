<?php
$url = 'http://127.0.0.1/ZaherTp/api/produits.php';
$data = array('name' => 'PEC1', 'description' => 'Pencil 2H', 'price' => '2.25', 'category' => '9');

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

$result = curl_exec($ch);
// $options = array(
//     'http' => array(
//         'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
//         'method'  => 'POST',
//         'content' => http_build_query($data)
//     )
// );
// $context  = stream_context_create($options);
// $result = file_get_contents($url, false, $context);//si true
// //cherche le fichier include_path (in php.ini)
// if ($result === FALSE) { /* Handle error */ }
header('Content-Type: application/json');
echo $result;
