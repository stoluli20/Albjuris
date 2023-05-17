<?php
session_start();
include __DIR__ . '/../database/db_connection.php';

class AddProperty{

    private $con;

    public function __construct(){
        
    }
    private $propertyDetails = [
        "name" => "",
        "bed" => 0,
        "kitchen" => 0,
        "bath" => 0,
        "square" => 0,
        "price" => 0,
        "air" => 0,
        "email" => ""
    ];

    public function addProperty($propertyDetails, $con){

        $sql = "INSERT INTO Properties (";

        foreach($propertyDetails as $key => $value){
            $sql.=$key.",";
        }

        $sql[strlen($sql)-1] = ")";
        $sql.=" VALUES (";

        foreach($propertyDetails as $key => $value){
            if($key == "Name"){
                $sql .= "'";
                $sql .= $value."',";   
            }
            elseif ($key == "uemail") {
                $sql .= "'";
                $sql .= $value."',";   
            }
            else $sql .= $value.",";   
                     
        }

        $sql[strlen($sql)-1] = ")";
        $sql.=";";

        mysqli_query($con, $sql);

        return $sql;

    }

}

$property = new AddProperty();
$propertyDetails = [
    "Name" => "Sergei Toluli",
    "Bedrooms" => 0,
    "Kitchen" => 0,
    "Bathrooms" => 0,
    "Square" => 0,
    "Price" => 0,
    "Air_Conditioner" => 0,
    "uemail" => "tolulisergei@gmail.com",
];
echo $property->addProperty($propertyDetails, $con);


// if(!isset($_SESSION['id']) and !isset($_SESSION['admin_name'])){
//     header("Location: login.php");
//     exit;
// }
// if(isset($_SESSION['admin_name'])){
//     include ('admin_dashboard.php');
// }
// else{
//     include ('dashboard.php');
//     $email = $_SESSION['uemail'];
// }
// if (isset($_REQUEST["Add"])){
//     $image_file = $_FILES["image"]["name"];
//     $tempname = $_FILES["image"]["tmp_name"];
//     $folder = "./img/".$image_file;

//     $name = $_REQUEST['address'];
//     $bed = $_REQUEST['bed'];
//     $kitchen = $_REQUEST['kitchen'];
//     $bath = $_REQUEST['bath'];
//     $square = $_REQUEST['square'];
//     $price = $_REQUEST['price'];
//     $air = $_REQUEST['air'];
//     $email = $_SESSION['uemail'];
//     $sql = "INSERT INTO Properties 
//             (Name, Bedrooms, Kitchen, Bathrooms, Square, Price, Air_Conditioner, uemail, property_image) 
//             VALUES 
//             ('$name',$bed,$kitchen,$bath,$square,$price,'$air', '$email','$image_file')";
//     // Execute query
//     mysqli_query($con, $sql);
//     // // Now let's move the uploaded image into the folder: image
//      if (move_uploaded_file("$tempname", "$folder")) {
//      echo "<h3>  Image uploaded successfully!</h3>";
//      } else {
//       "<h3>  Failed to upload image!</h3>";
//      }
// }
?>
<html>
<body>
<div class="my_properties">
<form action="" method="POST" enctype="multipart/form-data">
<table>
<tr>
<td>Address</td>
<td><input type="name" name="address" required></td>
</tr>
<tr>
<td>Bedrooms</td>
<td><input type="number" name="bed" required></td>
</tr>
<tr>
<td>Kitchen</td>
<td><input type="number" name="kitchen" required></td>
</tr>
<tr>
<td>Bathrooms</td>
<td><input type="number" name="bath" required></td>
</tr>
<tr>
<td>Square</td>
<td><input type="number" name="square" required></td>
</tr>
<tr>
<td>Price</td>
<td><input type="number" name="price" required></td>
</tr>
<tr>
<td>Air_Conditioner</td>
<td>
<input type="name" name="air" required>
<!-- <input type="radio" name = "air" id="html" value="NO"><label for="html" required>No</label> -->
</td>
</tr>
<tr>
<td>
<label for="img">Select image:</label>
</td>
<td>
<input type="file" id="img" name="image" required>
</td>
</tr>
</table>
<br><br>
<input type="submit" name = "Add" value='Add'>
</form>
</div>
</body>
</html>