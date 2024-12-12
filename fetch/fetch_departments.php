<?php
include("../includes/connect.php"); 

if (isset($_POST['faculty_id'])) {
    $faculty_id = $_POST['faculty_id'];
    $sql = "SELECT * FROM department WHERE Faculty_Id = '$faculty_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $departments = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $departments[] = $row;
        }
        echo json_encode($departments);
    }
}
?>
