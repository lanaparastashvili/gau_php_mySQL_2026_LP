<?php
$filename = "test.txt";
$text = "Hello World";

file_put_contents($filename, $text);

$content = file_get_contents($filename);

echo "ჩაწერილი ტექსტი ფაილში: " . $content;
?>
<br><br>
<a href="../index.php">უკან დაბრუნება</a>
