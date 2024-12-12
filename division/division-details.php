<?php include("../includes/connect.php") ?>
<?php include("../includes/header.php") ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card ">
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <h4>Division Details</h4>
                    <a href="division-add.php" class="btn btn-primary">Add Division</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col" class="text-center">Faculty</th>
                                <th scope="col" class="text-center">Department</th>
                                <th scope="col" class="text-center">Semester</th>
                                <th scope="col" class="text-center">Division Code</th>
                                <th scope="col" class="text-center">Division Name</th>
                                <th scope="col" class="text-center">Update</th>
                                <th scope="col" class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sno = 1;
                            $sql = " SELECT d.Division_Id, d.Division_Code, d.Division_Name,
                                        cs.Class_Id, cs.Class_Code, cs.Class_Name, 
                                        s.Semester_Code,
                                        dep.Department_Code, 
                                        f.Faculty_Code
                                    FROM Division d
                                JOIN Class_Semester cs ON d.Class_Id = cs.Class_Id
                                JOIN Semester s ON cs.Semester_Id = s.Semester_Id
                                JOIN Program p ON s.Program_Id = p.Program_Id
                                JOIN Department dep ON p.Department_Id = dep.Department_Id
                                JOIN Faculty f ON dep.Faculty_Id = f.Faculty_Id;
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
                                        <td><?php echo $row['Division_Code'] ?></td>
                                        <td><?php echo $row['Division_Name'] ?></td>

                                        <td class="text-center">
                                            <a href="division-edit.php?division_id=<?php echo $row['Division_Id'] ?>" class="btn btn-primary edit me-2">Edit</a>
                                        </td>
                                        
                                        <td class="text-center">
                                            <input type="hidden" class="delete-id-value" value="<?php echo $row['Division_Id'] ?>">
                                            <a href="javascript:void(0);" class="division-delete-btn btn btn-danger">Delete</a>
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