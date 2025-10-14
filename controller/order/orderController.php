<?php

namespace Model\order;

use Exception;
use Model\Cart;
use Model\order;

$cartModel = new Cart();
$orderModel = new order();
$cartItems = $cart_id ? $cartModel->getItems($cart_id) : [];





$user_id = $_SESSION['user']['id'];
$cartModel = new Cart();
$cart = $cartModel->getCartByUser($user_id);
$cart_id = $cart['id'];
$cartItems = $cart_id ? $cartModel->getItems($cart_id) : [];

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$notes = $_POST['notes'];
$total_price = $cart_id ? $cartModel->getTotal($cart_id) : 0;
$orderModel = new order();
try {
    $order_id=$orderModel->createOrder($user_id, $name, $email, $address, $phone, $notes, $total_price);
    
    foreach ($cartItems as $item) {
        $orderModel->addOrderItem($order_id, $item['product_id'], $item['name'], $item['quantity'], $item['price']);
    }
    $_SESSION['success'] = "the product is created successfully";
    if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'admin_index.php') !== false) {
        header("location:./../../admin_index.php?page=product");
    } else {
        header("location:./index.php");
    }
} catch (Exception $e) {
    $_SESSION['error'] = "Sorry !! the product isn't created .";
    die("ERROR 404-NOT FOUND");
}

// تفريغ السلة
// $cart->clearCart($myCart['id']);