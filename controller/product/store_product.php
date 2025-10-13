<?php
use Model\Product;
require_once __DIR__ . '/../../vendor/autoload.php';
use Exception;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    foreach ($_POST as $key => $value) {
        $key=htmlspecialchars(trim($value));
    }

    $image = $_FILES['image'];

    $dir_Name = "assets/image/";

    $file_Name = $dir_Name . basename($image["name"]);

    $imageExt = strtolower(pathinfo($file_Name, PATHINFO_EXTENSION));

    $allowed_ext = ['png', 'jpg', 'jpeg', 'gif', 'webp'];

    if (!in_array($imageExt, $allowed_ext)) {
        die("ERROR 422- UNSUPPORTED MEDIA TYPE");
    }


    if ($image['size'] > 3 * 1024 * 1024) {

        die("ERROR 413- FILE IS TOO LARGE");
    }

    if ($image['error'] == 0) {
        $image_name = "product-" . rand(10000, 100000) . "." . $imageExt;

        $imageDir = dirname(__DIR__, 2) . '/assets/image/';  // يرجع خطوتين للخلف
        if (!is_dir($imageDir)) {
            mkdir($imageDir, 0777, true); // ينشئ المجلد لو مش موجود
        }

        $imagePath = $imageDir . $image_name;

        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            echo "image uploaded";
        } else {
            echo "image not uploaded";
            exit();
        }
    }

    $productModel = new Product();
    $data = [
        "name" => $_POST['name'],
        "price" => $_POST['price'],
        "image" => $image_name,
        "category_id" => $_POST['category_name'] ?? null,
        "brand_id" => $_POST['brand_name'] ?? null,
        "description" => $_POST['description'] ,
        "stock_qty" => $_POST['stock_qty'],
    ];
    
    try {
        $productModel->create($data);
        $_SESSION['success'] = "the product is created successfully";
        if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'admin_index.php') !== false) {
            header("location:./../../admin_index.php?page=product");
        } else {
            header("location:./index.php");
        }
    } catch (Exception $e) {
        $_SESSION['error'] = "Sorry !! the product isn't created .";
    }
} else {
    die("ERROR 404-NOT FOUND");
}