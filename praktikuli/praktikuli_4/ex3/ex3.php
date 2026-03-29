<?php

$filename = "data.txt";


if (file_exists($filename)) {
    echo "ფაილი data.txt უკვე არსებობს.";
} else {
    file_put_contents($filename, "New File Created");
    echo "ფაილი არ არსებობდა და წარმატებით შეიქმნა.";
}
?>
<br><br>
<a href="../index.php">უკან დაბრუნება</a>
