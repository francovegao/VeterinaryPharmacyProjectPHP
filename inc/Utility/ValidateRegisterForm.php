<?php
class ValidateRegisterForm{

static $valid_status=[];

// This static function returns an error array. It is up to you on how to implement the 
// error array. Make sure that you can use the array to display the error message 
// and the validated post data
// make sure to update the valid_status attribute everytime you validate an input.
// all input are required

static function validateForm(){    
    $valid_status['status']=true;

    //Validate the name
    if(strlen($_POST["firstName"])>0){
        $filteredNameStatus=true;
    }else{
        $filteredNameStatus=false;
        $valid_status['firstName']="Please enter a valid name.";
    }
    if(strlen($_POST["lastName"])>0){
        $filteredLastNameStatus=true;
    }else{
        $filteredLastNameStatus=false;
        $valid_status['lastName']="Please enter a valid Last name.";
    }

    if(strlen($_POST["address"])>0){
        $filteredAddressStatus=true;
    }else{
        $filteredAddressStatus=false;
        $valid_status['address']="Please enter a valid address.";
    }

    if(strlen($_POST["city"])>0){
        $filteredcity=true;
    }else{
        $filteredcity=false;
        $valid_status['city']="Please enter a valid city name.";
    }

    if(strlen($_POST["province"])>0){
        $filteredProvince=true;
    }else{
        $filteredProvince=false;
        $valid_status['province']="Please enter a valid province.";
    }

    if(strlen($_POST["postalCode"])>0){
        $filteredPostal=true;
    }else{
        $filteredPostal=false;
        $valid_status['postalCode']="Please enter a valid Postal code.";
    }

    if (isset($_POST["email"]) && strlen($_POST["email"]) > 0) {
        // Check if the email is valid using filter_var
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $filteredEmailStatus = true;
        } else {
            $filteredEmailStatus = false;
            $valid_status['email'] = "Please enter a valid email address.";
        }
    } else {
        $filteredEmailStatus = false;
        $valid_status['email'] = "Please enter your email address.";
    }
    if (isset($_POST["phone"]) && strlen($_POST["phone"]) > 0) {
        // Remove any non-numeric characters from the phone number
        $phoneNumber = preg_replace('/[^0-9]/', '', $_POST["phone"]);
    
        // Check if the phone number is valid (in this example, we assume it should be 10 digits)
        if (strlen($phoneNumber) === 10) {
            $filteredPhoneNumberStatus = true;
        } else {
            $filteredPhoneNumberStatus = false;
            $valid_status['phone'] = "Please enter a valid 10-digit phone number.";
        }
    } else {
        $filteredPhoneNumberStatus = false;
        $valid_status['phone'] = "Please enter your phone number.";
    }

    if(strlen($_POST["usernameRegister"])>0){
        $filtereduserRegister=true;
    }else{
        $filtereduserRegister=false;
        $valid_status['usernameRegister']="Please enter a valid username.";
    }

    if(strlen($_POST["passwordRegister"])>0){
        $filteredpassword=true;
    }else{
        $filteredpassword=false;
        $valid_status['passwordRegiser']="Please enter a valid Passwword.";
    }

    //Ensure the select was selected
   


    $valid_status['status']=$filteredNameStatus && $filteredLastNameStatus && $filteredAddressStatus && $filteredcity && $filteredProvince && $filteredPostal && $filteredEmailStatus && $filteredPhoneNumberStatus && $filtereduserRegister && $filteredpassword;

    return $valid_status;
    
}
}

?>