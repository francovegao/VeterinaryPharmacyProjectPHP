<?php

// Define configuration make sure to put the correct database name
// if you have configure your MySQL root password, make sure to put the password 
define("DB_HOST", "localhost");  
define("DB_USER", "root");  
define("DB_PASS", "");  
define("DB_NAME", "vetpharmacy");  
define("DB_PORT", 3306);

// definition for log file
define('LOGFILE','log/error_log.txt');
ini_set("log_errors", TRUE);  
ini_set('error_log', LOGFILE); 


?>