<?php

/*
MariaDB [vetpharmacy]> desc clients;
+------------+--------------+------+-----+---------+----------------+
| Field      | Type         | Null | Key | Default | Extra          |
+------------+--------------+------+-----+---------+----------------+
| ClientsId  | int(11)      | NO   | PRI | NULL    | auto_increment |
| FirstName  | char(50)     | YES  |     | NULL    |                |
| LastName   | char(50)     | YES  |     | NULL    |                |
| Address    | char(100)    | YES  |     | NULL    |                |
| City       | char(30)     | YES  |     | NULL    |                |
| Province   | char(3)      | YES  |     | NULL    |                |
| PostalCode | char(7)      | YES  |     | NULL    |                |
| Email      | varchar(100) | YES  |     | NULL    |                |
| Phone      | char(15)     | YES  |     | NULL    |                |
| user_id    | int(11)      | NO   | MUL | NULL    |                |
+------------+--------------+------+-----+---------+----------------+
10 rows in set (0.024 sec)
*/

class Clients{

    // attributes
    private $ClientsId = 0;
    private $FirstName ="";
    private $LastName= "";
    private $Address= "";
    private $City= "";
    private $Province= "";
    private $PostalCode= "";
    private $Email= "";
    private $Phone= "";
    private $user_id= "";

    // getter
    function getClientsId() : int{
        return $this->ClientsId;
    }
    function getFirstName(): string{
        return $this->FirstName;
    }
    function getLastName(): string{
        return $this->LastName;
    }
    function getAddress(): string{
        return $this->Address;
    }
    function getCity(): string{
        return $this->City;
    }
    function getProvince(): string{
        return $this->Province;
    }
    function getPostalCode(): string{
        return $this->PostalCode;
    }
    function getEmail(): string{
        return $this->Email;
    }
    function getPhone(): string{
        return $this->Phone;
    }
    function getUser_Id(): string{
        return $this->user_id;
    }
}

?>