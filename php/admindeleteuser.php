<?php

require __DIR__ . "/../html/header.php";
    include('db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

  $id = $_GET['id'];
  $result = mysqli_query($con, "DELETE FROM users where id=$id");
  header("Location: users.php");
} else {
  header("Location: users.php");
}

?>