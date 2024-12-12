<?php 
include("../includes/connect.php");

// Handle adding a new time_slot
if (isset($_POST['time-slot-add-btn'])) {
    $time_slot_from = $_POST['time_slot_from'];
    $time_slot_to = $_POST['time_slot_to'];
    $department_id = $_POST['department_id'];

    $sql = "INSERT INTO `time_slot` (`time_slot_from`, `time_slot_to`, `department_id`) 
            VALUES ('$time_slot_from', '$time_slot_to','$department_id')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "time_slot added successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../time_slot/time-slot-details.php');
    } else {
        $_SESSION['status'] = "Error adding time_slot: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../time_slot/time-slot-add.php');
    }
    exit();
}

// Handle updating a time_slot
if (isset($_POST['time-slot-update-btn'])) {
    $time_slot_id = $_POST['time_slot_update_id'];
    $time_slot_from = $_POST['time_slot_from'];
    $time_slot_to = $_POST['time_slot_to'];
    $department_id = $_POST['department_id'];

    $sql = "UPDATE `time_slot` 
            SET `time_slot_from` = '$time_slot_from', 
                `time_slot_to` = '$time_slot_to',
                `department_id` = '$department_id' 
            WHERE `time_slot_id` = '$time_slot_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "time_slot updated successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../time_slot/time-slot-details.php');
    } else {
        $_SESSION['status'] = "Error updating time_slot: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../time_slot/time-slot-edit.php');
    }
    exit();
}

// Handle deleting a time_slot
if (isset($_POST['delete_btn_set'])) {
    $delete_time_slot_id = $_POST['delete_id'];
    
    $sql = "DELETE FROM time_slot WHERE time_slot_id = '$delete_time_slot_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "time_slot deleted successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../time_slot/time-slot-details.php');
    } else {
        $_SESSION['status'] = "Error deleting time_slot: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../time_slot/time-slot-details.php');
    }
    exit();
}
?>