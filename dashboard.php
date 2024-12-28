<?php
session_start();

require 'db.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Telephone Directory</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
  <h1 class="text-center">Telephone Directory</h1>
  <div class="text-center mt-4">
    <?php
    if (isset($_SESSION['user_email'])) {
        echo '<div class="alert alert-light" role="alert">Logged in as ' . htmlspecialchars($_SESSION['user_email']) . '</div>';
    } else {
        echo '<div class="alert alert-light" role="alert">Not logged in</div>';
    }
    ?>
  </div>
  
  <?php include_once 'menu.html'; ?>

  <div class="card bg-light mx-auto mt-4 text-dark" style="max-width: 600px;">
    <div class="card-body">
      <p class="card-text ">Welcome to your directory.</p>
    </div>
  </div>
  
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
