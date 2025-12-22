<?php
// Include all controllers

// Correct paths (go up one level from public/)
require_once __DIR__ . '/../app/controllers/HomeController.php';
require_once __DIR__ . '/../app/controllers/CategoryController.php';
require_once __DIR__ . '/../app/controllers/LoginController.php';
require_once __DIR__ . '/../app/controllers/SignupController.php';
require_once __DIR__ . '/../app/controllers/MenuController.php';
require_once __DIR__ . '/../app/controllers/VendorController.php';
require_once __DIR__ . '/../app/controllers/CartController.php';
require_once __DIR__ . '/../app/controllers/CheckoutController.php';

require_once __DIR__ . '/../app/controllers/manageadminController.php';
require_once __DIR__ . '/../app/controllers/manageorderController.php';
require_once __DIR__ . '/../app/controllers/managevendorsController.php';
require_once __DIR__ . '/../app/controllers/OtpController.php';
require_once __DIR__ . '/../app/controllers/OrderConfirmationController.php';




$page = $_GET['page'] ?? 'home';
$vendor = $_GET['vendor'] ?? '';
$category = $_GET['cat'] ?? '';

// Vendor page
if ($page === 'vendor' && !empty($vendor)) {
    $controller = new MenuController();
    $controller->show($vendor);
    exit;
}

if ($page === 'category' && !empty($category)) {
    require_once __DIR__ . '/../app/controllers/CategoryController.php';
    $controller = new CategoryController();
    $controller->show($category); // call the method
    exit;
}


// Other pages
switch ($page) {
    case 'Home':
        $controller = new HomeController();
        break;
    case 'login':
        $controller = new LoginController();
        break;
    case 'signup':
        $controller = new SignupController();
        break;
    case 'cart':
        $controller = new CartController();
        break;
    case 'checkout':
        $controller = new CheckoutController();
        break;

          case 'otp':
            $controller = new OtpController();
        break;
        case 'orderconfirmation':
            $controller = new OrderConfirmationController();
            break;

    case 'vendors':
        $controller = new VendorController();
        break;

    default:
        $controller = new HomeController();
        break;
}

$controller->index();
?>
