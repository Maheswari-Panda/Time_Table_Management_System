<?php include("subject-teacher-code.php")?>
<?php include("../includes/header.php")?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <h4>Assign Teacher to Subject</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="subject-teacher-code.php">
                        
                        <!-- Subject Dropdown -->
                        <div class="mb-3">
                            <label for="subject_id" class="form-label">Subject</label>
                            <select id="subject_id" name="subject_id" class="form-control" required>
                                <option default value="">--Select Subject--</option>
                                <?php 
                                    $sql = "SELECT subject_id, subject_code, subject_name FROM subject";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $subject_id = $row['subject_id'];
                                            $subject_code = $row['subject_code'];
                                            $subject_name = $row['subject_name'];
                                            echo "<option value='$subject_id'>$subject_code - $subject_name</option>";
                                        }
                                    } else {
                                        echo "No subjects available";
                                    }
                                ?>
                            </select>
                        </div>

                        <!-- Department Dropdown -->
                        <div class="mb-3">
                            <label for="department_id" class="form-label">Department</label>
                            <select id="department_id" name="department_id" class="form-control" onchange="fetchTeachers()" required>
                                <option default value="">--Select Department--</option>
                                <?php 
                                    $sql = "SELECT department_id, faculty_code, department_name FROM department JOIN faculty ON department.faculty_id = faculty.faculty_id";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $department_id = $row['department_id'];
                                            $faculty_code = $row['faculty_code'];
                                            $department_name = $row['department_name'];
                                            echo "<option value='$department_id'>$faculty_code - $department_name</option>";
                                        }
                                    } else {
                                        echo "No departments available";
                                    }
                                ?>
                            </select>
                        </div>

                        <!-- Teacher Dropdown (Populated via AJAX based on selected department) -->
                        <div class="mb-3">
                            <label for="teacher_id" class="form-label">Teacher</label>
                            <select id="teacher_id" name="teacher_id" class="form-control" required>
                                <option default value="">--Select Teacher--</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-3">
                            <a href="subject-teacher-details.php" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary" name="subject-teacher-add-btn">Assign Teacher</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery for AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
function fetchTeachers() {
    var departmentId = $('#department_id').val(); // Get selected department_id
    if (departmentId) {
        $.ajax({
            url: '../fetch/fetch_teachers.php', // The PHP script that handles the request
            type: 'POST',
            data: { tdepartment_id: departmentId },
            dataType: 'json',
            success: function(response) {
                var $teacherSelect = $('#teacher_id');
                $teacherSelect.empty();
                $teacherSelect.append('<option selected value="">--Choose Teacher--</option>');
                $.each(response, function(index, teacher) {
                    $teacherSelect.append('<option value="' + teacher.Teacher_Id + '">' + teacher.Teacher_Name + '</option>');
                });
            },
            error: function() {
                alert('Could not fetch teachers. Please try again.');
            }
        });
    } else {
        alert('Please select a department.');
    }
}

</script>

<?php include("../includes/footer.php")?>
