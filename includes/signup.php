<?php
declare(strict_types = 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //Grabbing the data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];
    $email = $_POST["email"];

    try {
        require_once "../classes/DatabaseHandler.php";
        require_once "../classes/SignupModel.php";
        require_once "../classes/SignupController.php";
        
        //Instantiate SignupController class
        $signup = new SignupController($username, $password, $passwordRepeat, $email);
    
        //Running error handlers and user signup
        $signup->signupUser();
    
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