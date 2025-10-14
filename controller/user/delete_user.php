<?php

use Model\User;

$id = $_POST['id'];

$userModel = new User();
$user = $userModel->delete($id);

try {
    $userModel->delete($id);
    $_SESSION['success'] = "the user is deleted successfully";
    
    if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'admin_index.php') !== false) {
        header("location:./admin_index.php?page=user");
    } else {
        header("location:./index.php");
    }
} catch (Exception $e) {
    die("ERROR 500- INTERNAL SERVER ERROR");
}