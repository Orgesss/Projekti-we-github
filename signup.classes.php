<?php
session_start();
class Signup extends Dbh {

    protected function setUser($uid, $pwd, $email){
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email, is_admin) VALUES (?, ?, ?, false);');
   
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    if(!$stmt->execute(array($uid, $hashedPwd, $email))){
       $stmt = null;
       header("location: ../home.php?error=stmtfailed");
   exit();
   
    }

        $stmt=null;
    }

    protected function checkUser($uid, $email){
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');
    
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