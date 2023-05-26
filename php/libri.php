<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore</title>
    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha384-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
    integrity="sha384-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
    crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .mt-4,
        .my-4 {
            margin-top: 4rem !important;
        }

        .card-body {
            font-size: large;
        }

        .container {
            margin-left: 8%;
        }

        html,
        body {
            height: 100%;
        }

        .wrapper {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }

        .noline {
            text-decoration: none;
            color: black;
        }

        .center {
            display: flex;
            justify-content: center;
        }

        button a:hover {
            text-decoration: none;
            color: white
        }


        @media only screen and (max-width: 800px) {
            .col-md-8 {
                margin-top: 20px;
            }

            .col-md-4 {
                display: flex;
                justify-content: center;
            }

            .container {
                margin-left: auto;
            }

        }



        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            opacity: 0;
            /* Initially hidden */
            pointer-events: none;
            /* Allow interaction with elements underneath */
            transition: opacity 0.5s;
            z-index: 9999;
        }

        .row {
            margin-bottom: 60px;
        }
    </style>



</head>


<body id="bod">
    <?php

    include('db.php');
    require __DIR__. "/../html/header.php";
    ?>
    <div class="wrapper">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <?php
                    if (isset($_GET['id'])) {

                        $id = $_GET['id'];
                        $result = mysqli_query($con, "SELECT * FROM books where id=$id");

                        while ($row = mysqli_fetch_array($result)) {

                            ?>

                            <img style="border: 1px solid gray" src="../images/<?php echo $row['image'] ?>" alt="Book Image"
                                class="img-fluid">
                        </div>

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title"><b>Titulli:</b>
                                        <?php echo $row['title'] ?>
                                    </h2>
                                    <p class="card-text"><b>ISBN:</b>
                                        <?php echo $row['isbn'] ?>
                                    </p>
                                    <p class="card-text"><b>Autori:</b>
                                        <?php echo $row['author'] ?>
                                    </p>
                                    <p class="card-text"><b>Viti:</b>
                                        <?php echo $row['year'] ?>
                                    </p>
                                    <p class="card-text"><b>Kategori:</b>
                                        <?php echo $row['cat'] ?>
                                    </p>
                                    <p class="card-text"><b>Description:</b>
                                        <?php echo $row['description'] ?>
                                    </p>
                                    <div class="center">
                                        <?php
<<<<<<< HEAD
                                        if (isset($_SESSION['plan'])) {
                                            ?>
                                            <button class="btn btn-outline-primary my-2 my-sm-0"><a target="_blank"
                                                    href="/public_html/open.php?id=<?php echo $row['id'] ?>"
                                                    class="noline">Open</a></button>
                                            <?php
                                        }
                                        ?>
                                        <button class="btn btn-outline-primary my-2 my-sm-0" style="margin:10px"><a
                                                target="_blank" target="_blank" target="_blank"
                                                href="/public_html/preview.php?id=<?php echo $row['id'] ?>"
=======
                                    if(isset($_SESSION['email'])){
                                        ?>
                                        <button class="btn btn-outline-primary my-2 my-sm-0"><a target="_blank"
                                                href="/Web_Project/open.php?id=<?php echo $row['id'] ?>" class="noline">Open</a></button>
                                        <?php
                                    }
                                    ?>
                                        <button class="btn btn-outline-primary my-2 my-sm-0" style="margin:10px"><a target="_blank"target="_blank"target="_blank"
                                                href="/Web_Project/preview.php?id=<?php echo $row['id'] ?>"
>>>>>>> bdb807b38e76cf3c93701c63e6ccbc45afcd43d1
                                                class="noline">Preview</a></button>
                                    </div>
                                </div>
                            </div>

                            <?php
                        } ?>
                    </div>

                </div>
            </div>

            <?php
            require '../html/footer.html';
                    } ?>
</div>
    </div>

</html>

</body>

</html>