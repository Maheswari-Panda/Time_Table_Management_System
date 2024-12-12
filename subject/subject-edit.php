<?php include("subject-code.php") ?>
<?php include("../includes/header.php") ?>

<?php
// Get the subject_id from the URL
$subject_id = $_GET['subject_id'];

// SQL to fetch the subject details using the subject_id
$sql = "SELECT * FROM `subject` WHERE `Subject_Id` = '$subject_id'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

if ($num > 0) {
    while ($row = mysqli_fetch_array($result)) {
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <h4>Subject Edit</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="subject-code.php">

                        <!-- Hidden input to store subject ID -->
                        <input type="hidden" value="<?php echo $row['Subject_Id'] ?>" name="subject_update_id">

                        <div class="mb-3">
                            <label for="subject_code" class="form-label">Subject Code</label>
                            <input type="text" class="form-control" id="subject_code" name="subject_code" value="<?php echo $row['Subject_Code'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="subject_name" class="form-label">Subject Name</label>
                            <input type="text" class="form-control" id="subject_name" name="subject_name" value="<?php echo $row['Subject_Name'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="is_elective" class="form-label">Is Elective</label>
                            <div>
                                <input type="radio" id="elective_yes" name="is_elective" value="1" <?php echo ($row['Is_Elective'] == 1) ? 'checked' : '' ?> required onclick="toggleElectiveFields(true)">
                                <label for="elective_yes">Yes</label>

                                <input type="radio" id="elective_no" name="is_elective" value="0" <?php echo ($row['Is_Elective'] == 0) ? 'checked' : '' ?> required onclick="toggleElectiveFields(false)">
                                <label for="elective_no">No</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="elective_code" class="form-label">Elective Code</label>
                            <input type="text" class="form-control" id="elective_code" name="elective_code" value="<?php echo $row['Elective_Code'] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="elective_name" class="form-label">Elective Name</label>
                            <input type="text" class="form-control" id="elective_name" name="elective_name" value="<?php echo $row['Elective_Name'] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="is_lecture" class="form-label">Is Lecture</label>
                            <div>
                                <input type="radio" id="lecture_yes" name="is_lecture" value="1" <?php echo ($row['Is_Lecture'] == 1) ? 'checked' : '' ?> required>
                                <label for="lecture_yes">Yes</label>

                                <input type="radio" id="lecture_no" name="is_lecture" value="0" <?php echo ($row['Is_Lecture'] == 0) ? 'checked' : '' ?> required>
                                <label for="lecture_no">No</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="is_lab" class="form-label">Is Lab</label>
                            <div>
                                <input type="radio" id="lab_yes" name="is_lab" value="1" <?php echo ($row['Is_Lab'] == 1) ? 'checked' : '' ?> required>
                                <label for="lab_yes">Yes</label>

                                <input type="radio" id="lab_no" name="is_lab" value="0" <?php echo ($row['Is_Lab'] == 0) ? 'checked' : '' ?> required>
                                <label for="lab_no">No</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="is_tutorial" class="form-label">Is Tutorial</label>
                            <div>
                                <input type="radio" id="tutorial_yes" name="is_tutorial" value="1" <?php echo ($row['Is_Tutorial'] == 1) ? 'checked' : '' ?> required>
                                <label for="tutorial_yes">Yes</label>

                                <input type="radio" id="tutorial_no" name="is_tutorial" value="0" <?php echo ($row['Is_Tutorial'] == 0) ? 'checked' : '' ?> required>
                                <label for="tutorial_no">No</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="semester_id" class="form-label">Semester</label>
                            <select id="semester_id" name="semester_id" class="form-control" required>
                                <option value="">--Select Semester--</option>
                                <?php 
                                    $sql_semester = "SELECT * FROM `semester`";
                                    $result_semester = mysqli_query($conn, $sql_semester);
                                    
                                    if (mysqli_num_rows($result_semester) > 0) {
                                        while ($semester = mysqli_fetch_assoc($result_semester)) {
                                            $selected_semester = ($semester['Semester_Id'] == $row['Semester_Id']) ? 'selected' : '';
                                            echo '<option value="' . $semester['Semester_Id'] . '" ' . $selected_semester . '>' . $semester['Semester_Name'] . '</option>';
                                        }
                                    } else {
                                        echo "<option value=''>No semesters found.</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="class_id" class="form-label">Class</label>
                            <select id="class_id" name="class_id" class="form-control" required>
                                <option value="">--Select Class--</option>
                                <?php 
                                    $sql_class = "SELECT * FROM `class_semester`";
                                    $result_class = mysqli_query($conn, $sql_class);
                                    
                                    if (mysqli_num_rows($result_class) > 0) {
                                        while ($class = mysqli_fetch_assoc($result_class)) {
                                            $selected_class = ($class['Class_Id'] == $row['Class_Id']) ? 'selected' : '';
                                            echo '<option value="' . $class['Class_Id'] . '" ' . $selected_class . '>' . $class['Class_Name'] . '</option>';
                                        }
                                    } else {
                                        echo "<option value=''>No classes found.</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <a href="subject-details.php" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary" name="subject-update-btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php     
    }
} else {
    echo "No Data Found for this Subject ID";
}
?>


<script>
    // Function to enable/disable elective fields
    function toggleElectiveFields(isElective) {
        document.getElementById('elective_code').disabled = !isElective;
        document.getElementById('elective_name').disabled = !isElective;
    }

    // On page load, check which radio button is selected and set fields accordingly
    window.onload = function() {
        var isElective = document.querySelector('input[name="is_elective"]:checked').value;
        toggleElectiveFields(isElective == 1);  // If elective is 'yes', pass true, else pass false
    }
</script>
<?php include("../includes/footer.php") ?>
