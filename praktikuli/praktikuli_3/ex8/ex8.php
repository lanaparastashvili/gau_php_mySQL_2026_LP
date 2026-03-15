<?php


function sheqmnaMatrica($m, $n, $a, $b) {
    
    $matrica = array();

    for ($i = 0; $i < $m; $i++) {
      
        for ($j = 0; $j < $n; $j++) {
          
            $matrica[$i][$j] = rand($a, $b); 
        }
    }
    
 
    return $matrica;
}

$error = "";

if (isset($_POST["m"])) {
    $m = $_POST["m"];
    $n = $_POST["n"];
    $a = $_POST["a"];
    $b = $_POST["b"];
    
    if ($m <= 0 || $n <= 0) {
        $error = "რიგები და სვეტები (M, N) უნდა იყოს დადებითი!";
    } elseif ($a > $b) {
        $error = "a არ უნდა იყოს b-ზე დიდი!";
    } else {
       
        $chemi_matrica = sheqmnaMatrica($m, $n, $a, $b);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body style="font-family: sans-serif; margin: 20px;">
    
    <form method="post">
        M (სტრიქონი): <input type="number" name="m" required><br><br>
        N (სვეტი): <input type="number" name="n" required><br><br>
        a (საწყისი): <input type="number" name="a" required><br><br>
        b (საბოლოო): <input type="number" name="b" required><br><br>
        <input type="submit" value="შექმნა">
    </form>
    
    <?php
    if ($error != "") {
        echo "<p style='color: red;'>" . $error . "</p>";
    } elseif (isset($chemi_matrica)) {
        
        echo "<br><h3>ფუნქციამ დააბრუნა შემდეგი მატრიცა:</h3>";
        
        
        echo "<table border='1'>";
        
        for ($i = 0; $i < $m; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $n; $j++) {
                echo "<td style='padding:10px;'>" . $chemi_matrica[$i][$j] . "</td>";
            }
            echo "</tr>";
        }
        
        echo "</table>";
    }
    ?>
    
    <br><br><br>
    <a href="../index.php">უკან დაბრუნება</a>
</body>
</html>
