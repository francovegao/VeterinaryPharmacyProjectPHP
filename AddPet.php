<?php
//Config
require_once('inc/config.inc.php');

//Entities
require_once("inc/Entity/Page.class.php");

//Utility Classes
require_once("inc/Utility/PDOService.class.php");

Page::displayHeader("petFormStyle.css");
Page::addPetForm();
Page::petFormNotifications();
Page::petFormSuccesful();

Page::displayFooter();



?>