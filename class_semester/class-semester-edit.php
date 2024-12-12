<?php include("class-semester-code.php")?>
<?php include("../includes/header.php")?>



<?php
$class_id=$_GET['class_id'];
$sql = "SELECT * FROM `class_semester` WHERE `class_id`=$class_id";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
// echo 'NUMBERS OF RECORDS : '.$num.'<br>';

if($num>0){
    while($row = mysqli_fetch_array($result)){
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <h4>Edit Class Semester</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="class-semester-code.php">

                        <!-- Hidden input to hold the class ID -->
                        <input type="hidden" value="<?php echo $row['Class_Id'] ?>" name="class_update_id">

                        <!-- Class Name and Code -->
                        <div class="mb-3">
                            <label for="class_name" class="form-label">Class Name</label>
                            <input type="text" class="form-control" id="class_name" name="class_name" value="<?php echo $row['Class_Name']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="class_code" class="form-label">Class Code</label>
                            <input type="text" class="form-control" id="class_code" name="class_code" value="<?php echo $row['Class_Code']; ?>" required>
                        </div>

                        
                        <div class="mb-3">
                                    <label for="semester_id" class="form-label">semester</label>
                                    <select id="semester_id" name="semester_id" class="form-control" required>
                                        <?php 
                                            $sql = "SELECT * FROM `semester`";
                                            $result = mysqli_query($conn, $sql);
                                            
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($semester_details = mysqli_fetch_assoc($result)) {
                                                    $selected = ($semester_details['Semester_Id'] == $row['Semester_Id']) ? 'selected' : '';
        
                                                    echo '<option value="' .$semester_details['Semester_Id'] . '" ' . $selected . '>' . $semester_details['Semester_Name'] . '</option>';
                                                }
                                            } else {
                                                echo "No semester IDs found.";
                                            }
                                        ?>
                                    </select>
                        </div>  
                        
                        <!-- Buttons -->
                        <div class="mb-3">
                            <a href="class-semester-details.php" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary" name="class-update-btn">Update</button>
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
    echo "No Data Found by this Program Id";
}
?>


<?php include("../ajax/fetch_data.php")?>
<?php include("../includes/footer.php")?>