<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>სტუდენტის ქვიზი</title>
</head>
<body>
    <h2>სტუდენტის შემოწმება (ქვიზი)</h2>
    <form action="" method="POST">
       
        <p>1. რომელია საქართველოს დედაქალაქი?</p>
        <input type="radio" name="q1" value="a"> ბათუმი<br>
        <input type="radio" name="q1" value="b"> ქუთაისი<br>
        <input type="radio" name="q1" value="c"> თბილისი <br>
        <input type="radio" name="q1" value="d"> გორი<br>

        <p>2. რამდენია 5 + 5?</p>
        <input type="radio" name="q2" value="a"> 8<br>
        <input type="radio" name="q2" value="b"> 10 <br>
        <input type="radio" name="q2" value="c"> 12<br>
        <input type="radio" name="q2" value="d"> 15<br>

        <p>3. რომელია PHP-ის სწორი ცვლადის აღნიშვნა?</p>
        <input type="radio" name="q3" value="a"> var x;<br>
        <input type="radio" name="q3" value="b"> &x;<br>
        <input type="radio" name="q3" value="c"> $x <br>
        <input type="radio" name="q3" value="d"> #x<br>

        <p>4. დაწერეთ PHP-ის სრული სახელი :</p>
        <input type="text" name="q4" required><br>

        <p>5. ვინ არის ამ პროგრამის ავტორი:</p>
        <input type="text" name="q5" required><br><br>

        <input type="submit" name="submit_quiz" value="პასუხების გაგზავნა">
    </form>

    <?php
    if (isset($_POST['submit_quiz'])) {
        $score = 0;

   
        $correct_q1 = "c";
        $correct_q2 = "b";
        $correct_q3 = "c";
        $correct_q4 = "Hypertext Preprocessor";
        $correct_q5 = "ლანა";

    
        if (isset($_POST['q1']) && $_POST['q1'] == $correct_q1) { $score++; }
        if (isset($_POST['q2']) && $_POST['q2'] == $correct_q2) { $score++; }
        if (isset($_POST['q3']) && $_POST['q3'] == $correct_q3) { $score++; }

        if (trim($_POST['q4']) == $correct_q4) { $score++; }
        if (trim($_POST['q5']) == $correct_q5) { $score++; }

        echo "<h2 style='color: green;'>შედეგი:</h2>";
        echo "<h3>სწორი პასუხების რაოდენობა: $score/5</h3>";
    }
    ?>
</body>
</html>
