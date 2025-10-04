<!-- register_controller.php -->
<?php
session_start();
require_once "../../app/Validator.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){

$rules = [
    'name' => 'required|min:3|max:20|string',
    'email' => 'required|email',
    'phone' => 'required|number',
    'password' => 'required|max:20|min:6|confirmed|regex:[A-Z]|regex:[a-z]|regex:[0-9]|',
    'confirm-password' => 'required' 
    
];

    $validator = new Validator($_POST);
    foreach($_POST as $field => $value){
        $validator->validate($value, $field, $rules[$field]);
    }
    
    if($validator->hasErrors()){
        $_SESSION['errors'] = $validator->getError();
        echo "<pre>";
        header("Location: ../../auth/register.php");
        exit;

        
    }
        $_SESSION['success'] = "Successfully register";
        header("Location: ../../auth/register.php");
        exit;
    

}