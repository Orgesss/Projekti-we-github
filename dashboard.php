<?php
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: login.inc.php");
    exit();
}

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="dashboard.css">

</head>
<body>
    <header>
        <h1>Welcome, <?php echo $_SESSION['useruid']; ?>!</h1>
        <a href="login.inc.php">Logout</a>
    </header>

    <nav>
        <ul>
            <li><a href="Contactus.admin.php">Contact</a></li>
            <li><a href="login.admin.php">Log-in</a></li>
            <li><a href="produktet.admin.php">Products</a></li>
            <li><a href="Men.admin.php">Men</a></li>
            <li><a href="Women.admin.php">Women</a></li>
            <li><a href="Kids.admin.php">Kids</a></li>
        </ul>
    </nav>
 
    <main>
      <section id="create">
            <h2>Create Operation</h2>
        </section>

        <section id="read">
            <h2>Read Operation</h2>
        </section>
   
        <section id="update">
            <h2>Update Operation</h2>
        </section>

        <section id="delete">
            <h2>Delete Operation</h2>
        </section>
    </main>
</body>
</html>

