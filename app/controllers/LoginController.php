<?php 
//app/controllers/LoginController.php require_once "../app/models/UserModel.php"; 
 
class LoginController 
{ 
    public function index() 
    { $message = null; $success = false; if ($_SERVER["REQUEST_METHOD"] === "POST") 
        { $email = $_POST['email'] ?? ''; 
            $password = $_POST['password'] ?? ''; 
            $userModel = new UserModel(); 
            $isValid = $userModel->verifyUser($email, $password); 
            if ($isValid) { $message = "Welcome back!"; $success = true; } else { $message = "Invalid email or password."; } }
             include "../app/views/loginView.php";
             } 
            }