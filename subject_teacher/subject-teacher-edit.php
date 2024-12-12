<?php include("subject-teacher-code.php")?>
<?php include("../includes/header.php")?>

<?php
$subject_teacher_id = $_GET['subject_teacher_id'];
$sql = "SELECT st.*, s.subject_code, s.subject_name, t.teacher_name 
        FROM subject_teacher st 
        JOIN subject s ON st.subject_id = s.subject_id 
        JOIN teacher t ON st.teacher_id = t.teacher_id 
        WHERE st.subject_teacher_id = $subject_teacher_id";
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
                            <h4>Edit Subject-Teacher Assignment</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="subject-teacher-code.php">
                                <input type="hidden" value="<?php echo $row['Subject_Teacher_Id'] ?>" name="subject_teacher_update_id">

                                <!-- Subject Dropdown -->
                                <div class="mb-3">
                                    <label for="subject_id" class="form-label">Subject</label>
                                    <select id="subject_id" name="subject_id" class="form-control" required>
                                        <option default value="">--Select Subject--</option>
                                        <?php 
                                            $sql_subjects = "SELECT subject_id, subject_code, subject_name FROM subject";
                                            $result_subjects = mysqli_query($conn, $sql_subjects);

                                            if ($result_subjects->num_rows > 0) {
                                                while ($subject = $result_subjects->fetch_assoc()) {
                                                    $subject_id = $subject['subject_id'];
                                                    $subject_code = $subject['subject_code'];
                                                    $subject_name = $subject['subject_name'];
                                                    $selected = ($subject_id == $row['Subject_Id']) ? 'selected' : '';
                                                    echo "<option value='$subject_id' $selected>$subject_code - $subject_name</option>";
                                                }
                                            } else {
                                                echo "<option disabled>No subjects available</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <!-- Teacher Dropdown -->
                                <div class="mb-3">
                                    <label for="teacher_id" class="form-label">Teacher</label>
                                    <select id="teacher_id" name="teacher_id" class="form-control" required>
                                        <option default value="">--Select Teacher--</option>
                                        <?php 
                                            $sql_teachers = "SELECT teacher_id, teacher_name FROM teacher";
                                            $result_teachers = mysqli_query($conn, $sql_teachers);

                                            if ($result_teachers->num_rows > 0) {
                                                while ($teacher = $result_teachers->fetch_assoc()) {
                                                    $teacher_id = $teacher['teacher_id'];
                                                    $teacher_name = $teacher['teacher_name'];
                                                    $selected = ($teacher_id == $row['Teacher_Id']) ? 'selected' : '';
                                                    echo "<option value='$teacher_id' $selected>$teacher_name</option>";
                                                }
                                            } else {
                                                echo "<option disabled>No teachers available</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <!-- Submit Button -->
                                <div class="mb-3">
                                    <a href="subject-teacher-details.php" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="subject-teacher-update-btn">Update Assignment</button>
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
    echo "No Data Found for this Subject-Teacher Assignment";
}
?>

<?php include("../includes/footer.php")?>
