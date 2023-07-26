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

UserDAO::init();
$medicine = new Medicine();
MedicineClassDAO::initialize($medicine);

if(!empty($_POST['username'])){
    $authUser = UserDAO::getUser($_POST['username']);

    if($authUser && $authUser->verifyPassword($_POST['password'])){
        session_start();

        $_SESSION['loggedin'] = $authUser->getUserName();
    }
}

if(LoginManager::verifyLogin()){
    $user = UserDAO::getUser($_SESSION['loggedin']);

   header("Location: userProfile.php"); //if you ant to create a user profile page.
 

    // after the call to header, make sure to exit
    exit;
}
else{
    Page::displayHeader2();
    Page::displayLoginForm();
    //Page::displayFooter();
    //Page::displayOrdersDetails();
    
}


//Page::displayHeader();
//Page::displayFooter();
//Page::displayLoginForm();
//Page::displayRegisterForm();
//Page::addPetForm();
//Page::displayTable();
//Page::displayOrdersDetails();


?>