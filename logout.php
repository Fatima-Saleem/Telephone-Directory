<?php
session_start(); 
if (isset($_SESSION['email'])) {
    unset($_SESSION['email']); 
    session_destroy(); 
}

header('Location: signup-page.html');
exit();
?>