<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; 
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $phone = $_POST['phone'];
    try {
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username, 'password' => $password]);
        $user_id = $pdo->lastInsertId(); 
        
        $sql = "INSERT INTO directory (user_id, name, email, phone) VALUES (:user_id, :name, :email, :phone)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['user_id' => $user_id, 'name' => $username, 'email' => $email, 'phone' => $phone]);
        header("Location: login-page.html"); 
    } catch (PDOException $e) {
        // Handle error
        echo "Error: " . $e->getMessage();
    }
}
?>
