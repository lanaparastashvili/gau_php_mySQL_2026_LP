<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST["user_text"];
    $filename = "user.txt";

    if (trim($text) == "") {
        $message = "გთხოვთ, შეავსოთ ველი.";
    } else {
  
        file_put_contents($filename, $text);
        

        $content = file_get_contents($filename);
        $message = "ფაილის შიგთავსი: " . $content;
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <form method="post">
        <label>შეიტანეთ ტექსტი:</label><br>
        <textarea name="user_text"></textarea><br>
        <button type="submit">გაგზავნა</button>
    </form>
    <p><?php echo $message; ?></p>

    <br><br>
<a href="../index.php">უკან დაბრუნება</a>

</body>
</html>
