<?php
/*
MariaDB [vetpharmacy]> desc clients;
+------------+--------------+------+-----+---------+----------------+
| Field      | Type         | Null | Key | Default | Extra          |
+------------+--------------+------+-----+---------+----------------+
| ClientsId  | int(11)      | NO   | PRI | NULL    | auto_increment |
| FirstName  | char(50)     | YES  |     | NULL    |                |
| LastName   | char(50)     | YES  |     | NULL    |                |
| Address    | char(100)    | YES  |     | NULL    |                |
| City       | char(30)     | YES  |     | NULL    |                |
| Province   | char(3)      | YES  |     | NULL    |                |
| PostalCode | char(7)      | YES  |     | NULL    |                |
| Email      | varchar(100) | YES  |     | NULL    |                |
| Phone      | char(15)     | YES  |     | NULL    |                |
| user_id    | int(11)      | NO   | MUL | NULL    |                |
+------------+--------------+------+-----+---------+----------------+
10 rows in set (0.024 sec)
*/


class ClientCLassDAO  {

    // Declare Static DB member to store the database 
    private static $db;  


    static function initialize(string $className)    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService($className);
    }

    // One of the functionality for the class abstracted by this DAO: CREATE
    // Remember that Create means INSERT
    static function createClient(Clients $newClient) : int {
        // QUERY BIND EXECUTE 
        // You may want to return the last inserted id
        $insertClient = "INSERT INTO `clients` (FirstName, LastName, Address, City, Province, PostalCode, Email, Phone, user_id)";
        $insertClient .= "VALUES (:firstname, :lastname, :address, :city, :province, :postalcode, :email, :phone, :user_id)";
        
        self::$db->query($insertClient);
        self::$db->bind(":firstname", $newClient->getFirstName());
        self::$db->bind(":lastname", $newClient->getLastName());
        self::$db->bind(":address", $newClient->getAddress());
        self::$db->bind(":city", $newClient->getCity());
        self::$db->bind(":province", $newClient->getProvince());
        self::$db->bind(":postalcode", $newClient->getPostalCode());
        self::$db->bind(":email", $newClient->getEmail());
        self::$db->bind(":phone", $newClient->getPhone());
        self::$db->bind(":user_id", $newClient->getUser_Id());
        self::$db->execute();
       return self::$db->lastInsertedId();
    }

    static function getClients() : array {
        
        //Prepare the Query
        $selectAll = "SELECT * FROM clients";
        self::$db->query($selectAll);
        //execute the query
        self::$db->execute();
        //Return results
        return self::$db->resultSet();
    }

    static function getClientInfo(string $ClientId): Clients  {
        //QUERY, BIND, EXECUTE, RETURN (the single result)
        $selectClient = "SELECT * FROM clients WHERE ClientsId = :userid";
        self::$db->query($selectClient);
        self::$db->bind(":userid", $ClientId);
        self::$db->execute();
        return self::$db->singleResult();
     }

}


?>