<?php
$array = array();


for ($i = 0; $i < 12; $i++) {

    $array[$i] = rand(10, 100);
}


if (isset($_POST['x'])) {

    $x = $_POST['x'];

    $lessCount = 0;
    $greaterCount = 0;


    for ($i = 0; $i < 12; $i++) {

        if ($array[$i] < $x) {
            $lessCount++;
        }

        if ($array[$i] > $x) {
            $greaterCount++;
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>სავარჯიშო 1</title>
</head>

<body>
    <h2>სავარჯიშო 1</h2>


    <p>ჩვენი მასივი: <b>
            <?php
            for ($i = 0; $i < 12; $i++) {
                echo $array[$i];

                if ($i < 11) {
                    echo ", ";
                }
            }
            ?>
        </b></p>


    <form method="post">
        <label>შეიტანეთ X: </label>
        <input type="number" name="x" required>
        <input type="submit" value="გამოთვლა">
    </form>

    <br>

    <?php

    if (isset($_POST['x'])) {
        echo "<div style='background: #e9e9e9; padding: 10px;'>";
        echo "<p>თქვენ შეიტანეთ რიცხვი: <b>" . $x . "</b></p>";
        echo "<p>" . $x . "-ზე <b>ნაკლები</b> ელემენტების რაოდენობაა: <b>" . $lessCount . "</b></p>";
        echo "<p>" . $x . "-ზე <b>მეტი</b> ელემენტების რაოდენობაა: <b>" . $greaterCount . "</b></p>";
        echo "</div>";
    }
    ?>
 <br>
     <a href="../index.php">უკან დაბრუნება</a>
</body>

</html>