<?php include("day-code.php")?>
<?php include("../includes/header.php")?>


<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card ">
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <h4>Add Day</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="../days/day-add.php">
                        <div class="mb-3">
                            <label for="day_name" class="form-label">Day Name</label>
                            <input type="text" class="form-control" id="day_name" name="day_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="day_code" class="form-label">day Code</label>
                            <input type="text" class="form-control" id="day_code" name="day_code" required>
                        </div>
                        
                        <div class="mb-3">
                            <a href="../days/days-details.php" class="btn btn-danger">Cencel</a>
                            <button type="submit" class="btn btn-primary" name="day-add-btn">Add day</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include("../includes/footer.php")?>