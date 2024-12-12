<?php include("../includes/connect.php") ?>
<?php include("../includes/header.php") ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card ">
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <h4>Batch Details</h4>
                    <a href="batch-add.php" class="btn btn-primary">Add Batch</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col" class="text-center">Faculty</th>
                                <th scope="col" class="text-center">Department</th>
                                <th scope="col" class="text-center">Semester</th>
                                <th scope="col" class="text-center">Division</th>
                                <th scope="col" class="text-center">Batch Code</th>
                                <th scope="col" class="text-center">Batch Name</th>
                                <th scope="col" class="text-center">No Of Students</th>
                                <th scope="col" class="text-center">Update</th>
                                <th scope="col" class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sno = 1;
                            $sql = " SELECT 
                                    f.Faculty_Code,
                                    dep.Department_Code, 
                                    s.Semester_Code, 
                                    d.Division_Name,
                                    b.Batch_Id,b.Batch_Code, b.Batch_Name, b.No_Of_Students
                                FROM Division d
                                JOIN Class_Semester cs ON d.Class_Id = cs.Class_Id
                                JOIN Semester s ON cs.Semester_Id = s.Semester_Id
                                JOIN Program p ON s.Program_Id = p.Program_Id
                                JOIN Department dep ON p.Department_Id = dep.Department_Id
                                JOIN Faculty f ON dep.Faculty_Id = f.Faculty_Id
                                JOIN Batch b ON d.Division_Id = b.Division_Id;
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
                                        <td><?php echo $row['Department_Code'] ?></td>
                                        <td><?php echo $row['Semester_Code'] ?></td>
                                        <td><?php echo $row['Division_Name'] ?></td>
                                        <td><?php echo $row['Batch_Code'] ?></td>
                                        <td><?php echo $row['Batch_Name'] ?></td>
                                        <td><?php echo $row['No_Of_Students'] ?></td>
                                        <td class="text-center">
                                            <a href="batch-edit.php?batch_id=<?php echo $row['Batch_Id'] ?>" class="btn btn-primary edit me-2">Edit</a>
                                        </td>
                                        
                                        <td class="text-center">
                                            <input type="hidden" class="delete-id-value" value="<?php echo $row['Batch_Id'] ?>">
                                            <a href="javascript:void(0);" class="batch-delete-btn btn btn-danger">Delete</a>
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