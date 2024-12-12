<?php
include("../includes/connect.php");

if(isset($_POST['class-semester-add-btn'])){
    $class_name = $_POST['class_name'];
    $class_code = $_POST['class_code'];
    $semester_id = $_POST['semester_id'];

    $sql = "INSERT INTO `class_semester` (`semester_id`, `class_code`,`class_name`) VALUES ('$semester_id', '$class_code','$class_name')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "class $class_name added successfully.";
        $_SESSION['status_code'] = "success";

        header('Location: ../class_semester/class-semester-details.php');
    } else {
        $_SESSION['status'] = "Error adding class-semester: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../class_semester/class-semester-add.php');
    }
    exit();
}


if(isset($_POST['class-update-btn'])){
    $class_id = $_POST['class_update_id'];
    $class_name = $_POST['class_name'];
    $class_code = $_POST['class_code'];
    $semester_id = $_POST['semester_id'];

    $sql = "UPDATE `class_semester` SET `class_code` = '$class_code', `class_name` = '$class_name', `semester_id`='$semester_id' WHERE `class_id` = '$class_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "class $class_name updated successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../class_semester/class-semester-details.php');
    } else {
        $_SESSION['status'] = "Error updating class-semester: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../class_semester/class-semester-edit.php');
    }

    exit();
}

if(isset($_POST['delete_btn_set'])){
    $delete_class_id = $_POST['delete_id'];
    $sql = "DELETE FROM class_semester WHERE class_id='$delete_class_id'";
    $result=mysqli_query($conn,$sql);

    // if ($result) {
    //     $_SESSION['status'] = " class_semester deleted successfully.";
    //     $_SESSION['status_code'] = "success";
    //     header('Location: class-semester-details.php');
    // } else {
    //     $_SESSION['status'] = "Error deleting class-semester:   $class-semester_name" . mysqli_error($conn);
    //     $_SESSION['status_code'] = "error";
    //     header('Location: class-semester-details.php');
    // }

    exit();
}

?>