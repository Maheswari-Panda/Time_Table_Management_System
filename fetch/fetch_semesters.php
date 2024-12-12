<?php
include("../includes/connect.php"); 

if (isset($_POST['program_id'])) {
    $program_id = $_POST['program_id'];
    $sql = "SELECT * FROM semester WHERE Program_Id = '$program_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $semesters = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $semesters[] = $row;
        }
        echo json_encode($semesters);
    }
}
?>
