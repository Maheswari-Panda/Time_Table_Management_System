<?php include("../includes/connect.php") ?>
<?php include("../includes/header.php") ?>

      <div class="container">
        <div class="row">
          <div class="col-md-12 mt-5">
            <div class="card ">
              <div class="card-header d-flex justify-content-between bg-dark text-light">
                <h4>Faculty Details</h4>
                <a href="faculty-add.php" class="btn btn-primary">Add Faculty</a>
              </div>
              <div class="card-body">
                <table class="table table-bordered" id = "myTable">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col"class="text-center">Faculty Name</th>
                      <th scope="col"class="text-center">Faculty Code</th>
                      <th scope="col" class="text-center">Update</th>
                      <th scope="col" class="text-center">Delete</th>
                    </tr>
                  </thead>
                  <tbody>              
                    <?php
                        $sno = 1;
                        $sql = "SELECT * FROM `faculty`";
                        $result = mysqli_query($conn,$sql);
                        
                        $num = mysqli_num_rows($result);
                        // echo 'NUMBERS OF RECORDS : '.$num.'<br>';
                        
                        if($num>0){
                          while($num>0){
                            $row = mysqli_fetch_assoc($result)
                          ?>
          
                            <tr>
                              <td><?php echo $sno ?></td>
                              <td><?php echo $row['faculty_name'] ?></td>
                              <td><?php echo $row['faculty_Code'] ?></td>
                              <td class="text-center">
                                <a href="../faculty/faculty-edit.php?faculty_id=<?php echo $row['faculty_id'] ?>" class="btn btn-primary edit me-2" >Edit</a>
                              </td>
                              <td class="text-center">
                                  <input type="hidden" class="delete-id-value" value="<?php echo $row['faculty_id']?>">
                                  <a href="javascript:void(0);" class="faculty-delete-btn btn btn-danger">Delete</a>
                              </td>
                            </tr>
                          <?php
                            $num = $num-1;
                            $sno = $sno+1;
                          }
                        }
                        else{
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


  
<?php include("../includes/footer.php")?>
      