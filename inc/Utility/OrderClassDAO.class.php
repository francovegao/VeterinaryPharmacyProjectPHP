<?php


/*
MariaDB [vetpharmacy]> desc `order`;
+------------+------------+------+-----+---------------------+-------------------------------+
| Field      | Type       | Null | Key | Default             | Extra                         |
+------------+------------+------+-----+---------------------+-------------------------------+
| OrderId    | int(11)    | NO   | PRI | NULL                | auto_increment                |
| OrderDate  | timestamp  | NO   |     | current_timestamp() | on update current_timestamp() |
| PST        | float(6,2) | YES  |     | NULL                |                               |
| GST        | float(6,2) | YES  |     | NULL                |                               |
| TotalPrice | float(6,2) | YES  |     | NULL                |                               |
| Clients_Id | int(11)    | NO   | MUL | NULL                |                               |
+------------+------------+------+-----+---------------------+-------------------------------+
6 rows in set (0.047 sec)
*/

class OrderCLassDAO  {

    // Declare Static DB member to store the database 
    private static $db;  


    static function initialize(string $className)    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService($className);
    }

    // One of the functionality for the class abstracted by this DAO: CREATE
    // Remember that Create means INSERT
    static function createOrder(Order $newOrder) : int {
        // QUERY BIND EXECUTE 
        // You may want to return the last inserted id
        $insertOrder = "INSERT INTO `order` (PST, GST, TotalPrice, Clients_Id)";
        $insertOrder .= "VALUES (:pst, :gst, :totalPrice, :clientId)";
        
        self::$db->query($insertOrder);
        self::$db->bind(":pst", $newOrder->getPST());
        self::$db->bind(":gst", $newOrder->getGST());
        self::$db->bind(":totalPrice", $newOrder->getTotalPrice());
        self::$db->bind(":clientId", $newOrder->getClients_Id());
        self::$db->execute();
       return self::$db->lastInsertedId();
    }
    
    // GET = READ = SELECT
    // This is for a single result 
    static function getOrder(string $OrderId): Order  {
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

    static function getLoggedInUserOrders(int $clientId) : array {
        
        //Prepare the Query
        $selectAll = "SELECT * FROM `order` WHERE Clients_Id = :clientsid";
        self::$db->query($selectAll);
        self::$db->bind(":clientsid", $clientId);
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

    }

   // WE NEED TO USE JOIN HERE
    /*
MariaDB [vetpharmacy]> select * from `order` join ordered_meds on OrderId = Order_Id join medicine on MedicineId=medicine_id where OrderId=10001;
+---------+---------------------+------+------+------------+------------+----------+-------------+---------------+----------------+-------+-----------+----------+----------+------------+------------+--------------------------------+-----------+
| OrderId | OrderDate           | PST  | GST  | TotalPrice | Clients_Id | Order_Id | Medicine_Id | Concentration | Presentation   | Size  | Flavor    | Quantity | SumPrice | MedicineID | ActiveDrug | Category                       | UnitPrice |
+---------+---------------------+------+------+------------+------------+----------+-------------+---------------+----------------+-------+-----------+----------+----------+------------+------------+--------------------------------+-----------+
|   10001 | 2023-07-26 14:12:53 | NULL | NULL |       NULL |          1 |    10001 |           1 | 15mg/ml       | oil suspension | 100ml | chicken   |        1 |    50.50 |          1 | Xylazine   | Anaesthetic, analgesic, and se |     27.50 |
|   10001 | 2023-07-26 14:12:53 | NULL | NULL |       NULL |          1 |    10001 |           5 | 25mg/ml       | ointment       | 30ml  | no flavor |        3 |    27.85 |          5 | Tolazoline | Anaesthetic, analgesic, and se |     27.50 |
+---------+---------------------+------+------+------------+------------+----------+-------------+---------------+----------------+-------+-----------+----------+----------+------------+------------+--------------------------------+-----------+
2 rows in set (0.001 sec)
    */
    // Make sure to select from both tables joined at the correct column
    // You may need to also query some columns from the RoomsType class/table. 
    // Those columns are needed for cost calculation and display the rooms type detail in the main page
     static function getPreOrder(string $OrderId):array {
        
        $selectAll= "SELECT * FROM `order` JOIN ordered_meds ON OrderId = Order_Id join medicine on MedicineId=medicine_id WHERE OrderId=:orderid";
        self::$db->query($selectAll);

        self::$db->bind(":orderid", $OrderId);
        self::$db->execute();
        //Return row results
        return self::$db->resultSet();
        }

        /*
MariaDB [vetpharmacy]> select * from `order` join clients on Clients_Id = ClientsId;
+---------+---------------------+------+------+------------+------------+-----------+-----------+----------+---------------+-----------------+----------+------------+-------------------------+------------+---------+
| OrderId | OrderDate           | PST  | GST  | TotalPrice | Clients_Id | ClientsId | FirstName | LastName | Address       | City
| Province | PostalCode | Email                   | Phone      | user_id |
+---------+---------------------+------+------+------------+------------+-----------+-----------+----------+---------------+-----------------+----------+------------+-------------------------+------------+---------+
|   10001 | 2023-07-30 20:58:26 | 0.00 | 3.92 |      82.27 |          1 |         1 | Admin     | One      | 700 Royal Ave | New Westminster | BC       | V3M 5Z5    | admin@douglascollege.ca | 2368335240 |       1 |
|   10002 | 2023-07-30 19:19:11 | 0.00 | 9.03 |     189.53 |          1 |         1 | Admin     | One      | 700 Royal Ave | New Westminster | BC       | V3M 5Z5    | admin@douglascollege.ca | 2368335240 |       1 |
|   10003 | 2023-07-30 20:58:34 | 0.00 | 1.38 |      28.88 |          1 |         1 | Admin     | One      | 700 Royal Ave | New Westminster | BC       | V3M 5Z5    | admin@douglascollege.ca | 2368335240 |       1 |
|   10004 | 2023-07-30 21:21:07 | 0.00 | 1.38 |      28.88 |          1 |         1 | Admin     | One      | 700 Royal Ave | New Westminster | BC       | V3M 5Z5    | admin@douglascollege.ca | 2368335240 |       1 |
|   10005 | 2023-07-30 22:17:13 | 0.00 | 4.12 |      86.62 |          1 |         1 | Admin     | One      | 700 Royal Ave | New Westminster | BC       | V3M 5Z5    | admin@douglascollege.ca | 2368335240 |       1 |
|   10006 | 2023-07-30 22:17:30 | 0.00 | 1.38 |      28.88 |          1 |         1 | Admin     | One      | 700 Royal Ave | New Westminster | BC       | V3M 5Z5    | admin@douglascollege.ca | 2368335240 |       1 |
+---------+---------------------+------+------+------------+------------+-----------+-----------+----------+---------------+-----------------+----------+------------+-------------------------+------------+---------+
6 rows in set (0.000 sec)

        */
        static function getLoggedUserOrders(string $ClientId):array {
            $selectAll= "SELECT * from `order` join clients on Clients_Id = ClientsId WHERE Clients_Id=:clientid";

            self::$db->query($selectAll);
    
            self::$db->bind(":clientid", $ClientId);
            self::$db->execute();
            //Return row results
            return self::$db->resultSet();
            }
        /*
            MariaDB [vetpharmacy]> SELECT * FROM `order` JOIN ordered_meds ON OrderId = Order_Id join medicine on MedicineId=medicine_id JOIN clients ON Clients_Id=ClientsId;
+---------+---------------------+------+------+------------+------------+----------+-------------+---------------+--------------------+--------+-----------+----------+----------+------------+-----------------+--------------------------------+-----------+-----------+-----------+----------+---------------+-----------------+----------+------------+-------------------------+------------+---------+
| OrderId | OrderDate           | PST  | GST  | TotalPrice | Clients_Id | Order_Id | Medicine_Id | Concentration | Presentation       | Size   | Flavor    | Quantity | SumPrice | MedicineID | ActiveDrug      | Category                       | UnitPrice | ClientsId | FirstName | LastName | Address       | City            | Province | PostalCode | Email                   | Phone      | user_id |
+---------+---------------------+------+------+------------+------------+----------+-------------+---------------+--------------------+--------+-----------+----------+----------+------------+-----------------+--------------------------------+-----------+-----------+-----------+----------+---------------+-----------------+----------+------------+-------------------------+------------+---------+
|   10001 | 2023-07-30 20:58:26 | 0.00 | 3.92 |      82.27 |          1 |    10001 |           1 | 15mg/ml       | oil suspension     | 100ml  | chicken   |        1 |    50.50 |          1 | Xylazine        | Anaesthetic, analgesic, and se |     27.50 |         1 | Admin     | One      | 700 Royal Ave | New Westminster | BC       | V3M 5Z5    | admin@douglascollege.ca | 2368335240 |       1 |
|   10001 | 2023-07-30 20:58:26 | 0.00 | 3.92 |      82.27 |          1 |    10001 |           5 | 25mg/ml       | ointment           | 30ml   | no flavor |        3 |    27.85 |          5 | Tolazoline      | Anaesthetic, analgesic, and se |     27.50 |         1 | Admin     | One      | 700 Royal Ave | New Westminster | BC       | V3M 5Z5    | admin@douglascollege.ca | 2368335240 |       1 |
|   10002 | 2023-07-30 19:19:11 | 0.00 | 9.03 |     189.53 |          1 |    10002 |           7 | 10 mg/ml      | Injection          | 15 ml  | no flavor |        4 |   110.00 |          7 | Atropine        | Anaesthetic, analgesic, and se |     27.50 |         1 | Admin     | One      | 700 Royal Ave | New Westminster | BC       | V3M 5Z5    | admin@douglascollege.ca | 2368335240 |       1 |
|   10002 | 2023-07-30 19:19:11 | 0.00 | 9.03 |     189.53 |          1 |    10002 |           9 | 20 mg/ml      | Ointment           | 100 ml | no flavor |        2 |    55.00 |          9 | Lidocaine       | Anaesthetic, analgesic, and se |     27.50 |         1 | Admin     | One      | 700 Royal Ave | New Westminster | BC       | V3M 5Z5    | admin@douglascollege.ca | 2368335240 |       1 |
|   10002 | 2023-07-30 19:19:11 | 0.00 | 9.03 |     189.53 |          1 |    10002 |          49 | 100 mg/ml     | Liquid Aqueous     | 500 ml | chicken   |        1 |    15.50 |         49 | Pyrantel        | Antiparasitic drugs            |     15.50 |         1 | Admin     | One      | 700 Royal Ave | New Westminster | BC       | V3M 5Z5    | admin@douglascollege.ca | 2368335240 |       1 |
|   10003 | 2023-07-30 20:58:34 | 0.00 | 1.38 |      28.88 |          1 |    10003 |           1 | 5 mg/ml       | Oil suspension     | 15 ml  | no flavor |        1 |    27.50 |          1 | Xylazine        | Anaesthetic, analgesic, and se |     27.50 |         1 | Admin     | One      | 700 Royal Ave | New Westminster | BC       | V3M 5Z5    | admin@douglascollege.ca | 2368335240 |       1 |
|   10004 | 2023-07-30 21:21:07 | 0.00 | 1.38 |      28.88 |          1 |    10004 |           7 | 5 mg/ml       | Liquid Aqueous     | 15 ml  | no flavor |        1 |    27.50 |          7 | Atropine        | Anaesthetic, analgesic, and se |     27.50 |         1 | Admin     | One      | 700 Royal Ave | New Westminster | BC       | V3M 5Z5    | admin@douglascollege.ca | 2368335240 |       1 |
|   10005 | 2023-07-30 22:17:13 | 0.00 | 4.12 |      86.62 |          1 |    10005 |           1 | 50 mg/ml      | In Versabase Cream | 250 ml | no flavor |        2 |    55.00 |          1 | Xylazine        | Anaesthetic, analgesic, and se |     27.50 |         1 | Admin     | One      | 700 Royal Ave | New Westminster | BC       | V3M 5Z5    | admin@douglascollege.ca | 2368335240 |       1 |
|   10005 | 2023-07-30 22:17:13 | 0.00 | 4.12 |      86.62 |          1 |    10005 |           3 | 5 mg/ml       | Oil suspension     | 15 ml  | no flavor |        1 |    27.50 |          3 | Dexmedetomidine | Anaesthetic, analgesic, and se |     27.50 |         1 | Admin     | One      | 700 Royal Ave | New Westminster | BC       | V3M 5Z5    | admin@douglascollege.ca | 2368335240 |       1 |
|   10006 | 2023-07-30 22:17:30 | 0.00 | 1.38 |      28.88 |          1 |    10006 |           1 | 5 mg/ml       | Oil suspension     | 15 ml  | no flavor |        1 |    27.50 |          1 | Xylazine        | Anaesthetic, analgesic, and se |     27.50 |         1 | Admin     | One      | 700 Royal Ave | New Westminster | BC       | V3M 5Z5    | admin@douglascollege.ca | 2368335240 |       1 |
+---------+---------------------+------+------+------------+------------+----------+-------------+---------------+--------------------+--------+-----------+----------+----------+------------+-----------------+--------------------------------+-----------+-----------+-----------+----------+---------------+-----------------+----------+------------+-------------------------+------------+---------+
10 rows in set (0.001 sec)
        */

        static function getOrderDetails(string $OrderId):array {
        
                $selectAll= "SELECT * FROM `order` JOIN ordered_meds ON OrderId = Order_Id join medicine on MedicineId=medicine_id JOIN clients ON Clients_Id=ClientsId WHERE OrderId=:orderid";
                self::$db->query($selectAll);
        
                self::$db->bind(":orderid", $OrderId);
                self::$db->execute();
                //Return row results
                return self::$db->resultSet();
        }

        static function getLoggedUserOrdersDetails(string $ClientId):array {
        
            $selectAll= "SELECT * FROM `order` JOIN ordered_meds ON OrderId = Order_Id join medicine on MedicineId=medicine_id JOIN clients ON Clients_Id=ClientsId WHERE Clients_Id=:clientid";
            self::$db->query($selectAll);
    
            self::$db->bind(":clientid", $ClientId);
            self::$db->execute();
            //Return row results
            return self::$db->resultSet();
    }

}


?>