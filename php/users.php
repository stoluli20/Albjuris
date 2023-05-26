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
        .over{
            margin-left:80px;
            margin-top: 20px;
        }

      
    </style>
</head>

<body>
    <?php
    require __DIR__ . "/../html/header.php";
    include('db.php');

    $sql = "SELECT * from users";
    $result = mysqli_query($con, $sql);
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

            <div class="seearch">
             
                    <nav class="navbar navbar-light center" style="margin-left:70px;">
                        <form class="form-inline" method="POST">
                            <input style="margin-top:10px" class="form-control mr-sm-2" type="search" placeholder="Search" name="search"
                                aria-label="Search">
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"
                                name="seearch">Search</button>
                        </form>
                    </nav>

                    <?php
                    if (isset($_POST['seearch'])) {
                        $s = $_POST['search'];
                        $sql = "select * from users where id='$s' or firstname like '%$s%' or lastname like '%$s%' ";
                    } else
                        $sql = "select * from users";

                    $result = mysqli_query($con, $sql);
                    $crow = mysqli_num_rows($result);

                    if (!$crow)
                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                    else {
?>

            <div class="over">
                <table class="table table-striped bg-white center" style="width:100%; ">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Email</th>
                            <th scope="col">Type</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            $id = $row['id'];
                       
                            $email = $row['email'];
                            
                            $type = $row['type'];

                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $id ?>
                                </th>
                               
                                <td>
                                    <?php echo $email ?>
                                </td>
                             
                                <td>
                                    <?php echo $type ?>
                                </td>
                                <?php
                              
                                    if ($type != 'admin') {
                                        ?>
                                        <td><button class='btn btn-danger' Onclick='ConfirmDelete()'><a
                                                    style='color:white;text-decoration:none'
                                                    href='admindeleteuser.php?id=<?php echo $row['id'] ?>'>Delete</a></button></td>
                                        <?php
                                    } else {
                                        ?>
                                        <td></td>
                                        <?php
                                    }
                                
                                ?>

                            </tr>

                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php }
            ?>
</body>
<html>