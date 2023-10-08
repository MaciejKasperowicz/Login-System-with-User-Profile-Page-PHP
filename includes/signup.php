<?php

if (isset($_POST["submit"])) {

    //Grabbing the data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];
    $email = $_POST["email"];
    echo $username;
    echo $password;
    echo $passwordRepeat;
    echo $email;

    //Instantiate SignupContr class
    include "../classes/Signup.php";
    include "../classes/SignupController.php";

    $signup = new SignupController($username, $password, $passwordRepeat, $email);
    

    //Running error handlers and user signup

    //Going back to front page
}