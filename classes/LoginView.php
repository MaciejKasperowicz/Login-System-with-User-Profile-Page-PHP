<?php

declare(strict_types = 1);

class LoginView {
    public function checkLoginErrors(){
        if(isset($_SESSION["errorsLogin"])){
            $errors = $_SESSION["errorsLogin"];

            echo "<br>";

            foreach($errors as $error){
                echo "<p class='form-error'>" . $error. "</p>";
            }

            unset($_SESSION["errorsLogin"]);
        } else if(isset($_GET["login"]) && $_GET["login"] === "success"){
            echo "<br>";
            echo "<p class='from-success'>Login success!</p>";
        }
    }

    public function outputUsername(){
        if(isset($_SESSION["userId"])){
            echo "You are logged in as " . $_SESSION["userUsername"];
        } else {
            echo "You are not logged in";
        }
    }
}