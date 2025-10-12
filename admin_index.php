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
        case 'category':
            include "./views/admin/category/all_category.php";
            break;
        case 'add_category':
            include "./views/admin/category/add_category.php";
            break;
        case 'store_category':
            include "controller/category/store_category.php";
            break;
        case 'edit_category':
            include "./views/admin/category/edit_category.php";
            break;
        case 'update_category':
            include "controller/category/update_category.php";
            break;
        case 'delete_category':
            include "controller/category/delete_category.php";
            break;
        case 'brand':
            include "./views/admin/brand/all_brand.php";
            break;    
        case 'add_brand':
            include "./views/admin/brand/add_brand.php";
            break;    
        case 'store_brand':
            include "controller/brand/store_brand.php";
            break;
        case 'edit_brand':
            include "./views/admin/brand/edit_brand.php";
            break;
        case 'update_brand':
            include "controller/brand/update_brand.php";
            break;     
        case 'delete_brand':
            include "controller/brand/delete_brand.php";
            break;   
            
            
        default:
            include "./views/admin/dashboard.php";
            break;
    }
}




include "inc/admin/footer.php";