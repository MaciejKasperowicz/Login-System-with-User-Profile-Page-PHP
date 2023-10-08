<?php

class SignupController extends Signup{
    private $username;
    private $password;
    private $passwordRepeat;
    private $email;

    public function __construct($username, $password, $passwordRepeat,$email ){
        $this->username = $username;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->email = $email;
    }

    public function signupUser(){
        if($this->emptyInput()){
            header("location: ../index.php?error=emptyInput");
            exit();
        }
        if($this->invalidUsername()){
            header("location: ../index.php?error=invalidUsername");
            exit();
        }
        if($this->invalidEmail()){
            header("location: ../index.php?error=invalidEmail");
            exit();
        }
        if($this->isDifferentPassword()){
            header("location: ../index.php?error=differentPassword");
            exit();
        }
        if($this->isUserAlreadyExist()){
            header("location: ../index.php?error=UserAlreadyExist");
            exit();
        }

        $this->setUser($this->username, $this->password, $this->email);
    }

    private function emptyInput(){
        if(empty($this->username) || empty($this->password) || empty($this->passwordRepeat) || empty($this->email)){
            return true;
        } else {
            return false;
        }
    }

    private function invalidUsername(){
        $properNameExpression = "/^[a-zA-Z0-9]*$/";
        if(preg_match($properNameExpression, $this->username)){
            return false;
        } else {
            return true;
        }
    }

    private function invalidEmail(){
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            return false;
        } else {
            return true;
        }
    }

    private function isDifferentPassword(){
        if($this->password === $this->passwordRepeat){
            return false;
        } else {
            return true;
        }
    }

    private function isUserAlreadyExist(){
        if($this->checkUser($this->username, $this->email)){
            return true;
        } else {
            return false;
        }
    }
}