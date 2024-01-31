<?php
if(isset($_POST["submit"])) 
 {
  //grabbing the data
  $name = $_POST["name"];
  $surname= $_POST["surname"];
  $email= $_POST["email"];
  $password= $_POST["password"];
  $confirmPassword= $_POST["confirmPassword"];
//instantiate SignupContr class
include "../Projekti-we-github/dbh.classes.php";
include "../Projekti-we-github/signup.classes.php";
include "../Projekti-we-github/signup-contr.classes.php";
 $signup = new SignupContr($name, $surname, $email, $password, $confirmPassword);
$signup->signupUser();


header("location: login.inc.php?signupsuccess=true");

 }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign-Up</title>
    <link rel="stylesheet" href="SignUp.css" />
 
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
    <main class="signup-container">
      <h1>Sign Up</h1>
      <form class="signup-form"  method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required />
  
        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" placeholder="Enter your Surname" required />
  
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />
  
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />
  
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required />
  
        <button type="submit" name= "submit">Sign Up</button>
      </form>
    

    </div>
</main>
</body>
</html>