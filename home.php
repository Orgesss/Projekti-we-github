<?php
session_start();
include "dbh.classes.php";
if ($_SESSION['is_admin'] == 1){
  header("Location: dashboard.php");
  exit();
   }
   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dyqani Sportiv</title>
   <link rel="stylesheet" href="Home.css">
  </head>
  <body>
    <header>
      <img src="nike.logo.png" alt="" height="45px" />

      <ul class="Lista1">
        <li><a class="a1" href="Men.html">Men</a></li>
        <li><a class="a1" href="Women.html">Women</a></li>
        <li><a class="a1" href="Kids.html">Kids</a></li>
        <li><a class="a2" href="login.inc.php">Sign Out</a></li>
      </ul>

      <ul>
        <li><a class="a2" href="news.html">News</a></li>
        <li><a class="a2" href="Contactus.inc.php">Contact us</a></li>
        <li><a class="a2" href="login.inc.php">Log-in</a></li>
      </ul>
    </header>
    <p></p>

    <div class="search-container">
      <input type="text" class="search-input" placeholder="Search" />
      <button class="search-button">
        <img src="search.png" alt="Search" />
      </button>
    </div>

    <img class="fotoja1" src="Nike wallpaper.webp" alt="" />

    <div class="slider">
      <button class="slide-btn slide-btn-left" onclick="slideLeft()"><span class="arrow">&#9664;</span></button>
      <div class="slider-images-wrapper">
        <div class="slider-images"></div>
      </div>
      <button class="slide-btn slide-btn-right" onclick="slideRight()"><span class="arrow">&#9654;</span></button>
    </div>
  
    <p><b>Best Sellers</b></p>

    <div class="PjesaEprodukteve">
      <div class="u1">
        <img src="Air Jordan 1 mid (3).jpg" alt="" />
        <div class="u2">
          <p>Air Jordan 1 Mid</p>
          <p>129.99€</p>
        </div>
      </div>
      <div class="u1">
        <img src="Air Force 1.webp" alt="" />
        <div class="u2">
          <p>Air Force 1</p>
          <p>119.99€</p>
        </div>
      </div>
      <div class="u1">
        <img src="Air Jordan 4 Retro.jpg" alt="" />
        <div class="u2">
          <p>Air Jordan 4 Retro</p>
          <p>199.99€</p>
        </div>
      </div>
      <div class="u1">
        <img src="Air Jordan 4 (2).jpg" alt="" />
        <div class="u2">
          <p>Air Jordan 4</p>
          <p>139.99€</p>
        </div>
      </div>

      <div class="u1">
        <img src="Air Jordan 1 mid.webp" alt="" />
        <div class="u2">
          <p>Air Jordan 1</p>
          <p>189.99€</p>
        </div>
      </div>
      <div class="u1">
        <img src="Nike Dunk Low(5).webp" alt="" />
        <div class="u2">
          <p>Nike Dunk Low</p>
          <p>119.99€</p>
        </div>
      </div>
      <div class="u1">
        <img src="Nike Air Jordan 3.jpg" alt="" />
        <div class="u2">
          <p>Air Jordan 3</p>
          <p>129.99€</p>
        </div>
      </div>
      <div class="u1">
        <img src="Nike Dunk Pandas.webp" alt="" />
        <div class="u2">
          <p>Nike Dunk Pandas</p>
          <p>109.99€</p>
        </div>
      </div>
    </div>
    <section class="free-shipping">
      <div class="shipping-content">
        <img src="Free shipping.jpg" alt="Shipping Car" />
        <p>Free Shipping on All Orders</p>
      </div>
    </section>
    <footer class="footer">
      <div class="footer-content">
        <div class="sponsored-section">
          <h3>Sponsored by</h3>
          <div class="sponsor-logos">
            <img src="Jordan logo.png" alt="Sponsor 1" />
            <img src="NBA logo.png" alt="Sponsor 2" />
          </div>
        </div>
        <div class="social-links">
          <h3>Follow Us</h3>
          <a href="#" class="social-icon"
            ><img src="facebook.png" alt="Facebook"
          /></a>
          <a href="#" class="social-icon"
            ><img src="instagram (1).png" alt="Instagram"
          /></a>
        </div>
      </div>
      <div class="payment-methods">
        <p>Accepted Payment Methods:</p>
        <div class="payment-logos">
          <img src="cash payment.png" alt="Cash" />
          <img src="visa-and-mastercard-logo-26.png" alt="Visa Mastercard" />
        </div>
      </div>
    </footer>

    <script>
    let slideAmount = 0;
let isTransitioning = false;
const imageUrls = [
'Air Jordan 1 mid (3).jpg',
      'Air Force 1.webp',
      'Air Jordan 4 Retro.jpg',
      'Air Jordan 4 (2).jpg',
      'Air Jordan 1 mid.webp',
      'Nike Dunk Low(5).webp',
      'Nike Air Jordan 3.jpg',
      'Nike Dunk Pandas.webp'
    
];

const sliderImages = document.getElementsByClassName('slider-images')[0];
const sliderImagesContainer = document.getElementsByClassName('slider-images-wrapper')[0];

imageUrls.forEach((url, index) => {
    const imageElement = document.createElement('div');
    imageElement.classList.add('slider-img');
    imageElement.innerHTML = `<img src="${url}" alt="Image ${index + 1}">`;
    sliderImages.appendChild(imageElement);
});

const scrollDistance = 500;

function slideRight() {
    const newScrollPosition = sliderImagesContainer.scrollLeft + scrollDistance;

    sliderImagesContainer.scrollTo({
        left: newScrollPosition,
        behavior: 'smooth'
    });
}

function slideLeft() {
    const newScrollPosition = sliderImagesContainer.scrollLeft - scrollDistance;

    sliderImagesContainer.scrollTo({
        left: newScrollPosition,
        behavior: 'smooth'
    });
}


  </script>
    
  </body>
</html>
