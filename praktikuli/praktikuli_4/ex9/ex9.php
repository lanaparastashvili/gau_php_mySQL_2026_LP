<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = trim($_POST["file_name"]);
    
    $filename = basename($filename);

    if ($filename == "") {
        $message = "გთხოვთ შეიყვანოთ ფაილის სახელი.";
    } else {
        if (file_exists($filename)) {
            if (is_file($filename)) {
                unlink($filename);
                $message = "ფაილი წარმატებით წაიშალა.";
            } else {
                $message = "ეს საქაღალდეა, წაშლა არ შეიძლება!";
            }
        } else {
            $message = "ფაილი ვერ მოიძებნა.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <form method="post">
        <label>წასაშლელი ფაილის სახელი:</label><br>
        <input type="text" name="file_name"><br>
        <button type="submit">წაშლა</button>
    </form>
    <p><?php echo $message; ?></p>
        <br><br>
<a href="../index.php">უკან დაბრუნება</a>

</body>
</html>
