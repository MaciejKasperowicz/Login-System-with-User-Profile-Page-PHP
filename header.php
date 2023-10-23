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
                } 
                ?>
        </ul>
</header>