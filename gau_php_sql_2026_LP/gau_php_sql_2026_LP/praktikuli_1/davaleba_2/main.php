<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>ნიშნების უწყისი</title>
    <style>
        table { border-collapse: collapse; width: 60%; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        th { background-color: #e9e9e9; }
    </style>
</head>
<body>
    <h2>სტუდენტის ნიშნების უწყისი</h2>
    <form action="" method="POST">
        სტუდენტის სახელი: <input type="text" name="s_name" required><br><br>
        სტუდენტის გვარი: <input type="text" name="s_surname" required><br><br>
        კურსი: <input type="number" name="course" required><br><br>
        სემესტრი: <input type="number" name="semester" required><br><br>
        სასწავლო კურსი: <input type="text" name="subject" required><br><br>
        მიღებული ნიშანი (0-100): <input type="number" name="grade" min="0" max="100" required><br><br>
        ლექტორის სახელი, გვარი: <input type="text" name="lecturer" required><br><br>
        დეკანის სახელი, გვარი: <input type="text" name="dean" required><br><br>
        <input type="submit" name="check_grade" value="შედეგის ნახვა">
    </form>

    <?php
    if (isset($_POST['check_grade'])) {
        $s_name = $_POST['s_name'];
        $s_surname = $_POST['s_surname'];
        $course = $_POST['course'];
        $semester = $_POST['semester'];
        $subject = $_POST['subject'];
        $grade = $_POST['grade'];
        $lecturer = $_POST['lecturer'];
        $dean = $_POST['dean'];

    
        $letter = "";
        $description = "";

        if ($grade >= 91) {
            $letter = "A";
            $description = "ფრიადი";
        } elseif ($grade >= 81) {
            $letter = "B";
            $description = "ძალიან კარგი";
        } elseif ($grade >= 71) {
            $letter = "C";
            $description = "კარგი";
        } elseif ($grade >= 61) {
            $letter = "D";
            $description = "დამაკმაყოფილებელი";
        } elseif ($grade >= 51) {
            $letter = "E";
            $description = "საკმარისი";
        } elseif ($grade >= 41) {
            $letter = "FX";
            $description = "ვერ ჩააბარა (გადაბარების უფლებით)";
        } else {
            $letter = "F";
            $description = "ჩაიჭრა";
        }

        echo "<h3>საბოლოო უწყისი:</h3>";
        echo "<table>";
        echo "<tr><td>სტუდენტი</td><td>$s_name $s_surname</td></tr>";
        echo "<tr><td>კურსი/სემესტრი</td><td>$course კურსი, $semester სემესტრი</td></tr>";
        echo "<tr><td>სასწავლო კურსი</td><td>$subject</td></tr>";
        echo "<tr><td>მიღებული ქულა</td><td>$grade</td></tr>";
        echo "<tr><td>შეფასება</td><td><strong>$letter — $description</strong></td></tr>";
        echo "<tr><td>ლექტორი</td><td>$lecturer</td></tr>";
        echo "<tr><td>დეკანი</td><td>$dean</td></tr>";
        echo "</table>";
    }
    ?>
</body>
</html>
