<?php
// app/controllers/LoginController.php
require_once __DIR__ . '/../../config/database.php';

class LoginController {
    public function index() {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        $db = new Database();
        $conn = $db->connect();

        $message = null;
        $success = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch();

            if ($user && $user['password'] === $password) {
                $success = true;
                $message = "Login successful! Redirecting...";

                if (stripos($email, 'admin@') === 0) {
                    header("Location: index.php?page=admin");
exit;

                } else {
                    header("Location: index.php");
                    exit;
                }
            } else {
                $message = "Invalid email or password.";
            }
        }

        include __DIR__ . '/../views/loginView.php';
    }
}

