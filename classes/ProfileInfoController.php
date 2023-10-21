<?php
declare(strict_types = 1);

class ProfileInfoController extends ProfileInfoModel{
    private int $userId;
    private string $username;

    public function __construct(int $userId, string $username) {
        $this->userId = $userId;
        $this->username = $username;
    }

    public function defaultProfileInfo() {
        $profileAbout = "Tell people about yourself!";
        $profileIntrotitle = "Hi! i am $this->username";
        $profileIntrotext = "Welcome to my profile page!";

        $this->setProfileInfo($this->userId, $profileAbout, $profileIntrotitle, $profileIntrotext);
    }

    public function updateProfileInfo($profileAbout, $profileIntrotitle, $profileIntrotext){
        //Error handlers
        $errors = [];
        if($this->emptyInput($profileAbout, $profileIntrotitle, $profileIntrotext)){
            $errors["emptyInput"] = "Fill in all fields";
            // header("location: ../profilesettings.php?error=emptyInput");
            //exit();
        }

        //Update profile info
        $this->setNewProfileInfo($this->userId, $profileAbout, $profileIntrotitle, $profileIntrotext);
    }

    private function emptyInput(string $profileAbout, string $profileIntrotitle, string $profileIntrotext):bool
    {
        if(empty($profileAbout) || empty($profileIntrotitle) || empty($profileIntrotext)){
            return true;
        } else {
            return false;
        }
    }
}