<?php



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
    
    // GET = READ = SELECT
    // This is for a single result 
   /*  static function getOrder(string $OrderId): Order  {
       //QUERY, BIND, EXECUTE, RETURN (the single result)
       $selectOrder = "SELECT * FROM `order` WHERE OrderId = :orderid";
       self::$db->query($selectOrder);
       self::$db->bind(":orderid", $OrderId);
       self::$db->execute();
       return self::$db->singleResult();
    }

    // GET = READ = SELECT ALLL
    // This is to get all orders
    static function getOrders() : array {
        
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
         $updateOrder = "UPDATE `order` SET OrderDate=:orderdate, PST=:pst, GST=:gst, TotalPrice=:totalprice ";
         $updateOrder .= "WHERE OrderId=:orderid";
         $OrderId = $OrderToUpdate->getOrderId();
         
         self::$db->query($updateOrder);
         self::$db->bind(":orderid", $OrderToUpdate->getOrderId());
         self::$db->bind(":orderdate", $OrderToUpdate->getOrderDate());
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