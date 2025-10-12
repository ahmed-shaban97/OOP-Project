<?php
require_once __DIR__ . '/../../models/Category.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $categoryModel = new Category();
    $id_cat=$_POST['id_cat'];
    $categoryName=htmlspecialchars(trim($_POST['name']));
    $data = [
        "id"=>$id_cat,
        "name" => $categoryName
    ];

    try {
        $categoryModel->update($id_cat,$data);

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