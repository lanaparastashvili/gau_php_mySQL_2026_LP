<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form{
        border: solid black 1px;
        width: 700px;
        padding: 15px;
        margin: auto;
    }
    .result{
        width: 800px;
        background-color: antiquewhite;
        padding: 20px;
        border: solid black 2px;
        margin: 20px auto;


    }
</style>
<body>
    
<h2>PHP Form Validation Example</h2>
<form method="post">

<label>Name:</label>
<input type="text" name="name" value = "<?php if(isset($_POST['name']))echo $_POST['name'];else echo " " ;?>">

<br><br>

<label>E-mail:</label>
<input type="text" name="email" value="<?php echo isset($_POST['name']) ? $_POST['name'] : " "; ?>">
<br><br>

<label>Website:</label>
<input type="text" name="website">
<br><br>

<label>Comment:</label><br>
<textarea name="comment" rows="5" cols="40"></textarea>
<br><br>

<label>Gender:</label>
<input type="radio" name="gender"> Female
<input type="radio" name="gender"> Male
<input type="radio" name="gender"> Other

<br><br>

<input type="submit" name="submit-form">
<h2>Your Input:</h2>
</form>
<div class="result">
    <?php
        echo "<pre>";
        print_r($_POST);
        echo "<pre>";
        if(isset($_POST['submit-form'])){
            echo "<h3>clicked</h3>";
            if(empty($_POST['name'])){
                echo "<p>name is empty!!</p>";
            }
             if(empty($_POST['email'])){
                echo "<p>email is empty!!</p>";
            }
        }
        
    ?>
</div>

</body>
</html>