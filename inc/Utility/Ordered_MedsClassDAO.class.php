<?php


/*
MariaDB [vetpharmacy]> desc ordered_meds;
+---------------+------------+------+-----+---------+-------+
| Field         | Type       | Null | Key | Default | Extra |
+---------------+------------+------+-----+---------+-------+
| Order_Id      | int(11)    | NO   | PRI | NULL    |       |
| Medicine_Id   | int(11)    | NO   | PRI | NULL    |       |
| Concentration | char(20)   | NO   |     | NULL    |       |
| Presentation  | char(50)   | NO   |     | NULL    |       |
| Size          | char(20)   | NO   |     | NULL    |       |
| Flavor        | char(30)   | YES  |     | NULL    |       |
| Quantity      | int(11)    | NO   |     | NULL    |       |
| SumPrice      | float(6,2) | YES  |     | NULL    |       |
+---------------+------------+------+-----+---------+-------+
8 rows in set (0.022 sec)
*/

class Ordered_MedsClassDAO  {

    // Declare Static DB member to store the database 
    private static $db;  


    static function initialize(string $className)    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService($className);
    }

    // One of the functionality for the class abstracted by this DAO: CREATE
    // Remember that Create means INSERT
    static function createOrdered_Meds(Ordered_Meds $newOrdered_Med) : int {
        // QUERY BIND EXECUTE 
        // You may want to return the last inserted id
        $insertOrdered_Meds = "INSERT INTO ordered_meds (Order_Id, Medicine_Id, Concentration, Presentation, Size, Flavor, Quantity, SumPrice)";
        $insertOrdered_Meds .= "VALUES (:order_id, :medicine_id, :concentration, :presentation, :size, :flavor, :quantity, :sumprice)";
        
        self::$db->query($insertOrdered_Meds);
        self::$db->bind(":order_id", $newOrdered_Med->getOrder_Id());
        self::$db->bind(":medicine_id", $newOrdered_Med->getMedicine_Id());
        self::$db->bind(":concentration", $newOrdered_Med->getConcentration());
        self::$db->bind(":presentation", $newOrdered_Med->getPresentation());
        self::$db->bind(":size", $newOrdered_Med->getSize());
        self::$db->bind(":flavor", $newOrdered_Med->getFlavor());
        self::$db->bind(":quantity", $newOrdered_Med->getQuantity());
        self::$db->bind(":sumprice", $newOrdered_Med->getSumPrice());
        self::$db->execute();
       return self::$db->lastInsertedId();
    }
    
    // GET = READ = SELECT
    // To get all the ordered meds from one order  
    static function getSingleOrdered_Med(string $Order_Id, string $Medicine_Id): Ordered_Meds  {
        //QUERY, BIND, EXECUTE, RETURN 
        $selectOrdered_Meds = "SELECT * FROM ordered_meds WHERE Order_Id = :order_id AND Medicine_Id= :medicine_id";
        self::$db->query($selectOrdered_Meds);
        self::$db->bind(":order_id", $Order_Id);
        self::$db->bind(":medicine_id", $Medicine_Id);
        self::$db->execute();
        return self::$db->singleResult();
     }

    // GET = READ = SELECT
    // To get all the ordered meds from one order  
    static function getOrdered_Meds(string $Order_Id): array  {
       //QUERY, BIND, EXECUTE, RETURN 
       $selectOrdered_Meds = "SELECT * FROM ordered_meds WHERE Order_Id = :order_id";
       self::$db->query($selectOrdered_Meds);
       self::$db->bind(":order_id", $Order_Id);
       self::$db->execute();
       return self::$db->resultSet();
    }

    // UPDATE means update   
    static function updateOrdered_Med (Ordered_Meds $Order_MedToUpdate) {

        // QUERY, BIND, EXECUTE
        // You may want to return the rowCount
         $updateOrder_Med = "UPDATE ordered_meds SET Concentration=:concentration, Presentation=:presentation, Size=:size, Flavor=:flavor, Quantity=:quantity, SumPrice=:sumprice ";
         $updateOrder_Med .= "WHERE Order_Id = :order_id";
         
         self::$db->query($updateOrder_Med);
         self::$db->bind(":order_id", $Order_MedToUpdate->getOrder_Id());
         self::$db->bind(":concentration", $Order_MedToUpdate->getConcentration());
         self::$db->bind(":presentation", $Order_MedToUpdate->getPresentation());
         self::$db->bind(":size", $Order_MedToUpdate->getSize());
         self::$db->bind(":flavor", $Order_MedToUpdate->getFlavor());
         self::$db->bind(":quantity", $Order_MedToUpdate->getQuantity());
         self::$db->bind(":sumprice", $Order_MedToUpdate->getSumPrice());

         self::$db->execute();
         
         return self::$db->rowCount();

    }
    
    // Sorry, I need to DELETE your record 
    static function deleteOrdered_Meds(string $Order_Id, string $Medicine_Id) {

        $deleteOrdered_Meds = "DELETE FROM ordered_meds WHERE Order_Id = :order_id AND Medicine_Id=:medicine_id";
        try{
        self::$db->query($deleteOrdered_Meds);
        self::$db->bind(":order_id", $Order_Id);
        self::$db->bind(":medicine_id", $Medicine_Id);
        self::$db->execute();

        if(self::$db->rowCount()!=1){
        throw new Exception("Problem in deleting the reservation");
         }

        }catch(Exception $ex) {
         return false;
        }
        return true;


    }

}


?>