<?php
$array = array();
for ($i = 0; $i < 12; $i++) {
    $array[] = rand(1, 100);
}
if (isset($_POST['x'])) {
    $x = $_POST['x'];
}
$countone = 0;
$counttwo = 0;
for ($i = 0; $i < 12; $i++) {
    if ($array[$i] < $x) {
        $countone++;
    }
    if ($array[$i] > $x) {
        $counttwo++;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lecturer page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <p> მასივი: <b>
            <?php
            for ($i = 0; $i < 12; $i++) {
                echo $array[$i];
                if ($i < 11) {
                    echo ", ";
                }
            }
            ?>
        </b></p>
    <form action="" method="post">
        <input type="number" name="x" required>
        <input type="submit" value="გამოთვლა">
    </form>
    <br>
    <?php
    if (isset($_POST['x'])) {
        echo "<div style='background-color: padding:10px;'>";
        echo "<p> თქვენ შეიტანეთ რიცხვი:<b>" . $x . "</b></p>";
        echo "<P>" . $x . " -ზე ნაკლები ელემენტების  რაოდენობაა: <b>" . $countone . "</b></P>";
        echo "<P>" . $x . " -ზე მეტი ელემენტების  რაოდენობაა: <b>" . $counttwo . "</b></P>";
        echo "</div>";
    }
    ?>
    <br>
    <a href="home.php">უკან დაბრუნება</a>


</body>

</html>