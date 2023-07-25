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

class Order{

    // attributes
    private $OrderId = 0;
    private $OrderDate ="";
    private $PST= "";
    private $GST= "";
    private $TotalPrice= "";
    private $Clients_Id= "";

    // getter
    function getOrderId() : int{
        return $this->OrderId;
    }
    function getOrderDate(): string{
        return $this->OrderDate;
    }
    function getPST(): float{
        return $this->PST;
    }
    function getGST(): float{
        return $this->GST;
    }
    function getTotalPrice(): float{
        return $this->TotalPrice;
    }
    function getClients_Id(): int{
        return $this->Clients_Id;
    }

    //Setter
    function setOrderId(int $OrderId) {
        $this->OrderId=$OrderId;
    }
    function setOrderDate(string $OrderDate){
        $this->OrderDate=$OrderDate;
    }
    function setPST(float $PST){
        $this->PST=$PST;
    }
    function setGST(float $GST){
        $this->GST=$GST;
    }
    function setTotalPrice(float $TotalPrice){
        $this->TotalPrice=$TotalPrice;
    }
    function setClients_Id(int $Clients_Id){
        $this->Clients_Id=$Clients_Id;
    }
}

?>