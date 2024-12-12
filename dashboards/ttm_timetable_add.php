<?php include("ttm_timetable_code.php") ?>
<?php include("../includes/ttm-header.php") ?>

<div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between bg-dark text-light">
                            <h4>Add Time Table Entry</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="../dashboards/ttm_timetable_add.php">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="faculty" class="form-label">Select Faculty</label>
                                        <select id="faculty" name="faculty" class="form-select">
                                            <option selected value="">--Choose Faculty--</option>
                                            <?php
                                            $sql = "SELECT * FROM faculty";
                                            $result = mysqli_query($conn, $sql);

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='{$row['faculty_id']}'>{$row['faculty_name']}</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="department" class="form-label">Select Department</label>
                                        <select id="department" name="department" class="form-select">
                                            <option selected value="">--Choose Department--</option>
                                            <!-- Add department options here -->
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="elective" class="form-label">Subject IsElective?</label>
                                        <select id="elective" name="elective" class="form-select" onchange="fetchSubjects()">
                                            <option selected>-- Choose Elective or not --</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="program-type" class="form-label">Select Program Type</label>
                                        <select id="program-type" name="program-type" class="form-select">
                                            <option selected>--Choose Program Type--</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6" id="subject_list">
                                    <label for="subject-list" class="form-label">Subject List</label>
                                        <select id="subject-list" name="subject-list" class="form-select" onchange="fetchTeacherAndDepartment()">
                                            <option selected>-- Select Subject --</option>
                                        </select>
                                    </div>
                                    
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="program" class="form-label">Select Program</label>
                                        <select id="program" name="program" class="form-select">
                                            <option selected>--Choose Program--</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="teacher-department" class="form-label">Select Department (for Teacher)</label>
                                        <select id="teacher_department" name="teacher_department" class="form-select">
                                            <option selected>--Choose Department for Teacher--</option>
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
                                        <select id="semester_year" name = "semester_year"class="form-select" onchange="fetchSubjects()">
                                            <option selected>--Choose Semester/Year--</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="teacher" class="form-label">Select Teacher</label>
                                        <select id="teacher" name="teacher" class="form-select">
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
                                        <div id="teacher_conflict_message"></div>

                                    </div>
                                    
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="division" class="form-label">Select Division</label>
                                        <select id="division" name="division" class="form-select">
                                            <option selected>--Choose Division--</option>
                                        </select>

                                        <div id="division_conflict_message"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="day" class="form-label">Select Day</label>
                                        <select id="day" name="day" class="form-select">
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
                                        <div id="day_conflict_message"></div>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="subject_type" class="form-label">Select Subject Type</label>
                                        <select id="subject_type" name="subject_type"class="form-select">
                                            <option selected>--Choose Subject Type--</option>
                                            <!-- Add subject type options here -->
                                            <option value="Lab">Lab</option>
                                            <option value="lecture">Lecture</option>
                                            <option value="tutorial">Tutorial</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="time_slot" class="form-label">Select Time Slot</label>
                                        <select id="time_slot" name="time_slot" class="form-select">
                                            <option selected>Choose Time</option>
                                            <!-- Add batch options here -->
                                            <?php
                                            $sql = "SELECT * FROM slot_durations";
                                            $result = mysqli_query($conn, $sql);

                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value='{$row['duration_id']}'>{$row['start_time']} - {$row['end_time']}</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        <div id="time_slot_conflict_message"></div>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="batch" class="form-label">Select Batch</label>
                                        <select id="batch" name="batch" class="form-select">
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

                                        <div id="batch_conflict_message"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="location" class="form-label">Select Location</label>
                                        <select id="location" name="location" class="form-select">
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
                                        
                                        <div id="location_conflict_message"></div>
                                    </div>
                                    
                                </div>

                                <!-- <div id="conflictMessage"></div> -->

                                <div class="d-flex justify-content-between">
                                        <a href="../dashboards/ttm_timetable_details.php" class="btn btn-secondary">Back</a>
                                        <button type="submit" class="btn btn-primary " name="time_table_add_btn">Save Entry</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script>

document.addEventListener('DOMContentLoaded', function () {
    var subjectTypeSelect = document.getElementById('subject_type');
    var batchSelect = document.getElementById('batch');

    subjectTypeSelect.addEventListener('change', function () {
        var subjectType = subjectTypeSelect.value;

        // Toggle the disabled state based on whether "Lab" is selected
        if (subjectType !== 'Lab') {
            batchSelect.disabled = true;
        } else {
            batchSelect.disabled = false;
        }

        // Log for debugging
        console.log("Subject Type: " + subjectType);
        console.log("Batch Dropdown Disabled: " + batchSelect.disabled);
    });
});

// fetch subjects based on the selected semester
function fetchSubjects() {
    // Get the selected values from the dropdowns
    let semester = document.getElementById('semester_year').value;
    let elective = document.getElementById('elective').value;

    console.log("Semester selected:", semester);
    console.log("Elective selected:", elective);


    // Check if both dropdowns have valid selections
    if (semester !== "--Choose Semester/Year--" && elective !== "-- Choose Elective or not --") {
        // Make the AJAX call only if both selections are made
        console.log("Semester:", semester, "Elective:", elective);
        
        let xhr = new XMLHttpRequest();
        xhr.open('GET', `../fetch/fetch_subjects.php?semester=${semester}&elective=${elective}`, true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                let subjects = JSON.parse(xhr.responseText);
                let subjectDropdown = document.getElementById('subject-list');
                
                // Clear previous options
                subjectDropdown.innerHTML = '<option selected>-- Select Subject --</option>';
                
                // Add new options
                subjects.forEach(subject => {
                    let option = document.createElement('option');
                    option.value = subject.Subject_Id;
                    option.textContent = subject.Subject_Name;
                    subjectDropdown.appendChild(option);
                });
            }
        };
        xhr.send();
    } else {
        console.log("Please select both semester and elective");
    }
};

</script>

<?php include("../includes/footer.php") ?>