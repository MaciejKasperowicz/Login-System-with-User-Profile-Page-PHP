<?php
declare(strict_types = 1);

class SignupModel extends DatabaseHandler{

    protected function setUser(string $username, string $password, string $email){
        $query = "INSERT INTO users (user_username, user_password, user_email) VALUES (:username, :password, :email);";

        $stmt = $this->connect()->prepare($query);

        $options = [
            "cost" => 12
        ];

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

        
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $hashedPassword);
        $stmt->bindParam(":email", $email);

        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser(string $username, string $email){
        $query = "SELECT user_username FROM users WHERE user_username = :username OR user_email = :email;";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);

        
        if(!$stmt->execute()){
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