<?php
include("../includes/connect.php"); 

if (isset($_POST['tdepartment_id'])) {
    $department_id = $_POST['tdepartment_id'];

    $sql = "SELECT Teacher_Id, Teacher_Name FROM teacher WHERE Department_Id = '$department_id'";
    $result = mysqli_query($conn, $sql);

    $teachers = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $teachers[] = ['Teacher_Id' => $row['Teacher_Id'], 'Teacher_Name' => $row['Teacher_Name']];
        }
    }

    echo json_encode($teachers);
}
?>
