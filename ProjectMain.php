<?php
//Config
require_once('inc/config.inc.php');

//Entities
require_once("inc/Entity/Page.class.php");
require_once("inc/Entity/Medicine.class.php");
require_once("inc/Entity/Order.class.php");
require_once("inc/Entity/Ordered_Meds.class.php");

//Utility Classes
require_once("inc/Utility/PDOService.class.php");
require_once("inc/Utility/MedicineClassDAO.class.php");
require_once("inc/Utility/OrderClassDAO.class.php");
require_once("inc/Utility/Ordered_MedsClassDAO.class.php");

//Initialize the DAO
MedicineClassDAO::initialize('Medicine');
OrderCLassDAO::initialize('Order');
Ordered_MedsClassDAO::initialize('Ordered_Meds');

//Check if theres a GET to perform delete

//Process any POST data
if(!empty($_POST)){
    //create order with DAO if its not already created
    date_default_timezone_set('America/Vancouver');
    $newOrder = new Order();
    $newOrder->setOrderDate(date('m/d/Y h:i:s'));
    $newOrder->setPST(0.0);  //calculation of PST and GST done when order is confirmed
    $newOrder->setGST(0.0);
    $newOrder->setTotalPrice(0.0);
    $newOrder->setClients_Id(1); //change this later to the userid when is logged in

    $id=OrderCLassDAO::createOrder($newOrder);//ID of new order created

    //If order already exists use that order to pass the order ID to $newOrdered_Med


    //create ordered_med with DAO
    $newOrdered_Med = new Ordered_Meds();
    $newOrdered_Med->setOrder_Id($id);
    $newOrdered_Med->setMedicine_Id((int)$_POST['medicineid']);
    $newOrdered_Med->setConcentration($_POST['concentration']);
    $newOrdered_Med->setPresentation($_POST['presentation']);
    $newOrdered_Med->setSize($_POST['size']);
    $newOrdered_Med->setFlavor($_POST['flavor']);
    $newOrdered_Med->setQuantity((int)$_POST['quantity']);
    $price=(float)$_POST['quantity']*(float)$_POST['price'];
    $newOrdered_Med->setSumPrice($price);


    if(isset($_POST['action']) && ($_POST['action']=="addMedicine")){   
        //create order if its not already created
        Ordered_MedsClassDAO::createOrdered_Meds($newOrdered_Med);
    }
}

//Get the medicines
$medicines=MedicineClassDAO::getMedicineClass();

//Display the page
Page::displayHeader();
if(isset($_POST['action']) && ($_POST['action']=="addMedicine")){   
    //$preOrder=OrderCLassDAO::getPreOrder($id);
    $preOrder=OrderCLassDAO::getPreOrder(10001);
    Page::orderConfirmation($preOrder);
    Page::displayMedicinesTable($medicines, $preOrder);
}
Page::displayMedicinesTable($medicines);
Page::displayFooter();


?>