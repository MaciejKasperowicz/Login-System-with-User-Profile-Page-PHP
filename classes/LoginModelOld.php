<?php

class LoginModel extends DatabaseHandler{

    protected function getUser($username, $password){
        $passwordQuery = "SELECT user_password FROM users WHERE user_username = ? OR user_email = ?";
        $stmt = $this->connect()->prepare($passwordQuery);

        if(!$stmt->execute([$username, $username])){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() === 0){
            $stmt = null;
            header("location: ../index.php?error=userNotFound");
            exit();
        }

        $hashedPassword = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["user_password"];
        $checkPassword = password_verify($password, $hashedPassword);

        if(!$checkPassword){
            $stmt = null;
            header("location: ../index.php?error=wrongPassword");
            exit();
        } else {
            $userQuery = "SELECT * FROM users WHERE user_username = ? OR user_email = ? AND user_password = ?";
            $stmt = $this->connect()->prepare($userQuery);

            if(!$stmt->execute([$username, $username, $password])){
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() === 0){
                $stmt = null;
                header("location: ../index.php?error=userNotFound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

            session_start();
            $_SESSION["userid"] = $user["user_id"];
            $_SESSION["username"] = $user["user_username"];
            
            $stmt = null;
        }

        

        $stmt = null;
    }
}