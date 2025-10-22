<?php

require_once __DIR__ . '/../vendor/autoload.php';
use Model\Contact;

if(!isset($_SESSION['admin'])){
    header("Location: admin_index.php?page=login");
    exit;
}

if(isset($_GET['id'])){
    $contactModel = new Contact();
    $contactModel->delete($_GET['id']);
    $_SESSION['success'] = "Message deleted successfully!";
}

header("Location: admin_index.php?page=contact");
exit;