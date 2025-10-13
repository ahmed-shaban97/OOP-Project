<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Model\Cart;
$user_id = $_SESSION['user_id'] ?? 1;

$cartModel = new Cart();
if (isset($_GET['product_id_cart'])) {
    $cart = $cartModel->getCartByUser($user_id);
    $cart_id = $cart['id'] ?? null;
    if ($cart_id) {
        $cartModel->removeItem($cart_id, $_GET['product_id_cart']);
        header("Location: index.php?page=cart");
        exit;
    }
}
if (isset($_GET['product_id_minicart'])) {
    $cart = $cartModel->getCartByUser($user_id);
    $cart_id = $cart['id'] ?? null;
    if ($cart_id) {
        $cartModel->removeItem($cart_id, $_GET['product_id_minicart']);
        header("Location: index.php?page=home");
        exit;
    }
}