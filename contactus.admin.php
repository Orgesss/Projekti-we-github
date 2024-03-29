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

    public function fetchContactUsData()
    {
        $sql = "SELECT * FROM contact_data";
        $result = mysqli_query($this->data, $sql);

        if ($result === false) {
            die("Error in SQL query: " . mysqli_error($this->data));
        }

        return $result;
    }
    public function deleteMesazhin($id)
    {
        $query = "DELETE FROM contact_data WHERE id = ?";
        $stmt = $this->data->prepare($query);
    
        $stmt->bind_param('i', $id); // 'i' represents integer type
        $stmt->execute();
    
        if ($stmt->affected_rows > 0) {
            header("location: contactus.admin.php?deleteSuccessful=true");
        } else {
            header("location: contactus.admin.php?error=deleteFailed");
        }
    
        $stmt->close();
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Add your CSS styles here */

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px;
        }

        .logout {
            float: right;
            margin-right: 20px;
        }

        aside {
            width: 200px;
            height: 100%;
            position: fixed;
            background-color: #f1f1f1;
            padding-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li a {
            display: block;
            color: #000;
            padding: 8px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #555;
            color: white;
        }

        .content {
            margin-left: 220px;
            padding: 16px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        .nav {
            color: white;
            text-decoration: none;
        }
        ul.nested {
            display: none;
        }

        li:hover ul.nested {
            display: block;
        }
    </style>
</head>
<body>

    <header class="header">
        <a href="adminhome.php" class="nav">Admin Dashboard</a>
        <div class="logout">
            <a href="logout.php" class="nav">Logout</a>
        </div>
    </header>

    <aside>
        <ul>
        
            <li>
                <a href="contactus.admin.php">Contact Us</a>
            </li>
            <li><a href="login.admin.php">Log-in</a></li>
            <li>
                <a href="produktet.admin.php">Products</a>
                
            </li>
            <li>
                <a href="Men.admin.php">Men</a>
                </li>
            <li>
            <a href="Women.admin.php">Women</a>
            </li>
            <li>
            <a href="Kids.admin.php">Kids</a>
            </li>
        </ul>
            
    </aside>
    <div class="content">
        <h1>Applied for Admission</h1>

        <?php
        $result = $adminDashboard->fetchContactUsData();

        if ($result->num_rows > 0) {
            ?>
            <table border="1px">
                <tr>
                    <th style="padding: 20px; font-size: 15px;">Name</th>
                    <th style="padding: 20px; font-size: 15px;">Email</th>
                    <th style="padding: 20px; font-size: 15px;">Message</th>
                    <th style="padding: 20px; font-size: 15px;">Delete</th>
                </tr>
                <?php
                while ($info = $result->fetch_assoc()) {
                    ?>
                    <tr>
    <td style="padding: 20px;"><?php echo $info['name']; ?></td>
    <td style="padding: 20px;"><?php echo $info['email']; ?></td>
    <td style="padding: 20px;"><?php echo $info['message']; ?></td>
    <td style="padding: 20px;color:black;">
        <a href="delete.php?id=<?php echo $info['id']; ?>">Delete</a>
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

        ?>
    </div>
</body>
</html>
