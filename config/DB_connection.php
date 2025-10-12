<?php
require_once __Dir__."/Database.php";
// namespace config;
// use config\Database;
// use PDOException;

try {
    $db=new Database();
    $conn=$db->getConnection();
} catch (PDOException $e) {
    header("location: ./views/maintenance.php");
    exit;
}

?>