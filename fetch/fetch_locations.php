<?php
include '../includes/connect.php'; // Make sure to include the database connection file

if (isset($_GET['department_id'])) {
    $department_id = $_GET['department_id'];

    // SQL to fetch locations based on the department_id
    $sql_locations = "SELECT Location_Id, Location_Name FROM location WHERE Department_Id = ?";
    $stmt = $conn->prepare($sql_locations);
    $stmt->bind_param("i", $department_id);
    $stmt->execute();
    $result_locations = $stmt->get_result();

    // Generate HTML for location options
    $locations_html = '<option value="">-- Select a Location --</option>';
    while ($location = $result_locations->fetch_assoc()) {
        $locations_html .= '<option value="' . $location['Location_Id'] . '">' . $location['Location_Name'] . '</option>';
    }

    // Return the generated HTML
    echo $locations_html;
}
?>
