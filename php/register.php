<?php
require '../html/header.php';
include_once("db.php");

// Check if the user is already logged in
if (isset($_SESSION['email'])) {
    header('Location: ./index.php');
    exit();
}

if (isset($_REQUEST['email'])) {
    $username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($con, $username);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $name = stripslashes($_REQUEST['firstname']);
    $name = mysqli_real_escape_string($con, $name);
    $surname = stripslashes($_REQUEST['lastname']);
    $surname = mysqli_real_escape_string($con, $surname);
    $reg_date = date("Y-m-d H:i:s");

    $query = "SELECT * FROM `users` WHERE email='$email'";
    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);
    if ($rows == 0) {
        // Register new user
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $type='user';
        $query = "INSERT into `users` (firstname, lastname, email, username, password, reg_date, type)
			VALUES ('$name', '$surname', '$email', '$username', '$hashed_password', '$reg_date', '$type')";
        $result = mysqli_query($con, $query);
        if ($result) {
            $_SESSION['email'] = $email;
            // Redirect to user dashboard page
            header("Location: login.php");
        } else {
            echo "<div class='form'>
					<h3>Registration failed.</h3><br/>
					<p class='link'>Click here to <a href='signup.php'>try again</a>.</p>
					</div>";
        }
    } else {
        echo "<div class='form'>
				<h3>Email already taken.</h3><br/>
				<p class='link'>Please log in instead.</p>
				<p class='link'>Click here to <a href='login.php'> log in</a>.</p>
				</div>";
    }
} else {
    ?>
    <div class="container mt-4">
        <form class="form-registration" method="post" name="registration" style="
    width: 50%;
    margin: auto;
    margin-top:40px;
">
            <h1 class="register-title">Registration</h1>
            <div class="form-group">
                <input type="text" name="firstname" placeholder="First Name" autofocus="true" class="form-control" />
            </div>
            <div class="form-group">
                <input type="text" name="lastname" placeholder="Last Name" class="form-control" />
            </div>
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" class="form-control" />
            </div>
            <div class="form-group">
                <input type="text" name="email" placeholder="Email Address" class="form-control" />
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control" />
            </div>
            <input type="submit" value="Register" name="submit" class="btn btn-primary" />
            <p class="link text-center"><a href="login.php">Already have an account?</a></p>
        </form>
    </div>
    <?php
    require '../html/footer.html';
}
?>