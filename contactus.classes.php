<?php

class ContactUs extends Dbh {
    public function insertMessage($name, $email, $message) {
        
            $stmt = $this->connect()->prepare("INSERT INTO contact_data (name, email, message) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $message]);
          
                if(!$stmt->execute(array($name, $email, $message))){
                $stmt = null;
                header("location: ../home.php?error=stmtfailed");
            exit();
             }
         
                 $stmt=null;
             }
         

    protected function checkContact($name, $email, $message){
        $stmt = $this->connect()->prepare('SELECT name FROM contact_data WHERE name = ? OR email = ? OR message = ?;');
    
        if(!$stmt->execute(array($name, $email,$message))){
           $stmt=null;
           header("location: ../home.php?error=stmtfailed");
       exit();
        }
        $resultCheck;
        if($stmt->rowCount() > 0){
            $resultCheck=false;
        } else {
            $resultCheck=true;
        }
        return $resultCheck;
    }
}
?>