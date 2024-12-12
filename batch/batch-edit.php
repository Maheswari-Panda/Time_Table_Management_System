<?php include("batch-code.php")?>
<?php include("../includes/header.php")?>

<?php
$batch_id=$_GET['batch_id'];
$sql = "SELECT * FROM `batch` WHERE `batch_id`=$batch_id";
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
                            <h4> Batch Register </h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="batch-code.php">

                                <input type="hidden" value="<?php echo $row['Batch_Id'] ?>" name="batch_update_id" >
                                <div class="mb-3">
                                    <label for="batch_name" class="form-label">Batch Name</label>
                                    <input type="text" class="form-control" id="batch_name" name="batch_name" value="<?php echo $row['Batch_Name'] ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="batch_code" class="form-label">Batch Code</label>
                                    <input type="text" class="form-control" id="batch_code" name="batch_code" value="<?php echo $row['Batch_Code'] ?>" required>
                                </div>
                                
                                 
                                <div class="mb-3">
                                    <label for="no_of_students" class="form-label">No Of Students</label>
                                    <input type="number" class="form-control" id="no_of_students" name="no_of_students" value="<?php echo $row['No_Of_Students'] ?>" required>
                                </div>


                                <div class="mb-3">
                                    <label for="division_id" class="form-label">Division</label>
                                    <select id="division_id" name="division_id" class="form-control" required>
                                        <option value="">--Select Division--</option> <!-- Default Option -->
                                        <?php 
                                            $sql = "SELECT * FROM `division`";  // Replace with your actual division table name
                                            $result = mysqli_query($conn, $sql);
                                            
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($division_details = mysqli_fetch_assoc($result)) {
                                                    $selected = ($division_details['Division_Id'] == $row['Division_Id']) ? 'selected' : '';
                                        
                                                    echo '<option value="' . $division_details['Division_Id'] . '" ' . $selected . '>' . $division_details['Division_Name'] . '</option>';
                                                }
                                            } else {
                                                echo "<option value=''>No divisions found.</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                                    

                                <div class="mb-3">
                                    <a href="batch-details.php" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="batch-update-btn">Update</button>
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
    echo "No Data Found by this batch Id";
}
?>




<?php include("../includes/footer.php")?>
