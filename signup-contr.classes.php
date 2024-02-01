<?php
class SignupContr extends Signup {

private $name;
private $surname;
private $email;
private $password;
private $confirmPassword; 

public function __construct($name, $surname, $email, $password, $confirmPassword) {
    $this->name = $name;
    $this->surname = $surname;
    $this->email = $email;
    $this->password = $password;
    $this->confirmPassword = $confirmPassword; 
}

public function signupUser() {
    if ($this->emptyInput() == false) {
        header("location: ../home.php?error=emptyinput");
        exit();
    }

    if ($this->invalidName() == false) {
        header("location: ../home.php?error=name");
        exit();
    }
    if ($this->invalidSurname() == false) {
        header("location: ../home.php?error=surname");
        exit();
    }
    if ($this->invalidEmail() == false) {
        header("location: ../home.php?error=email");
        exit();
    }
    if ($this->pwdMatch() == false) {
        header("location: ../home.php?error=password");
        exit();
    }

    if ($this->nameOrEmailTakenCheck() == false) {
        header("location: ../home.php?error=nameoremailtaken");
        exit();
    }

    $this->setUser($this->name, $this->surname, $this->email, $this->password);
}

private function emptyInput() {
    $result;
    if (empty($this->name) || empty($this->surname) || empty($this->email) || empty($this->password) || empty($this->confirmPassword)) {
        $result = false;
    } else {
        $result = true;
    }
    return $result;
}

private function invalidName() {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $this->name)) {
        $result = false;
    } else {
        $result = true;
    }
    return $result;
}

private function invalidSurname() {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $this->surname)) {
        $result = false;
    } else {
        $result = true;
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

private function pwdMatch() {
    $result;
    if ($this->password !== $this->confirmPassword) {
        $result = false;
    } else {
        $result = true;
    }
    return $result;
}

private function nameOrEmailTakenCheck() {
    $result;
    if (!$this->checkUser($this->name, $this->email)) {
        $result = false;
    } else {
        $result = true;
    }
    return $result;
}
}
?>