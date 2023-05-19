<?php
$con = mysqli_connect("localhost", "root", "", "albjuris");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>