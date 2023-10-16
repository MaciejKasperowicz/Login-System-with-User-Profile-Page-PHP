<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    try {
        require_once "../classes/DatabaseHandler.php";
        require_once "../classes/LoginModel.php";
        require_once "../classes/LoginController.php";

        //Instantiate LoginController class
        $login = new LoginController($username, $password);

        //Running error handler and user login
        $login->loginUser();

        //Going back to front page
        header("location: ../index.php?login=success");

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    } 

} else {
    header("location: ../index.php");
    die();
}