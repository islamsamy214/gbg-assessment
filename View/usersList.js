$(document).ready(function() {
    // Highlight table rows on hover
    $('#usersTable tbody tr').hover(function() {
        $(this).css('background-color', '#f0f0f0');
    }, function() {
        $(this).css('background-color', '');
    });

    // Alternate row colors
    $('#usersTable tbody tr:even').css('background-color', '#f9f9f9');

    // Delete button click handler
    $('.deleteButton').click(function() {
        var userId = $(this).data('userid');
        if (confirm('Are you sure you want to delete this user?')) {
            $.ajax({
                url: 'deleteUser.php', // Assuming this is the endpoint to delete a user
                type: 'POST',
                data: {userId: userId},
                success: function(response) {
                    alert(response); // Display success message
                    // Remove the deleted row from the table
                    $(this).closest('tr').remove();
                },
                error: function(xhr, status, error) {
                    alert('Error deleting user: ' + error); // Display error message
                }
            });
        }
    });
});
