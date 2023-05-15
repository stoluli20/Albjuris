<?php
session_start();
include __DIR__.'/../database/db_connection.php';
$error="";
$msg="";
if(isset($_REQUEST['login']))
{
	$user=$_REQUEST['user'];
	$pass=$_REQUEST['pass'];
    // $user = sha1($user);
    // $pass = sha1($pass);

	if(!empty($user) && !empty($pass))
	{
		$sql = "SELECT * FROM Admin_Users where user='$user' && password='$pass'";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_array($result);
		   if($row){
				$_SESSION['admin_name']=$row['admin_name'];
				header("location:profile.php");
		   }
		   else{
			   $error = "<p class='alert' >Incorrect credentials!</p> ";
		   }
	}
	else{
		$error = "<p class='alert'>Empty fields</p>";
	}
}
?>
<?php  require __DIR__. '/../html/header.html'; ?>
<html>
    <body>
        <h2 style="text-align:center;padding-top:100px;">Admin</h2>
        <div class="profile_form adm" id="div-adm">
        <form id="adm-form" method="POST"> 
        <?php echo $error;?> <?php echo $msg ?>
               <table class="login_table adm">
                <tr>
                    <td class="credentials adm">User:</td>
                    <td class="td-inp"><input class="adm-input" type="password" name = "user"/></td>
                </tr>
                <tr>
                    <td class="credentials adm">Password:</td>
                    <td class="td-inp"><input class="adm-input" type="password" name = "pass" /></td>
                </tr> 
                <tr>
                    <td id="sub-but" colspan="2"><input class="submit adm" type="submit" value="Login" name="login"/></td>
                </tr> 
            </table>
        </form>
</div>
        <?php require __DIR__ . '/../html/footer.html'; ?>
    </body>
</html>