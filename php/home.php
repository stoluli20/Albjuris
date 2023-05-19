<?php
include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>

body {
        font-family: 'Circular', sans-serif !important;
    }
    /* Customize carousel height */
    .section-books .carousel {
      height: 400px;
    }

    /* Existing styles */
    .center {
      display: flex;
      justify-content: center;
    }

    .card-body {
      text-align: center;
      padding: 2px;
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

    /* Apply styles to book covers in the carousel */
    .carousel-inner .book-card img {
      width: auto;
      height: 250px;
      border: 1px solid gray;
    }

    .carousel-inner .book-card {
      margin: 40px;
      text-align: center;
    }

.d-flex{
  margin-left:100px;
  margin-right:100px;
}

    .carousel-control-prev,
    .carousel-control-next {
      margin: 10px;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      filter: invert(100%);
    }

    .section-subscriptions {
      margin-top: 40px;
    }

    .subscription-card {
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 15px;
      text-align: center;
    }

    .card-title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .card-price {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .card-text {
      margin-bottom: 15px;
    }

    .btn {
      display: block;
      margin-top: 20px;
      width: 100%;
      background-color: #000000;
      color: #fff;
    }

    .btn:hover {
      background-color: #fff;
      color: #000000;
    }
    .btn-primary {
      border-color:#fff;
    }

    .btn-primary:hover{
      border-color:#000000;
    }

    .section-about-us {
      background-color: #000000;
      padding: 60px 0;
      margin-top:60px;
    }

    .section-about-us .container {
      max-width: 800px;
      margin: 0 auto;
      text-align: center;
    
    }

    .section-about-us h2 {
      font-size: 32px;
      margin-bottom: 30px;
      color:#fff;
    }

    .section-about-us p {
      font-size: 18px;
      line-height: 1.6;
      margin-bottom: 20px;
      
      color:#fff;
    }
  </style>


</head>

<body>
  <!-- First Section: Full Screen Image -->
  <section class="section-fullscreen">
    <div class="container-fluid">
      <img src="./uploads/mainpic.jpg" alt="Full Screen Image" class="img-fluid">
    </div>
  </section>

  <!-- Second Section: Carousel with Books -->
  <section class="section-books">
  <div class="container">
    <h2 style="text-align: center; margin-top: 50px">Books</h2>
    <div id="booksCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="d-flex justify-content-center"> <!-- Added wrapping div -->
            <?php
            // Replace 'your-database-connection' with your actual database connection code

            // Fetch all books from the database
            $books = $con->query("SELECT * FROM books");

            // Set a flag to track the active carousel item
            $active = true;

            // Counter to keep track of the number of books
            $bookCount = 0;

            // Iterate over each book and generate carousel item
            foreach ($books as $book) {
              // Extract book details
              $bookId = $book['id'];
              $bookImage = $book['image'];

              // Set the active class for the first carousel item
              $activeClass = $active ? 'active' : '';

              // Open a new carousel item every 3 books
              if ($bookCount % 3 == 0) {
                echo '<div class="d-flex">';
              }
            ?>
              <div class="book-card">
                <a href="book.php?id=<?php echo $bookId; ?>"><img src="./images/<?php echo $bookImage; ?>" alt="Book"></a>
                <a href="book.php?id=<?php echo $bookId; ?>" class="btn btn-primary btn-sm">Read More</a>
              </div>
            <?php
              // Close the carousel item every 3 books
              if ($bookCount % 3 == 2) {
                echo '</div>';
              }

              // Increment the book counter
              $bookCount++;

              // Set the active flag to false after the first carousel item
              $active = false;
            }

            // Close the carousel item if the last book count is not divisible by 3
            if ($bookCount % 3 != 0) {
              echo '</div>';
            }
            ?>
          </div>
        </div>
      </div>
      <!-- Add carousel controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#booksCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#booksCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>





  <!-- Third Section: Subscriptions -->
  <section class="section-subscriptions">
    <div class="container">
      <h2 style="text-align:center; margin-bottom:40px;">Subscriptions</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="subscription-card">
            <h5 class="card-title">Basic</h5>
            <p class="card-price">$9.99/month</p>
            <p class="card-text">1-week access to all books</p>
            <a href="#" class="btn btn-primary">Choose Plan</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="subscription-card">
            <h5 class="card-title">Standard</h5>
            <p class="card-price">$19.99/month</p>
            <p class="card-text">1-month access to all books and 15% discount on physical books.</p>
            <a href="#" class="btn btn-primary">Choose Plan</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="subscription-card">
            <h5 class="card-title">Premium</h5>
            <p class="card-price">$49.99/month</p>
            <p class="card-text">6-month access to all books and 20% discount on physical books.</p>
            <a href="#" class="btn btn-primary">Choose Plan</a>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Fourth Section: About Us -->
  <section class="section-about-us">
    <div class="container">
      <h2>About Us</h2>
      <p>Alb Juris is a publishing house focused on Legal Literature, but not limited to it.
        At our place, you will find every book in the field of legal literature, up-to-date legislation, Legislation Summaries, the entire series of Codes updated with all the latest changes,
        The Constitution with all the interpretations of the Constitutional Court, and everything else you need to have all the necessary literature.
        Our publishing house also offers the service of publishing other publications.</p>
    </div>
  </section>

  <!-- Include Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>