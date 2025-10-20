<?php
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/LoginController.php';
require_once __DIR__ . '/../app/controllers/SignupController.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'login':
        $controller = new LoginController();
        break;
    case 'signup':
        $controller = new SignupController();
        break;
        case 'admin':
    require_once __DIR__ . '/../app/controllers/AdminController.php';
    $controller = new AdminController();
    break;
    case 'vendors':
    require_once __DIR__ . '/../app/controllers/VendorController.php';
    $controller = new VendorController();
    break;
    default:
        $controller = new HomeController();
        break;
}

$controller->index();
