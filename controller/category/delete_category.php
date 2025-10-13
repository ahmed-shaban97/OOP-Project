<?php
use Model\Category;
use Exception;
require_once __DIR__ . '/../../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $categoryModel = new Category();
    $id_cat=$_POST['id'];

    try {
        $categoryModel->delete($id_cat);
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