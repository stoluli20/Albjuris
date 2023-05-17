<?php
require __DIR__. '/../html/header.html';
session_start();
include __DIR__.'/../database/db_connection.php';
$_SESSION['uemail'] = NULL;
$_SESSION['id'] = NULL;
$_SESSION['admin_name'] = NULL;
$_SESSION['error'] = NULL;


class Login{

    private $con;

    public function __construct($con){
        $this->con = $con;
    }

    public function login(){
        $email=$_REQUEST['email'];
        $pass=$_REQUEST['password'];
        
        if($email == "" || $pass == ""){
            $_SESSION['error'] = "<p class='alert'>Please type your email and password!</p>";
            return False;
        }

        $pass= sha1($pass);

        $sql = "SELECT * FROM Users where uemail='$email' && upassword='$pass'";
		$result=mysqli_query($this->con, $sql);
		$row=mysqli_fetch_array($result);

        if(!$row){
            $_SESSION['error'] = "<p class='alert'>Email or password is incorrect!</p>";
            return False;
        }

        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $email;

        return True;
    }
}

if(isset($_SESSION['id'])){
    header('location:profile.php');
    exit;
}

if(isset($_REQUEST['login']))
{
    $login = new Login($con);
    $login = $login->login();
    if($login){
        header("location:profile.php");
        exit;
    }
}
?>
<html>
    <style>
        <?php require __DIR__. '/../html/style.css'; ?>
    </style>
    <body>
        <div class="page-container">
        <?php require __DIR__ . '/../html/login.html'; ?>
        <script>
            var error = <?php echo json_encode($_SESSION['error']); ?>;
            message(error);
        </script>
        <?php require __DIR__ . '/../html/footer.html'; ?>
    </div>
    </body>
</html>