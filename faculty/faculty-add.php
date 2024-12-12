<?php include("code.php")?>
<?php include("../includes/header.php")?>


<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card ">
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <h4>Faculty Register</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="../faculty/faculty-add.php">
                        <div class="mb-3">
                            <label for="faculty_name" class="form-label">Faculty Name</label>
                            <input type="text" class="form-control" id="faculty_name" name="faculty_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="faculty_code" class="form-label">Faculty Code</label>
                            <input type="text" class="form-control" id="faculty_code" name="faculty_code" required>
                        </div>
                        
                        <div class="mb-3">
                            <a href="../faculty/faculty-details.php" class="btn btn-danger">Cencel</a>
                            <button type="submit" class="btn btn-primary" name="faculty-add-btn">Add Faculty</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include("../includes/footer.php")?>