<?php

class DatabaseHandler{
    private function connect(){
        try {
            $username= "root";
            $password = "";
            $databaseHandler = new PDO("mysql:host=localhost;dbname=login_system", $username, $password);
            return $databaseHandler;

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}