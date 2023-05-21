<?php
<<<<<<< Updated upstream
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
=======

?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div id="tasks-box">
                    <h5>Menu</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="admin.php">Shto liber</li></a>
                        <li class="list-group-item"><a href="#">Shiko users</li></a>
                    </ul>
                </div>
            </div>

            <?php

            require('db.php');

            // When form submitted, insert values into the database.
            if (isset($_POST['submit'])) {
                $filename = $_FILES["image"]["name"];
                $tempname = $_FILES["image"]["tmp_name"];
         
             

                $pdf = $_FILES["pdf"]["name"];
                $tempname1 = $_FILES["pdf"]["tmp_name"];
              
              


                $title = stripslashes($_REQUEST['title']);
                $author = stripslashes($_REQUEST['author']);
                $category = stripslashes($_REQUEST['category']);
                $isbn = stripslashes($_REQUEST['isbn']);
                $description = stripslashes($_REQUEST['description']);
                // $ava = stripslashes($_REQUEST['avail']);
                $year = stripslashes($_REQUEST['year']);



                $sql = "SELECT * from books where title='$title'";
                $res = mysqli_query($con, $sql);

                if (mysqli_num_rows($res) > 0) {

                    $row = mysqli_fetch_assoc($res);
                    if ($title == isset($row['title'])) {
                        ?>
                        <div class='form'>
                            <h3>Libri eshte ne databaze</h3><br>
                        </div>
                        <?php
                    }

                } else {
                    $folder = "/Applications/XAMPP/xamppfiles/htdocs/Albjuris/file/$pdf";
                    move_uploaded_file($tempname, $folder);
                    $folder = "/Applications/XAMPP/xamppfiles/htdocs/Albjuris/images/$filename";
                    move_uploaded_file($tempname1, $folder);
                    $query = "INSERT into `books` (id, isbn, title, author, description, year, cat, image, pdf) VALUES ('0','$isbn','$title', '$author', '$description','$year','$category','$filename','$pdf')";
                    $result = mysqli_query($con, $query);

                    if ($result) {

                        ?>
                      

                            <div class='form'>
                                <h3>Libri u regjistrua</h3><br>
                            </div>

                        

                        <?php
                    }else{
                        ?>
                      

                        <div class='form'>
                            <h3>Nodhi nje problem</h3><br>
                        </div>

                    </div>
                    <?php

                    }


                }

            } else {
                ?>

                <div id="book-form">
                    <form class="form" action="" method="post" enctype="multipart/form-data">
                        <h1 class="login-title">Shto Liber</h1>
                        <input type="text" class="form-control" name="title" placeholder="Titulli" required />
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" accept=".jpeg,.jpg,.png" name="image">
                            <label class="custom-file-label" for="customFile">Zgjidh imazhin </label>
                        </div>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" accept=".pdf" name="pdf">
                            <label class="custom-file-label" for="customFile">Zgjidh Pdf</label>
                        </div>
                        <input type="text" class="form-control" name="author" placeholder="Autor" required>
                        <input type="text" class="form-control" name="isbn" placeholder="ISBN" required>
                        <input type="text" class="form-control" name="category" placeholder="Kategori" required>
                        <textarea class="form-control" name="description" placeholder="Pershkrimi" required></textarea>
                        <!-- <input type="text" class="form-control" name="avail" placeholder="Availabilitiy" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required> -->
                        <input type="text" class="form-control" name="year" placeholder="Year" maxlength="4"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        <div class="center">
                        <input type="submit" name="submit" value="Shto" class="btn btn-primary"
                            style="margin-bottom:10px;border-radius:3px" required>
            </div>
                    </form>


                </div>
                <?php
            }
            ?>
</body>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

>>>>>>> Stashed changes
</html>