<?php include("../includes/connect.php") ?>
<?php include("../includes/header.php") ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card ">
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <h4>Time Slot Details</h4>
                    <a href="time-slot-add.php" class="btn btn-primary">Add Time Slot</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col" class="text-center">Faculty</th>
                                <th scope="col" class="text-center">Department</th>
                                <th scope="col" class="text-center">Time Slot From</th>
                                <th scope="col" class="text-center">Time Slot To</th>
                                <th scope="col" class="text-center">Update</th>
                                <th scope="col" class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sno = 1;
                            $sql = "
                            SELECT
                                ts.Time_Slot_Id, 
                                ts.Time_Slot_From, 
                                ts.Time_Slot_To,
                                Department.Department_Code, 
                                Faculty.Faculty_Code
                            FROM 
                                time_slot ts
                            JOIN 
                                Department ON ts.Department_Id = Department.Department_Id
                            JOIN 
                                Faculty ON Department.Faculty_Id = Faculty.Faculty_Id;

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
                                        <td><?php echo $row['Time_Slot_From'] ?></td>
                                        <td><?php echo $row['Time_Slot_To'] ?></td>
                                        <td class="text-center">
                                            <a href="time-slot-edit.php?time_slot_id=<?php echo $row['Time_Slot_Id'] ?>" class="btn btn-primary edit me-2">Edit</a>
                                        </td>
                                        <td class="text-center">
                                            <input type="hidden" class="delete-id-value" value="<?php echo $row['Time_Slot_Id'] ?>">
                                            <a href="javascript:void(0);" class="time-slot-delete-btn btn btn-danger">Delete</a>
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