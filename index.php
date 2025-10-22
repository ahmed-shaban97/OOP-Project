<!-- index.php -->
<?php
ob_start();
session_start();

require_once "config/DB_connection.php";
require_once __DIR__ . '/vendor/autoload.php';

$page = $_GET['page'] ?? 'home';

$routes = [
    'home' => 'views/home.php',
    'contact' => 'views/contact.php',
    'about' => 'views/about.php',
    'product-details' => 'views/product-details.php',
    'contact_controller' => 'controller/contact_controller.php',
    'checkout' => 'views/checkout.php',
    'cart' => 'views/cart.php',
    'products' => 'views/products.php',

    'login' => 'views/auth/login.php',
    'register' => 'views/auth/register.php',

    'login-controller' => 'controller/auth/login.php',
    'register-controller' => 'controller/auth/register.php',
    'logout' => 'controller/auth/logout.php',
    'add-order' => 'controller/order/orderController.php',
    'add-to-cart' => 'controller/cart/add-to-cart.php',
    'remove-from-cart' => 'controller/cart/remove-from-cart.php',
    'update-cart' => 'controller/cart/update-cart.php',
];

$authPages = ['login', 'register'];

$protectedPages = ['cart',
'checkout',
'contact',
'add-to-cart',
'remove-from-cart',
'update-cart',
'logout'];

if (in_array($page, $protectedPages) && !isset($_SESSION['user'])) {
    header("Location: index.php?page=login");
    exit();
}

if (!in_array($page, $authPages)) {
    require_once "inc/header.php";
}

if (array_key_exists($page, $routes)) {
    include $routes[$page];
} else {
    include "views/404.php";
}

if (!in_array($page, $authPages)) {
    include "inc/footer.php";
}

ob_end_flush();
?>