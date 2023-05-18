<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Alb Juris Book Shop</title>
  <style>
<?php require("html/style.css"); ?>
  </style>

<script>
    // JavaScript code for slideshow

    // Array of book images
    var bookImages = [
      'image1.jpg',
      'image2.jpg',
      'image3.jpg',
      'image4.jpg'
    ];

    function startSlideshow() {
      var slideshow = document.getElementById('slideshow');
      var caption = document.getElementById('slideshow-caption');
      var images = slideshow.getElementsByTagName('img');
      var currentIndex = 0;

      setInterval(function() {
        var nextIndex = (currentIndex + 1) % images.length;

        // Reset opacity of all images
        for (var i = 0; i < images.length; i++) {
          images[i].style.opacity = 0;
        }

        // Fade out the current image
        images[currentIndex].style.opacity = 0;

        setTimeout(function() {
          // Change the background image and caption text
          slideshow.style.backgroundImage = 'url(' + bookImages[nextIndex] + ')';
          caption.textContent = 'Discover our latest books!';

          // Fade in the new image
          images[currentIndex].classList.remove('active');
          images[nextIndex].classList.add('active');
          images[nextIndex].style.opacity = 1;

          currentIndex = nextIndex;
        }, 500); // Wait for the fade-out transition

      }, 3500); // Adjust the interval duration to 3500ms (3.5 seconds)
    }

    document.addEventListener("DOMContentLoaded", function() {
      const searchForm = document.getElementById("search-form");
      const searchInput = document.getElementById("search-input");
      const searchSuggestions = document.getElementById("search-suggestions");

      searchForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const searchTerm = searchInput.value.trim().toLowerCase();
        if (searchTerm !== "") {
          // Perform search logic here
          console.log("Searching for: " + searchTerm);
        }
      });

      searchInput.addEventListener("input", function() {
        const searchTerm = searchInput.value.trim().toLowerCase();
        if (searchTerm !== "") {
          // Generate search suggestions here
          const suggestions = generateSearchSuggestions(searchTerm);
          showSearchSuggestions(suggestions);
        } else {
          hideSearchSuggestions();
        }
      });

      function generateSearchSuggestions(searchTerm) {
        // Generate search suggestions logic here
        // Replace the following example with your own logic
        const suggestions = [
          "Harry Potter",
          "The Great Gatsby",
          "To Kill a Mockingbird",
          "Pride and Prejudice",
          "1984"
        ];
        return suggestions.filter(suggestion =>
          suggestion.toLowerCase().startsWith(searchTerm)
        );
      }


      function showSearchSuggestions(suggestions) {
        searchSuggestions.innerHTML = "";
        const ul = document.createElement("ul");
        suggestions.forEach(suggestion => {
          const li = document.createElement("li");
          li.textContent = suggestion;
          li.addEventListener("click", function() {
            searchInput.value = suggestion;
            hideSearchSuggestions();
          });
          ul.appendChild(li);
        });
        searchSuggestions.appendChild(ul);
        searchSuggestions.style.display = "block";
      }

      function hideSearchSuggestions() {
        searchSuggestions.innerHTML = "";
        searchSuggestions.style.display = "none";
      }
    });
  </script>

</head>
<body onload="startSlideshow()">
<div class="page-container">
<?php require("html/header.html"); ?>

  <div class="slideshow" id="slideshow">
    <img src="uploads/image1.jpg" class="active">
    <img src="uploads/image2.jpg">
    <img src="uploads/image3.jpg">
    <div class="slideshow-caption" id="slideshow-caption"></div>
  </div>

<div class="content">
  <section>
    <h2>About Us</h2>
    <p>Welcome to our bookshop, where you can explore a wide range of books across different genres. Whether you're a book lover or looking for a perfect gift, we have something for everyone.</p>
    <p>Visit our bookstore today and discover the joy of reading!</p>
  </section>
  <?php require("html/footer.html"); ?>
</div>
</div>
</body>
</html>
