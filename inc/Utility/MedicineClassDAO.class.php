<?php
/*
MariaDB [vetpharmacy]> desc medicine;
+------------+------------+------+-----+---------+----------------+
| Field      | Type       | Null | Key | Default | Extra          |
+------------+------------+------+-----+---------+----------------+
| MedicineID | int(11)    | NO   | PRI | NULL    | auto_increment |
| ActiveDrug | char(50)   | NO   |     | NULL    |                |
| Category   | char(30)   | YES  |     | NULL    |                |
| UnitPrice  | float(6,2) | YES  |     | NULL    |                |
+------------+------------+------+-----+---------+----------------+
4 rows in set (0.030 sec)
*/
class MedicineClassDAO  {

    // Declare static DB member to store the database
    private static $db; 
    //Initialize the RoomsTypeDAO
    static function initialize(string $className)    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService($className);
    }

    //Get the medicine list
    static function getMedicineClass(): array {
        // SELECT statement
        $selectAll = "SELECT * FROM medicine";
        self::$db->query($selectAll);
        //execute the query
        self::$db->execute();
        //Return results
        return self::$db->resultSet(); 
    }

        //Search active drug
        static function searchActiveDrugs(string $input): array {
            $input = "%".$input."%";
            // SELECT statement
            $search = "SELECT * FROM medicine  WHERE ActiveDrug LIKE :input";
            self::$db->query($search);
            self::$db->bind(":input", $input);
            //execute the query
            self::$db->execute();
            //Return results
            return self::$db->resultSet(); 
        }

        //Search category
        static function searchCategory(string $input): array {
            $input = "%".$input."%";
            // SELECT statement
            $search = "SELECT * FROM medicine  WHERE Category LIKE :input";
            self::$db->query($search);
            self::$db->bind(":input", $input);
            //execute the query
            self::$db->execute();
            //Return results
            return self::$db->resultSet(); 
        }
}


?>