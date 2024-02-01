<?php

class Signup extends Dbh {

    protected function setUser($name, $surname,$email, $password){
        $stmt = $this->connect()->prepare('INSERT INTO users (users_name, users_surname,
         users_email, users_password) VALUES (?,?,?,?);');
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if(!$stmt->execute(array($name, $surname,$email, $hashedPassword))){
       $stmt=null;
       header("location: ../home.php?error=stmtfailed");
   exit();
    }

        $stmt=null;
    }

    protected function checkUser($name,$email){
        $stmt = $this->connect()->prepare('SELECT users_name FROM users WHERE users_name = ? OR users_email = ?;');
    
        if(!$stmt->execute(array($name,$email))){
           $stmt=null;
           header("location: ../home.php?error=stmtfailed");
       exit();
        }
        $resultCheck;
        if($stmt->rowCount() > 0){
            $resultCheck=false;
        }
        else{
            $resultCheck=true;
        }
        return $resultCheck;
    
    }



}