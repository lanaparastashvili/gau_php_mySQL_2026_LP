<?php
$nameerror = "";
$emailerror = "";
$gendererror = "";

$name = "";
$email = "";
$gender = "";
$comment = "";

$isvalid = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $isvalid = true;

    if(empty($_POST['name'])){
        $nameerror = "* სახელი აუცილებელია";
        $isvalid = false;
    } else {
        $name = htmlspecialchars($_POST['name']);
    }

    if (empty($_POST["email"])) {
        $emailerror = "* ელ-ფოსტა აუცილებელია";
        $isvalid = false;
    } else {
        $email = htmlspecialchars($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerror = "* არასწორი ელ-ფოსტის ფორმატი";
            $isvalid = false;
        }
    }

    if (empty($_POST["gender"])) {
        $gendererror = " * სქესი აუცილებელია";
        $isvalid = false;
    } else {
        $gender = htmlspecialchars($_POST['gender']);
    }

    if (!empty($_POST["comment"])) {
        $comment = htmlspecialchars($_POST['comment']);
    }
}
?>
<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <span class="error"> <?php echo $nameerror; ?></span>
        </div>

        <div class="form-group">
            <label>E-mail:</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <span class="error"> <?php echo $emailerror; ?></span>
        </div>

        <div class="form-group">
            <label>Comment:</label><br>
            <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
        </div>

        <div class="form-group">
            <label>Gender:</label>
            <input type="radio" name="gender" value="female" <?php if ($gender == "female") echo "checked"; ?>> Female
            <input type="radio" name="gender" value="male" <?php if ($gender == "male") echo "checked"; ?>> Male
            <input type="radio" name="gender" value="other" <?php if ($gender == "other") echo "checked"; ?>> Other
            <span class="error"> <?php echo $gendererror; ?></span>
        </div>

        <input type="submit" value="გაგზავნა">
    </form>

    <?php if ($isvalid == true) { ?>
        <hr>
        <h3>Your Input:</h3>
        <table>
            <tr><th>Name</th><td><?php echo $name; ?></td></tr>
            <tr><th>E-mail</th><td><?php echo $email; ?></td></tr>
            <tr><th>Comment</th><td><?php echo $comment; ?></td></tr>
            <tr><th>Gender</th><td><?php echo $gender; ?></td></tr>
        </table>
    <?php } ?>

    <br><br>
    <a href="../index.php">უკან დაბრუნება</a>
</body>
</html>