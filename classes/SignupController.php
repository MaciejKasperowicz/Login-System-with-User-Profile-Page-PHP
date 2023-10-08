<?php

class SignupController{
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

    private function emptyInput(){
        $result;
        if(empty($this->username) || empty($this->password) || empty($this->passwordRepeat) || empty($this->email)){
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function invalidUsername(){
        $result;
        $properNameExpression = "/^[a-zA-Z0-9]*$/";
        if(preg_match($properNameExpression, $this->username)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail(){
        $result;
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function isDifferentPassword(){
        $result;
        if($this->password === $this->passwordRepeat){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}