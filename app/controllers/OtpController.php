<?php
class OtpController {
    public function index() {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        // Include the otp view
        include __DIR__ . '/../views/otp.php';
    }
}
