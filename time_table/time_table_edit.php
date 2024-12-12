<?php include("../time_table/time_table_code.php") ?>
<?php include("../includes/header.php") ?>

<?php
$time_table_id=$_GET['time_table_id'];
$sql = "SELECT * FROM `time_table` WHERE `time_table_id`=$time_table_id";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
// echo 'NUMBERS OF RECORDS : '.$num.'<br>';

if($num>0){
    while($row = mysqli_fetch_array($result)){
?>
<div class="container mt-5">
    <h4 class="mb-4">Update Time Table Entry</h4>
    <form>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="faculty" class="form-label">Select Faculty</label>
                <select id="faculty" class="form-select">
                    <option selected value="">--Choose Faculty--</option>
                    <?php
                    $sql = "SELECT * FROM faculty";
                    $result = mysqli_query($conn, $sql);
                    while ($faculty = mysqli_fetch_assoc($result)) {
                        $selected = $row['Faculty_Id'] == $faculty['faculty_id'] ? 'selected' : '';
                        echo "<option value='{$faculty['faculty_id']}' $selected>{$faculty['faculty_name']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="department" class="form-label">Select Department</label>
                <select id="department" class="form-select">
                    <option selected value="">--Choose Department--</option>
                    <!-- Add department options here -->
                </select>
            </div>
            <div class="col-md-6">
                <label for="day" class="form-label">Select Day</label>
                <select id="day" class="form-select">
                    <option selected>--Choose Day--</option>
                    <!-- Add day options here -->
                    <?php
                    $sql = "SELECT * FROM Days";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['Day_Id']}'>{$row['Day_Name']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="program-type" class="form-label">Select Program Type</label>
                <select id="program-type" class="form-select">
                    <option selected>--Choose Program Type--</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="elective" class="form-label">Subject IsElective?</label>
                <select id="elective" class="form-select" onchange="fetchSubjects()">
                    <option selected>-- Choose Elective or not --</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="program" class="form-label">Select Program</label>
                <select id="program" class="form-select">
                    <option selected>--Choose Program--</option>
                </select>
            </div>
            <div class="col-md-6" id="subject_list">
                <label for="subject-list" class="form-label">Subject List</label>
                <select id="subject-list" class="form-select" onchange="fetchTeacherAndDepartment()">
                    <option selected>-- Select Subject --</option>
                </select>
            </div>
            <!--
            <div class="col-md-6">
                <label for="subject-list" class="form-label">Subject List</label>
                <select id="subject-list" class="form-select">
                    <option selected>-- Select Subject --</option>
                </select>
            </div>-->
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="semester_year" class="form-label">Select Semester/Year</label>
                <select id="semester_year" class="form-select" onchange="fetchSubjects()">
                    <option selected>--Choose Semester/Year--</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="teacher-department" class="form-label">Select Department (for Teacher)</label>
                <select id="teacher_department" class="form-select">
                    <option selected>--Choose Department for Teacher--</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="division" class="form-label">Select Division</label>
                <select id="division" class="form-select">
                    <option selected>--Choose Division--</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="teacher" class="form-label">Select Teacher</label>
                <select id="teacher" class="form-select">
                    <option selected>--Choose Teacher--</option>
                    <!-- Add teacher options here -->
                    <?php
                    $sql = "SELECT * FROM teacher";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['Teacher_Id']}'>{$row['Teacher_Name']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="subject-type" class="form-label">Select Subject Type</label>
                <select id="subject-type" class="form-select" onchange="updateTimeSlot(); toggleBatchDropdown();">
                    <option selected>--Choose Subject Type--</option>
                    <!-- Add subject type options here -->
                    <option value="lab">Lab</option>
                    <option value="lecture">Lecture</option>
                    <option value="tutorial">Tutorial</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="location" class="form-label">Select Location</label>
                <select id="location" class="form-select">
                    <option selected>--Choose Location--</option>
                    <!-- Add location options here -->
                    <?php
                    $sql = "SELECT * FROM location";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['Location_Id']}'>{$row['Location_Name']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="batch" class="form-label">Select Batch</label>
                <select id="batch" class="form-select">
                    <option selected>Choose Batch</option>
                    <!-- Add batch options here -->
                    <?php
                    $sql = "SELECT DISTINCT Batch_Name FROM batch";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['Batch_Id']}'>{$row['Batch_Name']}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="time_slot" class="form-label">Select Time Slot</label>
                <select id="time_slot" name="time_slot" class="form-select">
                    <option selected>Choose Time</option>
                    <!-- Add batch options here -->
                    <?php
                    $duration_id=$row['duration_id'];
                    $sql = "SELECT * FROM slot_durations";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($time_slot = mysqli_fetch_assoc($result)) {
                            
                            $selected = $duration_id == $time_slot['duration_id'] ? 'selected' : '';
                            echo '<option value="'.$time_slot['duration_id'].'" $selected>'.$time_slot['start_time'].'-'.$row['end_time'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>


            <!-- <div class="col-md-6">
                <label for="time-slot" class="form-label">Select Time Slot</label>
                <select id="time-slot" class="form-select">
                    <option selected>Choose Time</option>
                    
                </select>
            </div>
        </div>-->

            <div class="d-flex justify-content-between">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
</div>

<?php
    }
}
else{
    echo "No Data Found by this Program Id";
}
?>

<?php include("../includes/footer.php") ?>