<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $source = trim($_POST["source_folder"]);
    $target = trim($_POST["target_folder"]);
    
    if ($source == "" || $target == "") {
        $message = "შეავსეთ ორივე ველი.";
    } elseif (!is_dir($source)) {
        $message = "საწყისი საქაღალდე არ არსებობს.";
    } else {
        if (!is_dir($target)) {
            mkdir($target, 0777, true);
        }
        
        $items = scandir($source);
        $movedCount = 0;
        $movedList = "";
        
        foreach ($items as $item) {
            $sourcePath = $source . "/" . $item;
            
            if (is_file($sourcePath) && pathinfo($sourcePath, PATHINFO_EXTENSION) == "txt") {
                $targetPath = $target . "/" . $item;
                
                if (rename($sourcePath, $targetPath)) {
                    $movedCount++;
                    $movedList .= "- $item <br>";
                }
            }
        }
        
        $message = "სულ გადავიდა ფაილი: $movedCount <br>";
        if ($movedCount > 0) {
            $message .= "გადატანილი ფაილები:<br>" . $movedList;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <form method="post">
        <label>საწყისი საქაღალდე:</label><br>
        <input type="text" name="source_folder"><br>
        
        <label>სამიზნე საქაღალდე:</label><br>
        <input type="text" name="target_folder"><br>
        
        <button type="submit">გადატანა</button>
    </form>
    <p><?php echo $message; ?></p>
            <br><br>
<a href="../index.php">უკან დაბრუნება</a>
</body>
</html>
