<?php
use Model\Cart;
require_once __DIR__ . '/../../vendor/autoload.php';


$user_id = $_SESSION['user_id'] ?? 1; 

$product_id = $_POST['product_id'] ?? null;
$quantity   = $_POST['product_quantity'] ?? 1;

if ($product_id) {
    $cartModel = new Cart();

    $cart = $cartModel->getCartByUser($user_id);
    if (!$cart) {
        $cart_id = $cartModel->createCart($user_id);
    } else {
        $cart_id = $cart['id'];
    }

    $cartModel->addItem($cart_id, $product_id, $quantity);

    header("Location: index.php?page=home");
    exit;
}
?>