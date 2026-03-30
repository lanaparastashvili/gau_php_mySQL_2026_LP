<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folder = trim($_POST["folder_name"]);
    $filename = trim($_POST["file_name"]);
    $text = $_POST["content_text"];
    
    if ($folder == "" || $filename == "") {
        $message = "შეავსეთ ფაილის და საქაღალდის სახელები.";
    } else {
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }
        
        $path = $folder . "/" . basename($filename);
        
        file_put_contents($path, $text . "\n", FILE_APPEND);
        
        $message = "<h4>ფაილის სრული შიგთავსი:</h4>";
        $message .= nl2br(file_get_contents($path));
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <form method="post">
        <label>საქაღალდე:</label><br>
        <input type="text" name="folder_name"><br>
        
        <label>ფაილი:</label><br>
        <input type="text" name="file_name"><br>
        
        <label>ტექსტი:</label><br>
        <textarea name="content_text"></textarea><br>
        
        <button type="submit">შენახვა</button>
    </form>
    <div><?php echo $message; ?></div>
            <br><br>
<a href="../index.php">უკან დაბრუნება</a>
</body>
</html>
