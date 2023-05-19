<?php
session_start();
require("db.php");
require '../html/header.html';

// Check if the user is already logged in
if (isset($_SESSION['email'])) {
    header("Location: profile.php");
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
            // Password is correct, log in the user

            $_SESSION['email'] = $email;
            $_SESSION['userid'] = $user['userid'];
            /*  if ($user['email'] == "krapaj20@epoka.edu.al" ) {
                $_SESSION['admin'] = true;
                header("Location: admin.php");
                exit();
            } else */
            header("Location: profile.php");
            exit();

        } else {
            echo "<div class='form'>
                <h3>Incorrect password.</h3><br/>
                <p class='link'>Click here to <a href='login.php'>try again</a>.</p>
                </div>";
        }
    } else {
        echo "<div class='form'>
            <h3>Invalid username or email address.</h3><br/>
            <p class='link'>Click here to <a href='login.php'>try again</a>.</p>
            </div>";
    }
} else {
?>
   <div class="container mt-4">
    <form class="form-sm" method="post" name="login">
    <h1 class="login-title">Log In</h1>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email Address</label>
            <div class="col-sm-10">
                <input type="text" name="email" id="email" class="form-control" autofocus="true" />
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" id="password" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <input type="submit" value="Login" name="submit" class="btn btn-primary" />
            </div>
        </div>
        <p class="link text-center"><a href="register.php">New Registration</a></p>
    </form>
</div>


<?php
}

require '../html/footer.html';
?>
