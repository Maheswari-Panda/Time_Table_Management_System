<?php include("class-semester-code.php")?>
<?php include("../includes/header.php")?>
        
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card ">
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <h4> Class Semester Register</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="class-semester-code.php">

                        <!-- Faculty Dropdown -->
                        <div class="mb-3">
                            <label for="faculty_id" class="form-label">Select Faculty</label>
                            <select id="faculty_id" name="faculty_id" class="form-control" required>
                                <option value="">--Select Faculty--</option>
                                <?php 
                                    $sql = "SELECT faculty_id, faculty_code,faculty_name FROM faculty";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='{$row['faculty_id']}'>{$row['faculty_code']} - {$row['faculty_name']}</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <!-- Department Dropdown (Populated based on faculty) -->
                        <div class="mb-3">
                            <label for="department_id" class="form-label">Select Department</label>
                            <select id="department_id" name="department_id" class="form-control" required>
                                <option value="">--Select Department--</option>
                            </select>
                        </div>

                        <!-- Program Dropdown (Populated based on department) -->
                        <div class="mb-3">
                            <label for="program_id" class="form-label">Select Program</label>
                            <select id="program_id" name="program_id" class="form-control" required>
                                <option value="">--Select Program--</option>
                            </select>
                        </div>

                        
                        <!-- Semester Dropdown (As you had before) -->
                        <div class="mb-3">
                            <label for="semester_id" class="form-label">Select Semester</label>
                            <select id="semester_id" name="semester_id" class="form-control" required>
                                <option value="">--Select Semester--</option>
                            </select>
                        </div>         

                        <!-- Class Dropdown (Populated based on program) -->
                        <div class="mb-3">
                            <label for="class_name" class="form-label">Class Name</label>
                            <input type="text" class="form-control" id="class_name" name="class_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="class_code" class="form-label">Class Code</label>
                            <input type="text" class="form-control" id="class_code" name="class_code" required>
                        </div>
                                

                        <div class="mb-3">
                            <a href="class-semester-details.php" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary" name="class-semester-add-btn">Add Class Semester</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../ajax/fetch_data.php")?>
<?php include("../includes/footer.php")?>