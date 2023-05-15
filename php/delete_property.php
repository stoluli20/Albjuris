<?php
session_start();
require __DIR__ . "/../database/db_connection.php";


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM Properties WHERE id = $id";
    mysqli_query($con, $sql);
    header("Location: my_properties.php");
}
else header("Location: my_properties.php");
?>