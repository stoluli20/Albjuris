<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Admin Add Books</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        #customFile,
        label {
            cursor: pointer;
        }

        #tasks-box {
            height: 50vh;
            background-color: #f8f9fa;
            padding: 20px;
        }

        #book-form {
            padding: 20px;
        }
        .form-control{
            margin-bottom: 10px;
        }
        .center{
            display: flex;
            justify-content: center;
        }
        .list-group li a{
           text-decoration: none;
           color: black;
        }
        .list-group li:hover{
            background-color: #343a40;
        }
        .list-group li a:hover{
            color:white
        }
    </style>
</head>

<body>
<?php
<<<<<<< HEAD

=======
>>>>>>> bdb807b38e76cf3c93701c63e6ccbc45afcd43d1
require __DIR__. "/../html/header.php";
?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div id="tasks-box">
                    <h5>Menu</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="admin.php">Shto liber</li></a>
                        <li class="list-group-item"><a href="users.php">Shiko users</li></a>
                    </ul>
                </div>
            </div>

            <?php

            include('db.php');

            // When form submitted, insert values into the database.
            if (isset($_POST['submit'])) {
                $filename = $_FILES["image"]["name"];
                $tempname = $_FILES["image"]["tmp_name"];
<<<<<<< HEAD
                $folder = "/Applications/XAMPP/xamppfiles/htdocs/public_html/images/$filename";
=======
                $folder = "/var/www/html/Web_Project/images/$filename";
>>>>>>> bdb807b38e76cf3c93701c63e6ccbc45afcd43d1
                move_uploaded_file($tempname, $folder);

                $pdf = $_FILES["pdf"]["name"];
                $tempname1 = $_FILES["pdf"]["tmp_name"];
<<<<<<< HEAD
                $folder = "/Applications/XAMPP/xamppfiles/htdocs/public_html/file/$pdf";
=======
                $folder = "/var/www/html/Web_Project/file/$pdf";
>>>>>>> bdb807b38e76cf3c93701c63e6ccbc45afcd43d1
                move_uploaded_file($tempname1, $folder);


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
                            <input type="file" class="custom-file-input" id="customFile" name="image">
                            <label class="custom-file-label" for="customFile">Zgjidh imazhin </label>
                        </div>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="pdf">
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

</html>