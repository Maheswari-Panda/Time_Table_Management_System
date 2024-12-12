<?php
include("../includes/connect.php");

if(isset($_POST['program-add-btn'])){
    $program_name = $_POST['program_name'];
    $program_code = $_POST['program_code'];
    $program_type = $_POST['program_type'];
    $department_id = $_POST['department_id'];

    $sql = "INSERT INTO `program` (`program_name`, `program_code`,`program_type`,`department_id`) VALUES ('$program_name', '$program_code','$program_type','$department_id')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Program $program_name added successfully.";
        $_SESSION['status_code'] = "success";

        header('Location: ../program/program-details.php');
    } else {
        $_SESSION['status'] = "Error adding program: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../program/program-add.php');

    }
    exit();
}


if(isset($_POST['program-update-btn'])){
    $program_id = $_POST['program_update_id'];
    $program_name = $_POST['program_name'];
    $program_code = $_POST['program_code'];
    $program_type = $_POST['program_type'];
    $department_id = $_POST['department_id'];

    $sql = "UPDATE `program` SET `program_code` = '$program_code', `program_name` = '$program_name',`program_type`='$program_type',`department_id`='$department_id' WHERE `program_id` = '$program_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Program $program_name updated successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../program/program-details.php');
    } else {
        $_SESSION['status'] = "Error updating program: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../program/program-edit.php');
    }

    exit();
}

if(isset($_POST['delete_btn_set'])){
    $delete_program_id = $_POST['delete_id'];
    $sql = "DELETE FROM program WHERE program_id='$delete_program_id'";
    $result=mysqli_query($conn,$sql);

    // if ($result) {
    //     $_SESSION['status'] = " program deleted successfully.";
    //     $_SESSION['status_code'] = "success";
    //     header('Location: program-details.php');
    // } else {
    //     $_SESSION['status'] = "Error deleting program:   $program_name" . mysqli_error($conn);
    //     $_SESSION['status_code'] = "error";
    //     header('Location: program-details.php');
    // }

    exit();
}


?>