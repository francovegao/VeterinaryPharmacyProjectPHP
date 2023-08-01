<?php

//config
require_once("inc/config.inc.php");

//Entities
require_once("inc/Entity/Page.class.php");
require_once("inc/Entity/Clients.class.php");
require_once("inc/Entity/User.class.php");

//Utilities
require_once("inc/Utility/PDOService.class.php");
require_once("inc/Utility/LoginManager.php");
require_once("inc/Utility/UserDAO.class.php");
require_once("inc/Utility/ClientClassDAO.class.php");
require_once("inc/Utility/ValidateRegisterForm.php");

//Initialize the DAO
UserDAO::initialize('User');
ClientCLassDAO::initialize('Clients');

$users=UserDAO::getMembers();
$clients=ClientCLassDAO::getClients();

Page::displayHeader("basicStyles.css");
$valid_status=array();
if(!empty($_POST)){
    
    if(isset($_POST['action']) && ($_POST['action']=="register")){

        $valid_status=ValidateRegisterForm::validateForm();//comment this in
       // $valid_status["status"]=true;//commen this out
        if($valid_status["status"]==false){
            Page::showRegisterFormNotifications($valid_status);
            Page::displayRegisterForm($valid_status);
        }else if($valid_status["status"]==true){
            $newUser = new User();
            $newUser->setUsername($_POST['usernameRegister']);
            $password = $_POST['passwordRegister'];
            $password_hashed = password_hash($password,PASSWORD_DEFAULT);
            $newUser->setPassword($password_hashed);
          
       $id= UserDAO::createUser($newUser);

        $newClient = new Clients();
        $newClient->setFirstName($_POST['firstName']);
        $newClient->setLastName($_POST['lastName']);
        $newClient->setAddress($_POST['address']);
        $newClient->setCity($_POST['city']);
        $newClient->setProvince($_POST['province']);
        $newClient->setPostalCode($_POST['postalCode']);
        $newClient->setEmail($_POST['email']);
        $newClient->setPhone($_POST['phone']);
        $newClient->setUser_Id($id);
        ClientCLassDAO::createClient($newClient);
        
        Page::showSuccesfulRegistration();
        }    
    }else if(isset($_POST['loginBtn'])){
        header("Location: TeamNumber11.php");
    }elseif (isset($_POST['registerBtn'])) {
        // If the login button is clicked, display the login form
        header("Location: register.php");
    }
}else{
    Page::displayRegisterForm($valid_status);
}

Page::displayFooter();


?>