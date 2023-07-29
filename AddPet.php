<?php
//Config
require_once('inc/config.inc.php');

//Entities
require_once("inc/Entity/Page.class.php");
require_once("inc/Entity/Pet.class.php");

//Utility Classes
require_once("inc/Utility/PDOService.class.php");
require_once("inc/Utility/PetClassDAO.class.php");

//Initialize the DAO
PetClassDAO::initialize('Pet');

if(!empty($_POST)){
    if(isset($_POST['action']) && ($_POST['action']=="addPet")){
        /* if(!empty($_FILES["image"]["name"])) { 
            // Get file info 
            $fileName = basename($_FILES["image"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
             
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            if(in_array($fileType, $allowTypes)){ 
                $image = $_FILES['image']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($image)); 
            }
        } */

        $newPet = new Pet();
        $newPet->setName($_POST['petName']);
        $newPet->setType($_POST['petType']);
        $newPet->setPetPicture($imgContent);
        $newPet->setClients_Id((int)1);   //CHANGE THIS TO GET THE USER INFO FROM THE SESSION
        
        PetCLassDAO::createPet($newPet);
    }

}

$pets=PetCLassDAO::getPets();

Page::displayHeader("petFormStyle.css");
Page::addPetForm();

//If form has errors show errors message
Page::petFormNotifications();

//If form is validated succesfully show info
Page::petFormSuccesful();

Page::displayFooter();



?>