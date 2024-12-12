<?php
include '../includes/connect.php'; // Include your database connection

// Set JSON header
header('Content-Type: application/json');

// Get data from AJAX request
$day_id = isset($_POST['day_id']) ? intval($_POST['day_id']) : null;
$duration_id = isset($_POST['duration_id']) ? intval($_POST['duration_id']) : null;
$teacher_id = isset($_POST['teacher_id']) ? intval($_POST['teacher_id']) : null;
$location_id = isset($_POST['location_id']) ? intval($_POST['location_id']) : null;
$batch_id = isset($_POST['batch_id']) ? intval($_POST['batch_id']) : null;
$division_id = isset($_POST['division_id']) ? intval($_POST['division_id']) : null;

// Initialize response
$response = [
    "teacher_conflict" => false,
    "teacher_message" => "No conflict detected for teacher.",
    "location_conflict" => false,
    "location_message" => "No conflict detected for location.",
    "batch_conflict" => false,
    "batch_message" => "No conflict detected for batch.",
    "division_conflict" => false,
    "division_message" => "No conflict detected for division."
];

// Check for teacher conflict
if ($teacher_id) {
    $query_teacher = "SELECT * FROM time_table WHERE day_id = ? AND Duration_Id = ? AND Teacher_Id = ?";
    $stmt_teacher = $conn->prepare($query_teacher);
    $stmt_teacher->bind_param("iii", $day_id, $duration_id, $teacher_id);
    $stmt_teacher->execute();
    $result_teacher = $stmt_teacher->get_result();

    if ($result_teacher->num_rows > 0) {
        $response["teacher_conflict"] = true;
        $response["teacher_message"] = "Conflict detected: The teacher is already assigned during this time slot of the day.";
    }
}

// Check for location conflict
if ($location_id) {
    $query_location = "SELECT * FROM time_table WHERE day_id = ? AND Duration_Id = ? AND Location_Id = ?";
    $stmt_location = $conn->prepare($query_location);
    $stmt_location->bind_param("iii", $day_id, $duration_id, $location_id);
    $stmt_location->execute();
    $result_location = $stmt_location->get_result();

    if ($result_location->num_rows > 0) {
        $response["location_conflict"] = true;
        $response["location_message"] = "Location conflict detected: The room is already booked during this time slot.";
    }
}

// Check for batch conflict
if ($batch_id) {
    $query_batch = "SELECT * FROM time_table WHERE day_id = ? AND Duration_Id = ? AND Batch_Id = ?";
    $stmt_batch = $conn->prepare($query_batch);
    $stmt_batch->bind_param("iii", $day_id, $duration_id, $batch_id);
    $stmt_batch->execute();
    $result_batch = $stmt_batch->get_result();

    if ($result_batch->num_rows > 0) {
        $response["batch_conflict"] = true;
        $response["batch_message"] = "Conflict detected: This batch is already assigned during this time slot.";
    }
}

// Check for division conflict
if ($division_id) {
    $query_division = "SELECT * FROM time_table WHERE day_id = ? AND Duration_Id = ? AND Division_Id = ?";
    $stmt_division = $conn->prepare($query_division);
    $stmt_division->bind_param("iii", $day_id, $duration_id, $division_id);
    $stmt_division->execute();
    $result_division = $stmt_division->get_result();

    if ($result_division->num_rows > 0) {
        $response["division_conflict"] = true;
        $response["division_message"] = "Conflict detected: This division is already assigned during this time slot.";
    }
}

// Return response as JSON
echo json_encode($response);
?>
