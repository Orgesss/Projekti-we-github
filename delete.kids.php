<?php
require_once('kids.admin.php');
include('dbh.classes.php');

$host = "localhost";
$user = "root";
$password = "";
$db = "dyqani sportiv";

$adminDashboard = new AdminDashboard($host, $user, $password, $db);

if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $adminDashboard->deletekids($ID);


    header("location: kids.admin.php");
}

?>
