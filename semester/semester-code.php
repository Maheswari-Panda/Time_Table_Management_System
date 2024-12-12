<?php
include("../includes/connect.php");

if(isset($_POST['semester-add-btn'])){
    $semester_name = $_POST['semester_name'];
    $semester_code = $_POST['semester_code'];
    $program_id = $_POST['program_id'];

    $sql = "INSERT INTO `semester` (`semester_name`, `semester_code`,`program_id`) VALUES ('$semester_name', '$semester_code','$program_id')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "semester $semester_name added successfully.";
        $_SESSION['status_code'] = "success";

        header('Location: ../semester/semester-details.php');
    } else {
        $_SESSION['status'] = "Error adding semester: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../semester/semester-add.php');

    }
    exit();
}


if(isset($_POST['semester-update-btn'])){
    $semester_id = $_POST['semester_update_id'];
    $semester_name = $_POST['semester_name'];
    $semester_code = $_POST['semester_code'];
    $program_id = $_POST['program_id'];

    $sql = "UPDATE `semester` SET `semester_code` = '$semester_code', `semester_name` = '$semester_name', `program_id`='$program_id' WHERE `semester_id` = '$semester_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "semester $semester_name updated successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../semester/semester-details.php');
    } else {
        $_SESSION['status'] = "Error updating semester: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../semester/semester-edit.php');
    }

    exit();
}

if(isset($_POST['delete_btn_set'])){
    $delete_semester_id = $_POST['delete_id'];
    $sql = "DELETE FROM semester WHERE semester_id='$delete_semester_id'";
    $result=mysqli_query($conn,$sql);

    // if ($result) {
    //     $_SESSION['status'] = " semester deleted successfully.";
    //     $_SESSION['status_code'] = "success";
    //     header('Location: semester-details.php');
    // } else {
    //     $_SESSION['status'] = "Error deleting semester:   $semester_name" . mysqli_error($conn);
    //     $_SESSION['status_code'] = "error";
    //     header('Location: semester-details.php');
    // }

    exit();
}


?>