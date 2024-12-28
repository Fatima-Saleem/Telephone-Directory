<?php
require_once 'db.php';
require_once 'teldirectory.php';

session_start();
$directory = new \MyApp\MyDirectory($pdo);

$directoryId = $_POST['directory_id']; 
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$directory->updateEntry($directoryId, $name, $phone, $email);


?>
