<?php include("department-code.php")?>
<?php include("../includes/header.php")?>

<?php
$department_id=$_GET['department_id'];
$sql = "SELECT * FROM `department` WHERE `department_id`=$department_id";
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
                            <h4>Department Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="department-code.php">
                                
                                <input type="hidden" value="<?php echo $row['Department_Id'] ?>" name="department_update_id" >
                                <div class="mb-3">
                                    <label for="department_name" class="form-label">Department Name</label>
                                    <input type="text" class="form-control" id="department_name" name="department_name" value="<?php echo $row['Department_Name'] ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="department_code" class="form-label">Department Code</label>
                                    <input type="text" class="form-control" id="department_code" name="department_code" value="<?php echo $row['Department_Code'] ?>" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="faculty_id" class="form-label">Faculty</label>
                                    <select id="faculty_id" name="faculty_id" class="form-control" required>
                                        <?php 
                                            $sql = "SELECT * FROM `faculty`";
                                            $result = mysqli_query($conn, $sql);
                                            
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($faculty_details = mysqli_fetch_assoc($result)) {
                                                    $selected = ($faculty_details['faculty_id'] == $row['Faculty_Id']) ? 'selected' : '';
        
                                                    echo '<option value="' .$faculty_details['faculty_id'] . '" ' . $selected . '>' . $faculty_details['faculty_name'] . '</option>';
                                                }
                                            } else {
                                                echo "No faculty IDs found.";
                                            }
                                        ?>
                                    </select>
                                </div>                                          



                                <div class="mb-3">
                                    <a href="department-details.php" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="department-update-btn">Update</button>
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
    echo "No Data Found by this Department Id";
}
?>




<?php include("../includes/footer.php")?>
