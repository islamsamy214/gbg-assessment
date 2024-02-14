$(document).ready(function() {
    $('#userForm').submit(function(event) {
        event.preventDefault(); // Prevent form submission

        // Get form data
        var formData = {
            username: $('#username').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            birthdate: $('#birthdate').val(),
            phone: $('#phone').val(),
            url: $('#url').val()
        };

        // Perform client-side validation
        if (!validateForm(formData)) {
            return;
        }

        // Submit form data via Ajax
        $.ajax({
            url: 'addUser.php', // Assuming this is the endpoint to add a user
            type: 'POST',
            data: formData,
            success: function(response) {
                alert(response); // Display success message
                // Optionally, reset the form
                $('#userForm')[0].reset();
            },
            error: function(xhr, status, error) {
                alert('Error adding user: ' + error); // Display error message
            }
        });
    });
});

function validateForm(formData) {
    // Perform client-side validation
    // You can implement validation logic here
    // Return true if validation passes, false otherwise
    return true;
}
