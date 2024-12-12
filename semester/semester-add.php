<?php include("semester-code.php")?>
<?php include("../includes/header.php")?>

<div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between bg-dark text-light">
                            <h4>Semester Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="semester-add.php">
                               
                                <div class="mb-3">
                                    <label for="semester_name" class="form-label">Semester Name</label>
                                    <input type="text" class="form-control" id="semester_name" name="semester_name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="semester_code" class="form-label">Semester Code</label>
                                    <input type="text" class="form-control" id="semester_code" name="semester_code" required>
                                </div>

                                <div class="mb-3">
                                    <label for="program_id" class="form-label">Program</label>
                                    <select id="program_id" name="program_id" class="form-control" required>
                                        
                                    <option default value="">--Select Program--</option>
                                        <?php 
                                             $sql = "SELECT program.program_id, faculty.faculty_code, department.department_code, program.program_name FROM program JOIN department ON program.department_id = department.department_id  JOIN faculty ON department.faculty_id = faculty.faculty_id";
                                            $result = mysqli_query($conn, $sql);
                                            
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $program_id = $row['program_id'];
                                                    $faculty_code = $row['faculty_code'];
                                                    $department_code = $row['department_code'];
                                                    $program_name = $row['program_name'];

                                                    echo "<option value='$program_id'>$faculty_code - $department_code - $program_name</option>";
                                                }
                                            }
                                            else {
                                                echo "No programs available";
                                            }
                                        ?>
                                    </select>
                                </div>                                        


                                <div class="mb-3">
                                    <a href="semester-details.php" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="semester-add-btn">Add Semester</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include("../includes/footer.php")?>