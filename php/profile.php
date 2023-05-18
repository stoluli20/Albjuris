<?php
session_start();
include __DIR__. '/../database/db_connection.php' ;		

function profile($con){
    if(!isset($_SESSION['id']) and !isset($_SESSION['admin_name'])){
        header("Location: login.php");
        exit;
    }
    if(isset($_SESSION['admin_name'])){
        include ('admin_dashboard.php');
        $query = "SELECT * from Users";
        $result=mysqli_query($con, $query);
        return ['user' => 'admin', 'result' => $result];
    }
    else{
        include ('dashboard.php');
        $id = $_SESSION['id'];
        $query = "SELECT * from Users WHERE id = '$id'";
        $result=mysqli_query($con, $query);
        $row=mysqli_fetch_array($result);
        return ['user' =>  'user', 'row' => $row];
    }
}

$profile = profile($con);
if($profile['user'] == 'admin') $result = $profile['result'];
else $row = $profile['row'];

?>
<style>
            .my_properties{
                margin-top: 10%;
                margin-left: 40%;
                float: left;
                width: 30%;
                border: none;
            }
            #credentials{
                width:50%;
            }
            .pd{
                background-color: rgb(189, 177, 177);
            }
            .delete{
                background-color: red;
                border: none;
                width: 50%;
                color: white;

            }
            #no-border{
                border: none;
            }
</style>
<div class="my_properties">
<?php
if(isset($_SESSION['id'])){
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
                  <td id='credentials'>$v</td>
                  </tr>
              ";
          }   
  }
}
else {
echo "<h1>Admin: ". $_SESSION['admin_name'] . "</h1>";
if(mysqli_num_rows($result) == 0){
    echo "<h4>There are no users in database!</h4>";
}
while($row = mysqli_fetch_array($result)){
    echo "<br><table border='1px' width='100%'>";
    foreach($row as $k => $v){
            if (gettype($k) != 'integer' && $k != 'id' && $k != 'upassword'){
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
                        <td id='credentials'>$v</td>
                        </tr>
                    ";
                }
        }
        echo
        "<tr id='no-border'><td colspan='2' id='no-border'><a href=delete.php?id=$row[0]>"?><button onclick="return myFunction()" class='delete'>Delete User</button>
<?php echo "</a></td></tr>
         <br>
         </table>
        ";
    }
}   
?>
<script>
function myFunction() {
  return confirm("Are you sure you want to delete user from database?");
}
</script>
</div>
