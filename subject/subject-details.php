<?php include("../includes/connect.php") ?>
<?php include("../includes/header.php") ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card ">
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <h4>Subject Details</h4>
                    <a href="subject-add.php" class="btn btn-primary">Add Subject</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col" class="text-center">Faculty</th>
                                <th scope="col" class="text-center">Department</th>
                                <th scope="col" class="text-center">Semester</th>
                                <th scope="col" class="text-center">Subject Code</th>
                                <th scope="col" class="text-center">Subject Name</th>
                                <th scope="col" class="text-center">Is Elective</th>
                                <th scope="col" class="text-center">Is Lecture</th>
                                <th scope="col" class="text-center">Is Lab</th>
                                <th scope="col" class="text-center">Is tutorial</th>
                                <th scope="col" class="text-center">Update</th>
                                <th scope="col" class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sno = 1;
                            $sql = "SELECT 
                                f.Faculty_Code,
                                dep.Department_Code,
                                s.Semester_Code, 
                                sub.Subject_Id, sub.Subject_Code, sub.Subject_Name, 
                                CASE 
                                    WHEN sub.Is_Elective = 1 THEN 'Yes' 
                                    ELSE 'No' 
                                END AS Is_Elective,
                                CASE 
                                    WHEN sub.Is_Lecture = 1 THEN 'Yes' 
                                    ELSE 'No' 
                                END AS Is_Lecture,
                                CASE 
                                    WHEN sub.Is_Lab = 1 THEN 'Yes' 
                                    ELSE 'No' 
                                END AS Is_Lab,
                                CASE 
                                    WHEN sub.Is_Tutorial = 1 THEN 'Yes' 
                                    ELSE 'No' 
                                END AS Is_Tutorial
                                
                            FROM Subject sub
                            JOIN Semester s ON sub.Semester_Id = s.Semester_Id
                            JOIN Program p ON s.Program_Id = p.Program_Id
                            JOIN Department dep ON p.Department_Id = dep.Department_Id
                            JOIN Faculty f ON dep.Faculty_Id = f.Faculty_Id
                            WHERE 
                                sub.Is_Elective LIKE '1' OR sub.Is_Elective LIKE '0'
                                OR sub.Is_Lecture LIKE '1' OR sub.Is_Lecture LIKE '0'
                                OR sub.Is_Lab LIKE '1' OR sub.Is_Lab LIKE '0'
                                OR sub.Is_Tutorial LIKE '1' OR sub.Is_Tutorial LIKE '0';
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
                                        <td><?php echo $row['Subject_Code'] ?></td>
                                        <td><?php echo $row['Subject_Name'] ?></td>
                                        <td><?php echo $row['Is_Elective'] ?></td>
                                        <td><?php echo $row['Is_Lecture'] ?></td>
                                        <td><?php echo $row['Is_Lab'] ?></td>
                                        <td><?php echo $row['Is_Tutorial'] ?></td>
                                        <td class="text-center">
                                            <a href="subject-edit.php?subject_id=<?php echo $row['Subject_Id']?>" class="btn btn-primary edit me-2">Edit</a>
                                        </td>
                                        
                                        <td class="text-center">
                                            <input type="hidden" class="delete-id-value" value="<?php echo $row['Subject_Id'] ?>">
                                            <a href="javascript:void(0);" class="subject-delete-btn btn btn-danger">Delete</a>
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