<?php
session_start();
if (!isset($_SESSION["type"])) {
    header("login.php");
    exit();
}
?>