<?php
require_once('Produkti.php');

$dhenat = new Produkti();
$myId = isset($_GET['id']) ? $_GET['id'] : null;

if ($myId !== null) {
    $record = $dhenat->lexoDhenatSipasIDs($myId);

    if (isset($_POST['edit'])) {
        $produkt = new Produkti();
        $produkt->setId($myId);
        $produkt->setEmri($_POST['emri']);
        $produkt->setCmimi($_POST['cmimi']);
        $produkt->updateDhenat();

        echo "<script>
                alert('Të dhënat janë përditësuar me sukses');
                window.location.href='displayDhenat.php';
              </script>";
    }
} else {
    // Ndërtoni një përgjigje për rastin kur 'id' nuk është e caktuar
    echo "<p>Id nuk është e caktuar ose është bosh.</p>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/myRegjistroForm.css" />
    <title>Formulari i Përditësimit</title>
</head>

<body>
    <div id="formulari">
        <h3>Përditëso të dhënat në formular</h3>
        <form action='' method="POST">
            <label>Id</label>
            <input type="text" class="inp" name="id" value="<?php echo $record['id'] ?? ''; ?>" />
            <label>Emri</label>
            <input type="text" class="inp" name="emri" value="<?php echo $record['emri'] ?? ''; ?>" />
            <label>Cmimi</label>
            <input type="text" class="inp" name="cmimi" value="<?php echo $record['cmimi'] ?? ''; ?>" />
            <button name='edit'>RUAJ</button>
        </form>
    </div>
</body>

</html>
