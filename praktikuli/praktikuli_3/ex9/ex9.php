<?php

function parolisDzala($paroli) {
    $sigrdze = strlen($paroli);
    
    $aqvsDidAso = false;
    $aqvsPataraAso = false;
    $aqvsCifri = false;
    
    for ($i = 0; $i < $sigrdze; $i++) {
        $simbolo = $paroli[$i]; // მიმდინარე ასო
        
        if ($simbolo >= 'A' && $simbolo <= 'Z') {
            $aqvsDidAso = true;
        }
        if ($simbolo >= 'a' && $simbolo <= 'z') {
            $aqvsPataraAso = true;
        }
        if ($simbolo >= '0' && $simbolo <= '9') {
            $aqvsCifri = true;
        }
    }
    

    if ($sigrdze < 8) {
        return "<b style='color: red;'>სუსტი (ძალიან მოკლე)</b>";
    }
    
    $ramdeni_gansxvavebulia = intval($aqvsDidAso) + intval($aqvsPataraAso) + intval($aqvsCifri);
    
    if ($ramdeni_gansxvavebulia == 1) {
        return "<b style='color: red;'>სუსტი (მარტო ციფრები ან მარტო 1 ტიპის ასოებია)</b>";
    }
    
    if ($ramdeni_gansxvavebulia == 2) {
        return "<b style='color: orange;'>საშუალო (კარგია, მაგრამ დაამატეთ დიდი ან პატარა ასო)</b>";
    }
    
    if ($ramdeni_gansxvavebulia == 3) {
        return "<b style='color: green;'>მძლავრი (საუკეთესოა!)</b>";
    }
    
    return "ვერ დადგინდა";
}


if (isset($_POST["chemi_paroli"])) {
    $paroli = $_POST["chemi_paroli"];
    
    $shedegi = parolisDzala($paroli);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body style="font-family: sans-serif; margin: 20px;">
    
    <p>კარგი პაროლი უნდა იყოს 8 სიმბოლოზე მეტი, შეიცავდეს: დიდ ასოს, პატარა ასოს და ციფრს.</p>
    
    <form method="post">
        ჩაწერეთ პაროლი სატესტოდ:<br>
        <input type="text" name="chemi_paroli" required><br><br>
        <input type="submit" value="შემოწმება">
    </form>
    
    <?php
    if (isset($shedegi)) {
        echo "<hr>";
        echo "<p>თქვენი პაროლი: <b>" . htmlspecialchars($paroli) . "</b></p>";
        echo "<p>სიმძლავრე: " . $shedegi . "</p>";
    }
    ?>
    
    <br><br>
    <a href="../index.php">უკან დაბრუნება</a>
</body>
</html>
