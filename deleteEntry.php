<?php
require_once 'db.php';
require_once 'teldirectory.php';

session_start();
$directory = new \MyApp\MyDirectory($pdo);
echo "Deleting ID: " . $id;
$id = $_POST['id'];

$directory->deleteEntry($id);

echo "Entry deleted successfully";
?>
