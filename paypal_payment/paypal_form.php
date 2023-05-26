<?php
session_start();
if($_SESSION['purchase'] == 'paid'){
    include('paypal_button.html');
}