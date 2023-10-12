<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //Grabbing the data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];
    $email = $_POST["email"];
    // echo htmlspecialchars($username);
    // echo htmlspecialchars($password);
    // echo htmlspecialchars($passwordRepeat);
    // echo htmlspecialchars($email);

    //Instantiate SignupController class
    include "../classes/DatabaseHandler.php";
    include "../classes/Signup.php";
    include "../classes/SignupController.php";

    $signup = new SignupController($username, $password, $passwordRepeat, $email);
    
    //Running error handlers and user signup
    $signup->signupUser();

    //Going back to front page
    header("location: ../index.php?error=none");
} else {
    header("location: ../index.php");
    die();
}