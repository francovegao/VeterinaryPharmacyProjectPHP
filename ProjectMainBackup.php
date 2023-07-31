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

UserDAO::initialize("User");
$medicine = new Medicine();
MedicineClassDAO::initialize('Medicine');

$login="";

if(!empty($_POST['username'])){
    $authUser = UserDAO::getUser($_POST['username']);

    if($authUser && $authUser->verifyPassword($_POST['password'])){
        session_start();
        $_SESSION['loggedUserName'] = $authUser->getUserName();
        $_SESSION['loggedUserId'] = $authUser->getUserId();
        $login="success";
    }else{
        $login="failed";
    }
}

if(LoginManager::verifyLogin()){
   
    $user = UserDAO::getUser($_SESSION['loggedUserName']);
    header("Location: userProfile.php");
   
    // after the call to header, make sure to exit
    exit;
}elseif (isset($_POST['loginBtn'])) {
    // If the login button is clicked, display the login form
    Page::displayHeader();
    Page::displayLoginForm();
} 
elseif (isset($_POST['registerBtn'])) {
    // If the login button is clicked, display the login form
    header("Location: register.php");
}else if($login=="failed"){
    Page::displayHeader();
    Page::diplayLoginErrorMessage();
    Page::displayLoginForm();
}
else {
    // If login button is not clicked, display the homepage
    Page::displayHeader();
    Page::displayHomePage();
}






?>