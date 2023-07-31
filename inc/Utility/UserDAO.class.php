<?php

// nothing to be done here

class UserDAO   {

    // Declare Static DB member to store the database 
    private static $db;  


    static function initialize(string $className)    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService($className);
    }  

    static function getUser(string $userName)  {
        
        $selectSQL = "SELECT * FROM User WHERE Username = :username;";
        
        self::$db->query($selectSQL);
        self::$db->bind(":username", $userName);
        self::$db->execute();
        return self::$db->singleResult();
    }

    static function getMembers()  {

        $selectSQL = "SELECT * FROM User";
        self::$db->query($selectSQL);
        self::$db->execute();
        return self::$db->resultSet();   

    }

    static function createUser(User $newUser) : int {
        // QUERY BIND EXECUTE 
        // You may want to return the last inserted id
        $insertUser = "INSERT INTO `User` (Username,Password)";
        $insertUser .= "VALUES (:username,:password)";
        
        self::$db->query($insertUser);
        self::$db->bind(":username", $newUser->getUsername());
        self::$db->bind(":password", $newUser->getPassword());
   
        self::$db->execute();
       return self::$db->lastInsertedId();
    }
    

    static function setPassword($userName, $newPassword)    {

        $updateSQL = "UPDATE User SET Password = :password
                        WHERE Username = :username;";

        self::$db->query($updateSQL);
        self::$db->bind(":username", $userName);
        self::$db->bind(":password", password_hash($newPassword,PASSWORD_DEFAULT));
        self::$db->execute();

    return self::$db->rowCount();

    }

}