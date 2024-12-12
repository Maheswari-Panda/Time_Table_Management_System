<?php include("slot-duration-code.php")?>
<?php include("../includes/header.php")?>

<?php
$duration_id=$_GET['duration_id'];
$sql = "SELECT * FROM `slot_durations` WHERE `duration_id`=$duration_id";
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
                            <h4>Update Slot</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="slot-duration-code.php">
                                <input type="hidden" name="slot_duration_update_id" value="<?php echo $row['duration_id']?>"/>
                                <div class="mb-3">
                                    <label for="start_time" class="form-label">Start Time</label>
                                    <input type="time" class="form-control" id="start_time" name="start_time" value="<?php echo $row['start_time']?>"required>
                                </div>
                                <div class="mb-3">
                                    <label for="end_time" class="form-label">End Time</label>
                                    <input type="time" class="form-control" id="end_time" name="end_time" value="<?php echo $row['end_time']?>" required>
                                </div>

                                <div class="mb-3">
                                    <a href="slot-duration-details.php" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="slot-duration-update-btn">Update Slot</button>
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
