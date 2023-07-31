<?php

/*
MariaDB [vetPharmacy]> desc clients;
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
10 rows in set (0.014 sec)
*/


class Register {
    // attributes
    private $ClientsId = "";
    private $FirstName = "";
    private $LastName = "";
    private $Address = "";
    private $City = "";
    private $Province = "";
    private $PostalCode = "";
    private $Email = "";
    private $PhoneNumber = "";
    private $Username = "";
    private $Password = "";
    private $user_id = "";

    // getter methods
    function getClientsId(): string {
        return $this->FirstName;
    }
    function getFirstName(): string {
        return $this->FirstName;
    }
    function getLastName(): string {
        return $this->LastName;
    }
    function getAddress(): string {
        return $this->Address;
    }
    function getCity(): string {
        return $this->City;
    }
    function getProvince(): string {
        return $this->Province;
    }
    function getPostalCode(): string {
        return $this->PostalCode;
    }
    function getEmail(): string {
        return $this->Email;
    }
    function getPhoneNumber(): string {
        return $this->PhoneNumber;
    }
    function getUsername(): string {
        return $this->Username;
    }
    function getPassword(): string {
        return $this->Password;
    }
    function getUser_id(): string {
        return $this->user_id;
    }
}

?>