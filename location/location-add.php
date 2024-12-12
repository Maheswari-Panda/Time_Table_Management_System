<?php include("location-code.php")?>
<?php include("../includes/header.php")?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <h4>Add Location</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="location-code.php">
                        <div class="mb-3">
                            <label for="location_name" class="form-label">Location Name</label>
                            <input type="text" class="form-control" id="location_name" name="location_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="location_code" class="form-label">Location Code</label>
                            <input type="text" class="form-control" id="location_code" name="location_code" required>
                        </div>

                        <div class="mb-3">
                            <label for="location_description" class="form-label">Location Description</label>
                            <textarea class="form-control" id="location_description" name="location_description" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="capacity" class="form-label">Capacity</label>
                            <input type="number" class="form-control" id="capacity" name="capacity" required>
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
                                            echo "<option value='$department_id'>$faculty_code - $department_name</option>";
                                        }
                                    } else {
                                        echo "<option disabled>No departments available</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <a href="location-details.php" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary" name="location-add-btn">Add Location</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("../includes/footer.php")?>
