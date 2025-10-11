<?php
require_once __DIR__ . '/../vendor/autoload.php'; // autoload composer

use Model\Database;

try {
    $db = new Database();
    $conn = $db->getConnection();
} catch (Exception $e) {
    header("Location: ./views/404.php");
    exit();
}