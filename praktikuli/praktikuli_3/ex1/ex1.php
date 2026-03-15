<?php
function cxrili(){
    echo "<table border='1'>";
    for($i = 1;$i<=10;$i++){
        echo "<tr>";
        for($j = 1;$j<=10;$j++){
            $ricxvi = rand(10,99);
            echo "<td>".$ricxvi."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
     cxrili(); 
     ?>

     <br>
     <a href="../index.php">უკან დაბრუნება</a>
</body>
</html>