<?php
include("../includes/connect.php"); 

if (isset($_POST['semester_id'])) {
    $semester_id = $_POST['semester_id'];
    
    // Query to fetch divisions based on the semester_id
    $sql = "SELECT * FROM division WHERE Class_Id IN (SELECT Class_Id FROM class_semester WHERE Semester_Id = '$semester_id')";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $divisions = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $divisions[] = $row;
        }
        echo json_encode($divisions);
    } else {
        echo json_encode([]); // Return an empty array if no divisions are found
    }
}
?>
