<?php
session_start();
include __DIR__ . '/../database/db_connection.php';
if(!isset($_SESSION['id']) and !isset($_SESSION['admin_name'])){
    header("Location: login.php");
    exit;
}
if(isset($_SESSION['admin_name'])){
    include ('admin_dashboard.php');
    $query = "SELECT * from Properties";
    $result=mysqli_query($con, $query);
}
else{
    include ('dashboard.php');
    $email = $_SESSION['uemail'];
    $query = "SELECT * FROM Properties WHERE uemail='$email'";
    $result = mysqli_query($con, $query);
}

?>
<!DOCTYPE html>
<html>
    <body>
        <style>
            .t-user{
                display: none;
            }
            td{
                text-align: center;
            }
            .pp{
                background-color: rgb(189, 177, 177);
            }

            .delete{
                background-color: red;
                border: none;
                width: 50%;
                color: white;

            }
        </style>
    <div class="my_properties">
    <?php
    if(mysqli_num_rows($result) != 0){
    if(isset($_SESSION['uemail'])){
    echo "<h1>My Properties</h1>";
    }
    else echo "<h1>Properties</h1>";
    while($row = mysqli_fetch_array($result)){
        ?><table border='1' width='100%'><?php
        foreach($row as $k => $v){
            if (gettype($k) != 'integer'){
                if ($k != 'id' and $k != 'property_image' and $k != 'uemail'){
                    echo "
                            <tr>
                            <td>$k</td>
                            <td>$v</td>
                            </tr>
                        ";
                    }
            }
        }
        echo "<tr id='no-border'><td colspan='2' id='no-border'><a href=delete_property.php?id=$row[0]>"?><button onclick="return myFunction()" class='delete'>Delete Property</button>
        <?php echo "
                    </a></td></tr>
                    <br>
                    </table>
                ";
    }
    echo "<br>";
    echo "<a href='add_property.php'><button>Add Property</button></a>";
    }
    else
    {
        echo "<h4>There are no users in database!</h4>";
        echo "<a href='add_property.php'><button>Add Property</button></a>";
    }                   
    ?>
        </div>
    </body>
    <script>
function myFunction() {
  return confirm("Are you sure you want to delete this property from your profile?");
}
</script>
</html>