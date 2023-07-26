<?php

/*
MariaDB [vetpharmacy]> desc user;
+----------+--------------+------+-----+---------+----------------+
| Field    | Type         | Null | Key | Default | Extra          |
+----------+--------------+------+-----+---------+----------------+
| UserId   | int(11)      | NO   | PRI | NULL    | auto_increment |
| Username | varchar(255) | NO   | UNI | NULL    |                |
| Password | varchar(255) | NO   |     | NULL    |                |
+----------+--------------+------+-----+---------+----------------+
3 rows in set (0.024 sec)
*/

class User{

    // attributes
    private $UserId = 0;
    private $Username ="";
    private $Password = "";

    // getter
    function getUserId() : int{
        return $this->UserId;
    }
    function getUsername(): string{
        return $this->Username;
    }
    function getPassword(): string{
        return $this->Password;
    }

    // setter

    function verifyPassword(string $passwordToVerify){
        return password_verify($passwordToVerify, $this->getPassword());
    }
}

?>