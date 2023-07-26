<?php
/*
+----+------------+--------------+------------+
| ID | TicketCode | TicketDetail | TicketCost |
+----+------------+--------------+------------+
*/
class MedicineClassDAO  {

    // Declare static DB member to store the database
    private static $db; 
    //Initialize the RoomsTypeDAO
    static function initialize(Medicine $medicine)    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService(get_class($medicine));
    }

    //Get all the Ticket Class
    static function getTicketClass(): array {
        // SELECT statement
        $selectAll = "SELECT * FROM ticketclass";
        self::$db->query($selectAll);
        //execute the query
        self::$db->execute();
        //Return results
        return self::$db->resultSet();
      
    }
}


?>