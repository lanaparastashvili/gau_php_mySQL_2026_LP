<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folder = trim($_POST["folder_name"]);
    
    if (!preg_match('/^[a-zA-Z0-9_-]+$/', $folder)) {
        $message = "არასწორი სახელი. გამოიყენეთ მხოლოდ ასოები და ციფრები.";
    } else {
        if (is_dir($folder)) {
            $message = "საქაღალდე უკვე არსებობს. ოპერაცია არ შესრულდა.";
        } else {
            mkdir($folder);
            
            $date = date("Y-m-d H:i:s");
            $infoContent = "საქაღალდის სახელი: $folder\nდრო: $date";
            
            file_put_contents($folder . "/info.txt", $infoContent);
            
            $message = "საქაღალდე და info.txt წარმატებით შეიქმნა!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <form method="post">
        <label>ახალი საქაღალდის სახელი:</label><br>
        <input type="text" name="folder_name"><br>
        <button type="submit">შექმნა</button>
    </form>
    <p><?php echo $message; ?></p>
            <br><br>
<a href="../index.php">უკან დაბრუნება</a>
</body>
</html>
