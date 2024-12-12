

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card ">
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <h4>Subject Teacher Details</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col" class="text-center">Faculty</th>
                                <th scope="col" class="text-center">Department</th>
                                <th scope="col" class="text-center">Teacher</th>
                                <th scope="col" class="text-center">Subject Code</th>
                                <th scope="col" class="text-center">Subject Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sno = 1;
                            $sql = "SELECT 
	f.Faculty_Code,
    dep.Department_Code,
    t.Teacher_Name,
    sub.Subject_Code, sub.Subject_Name,
    st.*
FROM 
    Subject_Teacher st
JOIN 
    Subject sub ON st.Subject_Id = sub.Subject_Id
JOIN 
    Teacher t ON st.Teacher_Id = t.Teacher_Id
JOIN 
    Department dep ON t.Department_Id = dep.Department_Id
JOIN 
    Faculty f ON dep.Faculty_Id = f.Faculty_Id;
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
                                        <td><?php echo $row['Teacher_Name'] ?></td>
                                        <td><?php echo $row['Subject_Code'] ?></td>
                                        <td><?php echo $row['Subject_Name'] ?></td>
                                        
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


