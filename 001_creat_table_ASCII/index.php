<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tab SCII</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>This is ASCII Alpha Upper and lower</h1>
    
    <table >
    <tr>
        <th>
            Alpha
        </th>
        <th>
            ASCII
        </th>
        <th>
            Alpha
        </th>
        <th>
            ASCII
        </th>
    </tr>
    <?php for($i=ord("A");$i<=ord('Z');$i++){   ?>
    <tr>
          <td><?php
            echo chr($i) 
            ?></td>  
          <td><?php
          echo $i ?></td>  
          <td><?php
          echo chr($i+32) ?></td>  
          <td><?php
          echo $i+32?></td>  
          
    </tr>
    <?php } ?>
    

    </table>
</body>
</html>