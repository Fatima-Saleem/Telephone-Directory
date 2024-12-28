<?php
session_start();
require_once 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $pdo->prepare("SELECT u.user_id, d.email, u.password FROM users u JOIN directory d ON u.user_id = d.user_id WHERE d.email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['password'] === $password) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_email'] = $user['email'];

        header("Location: dashboard.php");
        exit();
    } else {
       echo "<script>alert('Invalid login credentials.'); window.location.href='login-page.html';</script>";
    }
}
?>