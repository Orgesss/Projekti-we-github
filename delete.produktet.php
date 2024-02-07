<?php
require_once('produktet.admin.php');
include('dbh.classes.php');

$host = "localhost";
$user = "root";
$password = "";
$db = "dyqani sportiv";

$adminDashboard = new AdminDashboard($host, $user, $password, $db);

if (isset($_GET['id'])) {
    $ID = $_GET['id'];
    $adminDashboard->deleteprodukti($ID);


    header("location: produktet.admin.php");
}

?>
