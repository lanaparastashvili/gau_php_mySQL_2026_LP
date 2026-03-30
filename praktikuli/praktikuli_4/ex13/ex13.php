<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folder = trim($_POST["folder_name"]);
    
    if ($folder == "" || !is_dir($folder)) {
        $message = "საქაღალდე ვერ მოიძებნა.";
    } else {
        $files = scandir($folder);
        $summaryText = "";
        $found = false;
        
        foreach ($files as $file) {
            $path = $folder . "/" . $file;
            
            if (is_file($path) && pathinfo($path, PATHINFO_EXTENSION) == "txt" && $file != "summary.txt") {
                $found = true;
                $content = file_get_contents($path);
                
                $summaryText .= "=== ფაილი: $file ===\n";
                $summaryText .= $content . "\n\n";
            }
        }
        
        if (!$found) {
            $message = "ამ საქაღალდეში .txt ფაილები არ არის.";
        } else {
            // ვქმნით summary.txt
            file_put_contents($folder . "/summary.txt", $summaryText);
            $message = "summary.txt წარმატებით შეიქმნა. მისი შიგთავსი:<br><br>" . nl2br($summaryText);
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
        <button type="submit">გაერთიანება</button>
    </form>
    <div><?php echo $message; ?></div>
            <br><br>
<a href="../index.php">უკან დაბრუნება</a>
</body>
</html>
