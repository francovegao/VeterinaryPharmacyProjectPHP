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
    if(isset($_POST['action']) && ($_POST['action']=="createPreOrder")){   //create pre-order
        //create order if its not already created
        date_default_timezone_set('America/Vancouver');
        $newOrder = new Order();
        //$newOrder->setOrderDate(date('m/d/Y h:i:s'));
        $newOrder->setPST(0.0); 
        $newOrder->setGST(0.0);
        $newOrder->setTotalPrice(0.0);
        $newOrder->setClients_Id(1); //change this later to the userid when is logged in
    
        $id=OrderCLassDAO::createOrder($newOrder);//ID of new order created

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

        Ordered_MedsClassDAO::createOrdered_Meds($newOrdered_Med);

    }else if(isset($_POST['action']) && ($_POST['action']=="addMedicine")){
        $currentOrder = new Order();
        $currentOrder->setOrderId($_POST['preOrderId']); 
        $currentOrder->setPST($_POST['pst']);  
        $currentOrder->setGST($_POST['gst']);
        $currentOrder->setTotalPrice($_POST['totalPrice']);
        $currentOrder->setClients_Id($_POST['clientsId']);

        $id=$_POST['preOrderId'];

        //create ordered_med with DAO
        $newOrdered_Med = new Ordered_Meds();
        $newOrdered_Med->setOrder_Id($_POST['preOrderId']);    //get id from the post
        $newOrdered_Med->setMedicine_Id((int)$_POST['medicineid']);
        $newOrdered_Med->setConcentration($_POST['concentration']);
        $newOrdered_Med->setPresentation($_POST['presentation']);
        $newOrdered_Med->setSize($_POST['size']);
        $newOrdered_Med->setFlavor($_POST['flavor']);
        $newOrdered_Med->setQuantity((int)$_POST['quantity']);
        $price=(float)$_POST['quantity']*(float)$_POST['price'];
        $newOrdered_Med->setSumPrice($price);

        OrderCLassDAO::updateOrder($currentOrder);
        Ordered_MedsClassDAO::createOrdered_Meds($newOrdered_Med);
    }else if(isset($_POST['action']) && ($_POST['action']=="confirmOrder")){
        //finish order by updating final info 
        $currentOrder = new Order();
        $currentOrder->setOrderId($_POST['orderId']); 
        $currentOrder->setPST($_POST['pst']);  
        $currentOrder->setGST($_POST['gst']);
        $currentOrder->setTotalPrice($_POST['grandTotal']);
        $currentOrder->setClients_Id($_POST['clientsId']);

        $id=$_POST['orderId'];

        OrderCLassDAO::updateOrder($currentOrder); 
    }else if(isset($_POST['action']) && ($_POST['action']=="cancelOrder")){
        //delete order
        OrderCLassDAO::deleteOrder($_POST['orderId']);
    }
}

//Get the medicines
$medicines=MedicineClassDAO::getMedicineClass();

//Display the page
Page::displayHeader("medsTableStyles.css");

if(!empty($_GET) && isset($_GET['action']) && ($_GET['action']=="searchActiveDrug")){
    $medicines=MedicineClassDAO::searchActiveDrugs($_GET['activeDrug']);
}else if(!empty($_GET) && isset($_GET['action']) &&  ($_GET['action']=="searchCategory")){
    $medicines=MedicineClassDAO::searchCategory($_GET['category']);
}

if(isset($_POST['action']) && ($_POST['action']=="createPreOrder")){   
    //$preOrder=OrderCLassDAO::getPreOrder($id);
    $preOrder=OrderCLassDAO::getPreOrder($id);
    Page::orderConfirmation($preOrder);
    $action="addMedicine";
    Page::displayMedicinesTable($medicines, $action, $preOrder); //display medicines to keep adding
}else if(isset($_POST['action']) && ($_POST['action']=="addMedicine")){
    $preOrder=OrderCLassDAO::getPreOrder($id);
    Page::orderConfirmation($preOrder);
    $action="addMedicine";
    Page::displayMedicinesTable($medicines, $action, $preOrder); //display medicines to keep adding
}else if(isset($_POST['action']) && ($_POST['action']=="confirmOrder")){
    Page::displaySuccesOrderMessage();
}else if(isset($_POST['action']) && ($_POST['action']=="cancelOrder")){
    Page::displayCancelOrderMessage();
}else{
    if(!empty($_GET) && $_GET['state']=="addMedicine"){
        $id=$_GET['preOrderId'];
        $preOrder=OrderCLassDAO::getPreOrder($id);
        Page::orderConfirmation($preOrder);
        $action="addMedicine";
        Page::displayMedicinesTable($medicines, $action, $preOrder); //display medicines to keep adding
    }else if(empty($_GET)){
        $action="createPreOrder";
        Page::displayMedicinesTable($medicines, $action);
    }else{
        $action="createPreOrder";
        Page::displayMedicinesTable($medicines, $action);
    }
}
Page::displayFooter();


?>