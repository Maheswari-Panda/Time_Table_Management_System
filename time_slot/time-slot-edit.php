<?php include("time-slot-code.php")?>
<?php include("../includes/header.php")?>

<?php
$time_slot_id=$_GET['time_slot_id'];
$sql = "SELECT * FROM `time_slot` WHERE `time_slot_id`=$time_slot_id";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
// echo 'NUMBERS OF RECORDS : '.$num.'<br>';

if($num>0){
    while($row = mysqli_fetch_array($result)){
?>
<div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between bg-dark text-light">
                            <h4>Add Time Slot</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="time-slot-code.php">
                            <input type="hidden" value="<?php echo $row['Time_Slot_Id'] ?>" name="time_slot_update_id" >
                                <div class="mb-3">
                                    <label for="time_slot_from" class="form-label">Time Slot From</label>
                                    <input type="time" class="form-control" id="time_slot_from" name="time_slot_from" value="<?php echo $row['Time_Slot_From'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="time_slot_to" class="form-label">Time Slot To</label>
                                    <input type="time" class="form-control" id="time_slot_to" name="time_slot_to" value="<?php echo $row['Time_Slot_To'] ?>" required>
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
                                    <a href="time-slot-details.php" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="time-slot-update-btn">Update TimeSlot</button>
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
    echo "No Data Found by this Program Id";
}
?>

<?php include("../includes/footer.php")?>
