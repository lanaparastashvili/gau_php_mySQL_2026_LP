<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folder = trim($_POST["folder_name"]);
    
    if ($folder == "" || !is_dir($folder)) {
        $message = "საქაღალდე არ არსებობს.";
    } else {
        $filesCount = 0;
        $foldersCount = 0;
        $totalSize = 0;
        
        $items = scandir($folder);
        
        foreach ($items as $item) {
            if ($item == "." || $item == "..") {
                continue;
            }
            
            $path = $folder . "/" . $item;
            
            if (is_file($path)) {
                $filesCount++;
                $totalSize += filesize($path);
            } elseif (is_dir($path)) {
                $foldersCount++;
            }
        }
        
        $message = "ფაილების რაოდენობა: $filesCount <br>";
        $message .= "რეგულარული საქაღალდეების რაოდენობა: $foldersCount <br>";
        $message .= "ფაილების ჯამური ზომა: $totalSize ბაიტი";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <form method="post">
        <label>საქაღალდის სახელი სტატისტიკისთვის:</label><br>
        <input type="text" name="folder_name"><br>
        <button type="submit">დათვლა</button>
    </form>
    <p><?php echo $message; ?></p>
            <br><br>
<a href="../index.php">უკან დაბრუნება</a>
</body>
</html>
