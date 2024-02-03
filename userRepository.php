<?php 
include_once 'dbh.classes.php';

class UserRepository{
    private $connection;

    function __construct(){
        $conn = new DatabaseConenction;
        $this->connection = $conn->startConnection();
    }


    function insertUser($user){

        $conn = $this->connection;

        $uid = $user->getuid();
        $pwd = $user->getpwd();
        $email = $user->getEmail();
    

        $sql = "INSERT INTO users (user_uid,users_pwd,user_email) VALUES (?,?,?,?,?)";

        $statement = $conn->prepare($sql);

        $statement->execute([$id,$name,$surname,$email,$password]);

        echo "<script> alert('User has been inserted successfuly!'); </script>";

    }

    function getAllUsers(){
        $conn = $this->connection;

        $sql = "SELECT * FROM user";

        $statement = $conn->query($sql);
        $users = $statement->fetchAll();

        return $users;
    }

    function getUserById($id){
        $conn = $this->connection;

        $sql = "SELECT * FROM user WHERE id='$id'";

        $statement = $conn->query($sql);
        $user = $statement->fetch();

        return $user;
    }

    function updateUser($id,$name,$surname,$email,$password){
         $conn = $this->connection;

         $sql = "UPDATE user SET name=?, surname=?, email=?, password=? WHERE id=?";

         $statement = $conn->prepare($sql);

         $statement->execute([$name,$surname,$email,$password,$id]);

         echo "<script>alert('update was successful'); </script>";
    } 

    function deleteUser($id){
        $conn = $this->connection;

        $sql = "DELETE FROM user WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$id]);

        echo "<script>alert('delete was successful'); </script>";
   } 
}



?>