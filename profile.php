<?php
    require_once "./includes/config_session.php";
    require_once "./header.php";

    require_once "./classes/DatabaseHandler.php";
    require_once "./classes/ProfileInfoModel.php";
    require_once "./classes/ProfileInfoController.php";
    require_once "./classes/ProfileInfoView.php";
    $profileInfo = new ProfileInfoView();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <title>User Profile Page</title>
</head>
<body>
<div class="wrapper">
    <div class="profile-info-about">
        <a href="profilesettings.php">PROFILE SETTINGS</a>
        <h3>ABOUT</h3>
        <p>
            <?php
                $profileInfo->fetchAbout($_SESSION["userId"]);
            ?>
        </p>
        
    </div>
    <div class="profile-content">
        <div class="profile-intro">
            <h3>
            <?php
                $profileInfo->fetchIntrotitle($_SESSION["userId"]);
            ?>
            </h3>
            <p>
            <?php
                $profileInfo->fetchIntrotext($_SESSION["userId"]);
            ?>
            </p>
        </div>
    </div>
</div>
</body>