<?php
require_once 'db.php';
require_once 'teldirectory.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $directory = new \MyApp\MyDirectory($pdo);

   if (!isset($_SESSION['user_id'])) {
        exit('User ID is not set in the session.');
    }

    $userId = $_SESSION['user_id']; 
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $directory->addEntry($userId, $name, $phone, $email);

    echo "Entry added successfully";
}
?>
