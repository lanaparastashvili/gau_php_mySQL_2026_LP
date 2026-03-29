<?php

$folder = "files";

if (!is_dir($folder)) {
    mkdir($folder);
}


file_put_contents("$folder/file1.txt", "ტექსტი ფაილი 1");
file_put_contents("$folder/file2.txt", "ტექსტი ფაილი 2");
file_put_contents("$folder/file3.txt", "ტექსტი ფაილი 3");

$filesList = scandir($folder);

echo "<h3>შექმნილი ფაილები:</h3>";
foreach ($filesList as $file) {
    if ($file != "." && $file != "..") {
        echo $file . "<br>";
    }
}
?>
<br><br>
<a href="../index.php">უკან დაბრუნება</a>
