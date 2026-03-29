<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folder = trim($_POST["folder_name"]);
    
    if ($folder == "" || !is_dir($folder)) {
        $message = "საქაღალდე არასწორია ან არ არსებობს.";
    } else {
        $message = "<h3>.txt ფაილები საქაღალდეში ($folder):</h3>";
        $files = scandir($folder);
        $foundAnything = false;

        foreach ($files as $file) {
            $path = $folder . "/" . $file;
            
            if (is_file($path) && pathinfo($path, PATHINFO_EXTENSION) == "txt") {
                $size = filesize($path);
                $date = date("Y-m-d H:i:s", filectime($path));
                
                $message .= "სახელი: $file | ზომა: $size ბაიტი | შეიქმნა: $date <br>";
                $foundAnything = true;
            }
        }

        if (!$foundAnything) {
            $message .= "ამ საქაღალდეში .txt ფაილები არ არის.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <form method="post">
        <label>საქაღალდის სახელი:</label><br>
        <input type="text" name="folder_name"><br>
        <button type="submit">ძებნა</button>
    </form>
    <div><?php echo $message; ?></div>

    <br><br>
<a href="../index.php">უკან დაბრუნება</a>

</body>
</html>
