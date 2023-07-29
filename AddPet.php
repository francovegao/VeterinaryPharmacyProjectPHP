<?php
//Config
require_once('inc/config.inc.php');

//Entities
require_once("inc/Entity/Page.class.php");
require_once("inc/Entity/Pet.class.php");

//Utility Classes
require_once("inc/Utility/PDOService.class.php");
require_once("inc/Utility/PetClassDAO.class.php");
require_once("inc/Utility/ValidatePetForm.php");

//Initialize the DAO
PetClassDAO::initialize('Pet');

$pets=PetCLassDAO::getPets();

Page::displayHeader("petFormStyle.css");

if(!empty($_POST)){
    
    if(isset($_POST['action']) && ($_POST['action']=="addPet")){

        $valid_status=ValidatePetForm::validateForm();
        if($valid_status["status"]==false){
            Page::petFormNotifications($valid_status);
        }else if($valid_status["status"]==true){
            $fileName = $_FILES["petImage"]["name"];
            $tempName = $_FILES["petImage"]["tmp_name"];
            $folder = "./petsImages/" . $fileName;

            $newPet = new Pet();
            $newPet->setName($_POST['petName']);
            $newPet->setType($_POST['petType']);
            $newPet->setPetPicture($fileName);
            $newPet->setClients_Id((int)1);   //CHANGE THIS TO GET THE USER INFO FROM THE SESSION
            
            $id=PetCLassDAO::createPet($newPet);

            move_uploaded_file($tempName, $folder);

           
            Page::petFormSuccesful(PetCLassDAO::getPet($id));
        }    
    }
}

Page::addPetForm();



Page::displayFooter();



?>