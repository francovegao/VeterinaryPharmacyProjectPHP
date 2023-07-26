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
        $insertOrder = "INSERT INTO order (OrderDate, PST, GST, TotalPrice, Clients_Id)";
        $insertOrder .= "VALUES (:date, :pst, :gst, :totalPrice, :clientId)";
        
        self::$db->query($insertOrder);
        self::$db->bind(":date", $newOrder->getOrderDate());
        self::$db->bind(":pst", $newOrder->getPST());
        self::$db->bind(":gst", $newOrder->getGST());
        self::$db->bind(":totalPrice", $newOrder->getTotalPrice());
        self::$db->bind(":clientId", $newOrder->getClients_Id());
        self::$db->execute();
       return self::$db->lastInsertedId();
    }
    
    // GET = READ = SELECT
    // This is for a single result.... when do I need it huh?  
    static function getReservation(string $ReservationId): Reservation  {
       //QUERY, BIND, EXECUTE, RETURN (the single result)
       $selectReservation = "SELECT * FROM reservation WHERE ReservationID = :reservationid";
       self::$db->query($selectReservation);
       self::$db->bind(":reservationid", $ReservationId);
       self::$db->execute();
       return self::$db->singleResult();
    }

    // GET = READ = SELECT ALLL
    // This is to get all purchases, do I even need this function? 
    static function getReservations() : array {

        // I don't need any parameter here, do I need to bind?
        
        //Prepare the Query
        $selectAll = "SELECT * FROM reservation";
        self::$db->query($selectAll);
        //execute the query
        self::$db->execute();
        //Return results
        return self::$db->resultSet();
    }

    // UPDATE means update   
    static function updateReservation (Reservation $ReservationToUpdate) {

        // QUERY, BIND, EXECUTE
        // You may want to return the rowCount
         // You may want to return the last inserted id
         $updateReservation = "UPDATE reservation SET Email=:email, Amount=:amount, TicketClassID=:ticketclassid ";
         $updateReservation .= "WHERE ReservationID=:reservationid";
         $reservationID = $ReservationToUpdate->getReservationID();
         
         self::$db->query($updateReservation);
         self::$db->bind(":reservationid", $ReservationToUpdate->getReservationID());
         self::$db->bind(":email", $ReservationToUpdate->getEmail());
         self::$db->bind(":amount", $ReservationToUpdate->getAmount());
         self::$db->bind(":ticketclassid", $ReservationToUpdate->getTicketClassID());

         self::$db->execute();
         
         $rowCount = self::$db->rowCount();

         return array('rowCount' => $rowCount, 'lastInsertedId' => $reservationID);

    }
    
    // Sorry, I need to DELETE your record 
    static function deleteReservation(string $ReservationId) {

        // Yea...yea... it is a drill like the one before
        $deleteReservation = "DELETE FROM reservation WHERE ReservationId = :reservationid";
        try{
        self::$db->query($deleteReservation);
        self::$db->bind(":reservationid", $ReservationId);
        self::$db->execute();

        if(self::$db->rowCount()!=1){
        throw new Exception("Problem in deleting the reservation");
         }

        }catch(Exception $ex) {
         return false;
        }
        return true;


    }

    // WE NEED TO USE JOIN HERE
    // Make sure to select from both tables joined at the correct column
    // You may need to also query some columns from the RoomsType class/table. 
    // Those columns are needed for cost calculation and display the rooms type detail in the main page
    static function getReservationList() {
        
        //Prepare the Query
        //execute the query
        //Return row results
        $selectReservations = "SELECT r.ReservationID, r.Email, r.Amount, t.TicketClassID, t.TicketDetail, t.TicketCost
                       FROM Reservation r
                       INNER JOIN TicketClass t ON r.TicketClassID = t.ID";
self::$db->query($selectReservations);
// Execute the query
self::$db->execute();
// Return row results
return self::$db->resultSet();
    
    }

}


?>