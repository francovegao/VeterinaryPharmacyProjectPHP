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

    //price modifiers
    private $arrayConcentration=array(
        "5 mg/ml"=> 0.7,
        "10 mg/ml"=> 0.8,
        "15 mg/ml"=> 0.9,
        "20 mg/ml"=> 1,
        "25 mg/ml"=> 1.1,
        "50 mg/ml"=> 1.2,
        "100 mg/ml"=> 1.3,
    );

    private $arrayPresentation=array(
        "Oil suspension"=> 0.9,
        "Liquid Aqueous"=> 0.8,
        "In Lipoderm Cream"=> 1.2,
        "In Versabase Cream"=> 1.3,
        "Ointment"=> 1.4,
        "Injection"=> 2,
        "Topic Solution"=> 1.5,
    );

    private $arraySize=array(
        "15 ml"=> 0.7,
        "30 ml"=> 0.8,
        "60 ml"=> 0.9,
        "100 ml"=> 1,
        "120 ml"=> 1.1,
        "150 ml"=> 1.2,
        "250 ml"=> 1.3,
        "500 ml"=> 1.5,
        "1000 ml"=>2,
    );

    private $arrayFlavor=array(
        "no flavor"=> 1,
        "chicken"=> 1.1,
        "bacon"=> 1.1,
        "beef"=> 1.2,
        "fish"=> 1.2,
        "salmon"=> 1.2,
        "liver"=> 1.2,
    );

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
        $this->SumPrice=$SumPrice*$this->getPriceFactor();
    }

    function getPriceFactor():float{
        $priceFactor=1;

        foreach($this->arrayConcentration as $key=>$value){
            if($key==$this->getConcentration())
                 $priceFactor*=$value;
        }
        foreach($this->arrayPresentation as $key=>$value){
            if($key==$this->getPresentation())
                 $priceFactor*=$value;
        }
        foreach($this->arraySize as $key=>$value){
            if($key==$this->getSize())
                 $priceFactor*=$value;
        }
        foreach($this->arrayFlavor as $key=>$value){
            if($key==$this->getFlavor())
                 $priceFactor*=$value;
        }

        return $priceFactor;
    }

}

?>