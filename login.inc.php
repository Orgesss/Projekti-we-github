<?php
session_start();
if(isset($_POST["submit"])) 
 {
 
  $uid = $_POST["uid"];
  $pwd = $_POST["pwd"];

include "../Projekti-we-github/dbh.classes.php";
include "../Projekti-we-github/login.classes.php";
include "../Projekti-we-github/login-contr.classes.php";
 $login = new LoginContr($uid, $pwd);
$login->loginUser();

header("location: home.php?loginsuccess=true");

 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign-in</title>
    <link rel="stylesheet" href="Signin.css" />
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
    <main class="login-container">
      <h1>Log In</h1>
      <form class="login-form" method="post">
        <table>
          <tr>
            <td><label for="text">Username</label></td>
            <td><input type="text" name="uid" placeholder="Username" required /></td>
          </tr>
          <tr>
            <td><label for="password">Password:</label></td>
            <td><input type="password" name="pwd" placeholder="Password" required /></td>
          </tr>
        </table>

        <button type="submit" name="submit">Log in</button>
      </form>

      <div class="welcome-message">
        <p><strong>Kycuni ne llogarine tuaj</strong></p>
        <p>Nuk keni llogari? <a href="signup.inc.php">Kycuni ketu</a>.</p>
      </div>
    </main>
  </body>
</html>
