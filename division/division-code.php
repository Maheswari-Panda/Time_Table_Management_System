<?php
include("../includes/connect.php");

if(isset($_POST['division-add-btn'])){
    $division_name = $_POST['division_name'];
    $division_code = $_POST['division_code'];
    $class_id = $_POST['class_id'];

    $sql = "INSERT INTO `division` (`division_name`, `division_code`,`class_id`) VALUES ('$division_name', '$division_code','$class_id')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Division $division_name added successfully.";
        $_SESSION['status_code'] = "success";

        header('Location: ../division/division-details.php');
    } else {
        $_SESSION['status'] = "Error adding division: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../division/division-add.php');

    }
    exit();
}


if(isset($_POST['division-update-btn'])){
    $division_id = $_POST['division_update_id'];
    $division_name = $_POST['division_name'];
    $division_code = $_POST['division_code'];
    $class_id = $_POST['class_id'];

    $sql = "UPDATE `division` SET `division_code` = '$division_code', `division_name` = '$division_name',`class_id`='$class_id' WHERE `division_id` = '$division_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Division $division_name updated successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../division/division-details.php');
    } else {
        $_SESSION['status'] = "Error updating division: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../division/division-edit.php');
    }

    exit();
}

if(isset($_POST['delete_btn_set'])){
    $delete_division_id = $_POST['delete_id'];
    $sql = "DELETE FROM division WHERE division_id='$delete_division_id'";
    $result=mysqli_query($conn,$sql);

    // if ($result) {
    //     $_SESSION['status'] = " division deleted successfully.";
    //     $_SESSION['status_code'] = "success";
    //     header('Location: division-details.php');
    // } else {
    //     $_SESSION['status'] = "Error deleting division:   $division_name" . mysqli_error($conn);
    //     $_SESSION['status_code'] = "error";
    //     header('Location: division-details.php');
    // }

    exit();
}


?>