<?php
require_once "./includes/config_session.php";
require_once "./classes/SignupView.php";
require_once "./classes/LoginView.php";
$signupView = new SignupView();
$loginView = new LoginView();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <title>Login System with User Profile Page</title>
</head>
<body>
    <?php
        require_once "./header.php";
    ?>
    
    <section class="index-login">
        <div class="wrapper">
            <?php
            if(!isset($_SESSION["userId"])){ ?>
                <div class="index-login-login">
                <h4>LOGIN</h4>
                <form action="includes/login.php" method="post">
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <br>
                    <button type="submit" name="submit">LOGIN</button>
                </form>
            <?php }
                $loginView->checkLoginErrors();
            ?>
                </div>
            <div class="index-login-signup">
                <h4>SIGN UP</h4>
                <p>Don't have an account yet? Sign up here!</p>
                <form action="includes/signup.php" method="post">
                    <?php
                    $signupView->signupInputs();
                    ?>
                    <br>
                    <button type="submit" name="submit">SIGN UP</button>
                </form>
                <?php
                    $signupView->checkSignupErrors();
                ?>
            </div>
            
        </div>
    </section>
    
</body>
</html>

<!-- php -S localhost:8080 -->

<!-- CREATE TABLE users (
    user_id INT(11) AUTO_INCREMENT PRIMARY KEY not null,
    user_username TINYTEXT not null,
    user_password LONGTEXT not null,
    user_email TINYTEXT not null
); -->

<!-- CREATE TABLE profiles(
	profile_id INT(11) AUTO_INCREMENT not null,
    profile_about TEXT not null,
    profile_introtitle TEXT not null,
    profile_introtext TEXT not null,
    user_id INT(11),
    PRIMARY KEY (profile_id),
    FOREIGN KEY(user_id) REFERENCES users(user_id)
); -->