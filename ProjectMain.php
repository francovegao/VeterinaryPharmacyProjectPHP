<?php
//Config
require_once('inc/config.inc.php');

//Entities
require_once("inc/Entity/Page.class.php");
require_once("inc/Entity/Medicine.class.php");

//Utility Classes
require_once("inc/Utility/PDOService.class.php");
require_once("inc/Utility/MedicineClassDAO.class.php");

//Initialize the DAO
MedicineClassDAO::initialize('Medicine');

//Check if theres a GET to perform delete

//Process any POST data
if(!empty($_POST)){
    if(isset($_POST['action']) && ($_POST['action']=="addMedicine")){
        //create order with DAO
    }
}

//Get the medicines
$medicines=MedicineClassDAO::getMedicineClass();

//Display the page

Page::displayHeader();
if(!empty($_GET) && ($_GET['action']=="addMedicine")){
    Page::orderConfirmation();
}
Page::displayMedicinesTable($medicines);
Page::displayFooter();


?>