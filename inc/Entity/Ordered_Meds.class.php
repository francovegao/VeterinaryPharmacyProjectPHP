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
| Flavor        | char(30)   | YES  |     | NULL    |       |
| Quantity      | int(11)    | NO   |     | NULL    |       |
| SumPrice      | float(6,2) | YES  |     | NULL    |       |
+---------------+------------+------+-----+---------+-------+
7 rows in set (0.026 sec)
*/

class Ordered_Meds{

    // attributes
    private $Order_Id = 0;
    private $Medicine_Id="";
    private $Concentration= "";
    private $Presentation= "";
    private $Flavor= "";
    private $Quantity= "";
    private $SumPrice= "";

    // getter
    function getOrder_Id() : int{
        return $this->Order_Id;
    }
    function getMedicine_Id(): string{
        return $this->Medicine_Id;
    }
    function getConcentration(): string{
        return $this->Concentration;
    }
    function getPresentation(): string{
        return $this->Presentation;
    }
    function getFlavor(): string{
        return $this->Flavor;
    }
    function getQuantity(): string{
        return $this->Quantity;
    }
    function getSumPrice(): string{
        return $this->SumPrice;
    }
}

?>