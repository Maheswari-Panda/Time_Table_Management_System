<?php include("subject-code.php")?>
<?php include("../includes/header.php")?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <h4> Subject Register </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="subject-code.php">

                        <!-- Subject Code -->
                        <div class="mb-3">
                            <label for="subject_code" class="form-label">Subject Code</label>
                            <input type="text" class="form-control" id="subject_code" name="subject_code" required>
                        </div>

                        <!-- Subject Name -->
                        <div class="mb-3">
                            <label for="subject_name" class="form-label">Subject Name</label>
                            <input type="text" class="form-control" id="subject_name" name="subject_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="is_elective" class="form-label">Is Elective</label>
                            <div>
                                <input type="radio" id="elective_yes" name="is_elective" value="1" onclick="toggleElectiveFields(true)" required>
                                <label for="elective_yes">Yes</label>

                                <input type="radio" id="elective_no" name="is_elective" value="0" checked onclick="toggleElectiveFields(false)" required>
                                <label for="elective_no">No</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="elective_code" class="form-label">Elective Code</label>
                            <input type="text" class="form-control" id="elective_code" name="elective_code" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="elective_name" class="form-label">Elective Name</label>
                            <input type="text" class="form-control" id="elective_name" name="elective_name" disabled>
                        </div>

                        <!-- Is Lecture (Radio Button) -->
                        <div class="mb-3">
                            <label class="form-label">Is Lecture</label><br>
                            <input type="radio" id="is_lecture_yes" name="is_lecture" value="1" checked required> 
                            <label for="is_lecture_yes">Yes</label>
                            <input type="radio" id="is_lecture_no" name="is_lecture" value="0" required> 
                            <label for="is_lecture_no">No</label>
                        </div>

                        <!-- Is Lab (Radio Button) -->
                        <div class="mb-3">
                            <label class="form-label">Is Lab</label><br>
                            <input type="radio" id="is_lab_yes" name="is_lab" value="1" checked required> 
                            <label for="is_lab_yes">Yes</label>
                            <input type="radio" id="is_lab_no" name="is_lab" value="0" required> 
                            <label for="is_lab_no">No</label>
                        </div>

                        <!-- Is Tutorial (Radio Button) -->
                        <div class="mb-3">
                            <label class="form-label">Is Tutorial</label><br>
                            <input type="radio" id="is_tutorial_yes" name="is_tutorial" value="1" required> 
                            <label for="is_tutorial_yes">Yes</label>
                            <input type="radio" id="is_tutorial_no" name="is_tutorial" checked value="0" required> 
                            <label for="is_tutorial_no">No</label>
                        </div>

                        <!-- Semester ID (Dropdown) -->
                        <div class="mb-3">
                            <label for="semester_id" class="form-label">Semester</label>
                            <select id="semester_id" name="semester_id" class="form-control" required>
                                <option value="">--Select Semester--</option>
                                <?php 
                                    // SQL query to select all semesters
                                    $sql = "SELECT * FROM `semester`";
                                    $result = mysqli_query($conn, $sql);
                                    
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$row['Semester_Id'].'">'.$row['Semester_Name'].'</option>';
                                        }
                                    } else {
                                        echo "<option value=''>No Semesters found.</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <!-- Class ID (Dropdown) -->
                        <div class="mb-3">
                            <label for="class_id" class="form-label">Class</label>
                            <select id="class_id" name="class_id" class="form-control" required>
                                <option value="">--Select Class--</option>
                                <?php 
                                    // SQL query to select all classes
                                    $sql = "SELECT * FROM `class_semester`";
                                    $result = mysqli_query($conn, $sql);
                                    
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$row['Class_Id'].'">'.$row['Class_Name'].'</option>';
                                        }
                                    } else {
                                        echo "<option value=''>No Classes found.</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-3">
                            <a href="subject-details.php" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary" name="subject-add-btn">Add Subject</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // Function to enable/disable elective fields
    function toggleElectiveFields(isElective) {
        document.getElementById('elective_code').disabled = !isElective;
        document.getElementById('elective_name').disabled = !isElective;
    }

    // Ensure fields are disabled initially
    window.onload = function() {
        toggleElectiveFields(false);  // Initially disable elective fields
    }
</script>
<?php include("../includes/footer.php")?>
