<?php

class AdminDashboard
{
    private $data;

    public function __construct($host, $user, $password, $db)
    {
        $this->data = mysqli_connect($host, $user, $password, $db);

        if ($this->data === false) {
            die("Connection error: " . mysqli_connect_error());
        }
    }

    public function fetchmen()
    {
        $sql = "SELECT * FROM men";
        $result = mysqli_query($this->data, $sql);

        if ($result === false) {
            die("Error in SQL query: " . mysqli_error($this->data));
        }

        return $result;
    }
    public function deleteMen($ID)
    {
        $query = "DELETE FROM men WHERE ID = ?";
        $stmt = $this->data->prepare($query);
    
        $stmt->bind_param('i', $ID); 
        $stmt->execute();
    
        if ($stmt->affected_rows > 0) {
            header("location: men.admin.php?deleteSuccessful=true");
        } else {
            header("location: men.admin.php?error=deleteFailed");
        }
    
        $stmt->close();
    }
    public function closeConnection()
    {
        mysqli_close($this->data);
    }
    
    }


// Replace these values with your database details
$host = "localhost";
$user = "root";
$password = "";
$db = "dyqani sportiv";

$adminDashboard = new AdminDashboard($host, $user, $password, $db);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content -->
</head>
<body>

    <!-- Header, aside, and other HTML content -->

    <div class="content">
        <h1>Men's Products</h1>

        <?php
         $result = $adminDashboard->fetchmen();

        if ($result->num_rows > 0) {
            ?>
            <table border="1px">
                <tr>
                    <th style="padding: 20px; font-size: 15px;">Emri</th>
                    <th style="padding: 20px; font-size: 15px;">Cmimi</th>
                    <th style="padding: 20px; font-size: 15px;">Fotoja</th>
                    <th style="padding: 20px; font-size: 15px;">Delete</th>
                </tr>
                <?php
                while ($info = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td style="padding: 20px;"><?php echo $info['Emri']; ?></td>
                        <td style="padding: 20px;"><?php echo $info['Cmimi']; ?></td>
                        <td style="padding: 20px;"><img src="<?php echo $info['Fotoja']; ?>" style="width:100px;"></td>
                        <td style="padding: 20px;color:black;">
                        <a href="delete.man.php?ID=<?php echo $info['ID']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php
        } else {
            echo "No records found.";
        }

        $adminDashboard->closeConnection();
        ?>
    </div>
</body>
</html>
