<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folder = trim($_POST["folder_name"]);
    
    $folder = basename($folder);

    if ($folder == "") {
        $message = "გთხოვთ, შეავსოთ ველი.";
    } else {
        if (is_dir($folder)) {
            $message = "საქაღალდე უკვე არსებობს. მისი შიგთავსი:<br>";
            $files = scandir($folder);
            foreach ($files as $file) {
                if ($file != "." && $file != "..") {
                    $message .= "- $file <br>";
                }
            }
        } else {
            mkdir($folder);
            $message = "საქაღალდე არ არსებობდა და შეიქმნა: $folder";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <form method="post">
        <label>შეიტანეთ საქაღალდის სახელი:</label><br>
        <input type="text" name="folder_name"><br>
        <button type="submit">შესრულება</button>
    </form>
    <p><?php echo $message; ?></p>

    <br><br>
<a href="../index.php">უკან დაბრუნება</a>

</body>
</html>
