<?php
declare(strict_types = 1);

class ProfileInfoView extends ProfileInfoModel{
    
    public function fetchAbout($userId){
        $profileInfo = $this->getProfileInfo($userId);
        echo $profileInfo["profile_about"];
    }
    public function fetchIntrotitle($userId){
        $profileInfo = $this->getProfileInfo($userId);
        echo $profileInfo["profile_introtitle"];
    }
    public function fetchIntrotext($userId){
        $profileInfo = $this->getProfileInfo($userId);
        echo $profileInfo["profile_introtext"];
    }

}