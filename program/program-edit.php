<?php include("program-code.php")?>
<?php include("../includes/header.php")?>


<?php
$program_id=$_GET['program_id'];
$sql = "SELECT * FROM `program` WHERE `program_id`=$program_id";
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
                            <h4>Update Program</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="program-code.php">
                                <input type="hidden" value="<?php echo $row['Program_Id'] ?>" name="program_update_id" >
                                <div class="mb-3">
                                    <label for="program_name" class="form-label">Program Name</label>
                                    <input type="text" class="form-control" id="program_name" name="program_name" value="<?php echo $row['Program_Name'] ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="program_code" class="form-label">Program Code</label>
                                    <input type="text" class="form-control" id="program_code" name="program_code" value="<?php echo $row['Program_Code'] ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="program_type" class="form-label">Program Type</label>
                                    <input type="text" class="form-control" id="program_type" name="program_type" value="<?php echo $row['Program_Type'] ?>" required>
                                </div>


                                <div class="mb-3">
                                    <label for="department_id" class="form-label">Department</label>
                                    <select id="department_id" name="department_id" class="form-control" required>
                                        
                                    <option default value="">--Select Department--</option>
                                        <?php 
                                            $sql = "SELECT department_id, faculty_code, department_name FROM department JOIN faculty ON department.faculty_id = faculty.faculty_id;";
                                            $result = mysqli_query($conn, $sql);
                                            
                                            if ($result->num_rows > 0) {
                                                while ($dept = $result->fetch_assoc()) {
                                                    $department_id = $dept['department_id'];
                                                    $faculty_code = $dept['faculty_code'];
                                                    $department_name = $dept['department_name'];
                                                    // Dropdown option with department_id as value and faculty_code + department_name as the label

                                                    $selected = ($dept['department_id'] == $row['Department_Id']) ? 'selected' : '';
        
                                                    echo '<option value="' .$dept['department_id'] . '" ' . $selected . '>' . $dept['faculty_code'] . ' - '.$dept['department_name'].'</option>';

                                                    // echo "<option value='$department_id'>$faculty_code - $department_name</option>";
                                                }
                                            }
                                            else {
                                                echo "No departments available";
                                            }
                                        ?>
                                    </select>
                                </div>                                



                                <div class="mb-3">
                                    <a href="program-details.php" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="program-update-btn">Update</button>
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



<?php include("../includes/footer.php")?>
