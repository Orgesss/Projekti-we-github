<?php
require_once('Produkti.php');

if (isset($_POST['save'])) {
    $regj = new Produkti();
    $regj->setId($_POST['id']);
    $regj->setEmri($_POST['emri']);
    $regj->setCmimi($_POST['cmimi']);
    $regj->insertoDhenat();
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="myRegjistroForm.css" />
    <title>Formulari i Regjistrimit</title>
</head>

<body>
    <div id="formulari">
        <h3>Shto te dhenat ne Formularin e Regjistrimit</h3>
        <form action='insert.php' method="POST">
            <label>Id</label>
            <input type="text" class="inp" name="id" placeholder="shto id..." />
            <label>Emri</label>
            <input type="text" class="inp" name="emri" placeholder="shto emrin..." />
            <label>Cmimi</label>
            <input type="number" class="inp" name="cmimi" placeholder="shto cmimin..." />
            <button name='save'>RUAJ</button>
        </form>
    </div>
</body>

</html>
