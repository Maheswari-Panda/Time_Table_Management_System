<?php include("slot-duration-code.php")?>
<?php include("../includes/header.php")?>

<div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between bg-dark text-light">
                            <h4>Add Slot</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="slot-duration-code.php">
                                <div class="mb-3">
                                    <label for="start_time" class="form-label">Start Time</label>
                                    <input type="time" class="form-control" id="start_time" name="start_time" required>
                                </div>
                                <div class="mb-3">
                                    <label for="end_time" class="form-label">End Time</label>
                                    <input type="time" class="form-control" id="end_time" name="end_time" required>
                                </div>

                                <div class="mb-3">
                                    <a href="slot-duration-details.php" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="slot-duration-add-btn">Add Slot</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php include("../includes/footer.php")?>
