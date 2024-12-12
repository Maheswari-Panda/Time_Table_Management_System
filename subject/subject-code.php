<?php
include("../includes/connect.php");

// Insert subject code
if (isset($_POST['subject-add-btn'])) {
    $subject_code = $_POST['subject_code'];
    $subject_name = $_POST['subject_name'];
    $is_elective = $_POST['is_elective'];
    $elective_code = $_POST['elective_code'];
    $elective_name = $_POST['elective_name'];
    $is_lecture = $_POST['is_lecture'];
    $is_lab = $_POST['is_lab'];
    $is_tutorial = $_POST['is_tutorial'];
    $semester_id = $_POST['semester_id'];
    $class_id = $_POST['class_id'];

    // SQL to insert subject data
    $sql = "INSERT INTO `subject` (`subject_code`, `subject_name`, `is_elective`, `elective_code`, `elective_name`, `is_lecture`, `is_lab`, `is_tutorial`, `semester_id`, `class_id`) 
            VALUES ('$subject_code', '$subject_name', '$is_elective', '$elective_code', '$elective_name', '$is_lecture', '$is_lab', '$is_tutorial', '$semester_id', '$class_id')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Subject $subject_name added successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../subject/subject-details.php');
    } else {
        $_SESSION['status'] = "Error adding subject: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../subject/subject-add.php');
    }
    exit();
}

// Update subject code
if (isset($_POST['subject-update-btn'])) {
    $subject_id = $_POST['subject_update_id'];
    $subject_code = $_POST['subject_code'];
    $subject_name = $_POST['subject_name'];
    $is_elective = $_POST['is_elective'];
    $elective_code = $_POST['elective_code'];
    $elective_name = $_POST['elective_name'];
    $is_lecture = $_POST['is_lecture'];
    $is_lab = $_POST['is_lab'];
    $is_tutorial = $_POST['is_tutorial'];
    $semester_id = $_POST['semester_id'];
    $class_id = $_POST['class_id'];

    // SQL to update subject data
    $sql = "UPDATE `subject` SET 
            `subject_code` = '$subject_code', 
            `subject_name` = '$subject_name', 
            `is_elective` = '$is_elective', 
            `elective_code` = '$elective_code', 
            `elective_name` = '$elective_name', 
            `is_lecture` = '$is_lecture', 
            `is_lab` = '$is_lab', 
            `is_tutorial` = '$is_tutorial', 
            `semester_id` = '$semester_id', 
            `class_id` = '$class_id'
            WHERE `subject_id` = '$subject_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Subject $subject_name updated successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../subject/subject-details.php');
    } else {
        $_SESSION['status'] = "Error updating subject: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../subject/subject-edit.php');
    }
    exit();
}


if(isset($_POST['delete_btn_set'])){
    $delete_subject_id = $_POST['delete_id'];
    $sql = "DELETE FROM `subject` WHERE `Subject_Id`='$delete_subject_id'";
    $result=mysqli_query($conn,$sql);

    // if ($result) {
    //     $_SESSION['status'] = " subject deleted successfully.";
    //     $_SESSION['status_code'] = "success";
    //     header('Location: subject-details.php');
    // } else {
    //     $_SESSION['status'] = "Error deleting subject:   $subject_name" . mysqli_error($conn);
    //     $_SESSION['status_code'] = "error";
    //     header('Location: subject-details.php');
    // }

    exit();
}


?>