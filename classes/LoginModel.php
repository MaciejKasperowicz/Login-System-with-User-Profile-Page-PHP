<?php
declare(strict_types=1);

class LoginModel extends DatabaseHandler{

    protected function getUser(string $username):array|bool
    {
        $userQuery = "SELECT * FROM users WHERE user_username = :username;";

        $stmt = $this->connect()->prepare($userQuery);
        $stmt->bindParam(":username", $username);

        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        // if($stmt->rowCount() === 0){
        //     $stmt = null;
        //     header("location: ../index.php?error=userNotFound");
        //     exit();
        // }

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        return $result ? $result : false;
    }
}