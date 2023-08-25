<?php
$url = "http://dataservice.accuweather.com/locations/v1/regions?apikey="; // modifier le produit 1
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
$response = curl_exec($ch);
curl_close($ch);
$RegionTab = json_decode($response);
// var_dump($RegionTab);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    </style>
</head>

<body>
    <table>
        <tr>
            <?php
foreach ($RegionTab[0] as $k => $v) {
    ?>
            <th><?=$k?></th>
            <?php
}

?>

        </tr>


        <?php
for ($i = 0; $i < count($RegionTab); $i++) {
    echo "  <tr>";
    foreach ($RegionTab[$i] as $k => $v) {
        ?>
        <td><?=$v?></td>
        <?php
}
    echo "  </tr>";
}

?>

    </table>
</body>

</html>