<?php
class OrderConfirmationController {
    public function index() {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Read order data from session (set previously after OTP verification)
        $orderDetails = isset($_SESSION['orderDetails']) ? $_SESSION['orderDetails'] : array(
            'order_id' => '',
            'restaurant_name' => '',
            'delivery_address' => '',
            'total_amount' => '0.00',
            'payment_method' => 'card'
        );

        $estimatedTime = isset($_SESSION['estimatedTime']) ? $_SESSION['estimatedTime'] : 'Unknown';

        // Include the order confirmation view
        include __DIR__ . '/../views/orderconfirmation.php';
    }
}
