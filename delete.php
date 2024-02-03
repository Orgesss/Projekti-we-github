<?php
require_once('Produkti.php');
$dhena = new Produkti();
if (isset($_GET['id'])) {
    $myID = $_GET['id'];
    $dhena->deleteDhenat($myID);
}
?>
