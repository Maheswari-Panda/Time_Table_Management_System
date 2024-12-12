
<?php
include("../includes/connect.php");

if(isset($_POST['day-add-btn'])){
    $day_name = $_POST['day_name'];
    $day_code = $_POST['day_code'];

    $sql = "INSERT INTO `days` (`Day_Name`, `Day_Code`) VALUES ('$day_name', '$day_code')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "$day_name added successfully.";
        $_SESSION['status_code'] = "success";

        header('Location: ../days/days-details.php');
    } else {
        $_SESSION['status'] = "Error adding day: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../days/day-add.php');

    }
    exit();
}

if(isset($_POST['day-update-btn'])){
    $day_name = $_POST['day_name'];
    $day_code = $_POST['day_code'];
    $day_id = $_POST['update_id'];

    $sql = "UPDATE `days` SET `day_name` = '$day_name', `day_Code` = '$day_code' WHERE `day_id` = '$day_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "$day_name updated successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../days/days-details.php');
    } else {
        $_SESSION['status'] = "Error updating day: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../days/day-edit.php');
    }

    exit();
}

if(isset($_POST['delete_btn_set'])){
    $delete_day_id = $_POST['delete_id'];
    $sql = "DELETE FROM days WHERE day_id='$delete_day_id'";
    $result=mysqli_query($conn,$sql);

    // if ($result) {
    //     $_SESSION['status'] = " day deleted successfully.";
    //     $_SESSION['status_code'] = "success";
    //     header('Location: day-details.php');
    // } else {
    //     $_SESSION['status'] = "Error deleting day:   $day_name" . mysqli_error($conn);
    //     $_SESSION['status_code'] = "error";
    //     header('Location: day-details.php');
    // }

    exit();
}

?>


