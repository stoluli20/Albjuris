<?php
session_start();
include __DIR__ . '/../database/db_connection.php';

$_SESSION['error'] = NULL;
$_SESSION['message'] = NULL;

class Register{

    private $con;

    public function __construct($con){
        $this->con = $con;
    }

    function register(){
            
            $name = $_REQUEST['name'];
            $email=$_REQUEST['email'];
            $pass=$_REQUEST['password'];
            $number=$_REQUEST['number'];
    
        
            if( $name == "" || $email == "" || $pass == "" || $number == ""){
                $_SESSION['error'] = "<p class='alert'>Please fill all the fields!</p>";
                return False;
            }
            
            $query = "Select * from Users where uemail = '$email'";
            $result = mysqli_query($this->con, $query);
            $row = mysqli_fetch_array($result);   
           
            if(isset($row)){
                $_SESSION['error'] = "<p class='alert'>Error, user exists! Email is used!</p>";
                return False;
            }
        
            $var = filter_var($email, FILTER_VALIDATE_EMAIL);
        
            if($var == NULL){
                $_SESSION['error'] = "<p class='alert'>Email is invalid! Please use another one!</p>";
                return False;
            }
        
            if(strlen($pass) < 8){
                $_SESSION['error'] = "<p class='alert'>Password must be at least 8 characters long!</p>";
                return False;
            }
        
            if(strlen($number) != 10 || !is_numeric($number)){
                $_SESSION['error'] = "<p class='alert'>Please check your phone number!</p>";
                return False;
            }
        
            $pass = sha1($pass);
            $query = "INSERT INTO `Users` (uname, uemail, upassword, uphone) VALUES ('$name', '$email', '$pass', '$number')";
            $result=mysqli_query($this->con, $query);
            if($result){
                $_SESSION['message'] = "<p class='success'>Account created successfully! You can log in now!</p>";
                return True;
            }
            else{
                $_SESSION['error'] = "<p class='alert'>There was a problem with server while creating account! Try again later!</p>";
                return False;
            }
    }
}

if(isset($_REQUEST['register'])){
    $register = new Register($con);
    $register = $register->register();
    if($register){
        header("location:login.php");
        exit;
    }
}

?>
<?php  require __DIR__. '/../html/header.html'; ?>
<html>
    <body>
        <style><?php require __DIR__. '/../html/style.css'; 
                     require __DIR__. '/../html/registerStyle.css'; 
        ?></style>
        <div class="page-container">
        <?php require __DIR__. '/../html/register.html'; ?>
        <script>
            var error = <?php echo json_encode($_SESSION['error']); ?>;
            message(error);
        </script>
        <?php require __DIR__ . '/../html/footer.html'; ?>
</div>
    </body>
</html>