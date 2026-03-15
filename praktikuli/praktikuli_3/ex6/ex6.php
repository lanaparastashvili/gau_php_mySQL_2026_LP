<?php

function cxriliJamebit($m, $n, $a, $b) {
    echo "<table border='1'>";
    
    
    $svetebi = array();
    for ($j = 1; $j <= $n; $j++) {
        $svetebi[$j] = 0;
    }
    
   
    for ($i = 1; $i <= $m; $i++) {
        
        echo "<tr>";
        

        $striqonis_jami = 0; 
        
        for ($j = 1; $j <= $n; $j++) {
            
            $ricxvi = rand($a, $b);
            echo "<td>" . $ricxvi . "</td>";
            
            
            $striqonis_jami = $striqonis_jami + $ricxvi;
            
            
            $svetebi[$j] = $svetebi[$j] + $ricxvi;
        }
        
        echo "<td style='background: yellow;'><b>" . $striqonis_jami . "</b></td>";
        
        echo "</tr>";
    }

    echo "<tr style='background: lightgreen;'>";
    for ($j = 1; $j <= $n; $j++) {
        echo "<td><b>" . $svetebi[$j] . "</b></td>";
    }
    echo "<td>-</td>"; 
    echo "</tr>";

    echo "</table>";
}

$error = "";


if (isset($_POST["m"])) {
    $m = $_POST["m"];
    $n = $_POST["n"];
    $a = $_POST["a"];
    $b = $_POST["b"];
    
    if ($m <= 0 || $n <= 0) {
        $error = "რიგები და სვეტები უნდა იყოს დადებითი რიცხვი!";
    }
    if ($a > $b) {
        $error = "a არ უნდა იყოს b-ზე დიდი!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>შ. 3 - სავარჯიშო 6</title>
    <style>
        table { border-collapse: collapse; margin-top: 20px; }
        td { padding: 10px; text-align: center; }
    </style>
</head>
<body>
    <h2>სავარჯიშო 6: სტრიქონების და სვეტების ჯამი</h2>
    
    <form method="post">
        M რიგების რაოდენობა: <input type="number" name="m" required><br><br>
        N სვეტების რაოდენობა: <input type="number" name="n" required><br><br>
        a საწყისი რიცხვი: <input type="number" name="a" required><br><br>
        b საბოლოო რიცხვი: <input type="number" name="b" required><br><br>
        
        <input type="submit" value="შექმნა">
    </form>

    <?php 
    if ($error != "") {
        echo "<h3 style='color: red;'>" . $error . "</h3>";
    } 
    elseif (isset($_POST["m"])) {
        cxriliJamebit($m, $n, $a, $b);
    }
    ?>
    
    <br><br>
    <a href="../index.php">უკან დაბრუნება</a>
</body>
</html>
