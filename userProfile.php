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
require_once("inc/Utility/MedicineClassDAO.class.php");
require_once("inc/Utility/PDOService.class.php");
require_once("inc/Utility/ReservationDAO.class.php");
require_once("inc/Utility/UserDAO.class.php");

session_start();
if(LoginManager::verifyLogin()){
UserDAO::initialize('User');

$user = UserDAO::getUser($_SESSION['loggedin']);
Page::displayHeader();


Page::showUserDetails($user);
Page::displayOrdersTable($user);
Page::displayLogoutForm($user);
Page::displayFooter();



}else{
    header("Location: ProjectMainBackup.php");
}

?>