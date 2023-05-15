<?php
session_start();
include __DIR__. '/../database/db_connection.php' ;							
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit;
}
$id = $_SESSION['id'];
$query = "SELECT * from Users WHERE id = '$id'";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
if(isset($_REQUEST['update']))
{
	$name = $_REQUEST['name'];
    $email=$_REQUEST['email'];
	$phone=$_REQUEST['phone'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = '';
    }
    if (strlen($phone)<10){
        $phone = '';
    }
	if(!empty($name) && !empty($email) && !empty($phone)){
    $update_query = "UPDATE Users SET 
    uname = '$name',
    uemail = '$email',
    uphone = '$phone'
    where id='$id'";
    if ($con->query($update_query) === TRUE) {
        $result=mysqli_query($con, $query);
        $row=mysqli_fetch_array($result);
    }
}
}
?>
<!DOCTYPE html>
<html>
 <body>
    <style>
        .set-inp{
            text-align: center;
        }
        .ps{
                background-color: rgb(189, 177, 177);
            }
        button{
            padding: 2%;
        }
    </style>
    <?php include ("dashboard.php"); ?>
    <div class="t-user">
            <form method="POST">
            <?php
            echo "<table border='1' width='100%'>
                  <tr><td colspan='2'>User</td></tr>
                 ";
               foreach($row as $k => $v){
                    if ( gettype($k) != 'integer' && $k != 'id' && $k != 'upassword'){
                        switch($k){
                            case "uname":
                                $name_option = 'name';
                                break;
                            case "uemail":
                                $name_option = 'email';
                                break;
                            case "uphone":
                                $name_option = 'phone';
                                break;
                        }
                        echo "  <tr>
                                <td id='credentials'>$name_option</td>
                                <td id='credentials'><input class='set-inp' type='name' name='$name_option' value='$v'/></td>
                                </tr>
                            ";
                        }   
                }
                echo "<tr><td colspan='2'><button type='submit' name='update'>Save</button></td></tr>"
            ?>
            </form>
        </div>
</body>
</html>