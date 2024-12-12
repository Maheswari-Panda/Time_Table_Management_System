<!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- js file for data table -->
    <script src="//cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>

    <!-- sweetalter file link -->
    <script src="../js/sweetalert.js"></script>

    <script src="../js/form-handlers.js"></script>


    <?php
      if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
        ?>
            <script>
              swal({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "OK. DONE!",
              });
            </script>
            
        <?php
        unset($_SESSION['status']);
        unset($_SESSION['status_code']);
      }
    ?>

    <?php include('../faculty/faculty-delete.php') ?>
    <?php include('../days/day-delete.php') ?>
    <?php include('../academic_year/academic-delete.php') ?>
    <?php include('../department/department-delete.php') ?>
    <?php include('../program/program-delete.php') ?>
    <?php include('../semester/semester-delete.php') ?>
    <?php include('../class_semester/class-semester-delete.php') ?>
    <?php include('../division/division-delete.php') ?>
    <?php include('../batch/batch-delete.php') ?>
    <?php include('../subject/subject-delete.php') ?>
    <?php include('../teacher/teacher-delete.php') ?>
    <?php include('../subject_teacher/subject-teacher-delete.php') ?>
    <?php include('../location/location-delete.php') ?>
    <?php include('../time_slot/time-slot-delete.php') ?>
    <?php include('../time_table/time_table_delete.php') ?>
    <?php include('../slot_duration/slot-duration-delete.php') ?>
    <?php include('../dashboards/hod_subject_teacher_delete.php') ?>
    <?php include('../dashboards/ttm_timetable_delete.php') ?>

    <script>
      let table = new DataTable('#myTable');
    </script>

  </body>
</html>