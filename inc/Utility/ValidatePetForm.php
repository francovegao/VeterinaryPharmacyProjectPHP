<?php
class ValidatePetForm{

static $valid_status=[];

// This static function returns an error array. It is up to you on how to implement the 
// error array. Make sure that you can use the array to display the error message 
// and the validated post data
// make sure to update the valid_status attribute everytime you validate an input.
// all input are required

static function validateForm(){    
    $valid_status['status']=true;

    //Validate the name
    if(strlen($_POST["petName"])>0){
        $filteredNameStatus=true;
    }else{
        $filteredNameStatus=false;
        $valid_status['fullName']="Please enter a valid name.";
    }

    //Ensure the select was selected
    if($_POST["petType"]=="Select..."){
        $filteredPetType=false;
        $valid_status['petType']="Please choose one pet type.";
    }else{
        $filteredPetType=true;
    }

    //validate the file if it is uploaded
    if(!empty($_FILES["petImage"]["name"])){
       $filteredImageStatus=true;
    }else{
        $filteredImageStatus=false;
        $valid_status['petImage']="Please upload an image.";
    }


    $valid_status['status']=$filteredNameStatus && $filteredPetType && $filteredImageStatus;

    return $valid_status;
    
}
}

?>