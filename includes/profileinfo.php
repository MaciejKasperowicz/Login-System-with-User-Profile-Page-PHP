<?php
require_once "./config_session.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $id = $_SESSION["userId"];
    $username = $_SESSION["userUsername"];

    $about = htmlspecialchars($_POST["about"], ENT_QUOTES, "UTF-8");
    $introTitle = htmlspecialchars($_POST["introtitle"], ENT_QUOTES, "UTF-8");
    $introText = htmlspecialchars($_POST["introtext"], ENT_QUOTES, "UTF-8");

    require_once "../classes/DatabaseHandler.php";
    require_once "../classes/ProfileInfoModel.php";
    require_once "../classes/ProfileInfoController.php";
    require_once "../classes/ProfileInfoView.php";
    $profileInfo = new ProfileInfoController($id, $username);
    $profileInfo->updateProfileInfo($about, $introTitle, $introText);

    header("location: ../profile.php?error=none");
}