<?php
require_once 'db.php';
require_once 'teldirectory.php';

session_start();
$directory = new \MyApp\MyDirectory($pdo);

$userId = $_SESSION['user_id'];
$entries = $directory->getAllEntries($userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Directory Entries</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> 


</head>
<body class="bg-dark text-white">
<div class="container mt-5">
    <h1 class="text-center mb-4">Telephone Directory</h1>
    
    <?php if (isset($_SESSION['user_email'])): ?>
    <div class="alert white-background text-dark-on-white text-center" role="alert">
        Logged in as <strong><?php echo htmlspecialchars($_SESSION['user_email']); ?></strong>
    </div>
    <?php else: ?>
    <div class="alert white-background text-dark-on-white text-center" role="alert">
        Not logged in
    </div>
    <?php endif; ?>

    <?php include_once 'menu.html'; ?>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="table-responsive white-background p-4 rounded shadow">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($entries as $entry): ?>
                        <tr>
                            <td><?php echo $entry['id']; ?></td>
                            <td><?php echo $entry['name']; ?></td>
                            <td><?php echo $entry['phone']; ?></td>
                            <td><?php echo $entry['email']; ?></td>
                            <td>
                                <button class="btn btn-danger deleteButton" data-id="<?php echo $entry['id']; ?>">Delete</button>
                                <button class="btn btn-primary updateButton" data-id="<?php echo $entry['id']; ?>">Update</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>
</html>
<script>
$(document).ready(function() {
    $(document).on('click', '.deleteButton', function() {
        var entryId = $(this).data('id');
        if (confirm('Are you sure you want to delete this entry?')) {
            $.ajax({
    type: 'POST',
    url: 'deleteEntry.php', 
    data: { id: entryId },
    success: function(response) {
        console.log(response); 
        alert('Entry deleted successfully.');
        location.reload();
    },
    error: function(xhr, status, error) {
        console.log("Error: " + error); 
    }
});

        }
    });

    $(document).on('click', '.updateButton', function() {
        var entryId = $(this).data('id');
        window.location.href = 'update.php?id=' + encodeURIComponent(entryId);
    });
});
</script>
