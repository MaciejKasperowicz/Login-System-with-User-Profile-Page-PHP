<?php
declare(strict_types=1);

class ProfileInfoModel extends DatabaseHandler{

    protected function getProfileInfo(int $userId)
    {
        $profileQuery = "SELECT * FROM profiles WHERE user_id = :userId;";

        $stmt = $this->connect()->prepare($profileQuery);
        $stmt->bindParam(":userId", $userId);

        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() === 0){
            $stmt = null;
            header("location: ../profile.php?error=profileNotFound");
            exit();
        } 

        $profileData = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
        return $profileData;
    }

    protected function setProfileInfo(int $userId, string $profileAbout, string $profileIntrotitle, string $profileIntrotext)
    {
        $profileInfoQuery = "INSERT INTO profiles (profile_about, profile_introtitle, profile_introtext, user_id) VALUES (:profileAbout, :profileIntrotitle, :profileIntrotext, :userId);";

        $stmt = $this->connect()->prepare($profileInfoQuery);
        $stmt->bindParam(":userId", $userId);
        $stmt->bindParam(":profileAbout", $profileAbout);
        $stmt->bindParam(":profileIntrotitle", $profileIntrotitle);
        $stmt->bindParam(":profileIntrotext", $profileIntrotext);

        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;
    }

    protected function setNewProfileInfo(int $userId, string $profileAbout, string $profileIntrotitle, string $profileIntrotext)
    {
        $profileInfoQuery = "UPDATE profiles SET profile_about = :profileAbout, profile_introtitle = :profileIntrotitle, profile_introtext = :profileIntrotext  WHERE user_id = :userId;";

        $stmt = $this->connect()->prepare($profileInfoQuery);
        $stmt->bindParam(":userId", $userId);
        $stmt->bindParam(":profileAbout", $profileAbout);
        $stmt->bindParam(":profileIntrotitle", $profileIntrotitle);
        $stmt->bindParam(":profileIntrotext", $profileIntrotext);

        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;
    }
}