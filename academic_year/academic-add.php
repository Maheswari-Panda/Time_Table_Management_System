<?php include("academic-code.php")?>
<?php include("../includes/header.php")?>


<div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between bg-dark text-light">
                            <h4>Academic Year Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="../academic_year/academic-add.php">
                                <div class="mb-3">
                                    <label for="academic_year" class="form-label">Academic Year</label>
                                    <input type="text" class="form-control" id="academic_year" name="academic_year" required>
                                </div>

                                <div class="mb-3">
                                    <label for="from_date" class="form-label">From Date</label>
                                    <input type="date" class="form-control" id="from_date" name="from_date" required>
                                </div>

                                   <div class="mb-3">
                                    <label for="to_date" class="form-label">To Date</label>
                                    <input type="date" class="form-control" id="to_date" name="to_date" required>
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
                                    <a href="academic-details.php" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="academic-add-btn">Add Academic Year</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
<?php include("../includes/footer.php")?>