<?php
include '../includes/connect.php'; // Make sure to include the database connection file

if (isset($_GET['classId'])) {
    $class_id = $_GET['classId'];

    // SQL to fetch locations based on the department_id
    $sql_subjects = "SELECT Subject_Id, Subject_Name FROM subject WHERE Semester_Id = ?";
    $stmt = $conn->prepare($sql_subjects);
    $stmt->bind_param("i", $class_id);
    $stmt->execute();
    $result_subjects = $stmt->get_result();

    // Generate HTML for location options
    $subjects_html = '<option value="">-- Select Subject --</option>';
    while ($subject = $result_subjects->fetch_assoc()) {
        $subjects_html .= '<option value="' . $subject['Subject_Id'] . '">' . $subject['Subject_Name'] . '</option>';
    }

    // Return the generated HTML
    echo $subjects_html;
}
?>
