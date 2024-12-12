
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card ">
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <h4>Location Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col" class="text-center">Faculty</th>
                                <th scope="col" class="text-center">Department</th>
                                <th scope="col" class="text-center">Location Code</th>
                                <th scope="col" class="text-center">Location Name</th>
                                <th scope="col" class="text-center">Location Description</th>
                                <th scope="col" class="text-center">Location Capacity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sno = 1;
                            $sql = "SELECT 
    Location.Location_Id,
    Location.Location_Code, 
    Location.Location_Name, 
    Location.Location_Description, 
    Location.Capacity, 
    Department.Department_Code, 
    Faculty.Faculty_Code
FROM 
    Location
JOIN 
    Department ON Location.Department_Id = Department.Department_Id
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
                                        <td><?php echo $row['Location_Code'] ?></td>
                                        <td><?php echo $row['Location_Name'] ?></td>
                                        <td><?php echo $row['Location_Description'] ?></td>
                                        <td><?php echo $row['Capacity'] ?></td>
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


