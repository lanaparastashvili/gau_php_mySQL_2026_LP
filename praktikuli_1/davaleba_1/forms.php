<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>სახელფასო უწყისი</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>სახელფასო უწყისის ფორმა</h2>
    <form action="" method="GET">
        სახელი: <input type="text" name="firstname" required><br><br>
        გვარი: <input type="text" name="lastname" required><br><br>
        თანამდებობა: <input type="text" name="position" required><br><br>
        ხელფასი (დარიცხული): <input type="number" name="salary" required><br><br>
        
        საშემოსავლო გადასახადი: 
        <select name="tax_type">
            <option value="fixed">ფიქსირებული 20%</option>
            <option value="custom">სხვა % (მიუთითეთ ქვემოთ)</option>
        </select><br><br>
        სხვა % (თუ აირჩიეთ): <input type="number" name="custom_tax_val" value="0"><br><br>
        
        <input type="submit" name="submit" value="გამოთვლა">
    </form>

 <?php
    if (isset($_GET['submit'])) {
        $fname = $_GET['firstname'];
        $lname = $_GET['lastname'];
        $pos = $_GET['position'];
        $salary = $_GET['salary'];
        $tax_type = $_GET['tax_type'];
        $custom_tax = $_GET['custom_tax_val'];

        if ($tax_type == 'fixed') {
            $tax_percent = 20;
        } else {
            $tax_percent = $custom_tax;
        }

        $tax_amount = ($salary * $tax_percent) / 100;
        $net_salary = $salary - $tax_amount;

        echo "<h3>შედეგი:</h3>";
        echo "<table>";
        echo "<tr><th>დასახელება</th><th>მონაცემი</th></tr>";
        echo "<tr><td>სახელი და გვარი</td><td>$fname $lname</td></tr>";
        echo "<tr><td>თანამდებობა</td><td>$pos</td></tr>";
        echo "<tr><td>ხელფასი (მთლიანი)</td><td>$salary ლარი</td></tr>";
        echo "<tr><td>საშემოსავლო %</td><td>$tax_percent %</td></tr>";
        echo "<tr><td>გადასახადი (თანხა)</td><td>$tax_amount ლარი</td></tr>";
        echo "<tr><td>ხელზე ასაღები</td><td><strong>$net_salary ლარი</strong></td></tr>";
        echo "</table>";
    }
    ?>
</body>
</html>
