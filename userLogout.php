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
require_once("inc/Utility/UserDAO.class.php");

session_start();
unset($_SESSION);

session_destroy();
Page::displayHeader("basicStyles.css");
echo "<div class=\"p-5 text-center\">";
echo "<h1>Thank you for your visit</h1>";
echo "</div>";
Page::displayFooter();

if (isset($_POST['loginBtn'])) {
    // If the login button is clicked, display the login form
    header("Location: TeamNumber11.php");
} 
elseif (isset($_POST['registerBtn'])) {
    // If the login button is clicked, display the login form
    header("Location: register.php");
}


?>