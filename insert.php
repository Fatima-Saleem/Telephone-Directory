<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Directory Entry</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
</head>
<body class="bg-dark text-white"> 
<div class="container mt-5">
  <h1 class="text-center text-white mb-4">Telephone Directory</h1>
  <?php
  if (isset($_SESSION['user_email'])) {
      echo '<div class="alert alert-light text-center" role="alert">Logged in as ' . htmlspecialchars($_SESSION['user_email']) . '</div>';
  } else {
      echo '<div class="alert alert-light text-center" role="alert">Not logged in</div>';
  }
  include_once 'menu.html';
  ?>

  <div class="card mx-auto mt-4" style="max-width: 600px;"> 
    <div class="card-body">
      <form id="addEntryForm">
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
          </div>
          <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Add Entry</button>
      </form>
    </div>
  </div>
</div>

<script>
//jQuery AJAX for the form submission
$(document).ready(function() {
    $('#addEntryForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'addEntry.php', 
            data: $(this).serialize(),
            success: function(response) {
                alert(response); 
                $('#addEntryForm').trigger('reset');
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + error);
            }
        });
    });
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
