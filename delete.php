<?php
require_once('contactus.admin.php');
include('dbh.classes.php');

$host = "localhost";
$user = "root";
$password = "";
$db = "dyqani sportiv";

$adminDashboard = new AdminDashboard($host, $user, $password, $db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $adminDashboard->deleteMesazhin($id);

    header("location: contactus.admin.php");
}
?>
