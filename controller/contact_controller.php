<?php
use Model\Contact;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['msg'];
    $user_id = $_SESSION['user']['id'] ?? 0; 

    if($name && $email && $message){
        $contactModel = new Contact();
        $contactModel->create($user_id, $name, $email, $message);

        // $_SESSION['success'] = "Message sent successfully!";
        header("Location: index.php?page=home");
        exit;
    } else {
        $_SESSION['error'] = "Please fill all fields!";
        header("Location: index.php?page=contact");
        exit;
    }
}