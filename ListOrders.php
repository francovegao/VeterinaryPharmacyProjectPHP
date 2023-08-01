<?php
//Config
require_once('inc/config.inc.php');

//Entities
require_once("inc/Entity/Page.class.php");
require_once("inc/Entity/Medicine.class.php");
require_once("inc/Entity/Order.class.php");
require_once("inc/Entity/Ordered_Meds.class.php");
require_once("inc/Entity/User.class.php");

//Utility Classes
require_once("inc/Utility/PDOService.class.php");
require_once("inc/Utility/MedicineClassDAO.class.php");
require_once("inc/Utility/OrderClassDAO.class.php");
require_once("inc/Utility/Ordered_MedsClassDAO.class.php");
require_once("inc/Utility/UserDAO.class.php");

//Verify login
if(LoginManager::verifyLogin()){

//Initialize the DAO
UserDAO::initialize('User');
MedicineClassDAO::initialize('Medicine');
OrderCLassDAO::initialize('Order');
Ordered_MedsClassDAO::initialize('Ordered_Meds');

//get the user
$user = UserDAO::getUser($_SESSION['loggedUserName']);
//Get the orders
$ordersList = OrderCLassDAO::getLoggedUserOrders($user->getUserId());  


Page::displayHeader("medsTableStyles.css");
if(empty($ordersList)){
    Page::displayEmptyOrders();
    Page::displayFooter();
}else{
    if(!empty($_GET) && ($_GET['action']=="details")){
        Page::displayOrderDetails(OrderCLassDAO::getOrderDetails($_GET['orderId']));  //change the getPreOrder for getOrderInfo where user id is validated and join is returned with all the info of user, order, ordered_meds
    }else if(!empty($_GET) && ($_GET['action']=="listOrders")){
        Page::displayOrdersTable($ordersList);
    }else{
        Page::displayOrdersTable($ordersList);
    }
    Page::displayFooter();
}
}else{
    header("Location: TeamNumber11.php");
}

?>