<?php
require_once('Produkti.php');
$dhenat = new Produkti();
$all = $dhenat->lexoDhenat();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/displayDhenat.css" />
    <title>Shfaq te dhenat</title>
</head>

<body>
    <div id="a1">
        <header>
            <h3>Ju lutem shtype per te regjistruar te dhenat ne Sistem</h3>
            <a href="insert.php"><Button id='r'>Regjistro produktet</Button></a>
        </header>
        <table>
            <hr>
            <p>Lista e te dhenave:</p>
            <tr>
                <th>Id</th>
                <th>Emri</th>
                <th>Cmimi</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($all as $key => $value) {
                ?>
                <tr>
                    <td>
                        <?php echo $value['Id'] ?>
                    </td>
                    <td>
                        <?php echo $value['Emri'] ?>
                    </td>
                    <td>
                        <?= $value['Cmimi'] ?>
                    </td>
                    <td id='de'>
                        <a href="delete.php?id=<?php echo $value['Id'] ?>"><button id="d">DELETE</button></a>
                        <a href="edit.php?id=<?php echo $value['Id'] ?>"><button id='e'>EDIT</button></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</body>

</html>
