<?php

class DatabaseHandler{
    
    protected function connect(){
        try {
            $host = "localhost";
            $dbname = "login_system";
            $username= "root";
            $password = "";
            $databaseHandler = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $databaseHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $databaseHandler;

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}