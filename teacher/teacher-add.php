<?php include("teacher-code.php")?>
<?php include("../includes/header.php")?>

        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between bg-dark text-light">
                            <h4>Teacher Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="../teacher/teacher-add.php">
                                <div class="mb-3">
                                    <label for="teacher_name" class="form-label">Teacher Name</label>
                                    <input type="text" class="form-control" id="teacher_name" name="teacher_name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="teacher_code" class="form-label">Teacher Code</label>
                                    <input type="text" class="form-control" id="teacher_code" name="teacher_code" required>
                                </div>

                                <div class="mb-3">
                                    <label for="teacher_email" class="form-label">Teacher Email</label>
                                    <input type="email" class="form-control" id="teacher_email" name="teacher_email" required>
                                </div>

                                <div class="mb-3">
                                    <label for="teacher_password" class="form-label">Teacher Password</label>
                                    <input type="password" class="form-control" id="teacher_password" name="teacher_password" required>
                                </div>

                                <div class="mb-3">
                                    <label for="teacher_designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" id="teacher_designation" name="teacher_designation" required>
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
                                    <a href="teacher-details.php" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="teacher-add-btn">Add teacher</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include("../includes/footer.php")?>
