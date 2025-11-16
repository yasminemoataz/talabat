<?php
class CheckoutController {
    public function index() {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // If form submitted, process checkout
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
            $payment = isset($_POST['payment_method']) ? trim($_POST['payment_method']) : '';

            // Calculate total from session cart
            $cartItems = $_SESSION['cart'] ?? [];
            $total = 0;
            foreach ($cartItems as $item) {
                $total += $item['price'] * $item['quantity'];
            }
            // Example fees
            $total = $total + 2.99 + 1.50;

            // Store basic order info in session for confirmation view
            $_SESSION['orderDetails'] = array(
                'order_id' => 'ORD' . time(),
                'restaurant_name' => isset($_SESSION['restaurant_name']) ? $_SESSION['restaurant_name'] : 'Demo Restaurant',
                'delivery_address' => isset($_SESSION['delivery_address']) ? $_SESSION['delivery_address'] : $name . ' - ' . $phone,
                'total_amount' => number_format($total, 2),
                'payment_method' => $payment ?: 'unknown'
            );

            // Save last received payment method for debugging/troubleshooting
            $_SESSION['last_payment_received'] = $payment;

            // Set an estimated time
            $_SESSION['estimatedTime'] = '30-40 mins';

            // If payment method requires OTP (credit), go to OTP; otherwise skip to confirmation
            if ($payment === 'credit') {
                header('Location: index.php?page=otp');
                exit;
            } else {
                // Cash on Delivery or Apple Pay -> skip OTP
                header('Location: index.php?page=orderconfirmation');
                exit;
            }
        }

        // Include the checkout view
        include __DIR__ . '/../views/checkout.php';
    }
}
?>