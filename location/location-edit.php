<?php include("location-code.php")?>
<?php include("../includes/header.php")?>

<?php
$location_id=$_GET['location_id'];
$sql = "SELECT * FROM `location` WHERE `location_id`=$location_id";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
// echo 'NUMBERS OF RECORDS : '.$num.'<br>';

if($num>0){
    while($row = mysqli_fetch_array($result)){
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <h4>Add Location</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="location-code.php">
                        
                        <input type="hidden" value="<?php echo $row['Location_Id'] ?>" name="location_update_id" >
                        <div class="mb-3">
                            <label for="location_name" class="form-label">Location Name</label>
                            <input type="text" class="form-control" id="location_name" name="location_name" value="<?php echo $row['Location_Name'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="location_code" class="form-label">Location Code</label>
                            <input type="text" class="form-control" id="location_code" name="location_code" value="<?php echo $row['Location_Code'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="location_description" class="form-label">Location Description</label>
                            <textarea class="form-control" id="location_description" name="location_description" required><?php echo $row['Location_Description']?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="capacity" class="form-label">Capacity</label>
                            <input type="number" class="form-control" id="capacity" name="capacity" value="<?php echo $row['Capacity'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="department_id" class="form-label">Department</label>
                            <select id="department_id" name="department_id" class="form-control" required>
                            <option default value="">--Select Department--</option>
                                        <?php 
                                            $sql = "SELECT department_id, faculty_code, department_name FROM department JOIN faculty ON department.faculty_id = faculty.faculty_id;";
                                            $result = mysqli_query($conn, $sql);
                                            
                                            if ($result->num_rows > 0) {
                                                while ($dept = $result->fetch_assoc()) {
                                                    $department_id = $dept['department_id'];
                                                    $faculty_code = $dept['faculty_code'];
                                                    $department_name = $dept['department_name'];
                                                    // Dropdown option with department_id as value and faculty_code + department_name as the label

                                                    $selected = ($dept['department_id'] == $row['Department_Id']) ? 'selected' : '';
        
                                                    echo '<option value="' .$dept['department_id'] . '" ' . $selected . '>' . $dept['faculty_code'] . ' - '.$dept['department_name'].'</option>';

                                                    // echo "<option value='$department_id'>$faculty_code - $department_name</option>";
                                                }
                                            }
                                            else {
                                                echo "No departments available";
                                            }
                                        ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <a href="location-details.php" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary" name="location-update-btn">Update Location</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
<?php     
    }
}
else{
    echo "No Data Found by this Location Id";
}
?>


<?php include("../includes/footer.php")?>
