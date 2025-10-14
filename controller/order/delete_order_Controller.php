<?php
namespace Controller\order;

use Exception;
use Model\Order;





$id = $_POST['id'];

$orderModel = new order();
 
try {
    $orderModel->deleteOrder($id);

    $_SESSION['success'] = "the order is deleted successfully";
    
    if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'admin_index.php') !== false) {
        header("location:./admin_index.php?page=order");
    } else {
        header("location:./index.php");
    }
} catch (Exception $e) {
    die("ERROR 500- INTERNAL SERVER ERROR");
}