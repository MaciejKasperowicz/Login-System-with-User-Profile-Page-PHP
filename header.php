<header>
        <ul class="menu-member">
            <?php 
                if(isset($_SESSION["userId"])){

                ?>
                <li><a href ="profile.php">
                    <?php echo $_SESSION["userUsername"]; ?> 
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