<?php
include("../includes/connect.php");

// Add Location
if (isset($_POST['location-add-btn'])) {
    $location_name = $_POST['location_name'];
    $location_code = $_POST['location_code'];
    $location_description = $_POST['location_description'];
    $capacity = $_POST['capacity'];
    $department_id = $_POST['department_id'];

    $sql = "INSERT INTO location (Location_Name, Location_Code, Location_Description, Capacity, Department_Id) 
            VALUES ('$location_name', '$location_code', '$location_description', '$capacity', '$department_id')";

    
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Location $location_name added successfully.";
        $_SESSION['status_code'] = "success";

        header('Location: ../location/location-details.php');
    } else {
        $_SESSION['status'] = "Error adding location: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../location/location-add.php');
    }
    exit();
}

// Edit Location
if (isset($_POST['location-update-btn'])) {
    $location_id = $_POST['location_update_id'];
    $location_name = $_POST['location_name'];
    $location_code = $_POST['location_code'];
    $location_description = $_POST['location_description'];
    $capacity =  $_POST['capacity'];
    $department_id =  $_POST['department_id'];

    $sql = "UPDATE location SET 
            Location_Name='$location_name', 
            Location_Code='$location_code', 
            Location_Description='$location_description', 
            Capacity='$capacity', 
            Department_Id='$department_id' 
            WHERE Location_Id='$location_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Location $location_name updated successfully.";
        $_SESSION['status_code'] = "success";

        header('Location: ../location/location-details.php');
    } else {
        $_SESSION['status'] = "Error updating location: " . mysqli_error($conn);
        $_SESSION['status_code'] = "error";
        header('Location: ../location/location-edit.php');
    }
}


if(isset($_POST['delete_btn_set'])){
    $delete_location_id = $_POST['delete_id'];
    $sql = "DELETE FROM location WHERE location_id='$delete_location_id'";
    $result=mysqli_query($conn,$sql);

    exit();
}


?>