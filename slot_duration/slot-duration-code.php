<?php 
include("../includes/connect.php");

// Handle adding a new slot_duration
if (isset($_POST['slot-duration-add-btn'])) {
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $sql = "INSERT INTO `slot_durations` (`start_time`, `end_time`) 
            VALUES ('$start_time', '$end_time')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "slot added successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../slot_duration/slot-duration-details.php');
    } else {
        $_SESSION['status'] = "Error adding slot: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../slot_duration/slot-duration-add.php');
    }
    exit();
}

// Handle updating a slot_duration
if (isset($_POST['slot-duration-update-btn'])) {
    $duration_id = $_POST['slot_duration_update_id'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $sql = "UPDATE `slot_durations` 
            SET `start_time` = '$start_time', 
                `end_time` = '$end_time'
            WHERE `duration_id` = $duration_id
            ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "slot updated successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../slot_duration/slot-duration-details.php');
    } else {
        $_SESSION['status'] = "Error updating slot: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../slot_duration/slot-duration-edit.php');
    }
    exit();
}

// Handle deleting a slot_duration
if (isset($_POST['delete_btn_set'])) {
    $delete_duration_id = $_POST['delete_id'];
    
    $sql = "DELETE FROM slot_durations WHERE duration_id = '$delete_duration_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "slot deleted successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../slot_duration/slot-duration-details.php');
    } else {
        $_SESSION['status'] = "Error deleting slot: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../slot_duration/slot-duration-details.php');
    }
    exit();
}
?>