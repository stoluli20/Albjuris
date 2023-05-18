<!DOCTYPE html>
<html>
<head>
  <title>Bookstore</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    
    .book {
      display: inline-block;
      width: 200px;
      margin: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      text-align: center;
    }
    
    .book img {
      width: 150px;
      height: 200px;
      object-fit: cover;
    }
    
    .book h3 {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <h1>Bookstore</h1>
  
  <div class="book" id="book">
    <img src="<?php echo '/var/www/html/Web_Project/uploads/book1.jpg'; ?>" alt="Book 1">
    <h3>Duke formuar Europen</h3>
    <p>Krotz & Schild</p>
    <p>$19.99</p>
    <button>Add to Cart</button>
  </div>
  
  <div class="book">
    <img src="/var/www/html/Web_Project/uploads/book2.jpg" alt="Book 2">
    <h3>Shtetesia</h3>
    <p>Dimitriy  Kochenov</p>
    <p>$14.99</p>
    <button>Add to Cart</button>
  </div>
  
  <div class="book">
    <img src="book3.jpg" alt="Book 3">
    <h3>Book Title 3</h3>
    <p>Author Name 3</p>
    <p>$24.99</p>
    <button>Add to Cart</button>
  </div>
</body>
</html>
