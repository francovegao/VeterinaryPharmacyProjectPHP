<?php
require_once("inc/config.inc.php");
require_once("inc/Entity/Page.class.php");
require_once("inc/Entity/Clients.class.php");
require_once("inc/Entity/Medicine.class.php");
require_once("inc/Entity/Order.class.php");
require_once("inc/Entity/Ordered_Meds.class.php");
require_once("inc/Entity/Pet.class.php");
require_once("inc/Entity/User.class.php");

require_once("inc/Utility/LoginManager.php");
require_once("inc/Utility/PDOService.class.php");
require_once("inc/Utility/MedicineClassDAO.class.php");
require_once("inc/Utility/UserDAO.class.php");
require_once("inc/Utility/PetClassDAO.class.php");
require_once("inc/Utility/OrderClassDAO.class.php");
require_once("inc/Utility/ClientClassDAO.class.php");

session_start();

if(LoginManager::verifyLogin()){
    //Initialize the DAO
    UserDAO::initialize('User');
    PetCLassDAO::initialize('Pet');
    OrderCLassDAO::initialize("Order");
    ClientCLassDAO::initialize("Clients");

   
    $user = UserDAO::getUser($_SESSION['loggedUserName']);
    $pets = PetCLassDAO::getUserPets($user->getUserId());
    $ordersList=OrderCLassDAO::getLoggedUserOrders($user->getUserId());
    $details=OrderCLassDAO::getLoggedUserOrdersDetails($user->getUserId());
    $clientInfo=ClientCLassDAO::getClientInfo($user->getUserId());

    Page::displayHeader("basicStyles.css");    //sent the basicStyles.css when merged

    
    Page::showUserDetails($clientInfo);
    Page::showOrdersStatistics($ordersList, $details);
    Page::showPets($pets);
    
    Page::displayFooter();

}else{
    header("Location: ProjectMain.php");
}

?>