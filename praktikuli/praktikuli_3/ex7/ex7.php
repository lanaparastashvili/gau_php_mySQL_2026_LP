    
<?php


function sheqmnaVeqtori($m, $a, $b) {
 
    $masivi = array();

    for ($i = 0; $i < $m; $i++) {
        
        $masivi[$i] = rand($a, $b);
    }
    
    return $masivi;
}

$error = "";

if (isset($_POST["m"])) {
    $m = $_POST["m"];
    $a = $_POST["a"];
    $b = $_POST["b"];
    
    if ($m <= 0) {
        $error = "M უნდა იყოს დადებითი!";
    }
    if ($a > $b) {
        $error = "a არ უნდა იყოს b-ზე დიდი!";
    }

    if ($error == "") {
      
        $shevsebuli_masivi = sheqmnaVeqtori($m, $a, $b);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    
    
    <form method="post">
        M ელემენტების რაოდენობა: <input type="number" name="m" required><br><br>
        a საწყისი რიცხვი: <input type="number" name="a" required><br><br>
        b საბოლოო რიცხვი: <input type="number" name="b" required><br><br>
        
        <input type="submit" value="შექმნა">
    </form>

    <?php 
    if ($error != "") {
        echo "<h3 style='color: red;'>" . $error . "</h3>";
    } 
    
    elseif (isset($shevsebuli_masivi)) {
        echo "<h3>ფუნქციამ დააბრუნა შემდეგი მასივი:</h3>";
     
        echo "<b style='font-size: 20px;'>( ";
        
        for ($i = 0; $i < $m; $i++) {
         
            echo $shevsebuli_masivi[$i];
            
            if ($i < $m - 1) {
                echo ", ";
            }
        }
        
        echo " )</b>";
    }
    ?>
    
    <br><br><br>
    <a href="../index.php">უკან დაბრუნება</a>
</body>
</html>
