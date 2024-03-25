<?php
session_start();

class ContactUsContr extends ContactUs {

    private $name;
    private $email;
    private $message;

    public function __construct($name, $email, $message) {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    } 

    public function sendMessage() {
        if (!$this->emptyInput() == false) {
            header("location: ../home.php?error=emptyinput");
            exit();
        }

        if ($this->invalidEmail() == false) {
            header("location: ../home.php?error=Email");
            exit();
        }

        if ($this->messageSentCheck() == false) {
            header("location: ../home.php?error=Email");
            exit();
        }
        
        $this->insertMessage($this->name, $this->email, $this->message);
        
    }

    private function emptyInput() {
        $result;
           if (empty($this->name) || empty($this->email) || empty($this->message)) {
        $result = true;  
    } else {
        $result = false;  
    }
    return $result;
}
   

    private function invalidEmail() {
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    
    private function messageSentCheck() {
        $result;
        if (!$this->checkContact($this->name, $this->email, $this->message)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    
    

}

    
?>