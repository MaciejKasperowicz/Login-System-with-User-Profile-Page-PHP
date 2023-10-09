<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <ul class="menu-member">
            <?php 
                if(isset($_SESSION["userid"])){

                ?>
                <li><a href ="#">
                    <?php echo $_SESSION["username"]; ?> 
                    </a>
                </li>
                <li>
                    <a href ="includes/logout.php" class="header-login-a">LOGOUT
                    </a>
                </li>
                <?php
                } else {
                    ?>
                <li>
                    <a href="#">SIGN UP </a>
                </li>
                <li>
                    <a href="#" class="header-login-a">LOGIN </a>
                </li>
                <?php
                }
                ?>
        </ul>
    </header>
    <section class="index-login">
        <div class="wrapper">
            <div class="index-login-signup">
                <h4>SIGN UP</h4>
                <p>Don't have an account yet? Sign up here!</p>
                <form action="includes/signup.php" method="post">
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <input type="password" name="passwordRepeat" placeholder="Repeat Password">
                    <input type="text" name="email" placeholder="E-mail">
                    <br>
                    <button type="submit" name="submit">SIGN UP</button>
                </form>
            </div>
            <div class="index-login-login">
                <h4>LOGIN</h4>
                <p>Login here!</p>
                <form action="includes/login.php" method="post">
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <br>
                    <button type="submit" name="submit">LOGIN</button>
                </form>
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