<?php
// $url = 'http://127.0.0.1/zahertp/api/produits.php';
$url = 'http://127.0.0.1/PHP/000_TUTO/APIdev110/api/produits.php';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$output = curl_exec($ch);
// $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
// echo $httpcode;
curl_close($ch);
//header('Content-Type: application/json');

$parsed_json = json_decode($output, true);
// echo $output;

//echo 'HTTP code: ' .$httpcode."<br>". $o;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>description</th>
            <th>price</th>
            <th>category id</th>
        </tr>
        <?php
foreach ($parsed_json as $key => $val) {
    ?>
        <tr>
            <td><?=$val["id"]?></td>
            <td><?=$val["name"]?></td>
            <td><?=$val["description"]?></td>
            <td><?=$val["price"]?></td>
            <td><?=$val["category_id"]?></td>
        </tr>
        <?php
}?>
    </table>




</body>

</html>