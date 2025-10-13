<!-- update-cart.php -->
<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use Model\Cart;
$cartModel = new Cart();
$user_id = $_SESSION['user_id'] ?? 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['product_quantity'])) {
    $cart = $cartModel->getCartByUser($user_id);
    $cart_id = $cart['id'] ?? null;
    if ($cart_id) {
        $currentItems = $cartModel->getItems($cart_id);
        $currentQty = 0;
        foreach($currentItems as $item) {
            if($item['product_id'] == $_POST['product_id']){
                $currentQty = $item['quantity'];
                break;
            }
        }
        $cartModel->addItem($cart_id, $_POST['product_id'], $_POST['product_quantity'] - $currentQty);
        header("Location: index.php?page=cart");
        exit;
    }
}