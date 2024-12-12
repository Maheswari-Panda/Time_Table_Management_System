<?php include("../includes/connect.php") ?>
<?php include("../includes/header.php") ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card ">
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <h4>Academic Year Details</h4>
                    <a href="academic-add.php" class="btn btn-primary">Add Academic Year</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col" class="text-center">Faculty Code</th>
                                <th scope="col" class="text-center">Start Date</th>
                                <th scope="col" class="text-center">End Date</th>
                                <th scope="col" class="text-center">Update</th>
                                <th scope="col" class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sno = 1;
                            $sql = "SELECT a.Academic_Year_Id, a.Academic_Year_From, a.Academic_Year_To , f.Faculty_Code
                                        FROM Academic_Year a
                                        JOIN Faculty f ON a.Faculty_Id = f.Faculty_Id;

                                    ";
                            $result = mysqli_query($conn, $sql);

                            $num = mysqli_num_rows($result);
                            // echo 'NUMBERS OF RECORDS : '.$num.'<br>';

                            if ($num > 0) {
                                while ($num > 0) {
                                    $row = mysqli_fetch_assoc($result)
                            ?>

                                    <tr>
                                        <td><?php echo $sno ?></td>
                                        <td><?php echo $row['Faculty_Code'] ?></td>
                                        <td><?php echo $row['Academic_Year_From'] ?></td>
                                        <td><?php echo $row['Academic_Year_To'] ?></td>
                                        <td class="text-center">
                                            <a href="academic-edit.php?academic_year_id=<?php echo $row['Academic_Year_Id'] ?>" class="btn btn-primary edit me-2">Edit</a>
                                        </td>
                                        <td class="text-center">
                                            <form action="academic-code.php" method="POST">
                                                <input type="hidden" class="delete-id-value" value="<?php echo $row['Academic_Year_Id']?>">
                                                <a href="javascript:void(0);" class="academic-delete-btn btn btn-danger">Delete</a>
                                            </form>
                                        </td>
                                    </tr>
                            <?php
                                    $num = $num - 1;
                                    $sno = $sno + 1;
                                }
                            } else {
                                echo '<tr><td colspan="4">No data found</td></tr>';
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include("../includes/footer.php") ?>