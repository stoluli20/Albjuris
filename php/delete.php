<?php
session_start();
require __DIR__ . "/../database/db_connection.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM Users WHERE id = $id";
    mysqli_query($con, $sql);
    header("Location: profile.php");
}
else header("Location: profile.php");
?>