<?php

class LoginController extends LoginModel{

    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function loginUser(){
        if($this->emptyInput()){
            header("location: ../index.php?error=emptyInput");
            exit();
        }

        $this->getUser($this->username, $this->password);
    }

    private function emptyInput(){
        if(empty($this->username) || empty($this->password)){
            return true;
        } else {
            return false;
        }
    }
}