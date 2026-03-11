<?php
    include "questions.php";

    echo "<pre>";
    print_r($questions);
    echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form action="lecturer.php" method="post" >
    <table border="1">
        <tr>
            <th>Questions</th>
            <th>Answers</th>
            <th>Max Point</th>
        </tr>
        <?php
            for($i=0;$i<5;$i++){
        ?>

        <tr>
            <td><?=($questions[$i]['qustion'])?></td>
            <td><input type="text" name="answer"></td>
            <td><?php echo $questions[$i]['max_point']?></td>
        </tr>
        <?php
            }
        ?>
        <tr>
            <td>Student:</td>
            <td>
                <input type="text" placeholder="Name" name="firstname">
                <input type="text" placeholder="Lastname" name="lastname">
            </td>
            <td>
                <button type="submit">Send</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>