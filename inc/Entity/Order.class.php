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
6 rows in set (0.029 sec)
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
    function getPST(): string{
        return $this->PST;
    }
    function getGST(): string{
        return $this->GST;
    }
    function getTotalPrice(): string{
        return $this->TotalPrice;
    }
    function getClients_Id(): string{
        return $this->Clients_Id;
    }
}

?>