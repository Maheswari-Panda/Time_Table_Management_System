<?php include("../includes/connect.php")?>
<?php include("../includes/header.php")?>


<?php
$faculty_id=$_GET['faculty_id'];
$sql = "SELECT * FROM `faculty` WHERE `faculty_id`=$faculty_id";
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
                    <h4>Update Faculty</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="code.php">
                        <input type="hidden" value="<?php echo $row['faculty_id'] ?>" name="update_id" >
                        <div class="mb-3">
                            <label for="faculty_name" class="form-label">Faculty Name</label>
                            <input type="text" class="form-control" id="faculty_name" name="faculty_name" 
                            value = "<?php echo $row['faculty_name']?>"
                            required>
                        </div>

                        <div class="mb-3">
                            <label for="faculty_code" class="form-label">Faculty Code</label>
                            <input type="text" class="form-control" id="faculty_code" name="faculty_code" value= "<?php echo $row['faculty_Code']?>"required>
                        </div>
                        
                        <div class="mb-3">
                            <a href="faculty-details.php" class="btn btn-danger">Cencel</a>
                            <button type="submit" name="faculty-update-btn" class="btn btn-primary">Update</button>
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
    echo "No Data Found by this Faculty Id";
}
?>





<?php include("../includes/footer.php")?>