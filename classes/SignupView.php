<?php

declare(strict_types = 1);

class SignupView{

    public function checkSignupErrors(){
        if(isset($_SESSION["errorsSignup"])){
            $errors = $_SESSION["errorsSignup"];

            echo "<br>";

            foreach($errors as $error){
                echo "<p class='form-error'>" . $error. "</p>";
            }

            unset($_SESSION["errorsSignup"]);
        } else if(isset($_GET["signup"]) && $_GET["signup"] === "success"){
            echo "<br>";
            echo "<p class='from-success'>Signup success!</p>";
        }
    }
}