<?php

require("db.php");
require '../html/header.php';

// Check if the user is already logged in
if (isset($_SESSION['email'])) {
    header("Location: dashboard.php");
    exit();
}

if (isset($_POST['email'])) {
    $email = stripslashes($_POST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($con, $password);


    $query = "SELECT * FROM `users` WHERE email='$email'";
    $result = mysqli_query($con, $query);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $user = mysqli_fetch_assoc($result);


        if (password_verify($password, $user['password'])) {
            session_start();
            // Password is correct, log in the user
            $_SESSION['email'] = $email;
            $_SESSION['userid'] = $user['id'];

            $_SESSION['username'] = $user['username'];
            $_SESSION['type'] = $user['type'];

            if ($user['email'] == "krapaj20@epoka.edu.al") {
                $_SESSION['admin'] = true;
                header("Location: admin.php");
                exit();
            } else
                header("Location: dashboard.php");
            exit();

        } else {
            echo "<div class='form' style='margin-bottom:400px'>
                <h3>Incorrect password.</h3><br/>
               
                <p class='link'>Click here to <a href='login.php'>try again</a>.</p>
                </div>";
        }
    } else {
        echo "<div class='form' style='margin-bottom:400px'>
            <h3>Invalid username or email address.</h3><br/>
            <p class='link'>Click here to <a href='login.php'>try again</a>.</p>
            </div>";
    }
} else {
    ?>
    <div class="container mt-4" style="margin-bottom:200px">
        <form class="form-sm" method="post" name="login" style="
    width: 50%;
    margin: auto;
    margin-top:40px;
">
            <h1 class="login-title">Log In</h1>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="text" name="email" id="email" class="form-control" autofocus="true"
                        placeholder="Email Address" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10" style="margin-left:0">
                    <input type="submit" value="Login" name="submit" class="btn btn-primary">
                </div>
            </div>

        </form>
    </div>


    <?php
}

require '../html/footer.html';
?>