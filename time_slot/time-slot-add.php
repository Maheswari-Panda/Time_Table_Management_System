<?php include("time-slot-code.php")?>
<?php include("../includes/header.php")?>

<div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between bg-dark text-light">
                            <h4>Add Time Slot</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="time-slot-code.php">
                                <div class="mb-3">
                                    <label for="time_slot_from" class="form-label">Time Slot From</label>
                                    <input type="time" class="form-control" id="time_slot_from" name="time_slot_from" required>
                                </div>
                                <div class="mb-3">
                                    <label for="time_slot_to" class="form-label">Time Slot To</label>
                                    <input type="time" class="form-control" id="time_slot_to" name="time_slot_to" required>
                                </div>

                                <div class="mb-3">
                                    <label for="department_id" class="form-label">Department</label>
                                    <select id="department_id" name="department_id" class="form-control" required>
                                        
                                    <option default value="">--Select Department--</option>
                                        <?php 
                                            $sql = "SELECT department_id, faculty_code, department_name FROM department JOIN faculty ON department.faculty_id = faculty.faculty_id;";
                                            $result = mysqli_query($conn, $sql);
                                            
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $department_id = $row['department_id'];
                                                    $faculty_code = $row['faculty_code'];
                                                    $department_name = $row['department_name'];
                                                    // Dropdown option with department_id as value and faculty_code + department_name as the label
                                                    echo "<option value='$department_id'>$faculty_code - $department_name</option>";
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
                                    <button type="submit" class="btn btn-primary" name="time-slot-add-btn">Add TimeSlot</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php include("../includes/footer.php")?>
