<?php
error_reporting(E_ALL);
session_start();
var_dump($_SESSION);
include('connection.php');
include_once 'users.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    
    $sql = "SELECT * FROM users WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["Fjalekalimi"])) {
        session_start();
        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['user_email'] = $user['Email'];

        if ($user["Roli"] == "admin") {
            header("Location: AdminDashboard.html");
        } else {
            header("Location: Home.html");
        }
        exit();
    } else {
        echo "Invalid email or password";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign-in</title>
    <link rel="stylesheet" href="Signin.css" />
    <script>
     document.addEventListener("DOMContentLoaded", function () {
    const signInForm = document.querySelector(".signin-form");

    signInForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        fetch('signin.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'email': email,
                'password': password,
            }),
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            window.location.href = 'home.html';
        })
        .catch(error => {
            console.error('Error:', error);
            });
    });
});

   </script>
  </head>
  <body>
    <header>
      <img src="nike.logo.png" alt="" height="45px" />
      <nav>
        <ul>
          <li><a class="a2" href="Home.html">Home</a></li>
          <li><a class="a2" href="News.html">News</a></li>
          <li><a class="a2" href="Contact.html">Contact us</a></li>
        </ul>
      </nav>
    </header>
    <main class="signin-container">
      <h1>Sign In</h1>
      <form class="signin-form" action="signin.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <button type="submit">Sign In</button>
      </form>
  
      <div class="welcome-message">
        <p><strong>Kycuni ne llogarine tuaj</strong></p>
        <p>Nuk keni llogari? <a href="SignUp.php">Kycuni ketu</a>.</p>
      </div>
    </main>
  </body>
  </html>