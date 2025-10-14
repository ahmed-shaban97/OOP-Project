<?php
use Model\User;
require_once __DIR__ . '/../../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $user = new User();
    $admin = $user->loginAdmin($email, $password);

    if ($admin) {
        $_SESSION['admin'] = $admin;
        header("Location: admin_index.php?page=dashboard");
        exit;
    } else {
        $_SESSION['errors'] = ['login' => ['Invalid email or password!']];
        header("Location: admin_index.php?page=login");
        exit;
    }
}