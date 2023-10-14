<?php
declare(strict_types = 1);

class SignupController extends SignupModel{
    private string $username;
    private string $password;
    private string $passwordRepeat;
    private string $email;

    public function __construct(string $username, string $password, string $passwordRepeat,string $email ){
        $this->username = $username;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->email = $email;
    }

    public function signupUser(){
        $errors = [];

        if($this->emptyInput()){
            $errors["emptyInput"] = "Fill in all fields";
            // header("location: ../index.php?error=emptyInput");
            //exit();
        }
        if($this->invalidUsername()){
            $errors["invalidUsername"] = "Enter valid name";
            // header("location: ../index.php?error=invalidUsername");
            //exit();
        }
        if($this->invalidEmail()){
            $errors["invalidEmail"] = "Enter proper email";
            // header("location: ../index.php?error=invalidEmail");
            //exit();
        }
        if($this->isDifferentPasswords()){
            $errors["differentPasswords"] = "Both password must be the same";
            // header("location: ../index.php?error=differentPasswords");
            //exit();
        }
        if($this->isUserAlreadyExists()){
            $errors["userAlreadyExists"] = "User already exists";
            // header("location: ../index.php?error=userAlreadyExist");
            //exit();
        }

        require_once "../includes/config_session.php";

        if($errors){
            $_SESSION["errorsSignup"] = $errors;
            header("location: ../index.php");
            die();
        }

        $this->setUser($this->username, $this->password, $this->email);
    }

    private function emptyInput():bool
    {
        if(empty($this->username) || empty($this->password) || empty($this->passwordRepeat) || empty($this->email)){
            return true;
        } else {
            return false;
        }
    }

    private function invalidUsername():bool
    {
        $properNameExpression = "/^[a-zA-Z0-9]*$/";
        if(preg_match($properNameExpression, $this->username)){
            return false;
        } else {
            return true;
        }
    }

    private function invalidEmail():bool
    {
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            return false;
        } else {
            return true;
        }
    }

    private function isDifferentPasswords():bool
    {
        if($this->password === $this->passwordRepeat){
            return false;
        } else {
            return true;
        }
    }

    private function isUserAlreadyExists():bool
    {
        if($this->checkUser($this->username, $this->email)){
            return true;
        } else {
            return false;
        }
    }
}