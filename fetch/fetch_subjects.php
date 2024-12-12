<?php
include("../includes/connect.php");
// fetch_subjects.php
$semester = $_GET['semester'];
$elective = $_GET['elective'];


// Prepare the query to fetch subjects based on semester and elective status
$sql = "SELECT Subject_Id, Subject_Name FROM subject WHERE Semester_Id = ? AND Is_Elective = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $semester, $elective);
$stmt->execute();
$result = $stmt->get_result();

// Fetch data and return as JSON
$subjects = [];
while ($row = $result->fetch_assoc()) {
    $subjects[] = $row;
}

echo json_encode($subjects);

// Close connection
$stmt->close();
$conn->close();
?>
