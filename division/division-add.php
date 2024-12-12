<?php include("division-code.php")?>
<?php include("../includes/header.php")?>

<div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between bg-dark text-light">
                            <h4> Division Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="division-code.php">
                                <div class="mb-3">
                                    <label for="class_name" class="form-label">Division Name</label>
                                    <input type="text" class="form-control" id="division_name" name="division_name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="class_code" class="form-label">Division Code</label>
                                    <input type="text" class="form-control" id="division_code" name="division_code" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="class_id" class="form-label">Class</label>
                                    <select id="class_id" name="class_id" class="form-control" required>
                                        <option default value="">--Select Class--</option>
                                        <?php 
                                            // Query to get the list of classes
                                            $sql = "SELECT * FROM `class_semester`";  // Assuming you have a `class` table
                                            $result = mysqli_query($conn, $sql);
                                            
                                            // Check if any rows are returned from the query
                                            if (mysqli_num_rows($result) > 0) {
                                                // Loop through each class and create an option element
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '<option value="'.$row['Class_Id'].'">'.$row['Class_Name'].'</option>';
                                                }
                                            } else {
                                                echo "<option value=''>No classes found.</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <a href="division-details.php" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="division-add-btn">Add Division</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include("../includes/footer.php")?>
