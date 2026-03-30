<?php
$sourceFile = "data.txt";
$backupFolder = "backup";
$destFile = $backupFolder . "/data_copy.txt";

if (!file_exists($sourceFile)) {
    file_put_contents($sourceFile, "ეს არის ტესტი მონაცემები data.txt-ში.");
}

if (!is_dir($backupFolder)) {
    mkdir($backupFolder);
}

copy($sourceFile, $destFile);

echo "<h3>საწყისი ფაილი:</h3>";
echo file_get_contents($sourceFile);

echo "<h3>კოპირებული ფაილი:</h3>";
echo file_get_contents($destFile);
?>
        <br><br>
<a href="../index.php">უკან დაბრუნება</a>