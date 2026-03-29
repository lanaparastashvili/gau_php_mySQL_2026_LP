<?php

$filename = "numbers.txt";
$content = "";


for ($i = 0; $i < 10; $i++) {
    $randomNumber = rand(1, 100);
    $content .= $randomNumber . "\n";
}

file_put_contents($filename, $content);


$lines = file($filename, FILE_IGNORE_NEW_LINES);
$sum = 0;

echo "გენერირებული რიცხვები:<br>";
foreach ($lines as $num) {
    if (is_numeric($num)) {
        echo $num . "<br>";
        $sum += $num;
    }
}

echo "<strong>ამ რიცხვების ჯამი არის: $sum</strong>";
?>
<br><br>
<a href="../index.php">უკან დაბრუნება</a>

