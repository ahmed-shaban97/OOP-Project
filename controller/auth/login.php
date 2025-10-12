<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Model\User;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $_SESSION['errors'] = ['login' => ['Please enter both email and password']];
        header("Location: index.php?page=login");
        exit;
    }

    $user = new User();
    $loggedUser = $user->login($email, $password);

    if ($loggedUser) {
        $_SESSION['user'] = $loggedUser;
        $_SESSION['success'] = "Logged in successfully!";
        header("Location: index.php?page=home");
        exit;
    } else {
        $_SESSION['errors'] = ['login' => ['Invalid email or password!']];
        header("Location: index.php?page=login");
        exit;
    }
}