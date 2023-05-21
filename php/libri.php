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
    </style>



</head>


<body>
    <?php
     
    include('db.php');
    require '../html/header.php';
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
                                        <button class="btn btn-outline-primary my-2 my-sm-0"><a
                                                href="/Albjuris/open.php?id=<?php echo $row['id'] ?>" class="noline">Open</a></button>
                                        <button class="btn btn-outline-primary my-2 my-sm-0" style="margin:10px"><a
                                                href="/Albjuris/preview.php?id=<?php echo $row['id'] ?>"
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
                    require '../html/footer.html'; } ?>
</body>

</html>