
<?php
include("../includes/connect.php");

if(isset($_POST['faculty-add-btn'])){
    $faculty_name = $_POST['faculty_name'];
    $faculty_code = $_POST['faculty_code'];

    $sql = "INSERT INTO `faculty` (`faculty_name`, `faculty_Code`) VALUES ('$faculty_name', '$faculty_code')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "$faculty_name added successfully.";
        $_SESSION['status_code'] = "success";

        header('Location: ../faculty/faculty-details.php');
    } else {
        $_SESSION['status'] = "Error adding faculty: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../faculty/faculty-add.php');

    }
    exit();
}

if(isset($_POST['faculty-update-btn'])){
    $faculty_name = $_POST['faculty_name'];
    $faculty_code = $_POST['faculty_code'];
    $faculty_id = $_POST['update_id'];

    $sql = "UPDATE `faculty` SET `faculty_name` = '$faculty_name', `faculty_Code` = '$faculty_code' WHERE `faculty_id` = '$faculty_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "$faculty_name updated successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../faculty/faculty-details.php');
    } else {
        $_SESSION['status'] = "Error updating faculty: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../faculty/faculty-edit.php');
    }

    exit();
}

if(isset($_POST['delete_btn_set'])){
    $delete_faculty_id = $_POST['delete_id'];
    $sql = "DELETE FROM faculty WHERE faculty_id='$delete_faculty_id'";
    $result=mysqli_query($conn,$sql);

    // if ($result) {
    //     $_SESSION['status'] = " faculty deleted successfully.";
    //     $_SESSION['status_code'] = "success";
    //     header('Location: faculty-details.php');
    // } else {
    //     $_SESSION['status'] = "Error deleting faculty:   $faculty_name" . mysqli_error($conn);
    //     $_SESSION['status_code'] = "error";
    //     header('Location: faculty-details.php');
    // }

    exit();
}

?>


