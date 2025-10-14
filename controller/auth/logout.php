<?php
if (isset($_SESSION['admin'])) {
    unset($_SESSION['admin']);
    session_destroy();
    header("Location: admin_index.php?page=login");
    exit;
}
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    session_destroy();
    header("Location: index.php?page=login");
    exit;
}