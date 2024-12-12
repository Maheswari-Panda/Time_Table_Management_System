<?php include("../includes/connect.php") ?>
<?php include("../includes/header.php") ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <h4>Time Table Details</h4>
                    <a href="time_table_add.php" class="btn btn-primary">Add TimeTable</a>
                </div>
                <div class="card-body table-responsive"  style="overflow-x:auto;">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col" class="text-center">Faculty Code</th>
                                <th scope="col" class="text-center">Dept Code</th>
                                <th scope="col" class="text-center">Program Code</th>
                                <th scope="col" class="text-center">Semester Code</th>
                                <th scope="col" class="text-center">Teacher Name</th>
                                <th scope="col" class="text-center">Subject Type</th>
                                <th scope="col" class="text-center">Subject Code</th>
                                <th scope="col" class="text-center">Subject Name</th>
                                <th scope="col" class="text-center">Duration</th>
                                <th scope="col" class="text-center">Day</th>
                                <th scope="col" class="text-center">Location Name</th>
                                <!-- <th scope="col" class="text-center">Update</th> -->
                                <th scope="col" class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sno = 1;
                            // Modify the SQL query to include the slot_durations table
                            $sql = "
                            SELECT 
                                tt.Time_Table_Id, 
                                tt.Subject_Type,
                                f.Faculty_Code, 
                                d.Department_Code, 
                                p.Program_Code, 
                                s.Semester_Code, 
                                t.Teacher_Name, 
                                sub.Subject_Code, 
                                sub.Subject_Name, 
                                sd.start_time,  /* Add start_duration */
                                sd.end_time,    /* Add end_duration */
                                days.Day_Name, 
                                loc.Location_Name
                            FROM 
                                time_table tt
                            JOIN 
                                faculty f ON tt.Faculty_Id = f.Faculty_Id
                            JOIN 
                                department d ON tt.Department_Id = d.Department_Id
                            JOIN 
                                program p ON tt.Program_Id = p.Program_Id
                            JOIN 
                                semester s ON tt.Semester_Id = s.Semester_Id
                            JOIN 
                                teacher t ON tt.Teacher_Id = t.Teacher_Id
                            JOIN 
                                subject sub ON tt.Subject_Id = sub.Subject_Id
                            JOIN 
                                days ON tt.Day_Id = days.Day_Id
                            JOIN 
                                location loc ON tt.Location_Id = loc.Location_Id
                            JOIN 
                                slot_durations sd ON tt.Duration_Id = sd.Duration_Id /* Join slot_durations table */
                            ";

                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);

                            if ($num > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>';
                                    echo '<td>' . $sno++ . '</td>';
                                    echo '<td class="text-center">' . $row['Faculty_Code'] . '</td>';
                                    echo '<td class="text-center">' . $row['Department_Code'] . '</td>';
                                    echo '<td class="text-center">' . $row['Program_Code'] . '</td>';
                                    echo '<td class="text-center">' . $row['Semester_Code'] . '</td>';
                                    echo '<td class="text-center">' . $row['Teacher_Name'] . '</td>';
                                    echo '<td class="text-center">' . $row['Subject_Type'] . '</td>';
                                    echo '<td class="text-center">' . $row['Subject_Code'] . '</td>';
                                    echo '<td class="text-center">' . $row['Subject_Name'] . '</td>';
                                    // Display start_duration and end_duration instead of Duration_Id
                                    echo '<td class="text-center">' . $row['start_time'] . ' - ' . $row['end_time'] . '</td>';
                                    echo '<td class="text-center">' . $row['Day_Name'] . '</td>';
                                    echo '<td class="text-center">' . $row['Location_Name'] . '</td>';
                                    // echo '  
                                    //     <td class="text-center">
                                    //         <a href="time_table_edit.php?time_table_id='.$row['Time_Table_Id'].'" class="btn btn-primary edit me-2">Edit</a>
                                    //     </td>';
                                    echo '
                                        <td class="text-center">
                                            <input type="hidden" class="delete-id-value" value="'.$row['Time_Table_Id'].'">
                                            <a href="javascript:void(0);" class="tt-delete-btn btn btn-danger">Delete</a>
                                        </td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="12">No data found</td></tr>';
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
