$(document).ready(function() {
    // Handle form submission
    $('#update-item-form').submit(function(event) {
        event.preventDefault();

        // Create FormData object to store form data
        var formData = new FormData(this);

        $.ajax({
            url: 'bridge4.php',
            type: 'POST',
            data: formData,
            // dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
                // Handle the server response here
                console.log(response);
                // Clear the form
                $('#update-item-form')[0].reset();
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
            }
        });
    });

});