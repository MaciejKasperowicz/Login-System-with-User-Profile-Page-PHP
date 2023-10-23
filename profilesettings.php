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
    <title>User Settings Page</title>
</head>
<body>
<div class="wrapper">
    <div class="profile-settings">
       <h3>PROFILE SETTINGS</h3>
       <p>Change your about section here!</p>
       <form action="includes/profileinfo.php" method="post">
            <textarea name="about" cols="30" rows="10" placeholder="Profile about section..."> <?php $profileInfo->fetchAbout($_SESSION["userId"]);?></textarea>
            <br><br>
            <p>Change your profile page intro here!</p>
            <br>
            <input type="text" name="introtitle" placeholder="Profile title..."
            value="<?php $profileInfo->fetchIntrotitle($_SESSION["userId"]);?>">
            <br>
            <textarea name="introtext" cols="30" rows="10" placeholder="Profile introduction..."><?php $profileInfo->fetchIntrotext($_SESSION["userId"]);?></textarea>
            <button type="submit" name="submit">SAVE</button>
       </form>
    </div>
</div>
</body>