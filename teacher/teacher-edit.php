<?php include("teacher-code.php")?>
<?php include("../includes/header.php")?>

<?php
$teacher_id=$_GET['teacher_id'];
$sql = "SELECT * FROM `teacher` WHERE `teacher_id`=$teacher_id";
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
                            <h4>Teacher Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="teacher-code.php">
                            <input type="hidden" value="<?php echo $row['Teacher_Id'] ?>" name="teacher_update_id" >
                                <div class="mb-3">
                                    <label for="teacher_name" class="form-label">Teacher Name</label>
                                    <input type="text" class="form-control" id="teacher_name" name="teacher_name" value="<?php echo $row['Teacher_Name'] ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="teacher_code" class="form-label">Teacher Code</label>
                                    <input type="text" class="form-control" id="teacher_code" name="teacher_code" value="<?php echo $row['Teacher_Code'] ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="teacher_email" class="form-label">Teacher Email</label>
                                    <input type="email" class="form-control" id="teacher_email" name="teacher_email" value="<?php echo $row['Teacher_Email'] ?>"required>
                                </div>

                                <div class="mb-3">
                                    <label for="teacher_password" class="form-label">Teacher Password</label>
                                    <input type="text" class="form-control" id="teacher_password" name="teacher_password" value="<?php echo $row['Teacher_Password'] ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="teacher_designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" id="teacher_designation" name="teacher_designation" value="<?php echo $row['Designation'] ?>" required>
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
                                    <a href="teacher-details.php" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="teacher-update-btn">Update teacher</button>
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
