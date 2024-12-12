<?php
include("../includes/connect.php");

if(isset($_POST['batch-add-btn'])){
    $batch_name = $_POST['batch_name'];
    $batch_code = $_POST['batch_code'];
    $no_students = $_POST['no_of_students'];
    $division_id = $_POST['division_id'];

    $sql = "INSERT INTO `batch` (`batch_name`, `batch_code`,`no_of_students`,`division_id`) VALUES ('$batch_name', '$batch_code','$no_students','$division_id')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Batch $batch_name added successfully.";
        $_SESSION['status_code'] = "success";

        header('Location: ../batch/batch-details.php');
    } else {
        $_SESSION['status'] = "Error adding batch: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../batch/batch-add.php');

    }
    exit();
}


if(isset($_POST['batch-update-btn'])){
    $batch_id = $_POST['batch_update_id'];
    $batch_name = $_POST['batch_name'];
    $batch_code = $_POST['batch_code'];
    $no_students = $_POST['no_of_students'];
    $division_id = $_POST['division_id'];

    $sql = "UPDATE `batch` SET `batch_code` = '$batch_code', `batch_name` = '$batch_name',`no_of_students`='$no_students',`division_id`='$division_id' WHERE `batch_id` = '$batch_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "batch $batch_name updated successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../batch/batch-details.php');
    } else {
        $_SESSION['status'] = "Error updating batch: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../batch/batch-edit.php');
    }

    exit();
}

if(isset($_POST['delete_btn_set'])){
    $delete_batch_id = $_POST['delete_id'];
    $sql = "DELETE FROM batch WHERE batch_id='$delete_batch_id'";
    $result=mysqli_query($conn,$sql);

    // if ($result) {
    //     $_SESSION['status'] = " batch deleted successfully.";
    //     $_SESSION['status_code'] = "success";
    //     header('Location: batch-details.php');
    // } else {
    //     $_SESSION['status'] = "Error deleting batch:   $batch_name" . mysqli_error($conn);
    //     $_SESSION['status_code'] = "error";
    //     header('Location: batch-details.php');
    // }

    exit();
}


?>