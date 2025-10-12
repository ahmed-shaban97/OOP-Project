<?php


require_once __DIR__ . '/../../models/Category.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    foreach ($_POST as $key => $value) {
        $key=htmlspecialchars(trim($value));
    }//د

   

    $categoryModel = new Category();
    $categoryName=htmlspecialchars(trim($_POST['name']));
    $data = [
        "name" => $categoryName
    ];

    try {
        $categoryModel->create($data);
        $_SESSION['success'] = "the product is created successfully";
        if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'admin_index.php') !== false) {
            header("location:./admin_index.php?page=category");
        } else {
            header("location:./index.php?page=category");
        }
    } catch (Exception $e) {
        $_SESSION['error'] = "Sorry !! the product isn't created .";
    }
} else {
    die("ERROR 404-NOT FOUND");
}