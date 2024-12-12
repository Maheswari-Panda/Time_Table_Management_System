<?php include("batch-code.php")?>
<?php include("../includes/header.php")?>

<div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between bg-dark text-light">
                            <h4> Batch Register </h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="">

                                <div class="mb-3">
                                    <label for="batch_name" class="form-label">Batch Name</label>
                                    <input type="text" class="form-control" id="batch_name" name="batch_name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="batch_code" class="form-label">Batch Code</label>
                                    <input type="text" class="form-control" id="batch_code" name="batch_code" required>
                                </div>
                                
                                 
                                <div class="mb-3">
                                    <label for="no_of_students" class="form-label">No Of Students</label>
                                    <input type="number" class="form-control" id="no_of_students" name="no_of_students" required>
                                </div>


                                <div class="mb-3">
                                    <label for="division_id" class="form-label">division</label>
                                    <select id="division_id" name="division_id" class="form-control" required>
                                        
                                    <option default value="">--Select division--</option>
                                        <?php 
                                            $sql = "SELECT * FROM `division`";
                                            $result = mysqli_query($conn, $sql);
                                            
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '<option value="'.$row['Division_Id'].'">'.$row['Division_Name'].'</option>';
                                                }
                                            } else {
                                                echo "No division IDs found.";
                                            }
                                        ?>
                                    </select>
                                </div>                        

                                <div class="mb-3">
                                    <a href="batch-details.php" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="batch-add-btn">Add Batch</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include("../includes/footer.php")?>