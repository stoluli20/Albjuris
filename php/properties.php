<html>
  <head>
    <title>Real Estate Properties</title>
   
  </head>

  <body>


<?php 
require  __DIR__ . '/../html/header.html'; 
include __DIR__ . '/../database/db_connection.php';
$sql = 'SELECT * FROM Properties'; 
$result = mysqli_query($con, $sql); 
if (mysqli_num_rows($result) > 0) { 
    while ($row = mysqli_fetch_assoc($result)) { 
      echo "<br><br><br><br>";
    echo '<div style="margin:10% 10%;">';
        echo 'Name: '.$row['Name'].'<br>'; 
        echo 'Bedrooms: '.$row['Bedrooms'].'<br>'; 
        echo 'Kitchen: '.$row['Kitchen'].'<br>'; 
        echo 'Bathrooms: '.$row['Bathrooms'].'<br>'; 
        echo 'Square: '.$row['Square'].'<br>';  
        echo 'Price: '.$row['Price'].'<br>';  
        echo 'Air_Conditioner: '.$row['Air_Conditioner'].'<br>';  
        echo 'uemail: '.$row['uemail'].'<br>';  
       ?>
       <img style='width:180px; margin-left:400px; margin-top:-180px' src="<?php echo $row['property_image']?>"/>
  
  <?php
      echo "<br>";
      echo "</div>";
    }  
} else {  
    echo "
          <div style='margin:10% 40%';>
          <h1>No Properties</h1>
          <a href='login.php'>Login</a>
          <a href='register.php'>Register</a> to add Properties!
          </div>
          ";  
}  
mysqli_close($db);   ?>

  </body>
</html>