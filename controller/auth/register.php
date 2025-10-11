<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Model\User;
use Model\Validator;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role_id = 2; // user role

    $rules = [
        'name' => 'required|min:3|max:20|string',
        'email' => 'required|email',
        'password' => 'required|max:20|min:6|regex:[A-Z]|regex:[a-z]|regex:[0-9]'
    ];

    $validator = new Validator($_POST);

    foreach ($rules as $field => $rule) {
        $validator->validate($_POST[$field] ?? '', $field, $rule);
    }

    if ($validator->hasErrors()) {
        $_SESSION['errors'] = $validator->getError();
        header("Location: index.php?page=register");
        exit;
    }

    $user = new User();
    $existing = $user->getByEmail($email);

    if ($existing) {
        $_SESSION['errors'] = ['email' => ' Email already exists!'];
        header("Location: index.php?page=register");
        exit;
    }

    $result = $user->create($name, $email, $password, $role_id);

    if ($result) {
        $_SESSION['success'] = " Registration successful!";
        header("Location: index.php?page=login");
        exit;
    } else {
        $_SESSION['errors'] = ['general' => 'Registration failed!'];
        header("Location: index.php?page=register");
        exit;
    }
}