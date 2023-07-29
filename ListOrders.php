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

//Get the orders
$ordersList = OrderCLassDAO::getOrders();    ///MAYBE CHANGE FUNCTION TO GETORDERSOFLOGGEDINUSER TO ONLY GET ORDERS OF THE LOGGED IN USER

Page::displayHeader("medsTableStyles.css");
if(!empty($_GET) && ($_GET['action']=="details")){
    Page::displayOrderDetails(OrderCLassDAO::getPreOrder($_GET['orderId']));  //change the getPreOrder for getOrderInfo where user id is validated and join is returned with all the info of user, order, ordered_meds
}else if(!empty($_GET) && ($_GET['action']=="listOrders")){
    Page::displayOrdersTable($ordersList);
}else{
    Page::displayOrdersTable($ordersList);
}
Page::displayFooter();

?>