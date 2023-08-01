<?php


/*
MariaDB [vetpharmacy]> desc pet;
+------------+------------+------+-----+---------+----------------+
| Field      | Type       | Null | Key | Default | Extra          |
+------------+------------+------+-----+---------+----------------+
| PetId      | int(11)    | NO   | PRI | NULL    | auto_increment |
| Name       | char(50)   | YES  |     | NULL    |                |
| Type       | char(30)   | YES  |     | NULL    |                |
| PetPicture | varchar(100) | YES  |     | NULL    |                |
| Clients_Id | int(11)    | NO   | MUL | NULL    |                |
+------------+------------+------+-----+---------+----------------+
5 rows in set (0.026 sec)
*/

class PetCLassDAO  {

    // Declare Static DB member to store the database 
    private static $db;  


    static function initialize(string $className)    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService($className);
    }

    // One of the functionality for the class abstracted by this DAO: CREATE
    // Remember that Create means INSERT
    static function createPet(Pet $newPet) : int {
        // QUERY BIND EXECUTE 
        // You may want to return the last inserted id
        $insertPet = "INSERT INTO `pet` (Name, Type, PetPicture, Clients_Id)";
        $insertPet .= "VALUES (:name, :type, :petPicture, :clientId)";
        
        self::$db->query($insertPet);
        self::$db->bind(":name", $newPet->getName());
        self::$db->bind(":type", $newPet->getType());
        self::$db->bind(":petPicture", $newPet->getPetPicture());
        self::$db->bind(":clientId", $newPet->getClients_Id());
        self::$db->execute();
       return self::$db->lastInsertedId();
    }

    static function getPets() : array {
        
        //Prepare the Query
        $selectAll = "SELECT * FROM pet";
        self::$db->query($selectAll);
        //execute the query
        self::$db->execute();
        //Return results
        return self::$db->resultSet();
    }

    static function getUserPets(string $ClientsId): array {
        //QUERY, BIND, EXECUTE, RETURN (the single result)
        $selectPet = "SELECT * FROM pet WHERE Clients_Id = :clientsid";
        self::$db->query($selectPet);
        self::$db->bind(":clientsid", $ClientsId);
        self::$db->execute();
        return self::$db->resultSet();
     }

    static function getPet(string $PetId): Pet  {
        //QUERY, BIND, EXECUTE, RETURN (the single result)
        $selectPet = "SELECT * FROM pet WHERE PetId = :petid";
        self::$db->query($selectPet);
        self::$db->bind(":petid", $PetId);
        self::$db->execute();
        return self::$db->singleResult();
     }
    

}


?>