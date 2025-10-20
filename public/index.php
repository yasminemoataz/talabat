<?php
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/LoginController.php';
require_once __DIR__ . '/../app/controllers/SignupController.php';
require_once __DIR__ . '/../app/controllers/AdminController.php';
require_once __DIR__ . '/../app/controllers/MenuController.php';
require_once __DIR__ . '/../app/controllers/VendorController.php'; // 🆕 ADD THIS

$page = $_GET['page'] ?? 'home';
$vendor = $_GET['vendor'] ?? '';

// Handle vendor menu pages
if ($page === 'vendor' && !empty($vendor)) {
    $controller = new MenuController();
    $controller->show($vendor);
    exit;
}

// Normal routing for other pages
switch ($page) {
    case 'login':
        $controller = new LoginController();
        break;
    case 'signup':
        $controller = new SignupController();
        break;
    case 'admin':
        $controller = new AdminController();
        break;
    // In your router, replace the vendors case with:
case 'vendors':
    // Temporary - redirect to MyCorner until vendor list is ready
    header('Location: ?page=vendor&vendor=mycorner');
    exit;
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
?>