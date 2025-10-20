<?php
// app/controllers/SignupController.php

require_once __DIR__ . '/../../config/database.php';

class SignupController {
    public function index() {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $db = new Database();
        $conn = $db->connect();

        $message = '';
        $success = false;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstname = trim($_POST['firstName']);
            $lastname  = trim($_POST['lastName']);
            $email     = trim($_POST['email']);
            $phone     = trim($_POST['phone']);
            $password  = $_POST['password'];
            $confirm   = $_POST['confirmPassword'];

            if ($password !== $confirm) {
                $message = "Passwords do not match.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = "Invalid email format.";
            } else {
                // Check if email exists
                $checkSql = "SELECT * FROM users WHERE email = :email";
                $stmt = $conn->prepare($checkSql);
                $stmt->bindParam(':email', $email);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $message = "Email already registered.";
                } else {
                    // Insert user directly (no hashing)
                    $insertSql = "INSERT INTO users (firstname, lastname, email, phone, password)
                                  VALUES (:firstname, :lastname, :email, :phone, :password)";
                    $stmt = $conn->prepare($insertSql);

                    $stmt->bindParam(':firstname', $firstname);
                    $stmt->bindParam(':lastname', $lastname);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':phone', $phone);
                    $stmt->bindParam(':password', $password, PDO::PARAM_STR);

                    try {
                        $stmt->execute();
                        $message = "Account created successfully!";
                        $success = true;
                    } catch (PDOException $e) {
                        $message = "Database error: " . $e->getMessage();
                    }
                }
            }
        }

        // Load the signup view
        include __DIR__ . '/../views/signup.php';
    }
}
