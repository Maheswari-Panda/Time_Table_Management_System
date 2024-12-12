<?php
include("../includes/connect.php");

if(isset($_POST['department-add-btn'])){
    $department_name = $_POST['department_name'];
    $department_code = $_POST['department_code'];
    $faculty_id = $_POST['faculty_id'];

    $sql = "INSERT INTO `department` (`department_name`, `department_code`,`faculty_id`) VALUES ('$department_name', '$department_code','$faculty_id')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "$department_name added successfully.";
        $_SESSION['status_code'] = "success";

        header('Location: ../department/department-details.php');
    } else {
        $_SESSION['status'] = "Error adding department: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../department/department-add.php');

    }
    exit();
}


if(isset($_POST['department-update-btn'])){
    $department_id = $_POST['department_update_id'];
    $department_name = $_POST['department_name'];
    $department_code = $_POST['department_code'];
    $faculty_id = $_POST['faculty_id'];

    $sql = "UPDATE `department` SET `department_code` = '$department_code', `department_name` = '$department_name',`faculty_id`='$faculty_id' WHERE `department_id` = '$department_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "$department_name updated successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../department/department-details.php');
    } else {
        $_SESSION['status'] = "Error updating department: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../department/department-edit.php');
    }

    exit();
}

if(isset($_POST['delete_btn_set'])){
    $delete_department_id = $_POST['delete_id'];
    $sql = "DELETE FROM department WHERE department_id='$delete_department_id'";
    $result=mysqli_query($conn,$sql);

    // if ($result) {
    //     $_SESSION['status'] = " department deleted successfully.";
    //     $_SESSION['status_code'] = "success";
    //     header('Location: department-details.php');
    // } else {
    //     $_SESSION['status'] = "Error deleting department:   $department_name" . mysqli_error($conn);
    //     $_SESSION['status_code'] = "error";
    //     header('Location: department-details.php');
    // }

    exit();
}


?>