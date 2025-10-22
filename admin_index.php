<!-- admin_index.php -->
<?php
ob_start();
session_start();
require_once __DIR__ . '/vendor/autoload.php';
require_once "./config/DB_connection.php";

$authPages = ['login', '404'];

$protectedPages = [
    'dashboard',

    // products
    'product', 'add_product', 'store_product', 'edit_product', 'update_product', 'delete_product',

    // category
    'category', 'add_category', 'store_category', 'edit_category', 'update_category', 'delete_category',

    // brand
    'brand', 'add_brand', 'store_brand', 'edit_brand', 'update_brand', 'delete_brand',

    // orders
    'order', 'view_order', 'delete_order',

    // users
    'user', 'add_user', 'store_user', 'delete_user',
    // contact
    'contact',
];

$page = $_GET['page'] ?? 'dashboard';

if (in_array($page, $protectedPages) && !isset($_SESSION['admin'])) {
    header("Location: admin_index.php?page=login");
    exit();
}

$routes = [
    // Auth
    'login' => './views/admin/login.php',
    'login-controller' => 'controller/auth/admin_login.php',
    'logout' => 'controller/auth/logout.php',

    // Dashboard
    'dashboard' => './views/admin/dashboard.php',
    // contact
    'contact' => './views/admin/contact_admin.php',
    'delete_contact' => 'controller/delete_contact.php',

    // Products
    'product' => './views/admin/products/all_product.php',
    'add_product' => './views/admin/products/add_product.php',
    'store_product' => 'controller/product/store_product.php',
    'edit_product' => './views/admin/products/edit_product.php',
    'update_product' => 'controller/product/update_product.php',
    'delete_product' => 'controller/product/delete_product.php',

    // Categories
    'category' => './views/admin/category/all_category.php',
    'add_category' => './views/admin/category/add_category.php',
    'store_category' => 'controller/category/store_category.php',
    'edit_category' => './views/admin/category/edit_category.php',
    'update_category' => 'controller/category/update_category.php',
    'delete_category' => 'controller/category/delete_category.php',

    // Brands
    'brand' => './views/admin/brand/all_brand.php',
    'add_brand' => './views/admin/brand/add_brand.php',
    'store_brand' => 'controller/brand/store_brand.php',
    'edit_brand' => './views/admin/brand/edit_brand.php',
    'update_brand' => 'controller/brand/update_brand.php',
    'delete_brand' => 'controller/brand/delete_brand.php',

    // Orders
    'order' => './views/admin/order/all_order.php',
    'view_order' => './views/admin/order/view_item_order.php',
    'delete_order' => 'controller/order/delete_order_Controller.php',

    // Users
    'user' => './views/admin/users/all_user.php',
    'add_user' => './views/admin/users/add_user.php',
    'store_user' => 'controller/user/store_user.php',
    'delete_user' => 'controller/user/delete_user.php',

    // 404 page
    '404' => './views/admin/404.php',
];

if (array_key_exists($page, $routes)) {
    if (!in_array($page, $authPages)) {
        include "./inc/admin/header.php";
        include "./inc/admin/sidebar.php";
    }

    include $routes[$page];

    if (!in_array($page, $authPages)) {
        include "./inc/admin/footer.php";
    }
} else {
    http_response_code(404);
    include "./views/404.php";
}

ob_end_flush();