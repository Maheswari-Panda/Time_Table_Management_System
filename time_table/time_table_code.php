
<?php
include("../includes/connect.php");

if (isset($_POST['time_table_add_btn'])) {
    // Collect form data
    $time_slot_id = $_POST['department'];
    $location_id = $_POST['location'];
    $day_id = $_POST['day']; 
    $subject_id = $_POST['subject-list'];
    $teacher_id = $_POST['teacher'];
    $batch_id = isset($_POST['batch']) ? $_POST['batch'] : 1;
    $division_id = $_POST['division'];
    $class_id = $_POST['semester_year']; // Assuming this is semester/year or Class_Id
    $program_id = $_POST['program'];
    $department_id = $_POST['department'];
    $faculty_id = $_POST['faculty'];
    $duration_id = $_POST['time_slot']; // Assuming this is the same as time_slot
    $subject_type = $_POST['subject_type']; // Lab, Lecture, Tutorial

    $batch_id = isset($_POST['batch']) ? $_POST['batch'] : 1;


    // Construct the SQL query to insert data into the time_table
    $sql = "INSERT INTO time_table (Time_Slot_Id, Location_Id, Subject_Id, Teacher_Id, Batch_Id, Division_Id, Semester_Id, Program_Id, Department_Id, Faculty_Id, Duration_Id, subject_type,day_id) 
            VALUES ('$time_slot_id', '$location_id', '$subject_id', '$teacher_id', '$batch_id', '$division_id', '$class_id', '$program_id', '$department_id', '$faculty_id', '$duration_id', '$subject_type','$day_id')";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if insertion was successful
    if ($result) {
        $_SESSION['status'] = "Time Table Entry Added Successfully!";
        $_SESSION['status_code'] = "success";
        header('Location: ../time_table/time_table_details.php'); // Redirect to a success page or details page
    } else {
        $_SESSION['status'] = "Error: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../time_table/time_table_add.php'); // Redirect back to the form in case of error
    }
    exit();
}

// Handle deleting a teacher
if (isset($_POST['delete_btn_set'])) {
    $delete_time_table_id = $_POST['delete_id'];
    
    $sql = "DELETE FROM time_table WHERE time_table_id = '$delete_time_table_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Time table entry deleted successfully.";
        $_SESSION['status_code'] = "success";
        header('Location: ../time_table/time_table_details.php');
    } else {
        $_SESSION['status'] = "Error deleting time table entry: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../time_table/time_table_details.php');
    }
    exit();
}




function checkTeacherConflict($conn, $day_name, $time_slot_id, $teacher_id) {
    // Query to check if the teacher is already assigned in the given time slot on that day
    $query = "
        SELECT * FROM time_table
        WHERE Day_Name = '$day_name' 
        AND Time_Slot_ID = '$time_slot_id' 
        AND Teacher_ID = '$teacher_id'
    ";
    $result = mysqli_query($conn, $query);
    
    // Return true if there's a conflict (i.e., a matching record exists)
    return mysqli_num_rows($result) > 0;
}
?>