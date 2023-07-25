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

class Ordered_Meds{

    // attributes
    private $Order_Id = 0;
    private $Medicine_Id="";
    private $Concentration= "";
    private $Presentation= "";
    private $Size="";
    private $Flavor= "";
    private $Quantity= "";
    private $SumPrice= "";

    // getter
    function getOrder_Id() : int{
        return $this->Order_Id;
    }
    function getMedicine_Id(): int{
        return $this->Medicine_Id;
    }
    function getConcentration(): string{
        return $this->Concentration;
    }
    function getPresentation(): string{
        return $this->Presentation;
    }
    function getSize(): string{
        return $this->Size;
    }
    function getFlavor(): string{
        return $this->Flavor;
    }
    function getQuantity(): int{
        return $this->Quantity;
    }
    function getSumPrice(): float{
        return $this->SumPrice;
    }

    //Setters
    function setOrder_Id(int $Order_Id){
        $this->Order_Id=$Order_Id;
    }
    function setMedicine_Id(int $Medicine_Id){
        $this->Medicine_Id=$Medicine_Id;
    }
    function setConcentration(string $Concentration){
        $this->Concentration=$Concentration;
    }
    function setPresentation(string $Presentation){
        $this->Presentation=$Presentation;
    }
    function setSize(string $Size){
        $this->Size=$Size;
    }
    function setFlavor(string $Flavor){
        $this->Flavor=$Flavor;
        }
    function setQuantity(int $Quantity){
        $this->Quantity=$Quantity;
    }
    function setSumPrice(float $SumPrice){
        $this->SumPrice=$SumPrice;
    }
}

?>