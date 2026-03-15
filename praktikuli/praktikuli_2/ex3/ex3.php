<?php
$matrix = array();

for($i = 0;$i<6;$i++){
    for($j = 0;$j<5;$j++){
        $matrix[$i][$j] = $i +$j;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>6x5 რიცხვთა მასივი, სადაც თითვეული ელემენტი არის მისი ინდექსების ჯამის ტოლია(i+j)</p>
    <table>
        <?php
        for($i = 0;$i<6;$i++){
            echo "<tr>";
            for($j = 0;$j<5;$j++){
                echo "<td>".$matrix[$i][$j]."</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    <br>
     <br>
     <a href="../index.php">უკან დაბრუნება</a>
</body>
</html>