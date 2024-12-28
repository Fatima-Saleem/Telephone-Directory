<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Directory Entries</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div id="main">
    <h1>Telephone Directory</h1>
    <?php include_once 'menu.html'; ?>
    
    <div id="entryList"></div>
</div>

<script>
$(document).ready(function() {
    function loadEntries() {
        $.ajax({
            type: 'GET',
            url: 'viewEntries.php', // The PHP file that fetches all entries
            success: function(response) {
                $('#entryList').html(response); // Inserts the response into the entryList container
            },
            error: function(xhr, status, error) {
                alert('An error occurred while fetching entries: ' + error);
            }
        });
    }

    loadEntries(); 
});

$(document).on('click', '.deleteButton', function() {
    var entryId = $(this).data('id');
    if(confirm('Are you sure you want to delete this entry?')) {
        $.ajax({
            type: 'POST',
            url: 'deleteEntry.php', // The PHP file that deletes the entry
            data: { id: entryId },
            success: function(response) {
                alert(response);
                // Refresh the entries list
                loadEntries();
            },
            error: function(xhr, status, error) {
                alert('An error occurred while deleting the entry: ' + error);
            }
        });
    }
});

</script>

</body>
</html>
