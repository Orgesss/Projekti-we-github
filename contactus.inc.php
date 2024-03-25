<?php
session_start();
if(isset($_POST["submit"])) 
 {

  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  include "dbh.classes.php";
  include "../Projekti-we-github/contactus.classes.php";
  include "../Projekti-we-github/contactus-contr.classes.php";
  
  $contactUs = new ContactUsContr($name, $email, $message);
  $contactUs->sendMessage();

  header("location: home.php?messagewassent=true");
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Nike Store</title>
    <link rel="stylesheet" href="Contact.css">
</head>
<body>
    <header>
        <img src="nike.logo.png" alt="" height="45px">
        <nav>
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><a href="News.html">News</a></li>
                <li><a href="login.inc.php">Sign in</a></li>
            </ul>
        </nav>
    </header>

    <main class="contact-container">
        <h1>Contact Us</h1>
        <section class="contact-info">
            <div class="info-item">
                <h2>Email</h2>
                <p>support@nike.com</p>
            </div>
            <div class="info-item">
                <h2>Phone</h2>
                <p>+1-800-123-4567</p>
            </div>
            <div class="info-item">
                <h2>Address</h2>
                <p>123 Nike Street, Portland, OR, 97204</p>
            </div>
        </section>
        <section class="contact-form">
            <h2>Send us a Message</h2>
            <form action="contactus.inc.php" method="post" onsubmit="return validateForm(event)">
    <input type="text" id="name" name="name" placeholder="Your Name" required>
    <input type="email" id="email" name="email" placeholder="Your Email" required>
    <textarea id="message" name="message" placeholder="Your Message" required></textarea>
    <button type="submit" name="submit">Send</button>
</form>

        </section>
    </main>

    <footer>
        <p>&copy; 2023 Nike Store. All Rights Reserved.</p>
    </footer>
</body>
</html>
