<?php

if (!isset($_POST['gugzavna'])) {
    
   
    $ricxvi1 = rand(10, 99);
    $ricxvi2 = rand(10, 99);
    
  
    $operacia = rand(1, 2);
    
    if ($operacia == 1) {
        $paser = $ricxvi1 + $ricxvi2;
        $nishani = "+";
    } 
    if ($operacia == 2) { 
        if ($ricxvi1 < $ricxvi2) {
          
            $temp = $ricxvi1;
            $ricxvi1 = $ricxvi2;
            $ricxvi2 = $temp;
        }
        $paser = $ricxvi1 - $ricxvi2;
        $nishani = "-";
    }
    
    $pasuxi = "";
} 

else {
   
    $ricxvi1 = $_POST['r1'];
    $ricxvi2 = $_POST['r2'];
    $nishani = $_POST['nishani'];
    $paser   = $_POST['swori_pasuxi']; 
   
    $sheyvanili = $_POST['chemi_pasuxi'];
    
    if ($sheyvanili == $paser) {
        $pasuxi = "სწორია! ყოჩაღ!";
    } else {
        $pasuxi = "შეცდომაა! სცადეთ თავიდან.";
        
       
        $ricxvi1 = rand(10, 99);
        $ricxvi2 = rand(10, 99);
        $operacia = rand(1, 2);
        
        if ($operacia == 1) {
            $paser = $ricxvi1 + $ricxvi2;
            $nishani = "+";
        } 
        if ($operacia == 2) {
            if ($ricxvi1 < $ricxvi2) {
                $temp = $ricxvi1; $ricxvi1 = $ricxvi2; $ricxvi2 = $temp;
            }
            $paser = $ricxvi1 - $ricxvi2;
            $nishani = "-";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h3>ამოხსენით: 
        <span style="border: 1px solid black; padding: 5px;">
            <?php echo $ricxvi1 . " " . $nishani . " " . $ricxvi2 . " = ?"; ?>
        </span>
    </h3>
    
    <?php if ($pasuxi != "") { echo "<b>" . $pasuxi . "</b><br><br>"; } ?>
    
    <form method="post">
        
        <input type="hidden" name="r1" value="<?php echo $ricxvi1; ?>">
        <input type="hidden" name="r2" value="<?php echo $ricxvi2; ?>">
        <input type="hidden" name="nishani" value="<?php echo $nishani; ?>">
        <input type="hidden" name="swori_pasuxi" value="<?php echo $paser; ?>">
        
        შეიყვანეთ პასუხი:<br>
        <input type="text" name="chemi_pasuxi" required><br><br>
        <input type="submit" name="gugzavna" value="შემოწმება">
    </form>
    
    <br><br>
    <a href="../index.php">უკან დაბრუნება</a>
</body>
</html>
