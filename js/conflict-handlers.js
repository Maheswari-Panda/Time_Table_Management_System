$(document).ready(function() {
    // Trigger conflict check when any dropdown is changed
    $('#day_name, #time_slot_id, #teacher_id').change(function() {
        // Get selected values from the dropdowns
        const day_id = $('#day').val();
        const time_slot_id = $('#time_slot').val();
        const teacher_id = $('#teacher').val();

        // Clear any previous conflict messages
        $('#conflictMessage').html("");

        // AJAX request to check for conflicts
        $.ajax({
            url: '../conflicts/conflictCheck.php',
            type: 'POST',
            dataType: 'json',
            data: {
                day_id: day_id,
                duration_id: time_slot_id,
                teacher_id: teacher_id
            },
            success: function(response) {
                if (response.conflict) {
                    // Display conflict message in red
                    $('#conflictMessage').html(
                        `<div class="alert alert-danger mt-2">${response.message}</div>`
                    );
                } else {
                    // Clear the conflict message if no conflict
                    $('#conflictMessage').html("");
                }
            },
            error: function(xhr, status, error) {
                console.error("An error occurred: " + error);
            }
        });
    });
});
