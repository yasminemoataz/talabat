<?php
class OrderConfirmationController {
    public function index() {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Build order details from the session cart to ensure confirmation shows accurate data
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

        // Calculate totals
        $subtotal = 0.0;
        foreach ($cart as $item) {
            $price = isset($item['price']) ? (float)$item['price'] : 0.0;
            $qty = isset($item['quantity']) ? (int)$item['quantity'] : 0;
            $subtotal += $price * $qty;
        }

        // Example fees (match checkout calculation)
        $deliveryFee = 2.99;
        $serviceFee = 1.50;
        $total = $subtotal + $deliveryFee + $serviceFee;

        // Generate a random order id
        try {
            $rand = bin2hex(random_bytes(4));
            $orderId = 'ORD' . strtoupper($rand);
        } catch (Exception $e) {
            $orderId = 'ORD' . strtoupper(substr(md5(uniqid((string)mt_rand(), true)), 0, 8));
        }

        // Prepare order details array
        $orderDetails = array(
            'order_id' => $orderId,
            'items' => $cart,
            'restaurant_name' => isset($_SESSION['restaurant_name']) ? $_SESSION['restaurant_name'] : 'Demo Restaurant',
            'delivery_address' => isset($_SESSION['delivery_address']) ? $_SESSION['delivery_address'] : (isset($_SESSION['orderDetails']['delivery_address']) ? $_SESSION['orderDetails']['delivery_address'] : ''),
            'subtotal' => number_format($subtotal, 2),
            'delivery_fee' => number_format($deliveryFee, 2),
            'service_fee' => number_format($serviceFee, 2),
            'total_amount' => number_format($total, 2),
            'payment_method' => isset($_SESSION['orderDetails']['payment_method']) ? $_SESSION['orderDetails']['payment_method'] : (isset($_SESSION['last_payment_received']) ? $_SESSION['last_payment_received'] : 'unknown')
        );

        $estimatedTime = isset($_SESSION['estimatedTime']) ? $_SESSION['estimatedTime'] : '30-40 mins';

        // Save the finalized order details in the session for later reference
        $_SESSION['orderDetails'] = $orderDetails;

        // Clear the cart now that the order is placed
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }

        // Include the order confirmation view
        include __DIR__ . '/../views/orderconfirmation.php';
    }
}
