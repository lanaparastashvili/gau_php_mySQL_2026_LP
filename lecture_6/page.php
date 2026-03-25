<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture 6</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="file.php" method="get">
        file name - <input type="text" name="f-name">
        <br><br>
        <button>create file</button>
    </form>
<hr>
    <form action="files1.php" method="get">
        file name - <input type="text" name="f-name">
        <br><br>
        file content - <textarea name="f-content"></textarea>
        <br><br>
        <button>write to file</button>
    </form>
    <hr>
    <div class="content">
        <h1>list of files1</h1>
        <ul>
            <?php
            $d = scandir("files1");
            //echo "<pre>";
            //print_r($d);
            //echo "</pre>";
            for($i = 2; $i<count($d); $i++){
                echo "<p>$d[$i]</p>";
            }
        ?>
    </div>

</body>
</html>
