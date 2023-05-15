<?php
session_start();
include __DIR__.'/../database/db_connection.php';
$_SESSION['uemail'] = NULL;
$_SESSION['id'] = NULL;
$_SESSION['admin_name'] = NULL;
$_SESSION['error'] = NULL;
if(isset($_REQUEST['login']))
{
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	$pass= sha1($pass);
	
	if(!empty($email) && !empty($pass))
	{
		$sql = "SELECT * FROM Users where uemail='$email' && upassword='$pass'";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_array($result);
		   if($row){
				$_SESSION['id']=$row['id'];
				$_SESSION['uemail']=$email;
                header("location:profile.php");
		   }
		   else{
			   $error = "<p class='alert' >Email or Password does not match!</p> ";
		   }
	}
	else{
		$error = "<p class='alert'>Please fill all the fields</p>";
	}
}
?>
<?php  require __DIR__. '/../html/header.html'; ?>
<html>
    <body>
        <div class="profile_form login">
        <form method="POST"> 
        <h1>Login to your Profile!</h1>
        <?php echo $_SESSION['error'];?> <?php echo $_SESSION['message'] ?>
               <table class="login_table">
                <tr>
                    <td class="credentials">Email:</td>
                    <td class="field"><input type="email" name = "email" autofocus/></td>
                </tr>
                <tr>
                    <td class="credentials">Password:</td>
                    <td class="field"><input type="password" name = "pass" /></td>
                </tr> 
                <tr>
                    <td id="sub-but" colspan="2"><input class="submit" type="submit" value="Login" name="login"/></td>
                </tr> 
            </table>
            <button id="register-button" ><a  id="register-here" href="register.php">Create new account</a></button>
        </form>
        </div>
        <div class="admin">
        <a href="admin.php"><button  id="admin-button"><p>Admin Login</p></button></a>
        </div>
        <?php require __DIR__ . '/../html/footer.html'; ?>
    </body>
</html>