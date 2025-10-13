<?php
use Model\Product;
require_once __DIR__ . '/../../vendor/autoload.php';

$id = $_POST['id'];

$productModel = new Product();
$product = $productModel->getById($id);
$old_image = $product['image'];
try {
    $productModel->delete($id);

    if (!empty($old_image)) {
        $imagePath = "./assets/image/$old_image";
        if (file_exists($imagePath) && !is_dir($imagePath)) {
            unlink($imagePath);
        }
    }

    $_SESSION['success'] = "the product is deleted successfully";
    
    if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'admin_index.php') !== false) {
        header("location:./admin_index.php?page=product");
    } else {
        header("location:./index.php");
    }
} catch (Exception $e) {
    die("ERROR 500- INTERNAL SERVER ERROR");
}