<?php
class OtpController {
    public function index() {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // If the form was submitted, validate the OTP and redirect on success
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $otp = isset($_POST['otp']) ? trim($_POST['otp']) : '';

            // Basic validation: expect 4 digits
            if (preg_match('/^\d{4}$/', $otp)) {
                $expected = isset($_SESSION['expected_otp']) ? $_SESSION['expected_otp'] : null;

                // If no expected OTP in session assume success for demo, otherwise compare
                if ($expected === null || $expected == $otp) {
                    // Prepare some example order data (real app should use actual order info)
                    $_SESSION['orderDetails'] = array(
                        'order_id' => 'ORD' . time(),
                        'restaurant_name' => isset($_SESSION['restaurant_name']) ? $_SESSION['restaurant_name'] : 'Demo Restaurant',
                        'delivery_address' => isset($_SESSION['delivery_address']) ? $_SESSION['delivery_address'] : 'Customer Address',
                        'total_amount' => isset($_SESSION['total_amount']) ? $_SESSION['total_amount'] : '0.00',
                        'payment_method' => isset($_SESSION['payment_method']) ? $_SESSION['payment_method'] : 'card',
                    );

                    // Example estimated time
                    $_SESSION['estimatedTime'] = isset($_SESSION['estimatedTime']) ? $_SESSION['estimatedTime'] : '30-40 mins';

                    // Redirect to order confirmation page
                    header('Location: index.php?page=orderconfirmation');
                    exit;
                } else {
                    $error = 'Invalid OTP. Please try again.';
                    include __DIR__ . '/../views/otp.php';
                    return;
                }
            } else {
                $error = 'Please enter a 4-digit OTP.';
                include __DIR__ . '/../views/otp.php';
                return;
            }
        }

        // Show the OTP view by default
        include __DIR__ . '/../views/otp.php';
    }
}
