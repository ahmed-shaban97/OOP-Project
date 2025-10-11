<?php
session_start();
require_once "./config/DB_connection.php";
require_once "./models/Product.php";
require_once "./models/category.php";
require_once "./models/brand.php";

include "./inc/admin/header.php";
include "./inc/admin/sidebar.php";
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'dashboard':
            include "./views/admin/dashboard.php";
            break;
        case 'product':
            include "./views/admin/products/all_product.php";
            break;
        case 'add_product':
            include "./views/admin/products/add_product.php";
            break;
        case 'store_product':
            include "controller/product/store_product.php";
            break;

        case 'edit_product':
            include "./views/admin/products/edit_product.php";
            break;
        case 'update_product':
            include "controller/product/update_product.php";
            break;    
         case 'delete_product':
            include "controller/product/delete_product.php";
            break;      
        default:
            include "./views/admin/dashboard.php";
            break;
    }
}




include "inc/admin/footer.php";
?>