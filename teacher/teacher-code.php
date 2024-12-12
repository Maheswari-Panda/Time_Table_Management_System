<?php 
include("../includes/connect.php");

// Handle adding a new teacher
if (isset($_POST['teacher-add-btn'])) {
    $teacher_name = $_POST['teacher_name'];
    $teacher_code = $_POST['teacher_code'];
    $teacher_email = $_POST['teacher_email'];
    $teacher_password = $_POST['teacher_password'];
    $teacher_designation = $_POST['teacher_designation'];
    $department_id = $_POST['department_id'];

    $sql = "INSERT INTO `teacher` (`teacher_name`, `teacher_code`, `teacher_email`,`teacher_password`, `designation`, `department_id`) 
            VALUES ('$teacher_name', '$teacher_code', '$teacher_email','$teacher_password', '$teacher_designation', '$department_id')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Teacher $teacher_name added successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../teacher/teacher-details.php');
    } else {
        $_SESSION['status'] = "Error adding teacher: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../teacher/teacher-add.php');
    }
    exit();
}

// Handle updating a teacher
if (isset($_POST['teacher-update-btn'])) {
    $teacher_id = $_POST['teacher_update_id'];
    $teacher_name = $_POST['teacher_name'];
    $teacher_code = $_POST['teacher_code'];
    $teacher_email = $_POST['teacher_email'];
    $teacher_password = $_POST['teacher_password'];
    $teacher_designation = $_POST['teacher_designation'];
    $department_id = $_POST['department_id'];

    $sql = "UPDATE `teacher` 
            SET `teacher_name` = '$teacher_name', 
                `teacher_code` = '$teacher_code', 
                `teacher_email` = '$teacher_email', 
                `teacher_password` = '$teacher_password', 
                `designation` = '$teacher_designation', 
                `department_id` = '$department_id' 
            WHERE `teacher_id` = '$teacher_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Teacher $teacher_name updated successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../teacher/teacher-details.php');
    } else {
        $_SESSION['status'] = "Error updating teacher: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../teacher/teacher-edit.php');
    }
    exit();
}

// Handle deleting a teacher
if (isset($_POST['delete_btn_set'])) {
    $delete_teacher_id = $_POST['delete_id'];
    
    $sql = "DELETE FROM teacher WHERE teacher_id = '$delete_teacher_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Teacher deleted successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../teacher/teacher-details.php');
    } else {
        $_SESSION['status'] = "Error deleting teacher: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../teacher/teacher-details.php');
    }
    exit();
}
?>