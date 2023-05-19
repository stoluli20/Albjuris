<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .center {
            display: flex;
            justify-content: center;
        }

        .list-group .list-group-item:hover {
            background-color: #212529;
            text-decoration: none;

        }

        .list-group .list-group-item a:hover {
            background-color: #212529;
            text-decoration: none;
            color: white;
        }

        .card-body {
            text-align: center;
            padding: 2px;
        }

        .container {
            margin-left: 40px;
        }

        .img-fixed-size {
            width: 100%;
            height: 250px;
            border: 1px solid gray;
        }


        .card {

            border: none;
            margin-top: 20px;
            border-radius: none;

        }

        .noline {
            text-decoration: none;
            color: black;
        }

        button a:hover{
            text-decoration: none;
            color:white
        }

        @media only screen and (max-width: 770px) {
            .col-lg-9 {
                margin: auto;
                width: 50%;
                padding: 10px;
            }

            .container {

                margin-left: auto;

            }
        }
    </style>
</head>

<body>
    <?php
    require '../html/header.php';
    require "db.php";

    function query($result)
    {

        while ($row = mysqli_fetch_array($result)) {

            ?>
            <div class="col-md-3 mb-4 center">

                <div class="card">


                    <img src="../images/<?php echo $row['image'] ?>" class="img-fixed-size" alt="Book 1">

                    <div class="card-body">
                        <h5 class="card-title" style="font-size:15px">
                         <?php echo $row['title'] ?>
                        </h5>

                        <button class="btn btn-outline-primary my-2 my-sm-0"><a href="libri.php?id=<?php echo $row['id'] ?>"
                                class="noline">More</a></button>

                    </div>


                </div>
            </div>

            <?php

        }

    }
    ?>


    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">
                <h2>Kategoritë</h2>
                <ul class="list-group">

                    <li class="list-group-item"><a class="noline" href="librat.php" ?>Të gjitha</li>
                    <?php
                    $sql = mysqli_query($con, "SELECT DISTINCT cat from books ");
                    while ($row = mysqli_fetch_array($sql)) {
                        ?>
                        <li class="list-group-item"><a href="librat.php?kategori=<?php echo $row['cat'] ?>"
                                class="noline"><?php echo ucfirst($row['cat']) ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>

            <div class="col-lg-9">

                <div class="row">

                    <?php
                    if (isset($_GET["kategori"])) {

                        $category = htmlspecialchars($_GET['kategori']);

                        $sql = "SELECT DISTINCT cat from books";
                        $res = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($res)) {
                            $genre = $row['cat'];
                            if ($category == $genre) {
                                $sql = "SELECT * FROM books where cat='$genre'";
                                $result = mysqli_query($con, $sql);
                                query($result);
                            }
                        }
                    } else {
                        $result = mysqli_query($con, "SELECT * FROM books");
                        query($result);


                    }
                    ?>


                </div>
            </div>
        </div>
    </div>

   <?php require '../html/footer.html'; ?>
</body>

</html>