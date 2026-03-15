 <?php
$cars = array(
    array("Make"=>"Toyota", 
		"Model"=>"Corolla", 
		"Color"=>"White", 
		"Mileage"=>24000, 
		"Status"=>"Sold"),

    array("Make"=>"Toyota", 
		"Model"=>"Camry", 
		"Color"=>"Black", 
		"Mileage"=>56000, 
		"Status"=>"Available"),

    array("Make"=>"Honda", 
		"Model"=>"Accord", 
		"Color"=>"White", 
  		"Mileage"=>15000, 
		"Status"=>"Sold")  );
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
 </head>
 <body>
    <p> ასოციაცური მასივი ცხრილის სახით:</p>
    <table>
        <tr>
            <th>ბრენდი</th>
            <th>მოდელი</th>
            <th>ფერი</th>
            <th>გარბენი</th>
            <th>სტატუსი</th>
        </tr>
        <?php foreach($cars as $car){?>
            <tr>
                <td><?php echo $car["Make"]; ?></td>
                <td><?php echo $car["Model"]; ?></td>
                <td><?php echo $car["Color"]; ?></td>
                <td><?php echo $car["Mileage"]; ?></td>
                <td><?php echo $car["Status"]; ?></td>
            </tr>
            <?php } ?>
    </table>
    <br>
     <a href="../index.php">უკან დაბრუნება</a>
 </body>
 </html>
 