<?php
require_once __DIR__ . '/../../config/database.php';

class UserModel {
  private $pdo;

  public function __construct() {
    $db = new Database();
    $this->pdo = $db->connect();
  }

  public function getUserByEmail($email) {
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE user_email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function verifyUser($email, $password) {
    $user = $this->getUserByEmail($email);

    if (!$user) {
      return false; 
    }

    if (password_verify($password, $user['user_password'])) {
      return true;
    }

    if ($password === $user['user_password']) {
      return true;
    }

    return false;
  }
}
