<?php
use Model\Brand;
use Exception;
require_once __DIR__ . '/../../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $brandModel = new Brand();
    $id_brand=$_POST['id_cat'];
    $brandName=htmlspecialchars(trim($_POST['name']));
    $data = [
        "id"=>$id_cat,
        "name" => $brandName
    ];

    try {
        $brandModel->update($id_brand,$data);

        $_SESSION['success'] = "the product is created successfully";
        if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'admin_index.php') !== false) {
            header("location:./admin_index.php?page=brand");
        } else {
            header("location:./index.php?page=brand");
        }
    } catch (Exception $e) {
        $_SESSION['error'] = "Sorry !! the product isn't created .";
    }
} else {
    die("ERROR 404-NOT FOUND");
}