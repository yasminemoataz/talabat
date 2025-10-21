<?php
class CartController {
    public function index() {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        // Initialize cart if not exists
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        // Handle cart actions
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleCartAction();
        }
        
        // Display cart page
        $this->showCart();
    }
    
    private function handleCartAction() {
        $action = $_POST['action'] ?? '';
        $productId = $_POST['product_id'] ?? null;
        
        switch ($action) {
            case 'add':
                $this->addItem($_POST['product_id'], $_POST['product_name'], $_POST['product_price']);
                break;
            case 'increase':
                if (isset($_SESSION['cart'][$productId])) {
                    $_SESSION['cart'][$productId]['quantity']++;
                }
                break;
            case 'decrease':
                if (isset($_SESSION['cart'][$productId]) && $_SESSION['cart'][$productId]['quantity'] > 1) {
                    $_SESSION['cart'][$productId]['quantity']--;
                }
                break;
            case 'remove':
                if (isset($_SESSION['cart'][$productId])) {
                    unset($_SESSION['cart'][$productId]);
                }
                break;
            case 'clear':
                $_SESSION['cart'] = [];
                break;
        }
        
        // Redirect to avoid form resubmission
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
    
    private function addItem($productId, $productName, $productPrice) {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity']++;
        } else {
            $_SESSION['cart'][$productId] = [
                'name' => $productName,
                'price' => floatval($productPrice),
                'quantity' => 1
            ];
        }
    }
    
    private function showCart() {
        // Include the cart view
        include __DIR__ . '/../views/cart.php';
    }
    
    public static function getCartCount() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $count = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $count += $item['quantity'];
            }
        }
        return $count;
    }
}
?>