<?php
require_once "../app/controllers/HomeController.php";
require_once "../app/controllers/LoginController.php";

$page = $_GET['page'] ?? 'home';

if ($page === 'login') {
    $controller = new LoginController();
} else {
    $controller = new HomeController();
}

$controller->index();
