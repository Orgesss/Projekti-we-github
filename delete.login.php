<?php
require_once('login.admin.php');  
include('dbh.classes.php');

$host = "localhost";
$user = "root";
$password = "";
$db = "dyqani sportiv";

$adminDashboard = new AdminDashboard($host, $user, $password, $db);

if (isset($_GET['id'])) {
    $users_id = $_GET['id']; 

    $adminDashboard->deleteusers($users_id);
    header("location: login.admin.php");
}
?>
