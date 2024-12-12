<?php include("department-code.php")?>
<?php include("../includes/header.php")?>

        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between bg-dark text-light">
                            <h4>Department Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="../department/department-add.php">
                                <div class="mb-3">
                                    <label for="department_name" class="form-label">Department Name</label>
                                    <input type="text" class="form-control" id="department_name" name="department_name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="department_code" class="form-label">Department Code</label>
                                    <input type="text" class="form-control" id="department_code" name="department_code" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="faculty_id" class="form-label">Faculty</label>
                                    <select id="faculty_id" name="faculty_id" class="form-control" required>
                                        
                                    <option default value="">--Select Faculty--</option>
                                        <?php 
                                            $sql = "SELECT * FROM `faculty`";
                                            $result = mysqli_query($conn, $sql);
                                            
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '<option value="'.$row['faculty_id'].'">'.$row['faculty_name'].'</option>';
                                                }
                                            } else {
                                                echo "No faculty IDs found.";
                                            }
                                        ?>
                                    </select>
                                </div>                                       

                                <div class="mb-3">
                                    <a href="department-details.php" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="department-add-btn">Add Department</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include("../includes/footer.php")?>
