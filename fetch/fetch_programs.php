<?php
include("../includes/connect.php"); 

if (isset($_POST['department_id']) && isset($_POST['program_type'])) {
    $department_id = $_POST['department_id'];
    $program_type = $_POST['program_type'];
    $sql = "SELECT * FROM program WHERE Department_Id = '$department_id' AND Program_Type = '$program_type'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $programs = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $programs[] = $row;
        }
        echo json_encode($programs);
    }
}
?>
