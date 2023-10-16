<?php
declare(strict_types = 1);

class LoginController extends LoginModel{

    private string $username;
    private string $password;

    public function __construct(string $username, string $password){
        $this->username = $username;
        $this->password = $password;
    }

    public function loginUser(){
        $errors = [];

        if($this->isInputEmpty($this->username,$this->password )){
            $errors["emptyInput"] = "Fill in all fields";
        }

        $result = $this->getUser($this->username);

        if($this->isUsernameWrong($result)){
            $errors["invalidUserData"] = "Invalid User Data";
        }

        if(!$this->isUsernameWrong($result) && $this->isPasswordWrong($this->password, $result["user_password"])){
            $errors["invalidUserData"] = "Invalid User Data";
        }


        require_once "../includes/config_session.php";

        if($errors){
            $_SESSION["errorsLogin"] = $errors;
            header("location: ../index.php");
            die();
        }
        

        $_SESSION["userId"] = $result["user_id"];
        $_SESSION["userUsername"] = htmlspecialchars($result["user_username"]);
        
    }

    private function isInputEmpty($username, $password):bool
    {
        if(empty($username) || empty($password)){
            return true;
        } else {
            return false;
        }
    }

    private function isUsernameWrong(array|bool $result):bool
    {
        if(!$result){
            return true;
        } else {
            return false;
        }
    }

    private function isPasswordWrong(string $password, string $hashedPassword):bool
    {
        if(!password_verify($password, $hashedPassword)){
            return true;
        } else {
            return false;
        }
    }
}