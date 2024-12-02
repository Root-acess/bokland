<?php
session_start();

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '':
    case '/':
        require __DIR__ . '/index.php';
        break;

    case '/requestforbook':
        require __DIR__ . '/Pages/requestbook.php';
        break;

    case '/blogs':
        require __DIR__ . '/Pages/blogs.php';
        break;

    case '/about':
        require __DIR__ . '/Pages/about.php';
        break;

    case './admin':
        if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
            header("Location: ../admin-login.php"); // Use absolute path
            exit();
        }
        require __DIR__ . '../Admin/index.php';
        break;

    case '/admin/addbook':
        if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
            header("Location: ./admin-login.php"); // Use absolute path
            exit();
        }
        require __DIR__ . '/Admin/addBook.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/404page.html';
        break;
}
