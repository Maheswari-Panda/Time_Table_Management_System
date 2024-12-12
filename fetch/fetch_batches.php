<?php
include("../includes/connect.php"); 

if (isset($_POST['division_id'])) {
    $division_id = $_POST['division_id'];
    
    // Query to fetch divisions based on the semester_id
    $sql = "SELECT * FROM batch WHERE Batch_Id IN (SELECT Batch_Id FROM Batch WHERE Division_Id = '$division_id')";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $batches = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $batches[] = $row;
        }
        echo json_encode($batches);
    } else {
        echo json_encode([]); // Return an empty array if no divisions are found
    }
}
?>
