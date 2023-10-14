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

    public function signupInputs(){

        if(isset($_SESSION["signupData"]["signupUsername"]) &&
            !isset($_SESSION["errorsSignup"]["userAlreadyExists"])
        ){
            echo '<input type="text" name="username" placeholder="Username" value="' . $_SESSION["signupData"]["signupUsername"] . '">';
        } else {
            echo '<input type="text" name="username" placeholder="Username">';
        }

        echo '<input type="password" name="password" placeholder="Password">';
        echo '<input type="password" name="passwordRepeat" placeholder="Repeat Password">';

        if(isset($_SESSION["signupData"]["signupEmail"]) &&
            !isset($_SESSION["errorsSignup"]["userAlreadyExists"])
        ) {
            echo '<input type="text" name="email" placeholder="E-mail" value="' . $_SESSION["signupData"]["signupEmail"] . '">';
        } else {
            echo '<input type="text" name="email" placeholder="E-mail">';
        }
    }
    
}