<?php

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    

    //Instantiate LoginController class
    include "../classes/DatabaseHandler.php";
    include "../classes/Login.php";
    include "../classes/LoginController.php";

    $login = new LoginController($username, $password);

    //Running error handler and user login
    $login->loginUser();

    //Going back to front page
    header("location: ../index.php?error=none");
}