<?php
include('connection.php');
include_once 'users.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (Emri, Mbiemri, Email, Fjalekalimi, Roli) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $role = "user"; 
    $stmt->execute([$name, $surname, $email, $password, $role]);

    header("Location: SignIn.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign-Up</title>
    <link rel="stylesheet" href="SignUp.css" />
    
    <script>
      document.addEventListener("DOMContentLoaded", function () {
  const emailInput = document.getElementById("email");
  const nameInput = document.getElementById("name");
  const surnameInput = document.getElementById("surname");
  const passwordInput = document.getElementById("password");
  const confirmPasswordInput = document.getElementById("confirmPassword");

  emailInput.setAttribute("placeholder", "Enter your email");

  function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
  }
  function validatePassword(password) {
        const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
        return regex.test(password);
      }
      function validatePasswordMatch(password, confirmPassword) {
        return password === confirmPassword;
      }

  const signInForm = document.querySelector(".signin-form");

  passwordInput.setAttribute("placeholder", "Enter your password");

  signInForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const email = emailInput.value;
    const name = nameInput.value;
    const surname = surnameInput.value;
    const password = passwordInput.value;
    const confirmPassword = confirmPasswordInput.value;

    if (!validateEmail(email)) {
      alert("Please enter a valid email address.");
      return;
    }

    if (!validatePassword(password)) {
          alert("Password must contain at least one uppercase letter, one lowercase letter, one digit, and be at least 8 characters long.");
          return;
        }

        if (!validatePasswordMatch(password, confirmPassword)) {
          confirmPasswordError.textContent = "Passwords don't match. Please enter them again.";
          return;
        }
        fetch('signup.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
              name: name,
              surname: surname,
              email: email,
              password: password,
              confirmPassword: confirmPassword,
            }),
          })
            .then(response => response.text())
            .then(data => {
              console.log(data);
            })
            .catch(error => {
              console.error('Error:', error);
            });

    alert("You have successfully created an account.");
  });
});
exit();
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
      <h1>Sign Up</h1>
      <form class="signup-form" action="signup.php" method="post">
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
  
        <button type="submit">Sign Up</button>
      </form>

    </div>
</main>
</body>
</html>