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
4 rows in set (0.027 sec)
*/

class Medicine{

    // attributes
    private $MedicineID = 0;
    private $ActiveDrug ="";
    private $Category= "";
    private $UnitPrice= "";

    // getter
    function getMedicineId() : int{
        return $this->MedicineID;
    }
    function getActiveDrug(): string{
        return $this->ActiveDrug;
    }
    function getCategory(): string{
        return $this->Category;
    }
    function getUnitPrice(): string{
        return $this->UnitPrice;
    }
}

?>
