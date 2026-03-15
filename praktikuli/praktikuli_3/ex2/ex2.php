<?php

function cxrili($m,$n,$a,$b) {
    echo  "<table border='1'>";
    for($i = 0;$i<=$m;$i++){
        echo "<tr>";
        for($j = 1;$j<=$n;$j++){
            $ricxvi = rand($a,$b);
            echo "<td>".$ricxvi."</td>";
        }
        echo "</tr>";

}
    echo "</table>";
}   
$error = "";
if(isset($_POST['m'])){
    $m = $_POST['m'];
    $n = $_POST['n'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    if($m<=0 || $n<=0 ){
        $error = "რიგები და სვეტები უნდა იყოს დადებითი რიცხვი!";
    } if($a> $b){
        $error = "საწყისი რიცხვი (a) არ უნდა იყოს ბოლოზე (b) დიდი!";
    }
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
    <form method="post">
        M რიგების რაოდენობა :<input type="number" name="m" required><br><br>
        N სვეტების რაოდენობა :<input type="number" name="n" required><br><br>
        a საწყისი რიცხვი :<input type="number" name="a" required><br><br>
        b საბოლოო რიცხვი :<input type="number" name="b" required><br><br>
        <input type="submit" value="შექმნა">
    </form>
    <?php
    if($error != ""){
        echo "<h3 style='color:red;'>".$error."</h3>";
    }elseif(isset($_POST['m'])){
        cxrili($m,$n,$a,$b);
    }
    ?>
    <br>
     <br>
     <a href="../index.php">უკან დაბრუნება</a>
</body>
</html>