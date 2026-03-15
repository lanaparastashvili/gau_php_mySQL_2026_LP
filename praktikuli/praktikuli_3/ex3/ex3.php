<?php
if(!isset($_POST['gagzavna'])){
    $kodi = rand(1000, 9999);
    $pasuxi="";
}
else{
    $kodi = $_POST['dzveli_kodi'];
    $sheyvanili = $_POST['chemi_kodi'];
    if($kodi == $sheyvanili){
        $pasuxi = "კოდი სწორია!";
    }
    else{
        $pasuxi = "არასწორია! სცადეთ თავიდან.";
        $kodi = rand(1000, 9999);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>დაიმახსოვრეთ ეს კოდი: <span style="border: 1px solid black; padding:5px"><?php echo $kodi; ?></span></h3>
    <?php if($pasuxi != ""){ echo "<b>".$pasuxi."</b><br><br>"; } ?>
    <form method="post">
        <input type="hidden" name="dzveli_kodi" value="<?php echo $kodi; ?>">
        შეიყვანეთ კოდი ქვემოთ: <br>
        <input type="text" name="chemi_kodi" required><br><br>">
        <input type="submit" name="gagzavna" value="შემოწმება">
    </form>
    <br><br>
    <a href="../index.php">უკან დაბრუნება</a>
</body>
</html>