<?php include("../includes/connect.php")?>
<?php include("../includes/header.php")?>

<?php
$day_id=$_GET['day_id'];
$sql = "SELECT * FROM `days` WHERE `day_id`=$day_id";
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
                    <h4>Update day</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="day-code.php">
                        <input type="hidden" value="<?php echo $row['Day_Id'] ?>" name="update_id" >
                        <div class="mb-3">
                            <label for="day_name" class="form-label">day Name</label>
                            <input type="text" class="form-control" id="day_name" name="day_name" 
                            value = "<?php echo $row['Day_Name']?>"
                            required>
                        </div>

                        <div class="mb-3">
                            <label for="day_code" class="form-label">day Code</label>
                            <input type="text" class="form-control" id="day_code" name="day_code" value= "<?php echo $row['Day_Code']?>"required>
                        </div>
                        
                        <div class="mb-3">
                            <a href="days-details.php" class="btn btn-danger">Cencel</a>
                            <button type="submit" name="day-update-btn" class="btn btn-primary">Update</button>
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
    echo "No Data Found by this day Id";
}
?>





<?php include("../includes/footer.php")?>