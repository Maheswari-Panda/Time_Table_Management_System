<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

 
  <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between bg-dark text-light">
                            <h4>Academic Year Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="academic_year" class="form-label">Academic Year</label>
                                    <input type="text" class="form-control" id="academic_year" name="academic_year" required>
                                </div>

                                <div class="mb-3">
                                    <label for="from_date" class="form-label">From Date</label>
                                    <input type="date" class="form-control" id="from_date" name="from_date" required>
                                </div>

                                   <div class="mb-3">
                                    <label for="to_date" class="form-label">To Date</label>
                                    <input type="date" class="form-control" id="to_date" name="to_date" required>
                                </div>

                                <div class="mb-3">
                                    <label for="faculty_id" class="form-label">Faculty ID </label>
                                    <select id="faculty_id" name="faculty_id" class="form-control" required>
                                        <option default>--Select Faculty--</option>
                                        <option>A</option>
                                        <option>B</option>
                                    </select>
                                </div>                                

                                <div class="mb-3">
                                    <a href="#" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" name="faculty-add-btn">Add Academic Year</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>