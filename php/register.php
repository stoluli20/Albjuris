<?php
session_start();
include __DIR__ . '/../database/db_connection.php';
// if(header[''])
//     $_SESSION['error'] = NULL;
//     $_SESSION['message'] = NULL;

if(isset($_REQUEST['register'])){
	$name = $_REQUEST['name'];
    $email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
    $number=$_REQUEST['number'];

    // http_response_code(301);
    // header("location:register.php");
    // exit;

    if(!isset($name) && !isset($email) && !isset($pass) && !isset($number)){
        header("location:register.php");
        exit;
    }
    
    $query = "Select * from Users where uemail = '$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);   
   
    if(isset($row)){
        $_SESSION['error'] = "<p class='alert'>Error, user exists!</p>";
        header("location:register.php");
        exit;
    }

    $var = filter_var($email, FILTER_VALIDATE_EMAIL);

    if($var == NULL){
        $_SESSION['error'] = "<p class='alert'>Email is invalid! Please use another one!</p>";
        header("location:register.php");
        exit;
    }

    if(strlen($pass) < 8){
        $_SESSION['error'] = "<p class='alert'>Password must be at least 8 characters long!</p>";
        header("location:register.php");
        exit;
    }

    if(strlen($number) != 10 || !is_numeric($number)){
        $_SESSION['error'] = "<p class='alert'>Please check your phone number!</p>";
        header("location:register.php");
        exit;
    }

    $pass = sha1($pass);
    $query = "INSERT INTO `Users` (uname, uemail, upassword, uphone) VALUES ('$name', '$email', '$pass', '$number')";
    $result=mysqli_query($con, $query);
    if($result){
        $_SESSION['message'] = "<p class='success'>Account created successfully! You can log in now!</p>";
        header("location:login.php");
        exit;
    }
}
?>
<?php  require __DIR__. '/../html/header.html'; ?>
<html>
    <body>
        <div class="profile_form login">
        <form method="POST"> 
        <h1>Sign Up</h1>
        <?php echo $_SESSION['error']?> <?php echo $_SESSION['message'] ?>
               <table class="login_table">
               <tr>
                    <td class="credentials">Name:</td>
                    <td class="field"><input type="name" name = "name" autofocus /></td>
                </tr>
                <tr>
                    <td class="credentials">Email:</td>
                    <td class="field"><input type="text" name = "email" /></td>
                </tr>
                <tr>
                    <td class="credentials">Password:</td>
                    <td class="field"><input type="password" name = "pass" /></td>
                </tr>
                <tr>
                    <td class="credentials">Phone Number:</td>
                    <td class="field"><input type="tel" name = "number" /></td>
                </tr>  
                <tr>
                    <td id="sub-but" colspan="2"><input class="submit" type="submit" value="Register" name="register"/></td>
                </tr>   
            </table>
        </form>
        </div>
        <?php require __DIR__ . '/../html/footer.html'; ?>
    </body>
</html>