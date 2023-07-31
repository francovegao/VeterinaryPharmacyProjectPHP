<?php

// nothing to be done here
// notice the registered session variable

class LoginManager  {

    //This function checks if the member is logged in or not
    static function verifyLogin()   {

        //Check for a session
        if (session_id() == '' || !isset($_SESSION)) {

            //Start it up
            session_start();
        }
        //Is anyone logged in.
        if (isset($_SESSION["loggedUserName"]))  {

            //The member is loggedin
            return true;
        } else {
            //The member is not logged in
            //Destroy any session just in case
            session_destroy();

            return false;
        }
    }    
}

?>