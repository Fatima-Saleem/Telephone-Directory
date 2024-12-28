<?php
session_start(); 
$directoryId = isset($_GET['id']) ? $_GET['id'] : null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Directory Entry</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style.css">
    
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
  <h1 class="text-center">Update Telephone Directory Entry</h1>
  
  <?php
  if (isset($_SESSION['user_email'])) {
      echo '<div class="alert white-background text-dark-on-white text-center" role="alert">';
      echo 'Logged in as <strong>' . $_SESSION['user_email'] . '</strong>';
      echo '</div>';
  } else {
      echo '<div class="alert white-background text-dark-on-white text-center" role="alert">Not logged in</div>';
  }
  ?>

  <?php include_once 'menu.html'; ?>

  <div class="row justify-content-center">
    <div class="col-md-8">
      <form id="updateEntryForm" class="white-background p-4 rounded shadow" method="post">
      <input type="hidden" id="directoryId" name="directory_id" value="<?php echo htmlspecialchars($directoryId); ?>" required>

          <div class="form-group">
              <label for="updateName" class="text-dark">Name</label>
              <input type="text" id="updateName" name="name" placeholder="Name" required class="form-control">
          </div>
          <div class="form-group">
              <label for="updatePhone" class="text-dark">Phone</label>
              <input type="text" id="updatePhone" name="phone" placeholder="Phone" required class="form-control">
          </div>
          <div class="form-group">
              <label for="updateEmail" class="text-dark">Email</label>
              <input type="email" id="updateEmail" name="email" placeholder="Email" required class="form-control">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Update Entry</button>
      </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



</body>
</html>

<script>
$('#updateEntryForm').on('submit', function(e) {
    e.preventDefault();
    console.log($('#directoryId').val()); // Log the directory ID to debug
    $.ajax({
        type: 'POST',
        url: 'updateEntry.php',
        data: $(this).serialize(),
        success: function(response) {
            alert(response);
        }
    });
});
</script>
