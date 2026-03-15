<?php

$matrix = array();

$sum = 0; 
$product = 1; 

for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 4; $j++) {
       
        $randomNumber = rand(10, 100);
        
        $matrix[$i][$j] = $randomNumber;
        
       
        $sum = $sum + $randomNumber;
        
        
        $product = $product * $randomNumber;
    }
}

$avg = $sum / 16;



$max = $matrix[0][0]; 
$min = $matrix[0][0]; 

for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 4; $j++) {
        if ($matrix[$i][$j] > $max) {
            $max = $matrix[$i][$j]; 
        }
        
        if ($matrix[$i][$j] < $min) {
            $min = $matrix[$i][$j]; 
        }
    }
}
$range = $max - $min; 


if (isset($_POST['x'])) {
    $x = $_POST['x'];
    $multiples = array(); 
    
    
    if ($x != 0) {
        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 4; $j++) {
               
                if ($matrix[$i][$j] % $x == 0) {
                  
                    $multiples[] = $matrix[$i][$j]; 
                }
            }
        }
    }
}


function getDigitSum($num) {

    $firstDigit = floor($num / 10); 
    $secondDigit = $num % 10;    
    return $firstDigit + $secondDigit;
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
    <h3>მატრიცა 4x4</h3>
    <table>
        <?php for($i = 0;$i<4;$i++){ ?>
            <tr>
                <?php for($j = 0;$j<4;$j++){ ?>
                    <td><?php echo $matrix[$i][$j]; ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
    <hr>
    <h3>მთავარი დიაგონალის ზემოთ მდგომი ელემენტები:</h3>
    <table>
        <?php for($i = 0;$i<4;$i++){ ?>
            <tr>
                <?php for($j = 0;$j<4;$j++){ ?>
                    <td>
                        <?php 
                            if($j > $i){
                                echo $matrix[$i][$j];
                            }else{
                                echo "-";
                            }
                        ?>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
    <hr>
    <h3>მატრიცის გამოთვლა:</h3>
    <ul>
        <li>მატრიცის ელემენტების ჯამი: <b><?php echo $sum;?></b></li>
        <li>მატრიცის ელემენტების ნამრავლი: <b><?php echo $product;?></b></li>
        <li>მატრიცის ელემენტების საშუალო: <b><?php echo $avg;?></b></li>
        <li>მატრიცის ელემენტების განი(უდიდესს - უმცირესი): <b><?php echo $range;?></b>
            (მაქსიმალური: <b><?php echo $max;?></b>, მინიმალური: <b><?php echo $min;?></b>)</li>
    </ul>
    <br>
     <a href="../index.php">უკან დაბრუნება</a>
</body>
</html>