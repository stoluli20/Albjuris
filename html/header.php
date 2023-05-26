<?php  session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Alb Juris</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            font-family: 'Circular', sans-serif;
        }

        /* CSS for black header and white font */
      

        .navbar-light .navbar-brand {
            color: #fff;
        }

        .navbar-light .navbar-nav .nav-link {
            color: #fff;
        }

        .navbar-light .navbar-nav .active>.nav-link {
            color: #fff;
        }

        .navbar-light .navbar-nav .nav-link:hover,
        .navbar-light .navbar-nav .nav-link:focus {
            color: #fff;
            font-size: 1.1rem;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand mr-auto" href="/public_html">Alb Juris</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
              
                   
                        <?php
                        // Check if the user is logged in
                       
                        if (isset($_SESSION['email'])) {
                            // User is logged in, display "Dashboard" and "Log Out"
                          if($_SESSION['type']=='admin'){
                            echo '
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="profileDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               '.$_SESSION['username'].'
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="/public_html/php/admin.php">Dashboard</a>
                                <a class="dropdown-item" href="/public_html/php/logout.php">Log Out</a>
                            </div>';
                          }else{
                            echo '
                            <li class="nav-item active">
                            <a class="nav-link active" href="/public_html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="php/librat.php">Books</a>
                        </li>
                       
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="profileDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               '.$_SESSION['username'].'
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="php/dashboard.php">Dashboard</a>
                                <a class="dropdown-item" href="php/logout.php">Log Out</a>
                            </div>';
                          }
                        } else {
                            // User is not logged in, display "Log In" and "Register"
                            echo '
                            <li class="nav-item active">
                            <a class="nav-link active" href="/public_html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/public_html/php/librat.php">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/public_html/php/subscriptions.php">Subscriptions</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="profileDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Profile
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="/public_html/php/login.php">Log In</a>
                                <a class="dropdown-item" href="/public_html/php/register.php">Register</a>
                            </div>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
