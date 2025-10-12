<?php
ob_start();

session_start();

require_once "config/DB_connection.php";
require_once __DIR__ . '/vendor/autoload.php';
require_once "inc/header.php";

$page = $_GET['page'] ?? 'home';

$routes = [
    'home' => 'views/home.php',
    'about' => 'views/about.php',
    'product-details' => 'views/product-details.php',
    'contact' => 'views/contact.php',
    'checkout' => 'views/checkout.php',
    'cart' => 'views/cart.php',
    'login' => 'views/auth/login.php',
    'register' => 'views/auth/register.php',
    
    'login-controller' => 'controller/auth/login.php',
    'register-controller' => 'controller/auth/register.php',
    'add-to-cart' => 'controller/cart/add-to-cart.php',
    'cart-increment' => 'controller/cart/increment.php',
    'cart-decrement' => 'controller/cart/decrement.php',
    'cart-delete' => 'controller/cart/delete.php',
];

if (array_key_exists($page, $routes)) {
    include $routes[$page];
} else {
    include "views/404.php";
}

include "inc/footer.php";
ob_end_flush();