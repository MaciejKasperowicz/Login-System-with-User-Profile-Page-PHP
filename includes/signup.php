<?php
declare(strict_types = 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //Grabbing the data
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");
    $passwordRepeat = htmlspecialchars($_POST["passwordRepeat"], ENT_QUOTES, "UTF-8");
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");

    try {
        //Instantiate SignupController class
        require_once "../classes/DatabaseHandler.php";
        require_once "../classes/SignupModel.php";
        require_once "../classes/SignupController.php";
        
        $signup = new SignupController($username, $password, $passwordRepeat, $email);
    
        //Running error handlers and user signup
        $signup->signupUser();

        $userId = $signup->getUserId($username);

        //Instantiate ProfileInfoController class
        require_once "../classes/ProfileInfoModel.php";
        require_once "../classes/ProfileInfoController.php";

        $profileInfo = new ProfileInfoController($userId, $username);
        $profileInfo->defaultProfileInfo();

    
        //Going back to front page
        header("location: ../index.php?signup=success");
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("location: ../index.php");
    die();
}