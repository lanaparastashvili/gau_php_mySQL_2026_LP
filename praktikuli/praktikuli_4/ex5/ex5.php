<?php

$filename = "log.txt";


$date = date("Y-m-d H:i:s");
$logEntry = "[$date] User visited\n";


file_put_contents($filename, $logEntry, FILE_APPEND);

$content = file_get_contents($filename);
echo "<h3>ლოგის ფაილის შიგთავსი:</h3>";
echo nl2br($content);
?>
<br><br>
<a href="../index.php">უკან დაბრუნება</a>
