<?php include("division-code.php")?>
<?php include("../includes/header.php")?>

<?php
$division_id=$_GET['division_id'];
$sql = "SELECT * FROM `division` WHERE `division_id`=$division_id";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
// echo 'NUMBERS OF RECORDS : '.$num.'<br>';

if($num>0){
    while($row = mysqli_fetch_array($result)){
?>
<div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between bg-dark text-light">
                            <h4> Division Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="division-code.php">
                                
                                <input type="hidden" value="<?php echo $row['Division_Id'] ?>" name="division_update_id" >
                                <div class="mb-3">
                                    <label for="class_name" class="form-label">Division Name</label>
                                    <input type="text" class="form-control" id="division_name" name="division_name" value="<?php echo $row['Division_Name'] ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="class_code" class="form-label">Division Code</label>
                                    <input type="text" class="form-control" id="division_code" name="division_code" value="<?php echo $row['Division_Code'] ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="class_id" class="form-label">Class</label>
                                    <select id="class_id" name="class_id" class="form-control" required>
                                        <?php 
                                            // SQL query to select all classes
                                            $sql = "SELECT * FROM `class_semester`";  // Assuming you have a `class` table
                                            $result = mysqli_query($conn, $sql);
                                            
                                            // Check if there are any classes returned from the query
                                            if (mysqli_num_rows($result) > 0) {
                                                // Loop through each class and create an option element
                                                while ($class_details = mysqli_fetch_assoc($result)) {
                                                    // Assuming $row['Class_Id'] contains the current selected class, otherwise adjust as needed
                                                    $selected = ($class_details['Class_Id'] == $row['Class_Id']) ? 'selected' : '';
                                        
                                                    echo '<option value="' . $class_details['Class_Id'] . '" ' . $selected . '>' . $class_details['Class_Name'] . '</option>';
                                                }
                                            } else {
                                                echo "<option value=''>No class IDs found.</option>";
                                            }
                                        ?>
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <a href="division-details.php" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="division-update-btn">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
<?php     
    }
}
else{
    echo "No Data Found by this Division Id";
}
?>
<?php include("../includes/footer.php")?>
