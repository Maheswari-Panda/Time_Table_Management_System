<?php
include("../includes/connect.php"); 

if (isset($_POST['department_id'])) {
    $department_id = $_POST['department_id'];
    $sql = "SELECT DISTINCT Program_Type FROM program WHERE Department_Id = '$department_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $program_types = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $program_types[] = $row;
        }
        echo json_encode($program_types);
    }
}
?>
