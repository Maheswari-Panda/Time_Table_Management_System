
<?php
include("../includes/connect.php");

if(isset($_POST['academic-add-btn'])){
    $academic_year = $_POST['academic_year'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $faculty_id = $_POST['faculty_id'];

    $sql = "INSERT INTO `academic_year` (`academic_year_id`, `academic_year_from`,`academic_year_to`,`faculty_id`) VALUES ('$academic_year', '$from_date','$to_date', '$faculty_id')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "$academic_year added successfully.";
        $_SESSION['status_code'] = "success";

        header('Location: ../academic_year/academic-details.php');
    } else {
        $_SESSION['status'] = "Error adding academic_year: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../academic_year/academic-add.php');

    }
    exit();
}


if(isset($_POST['academic-update-btn'])){
    $academic_id = $_POST['academic_update_id'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $faculty_id = $_POST['faculty_id'];
    $academic_year = $_POST['academic_year'];

    $sql = "UPDATE `academic_year` SET `academic_year_id` = '$academic_year_id', `academic_year_from` = '$from_date', `academic_year_to` = '$to_date', `faculty_id` = $faculty_id WHERE `academic_year_id` = '$academic_id'";

    $result = mysqli_query($conn, $sql);

    $my_query= "SELECT `faculty_name` FROM `faculty` WHERE `faculty_id`= '$faculty_id'";
    $faculty_name = mysqli_query($conn, $my_query);
    $row = mysqli_fetch_assoc($faculty_name);

    if ($result) {
        $_SESSION['status'] = "Academic Year $academic_year of ".$row['faculty_name']." updated successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: academic-details.php');
    } else {
        $_SESSION['status'] = "Error updating academic_year: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: academic-edit.php');
    }

    exit();
}


if(isset($_POST['delete_btn_set'])){
    $delete_academic_id = $_POST['delete_id'];
    $sql = "DELETE FROM academic_year WHERE academic_year_id='$delete_academic_id'";
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