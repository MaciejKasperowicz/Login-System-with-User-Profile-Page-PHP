<?php

class Login extends DatabaseHandler{

    protected function getUser($username, $email, $password){
        $query = "SELECT * FROM users WHERE user_username = ? OR user_email = ? AND user_password = ?";
        $stmt = $this->connect()->prepare($query);

        if(!$stmt->execute([$username, $email, $password])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
}