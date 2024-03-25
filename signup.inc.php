<?php
session_start();
if(isset($_POST["submit"])) 
 {
  //grabbing the data
  $uid = $_POST["uid"];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["pwdRepeat"];
  $email = $_POST["email"];
//instantiate SignupContr class
include "dbh.classes.php";
include "../Projekti-we-github/signup.classes.php";
include "../Projekti-we-github/signup-contr.classes.php";
 $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);
$signup->signupUser();

///kontrollo------------------------
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
          <li><a class="a2" href="Home.php">Home</a></li>
          <li><a class="a2" href="News.html">News</a></li>
          <li><a class="a2" href="Contactus.inc.php">Contact us</a></li>
        </ul>
      </nav>
    </header>
    <main class="signup-container">
      <h1>Sign Up</h1>
      <form class="signup-form"  method="post">
  
        <label for="surname">Username:</label>
        <input type="text" name="uid" placeholder="Username" required />
  
        <label for="password">Password:</label>
        <input type="password"  name="pwd" placeholder="Enter your password" required />
  
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password"  name="pwdrepeat" placeholder="Confirm your password" required />

        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Enter your email" required />
  
        <button type="submit" name= "submit">Sign Up</button>
      </form>
    

    </div>
</main>
</body>
</html>