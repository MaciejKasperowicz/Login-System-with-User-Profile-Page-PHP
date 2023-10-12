<?php

class SignupModel extends DatabaseHandler{

    protected function setUser($username, $password, $email){
        $query = "INSERT INTO users (user_username, user_password, user_email) VALUES (?,?,?);";
        $stmt = $this->connect()->prepare($query);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute([$username, $hashedPassword, $email])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($username, $email){
        $query = "SELECT user_username FROM users WHERE user_username = ? OR user_email = ?;";
        $stmt = $this->connect()->prepare($query);
        
        if(!$stmt->execute([$username, $email])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }
}