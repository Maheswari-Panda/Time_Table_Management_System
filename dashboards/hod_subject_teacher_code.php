<?php 
include("../includes/connect.php");

// Handle adding a new subject-teacher relationship
if (isset($_POST['subject-teacher-add-btn'])) {
    $subject_id = $_POST['subject_id'];
    $teacher_id = $_POST['teacher_id'];

    $sql = "INSERT INTO `subject_teacher` (`subject_id`, `teacher_id`) 
            VALUES ('$subject_id', '$teacher_id')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Teacher assigned to subject successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../dashboards/hod_subject_teacher.php'); // Redirect to a details page for subject-teacher
    } else {
        $_SESSION['status'] = "Error assigning teacher: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../dashboards/hod_subject_teacher_add.php'); // Redirect back to the add page
    }
    exit();
}

// Handle updating a subject-teacher relationship
if (isset($_POST['subject-teacher-update-btn'])) {
    $subject_teacher_id = $_POST['subject_teacher_update_id'];
    $subject_id = $_POST['subject_id'];
    $teacher_id = $_POST['teacher_id'];

    $sql = "UPDATE `subject_teacher` 
            SET `subject_id` = '$subject_id', 
                `teacher_id` = '$teacher_id' 
            WHERE `subject_teacher_id` = '$subject_teacher_id'"; // Assuming there's a primary key column 'subject_teacher_id'

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Subject-teacher relationship updated successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../dashboards/hod_subject_teacher.php'); // Redirect to details page
    } else {
        $_SESSION['status'] = "Error updating relationship: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../dashboards/hod_subject_teacher_edit.php'); // Redirect back to edit page
    }
    exit();
}

// Handle deleting a subject-teacher relationship
if (isset($_POST['delete_btn_set'])) {
    $delete_subject_teacher_id = $_POST['delete_id'];
    
    $sql = "DELETE FROM subject_teacher WHERE subject_teacher_id = '$delete_subject_teacher_id'"; // Assuming there's a primary key column
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Subject-teacher relationship deleted successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../dashboards/hod_subject_teacher.php'); // Redirect to details page
    } else {
        $_SESSION['status'] = "Error deleting relationship: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../dashboards/hod_subject_teacher.php'); // Redirect back to details page
    }
    exit();
}



?>