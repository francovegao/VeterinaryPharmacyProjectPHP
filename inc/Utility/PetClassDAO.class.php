<?php


/*
MariaDB [vetpharmacy]> desc pet;
+------------+------------+------+-----+---------+----------------+
| Field      | Type       | Null | Key | Default | Extra          |
+------------+------------+------+-----+---------+----------------+
| PetId      | int(11)    | NO   | PRI | NULL    | auto_increment |
| Name       | char(50)   | YES  |     | NULL    |                |
| Type       | char(30)   | YES  |     | NULL    |                |
| PetPicture | mediumblob | YES  |     | NULL    |                |
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
    
    // GET = READ = SELECT
    // This is for a single result 
     /*static function getPet(string $OrderId): Order  {
       //QUERY, BIND, EXECUTE, RETURN (the single result)
       $selectOrder = "SELECT * FROM `order` WHERE OrderId = :orderid";
       self::$db->query($selectOrder);
       self::$db->bind(":orderid", $OrderId);
       self::$db->execute();
       return self::$db->singleResult();
    }

    // GET = READ = SELECT ALLL
    // This is to get all orders
    /*static function getOrders() : array {
        
        //Prepare the Query
        $selectAll = "SELECT * FROM `order`";
        self::$db->query($selectAll);
        //execute the query
        self::$db->execute();
        //Return results
        return self::$db->resultSet();
    }

    // UPDATE means update   
    static function updateOrder (Order $OrderToUpdate) {

        // QUERY, BIND, EXECUTE
        // You may want to return the rowCount
         // You may want to return the last inserted id
         $updateOrder = "UPDATE `order` SET PST=:pst, GST=:gst, TotalPrice=:totalprice ";
         $updateOrder .= "WHERE OrderId=:orderid";
         $OrderId = $OrderToUpdate->getOrderId();
         
         self::$db->query($updateOrder);
         self::$db->bind(":orderid", $OrderToUpdate->getOrderId());
         self::$db->bind(":pst", $OrderToUpdate->getPST());
         self::$db->bind(":gst", $OrderToUpdate->getGST());
         self::$db->bind(":totalprice", $OrderToUpdate->getTotalPrice());

         self::$db->execute();
         
         $rowCount = self::$db->rowCount();
         return array('rowCount' => $rowCount, 'lastInsertedId' => $OrderId);

    }
    
    // Sorry, I need to DELETE your record 
    static function deleteOrder(string $OrderId) {

        $deleteOrder = "DELETE FROM `order` WHERE OrderId = :orderid";
        try{
        self::$db->query($deleteOrder);
        self::$db->bind(":orderid", $OrderId);
        self::$db->execute();

        if(self::$db->rowCount()!=1){
        throw new Exception("Problem in deleting the order");
         }

        }catch(Exception $ex) {
         return false;
        }
        return true;

    } */

}


?>