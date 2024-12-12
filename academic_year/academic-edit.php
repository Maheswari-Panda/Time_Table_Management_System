<?php include("academic-code.php")?>
<?php include("../includes/header.php")?>


<?php
$academic_id=$_GET['academic_year_id'];
$sql = "SELECT * FROM `academic_year` WHERE `academic_year_id`=$academic_id";
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
                            <h4>Academic Year Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="academic-code.php">
                            <input type="hidden" value="<?php echo $row['Academic_Year_Id'] ?>" name="academic_update_id" >
                                
                                <div class="mb-3">
                                    <label for="from_date" class="form-label">From Date</label>
                                    <input type="date" class="form-control" id="from_date" name="from_date" value="<?php echo $row['Academic_Year_From'] ?>" required>
                                </div>

                                   <div class="mb-3">
                                    <label for="to_date" class="form-label">To Date</label>
                                    <input type="date" class="form-control" id="to_date" name="to_date" value="<?php echo $row['Academic_Year_To'] ?>" required>
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
                                    <a href="academic-details.php" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="academic-update-btn">Update</button>
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
    echo "No Data Found by this Academic Year Id";
}
?>


<?php include("../includes/footer.php")?>