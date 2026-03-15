<?php

function aqvsTuAraRicxvi($url) {
    $sigrdze = strlen($url); 
    for ($i = 0; $i < $sigrdze; $i++) {
        $simbolo = $url[$i];
        
        if ($simbolo >= '0' && $simbolo <= '9') {
            return true; 
        }
    }
    
    return false;
}

if (isset($_POST["bml"])) {
    $sheyvanili_bml = $_POST["bml"];
    
    $pasuxi = aqvsTuAraRicxvi($sheyvanili_bml);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>შ. 3 - სავარჯიშო 10</title>
</head>
<body style="font-family: sans-serif; margin: 20px;">
    <h2>სავარჯიშო 10: URL ბმულში რიცხვების პოვნა</h2>
    
    <form method="post">
        ჩააკოპირეთ ბმული აქ (მაგ: www.saitebi333.ge):<br>
        <input type="text" name="bml" required style="width:300px;"><br><br>
        <input type="submit" value="შემოწმება">
    </form>

    <?php 
    if (isset($pasuxi)) {
        echo "<hr>";
        echo "<p>ჩაწერილია: <b>" . htmlspecialchars($sheyvanili_bml) . "</b></p>";
        
        if ($pasuxi == true) {
            echo "<h3 style='color: red;'>დიახ! ეს ბმული შეიცავს რიცხვებს.</h3>";
        } 
        else {
            echo "<h3 style='color: green;'>არა! ამ ბმულში საერთოდ არ არის რიცხვები.</h3>";
        }
    }
    ?>
    
    <br><br>
    <a href="../index.php">უკან დაბრუნება</a>
</body>
</html>
