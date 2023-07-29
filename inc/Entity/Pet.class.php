<?php

/*
MariaDB [vetpharmacy]> desc pet;
+------------+------------+------+-----+---------+----------------+
| Field      | Type       | Null | Key | Default | Extra          |
+------------+------------+------+-----+---------+----------------+
| PetId      | int(11)    | NO   | PRI | NULL    | auto_increment |
| Name       | char(50)   | YES  |     | NULL    |                |
| Type       | char(30)   | YES  |     | NULL    |                |
| PetPicture | mediumblob | YES  |     | NULL    |                |
| Clients_Id | int(11)    | NO   | MUL | NULL    |                |
+------------+------------+------+-----+---------+----------------+
5 rows in set (0.026 sec)
*/

class Pet{

    // attributes
    private $PetId = 0;
    private $Name ="";
    private $Type= "";
    private $PetPicture= "";
    private $Clients_Id= "";

    // getter
    function getPetId() : int{
        return $this->PetId;
    }
    function getName(): string{
        return $this->Name;
    }
    function getType(): string{
        return $this->Type;
    }
    function getPetPicture(): string{
        return $this->PetPicture;
    }
    function getClients_Id(): int{
        return $this->Clients_Id;
    }

    //setter
    function setPetId(int $PetId){
        $this->PetId=$PetId;
    }
    function setName(string $name){
        $this->Name=$name;
    }
    function setType(string $type){
        $this->Type=$type;
    }
    function setPetPicture(string $petPicture){
        $this->PetPicture=$petPicture;
    }
    function setClients_Id(int $clients_id){
        $this->Clients_Id=$clients_id;
    }
}

?>