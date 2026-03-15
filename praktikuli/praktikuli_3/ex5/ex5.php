<?php

function ramdenishanaa($ricxvi) {
    
    $ricxvi_minusis_garesh = abs($ricxvi);
    
    $teqsti = (string)$ricxvi_minusis_garesh;
 
    $raodenoba = strlen($teqsti);
    
    return $raodenoba;
}

$pasuxi = ""; 


if (isset($_POST["chemi_ricxvi"])) {
    $sheyvanili = $_POST["chemi_ricxvi"];
    
    $ramdenia = ramdenishanaa($sheyvanili);
    
    $pasuxi = "თქვენი შეყვანილი რიცხვი <b>" . $sheyvanili . "</b> არის <b>" . $ramdenia . "-ნიშნა</b>.";
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
        ჩაწერეთ ნებისმიერი რიცხვი:<br>
        <input type="number" name="chemi_ricxvi" required><br><br>
        <input type="submit" value="შემოწმება">
    </form>
    
    <br>
    <?php 
    if ($pasuxi != "") {
        echo "<p style='color: blue;'>" . $pasuxi . "</p>";
    }
    ?>
    
    <br><br>
        <a href="../index.php">უკან დაბრუნება</a>
</body>
</html>
