<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

      <!--Data tables css link-->
    <link href="//cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css" rel="stylesheet">

  </head>
  <body>

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img src="../images/msu_logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
        Time Table Management System
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="bi bi-eye"></i> View Time Tables</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../time_table/teacher_time_table.php"><i class="bi bi-person-vcard"></i> Teacher Time Table</a>
              <a class="dropdown-item" href="../time_table/class_time_table.php"><i class="bi bi-people"></i> Class Time Table</a>
              <a class="dropdown-item" href="../time_table/location_time_table.php"><i class="bi bi-geo-alt"></i> Location Time Table</a>
              <a class="dropdown-item" href="../time_table/subject_time_table.php"><i class="bi bi-journals"></i> Subject Time Table</a>
            </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="bi bi-eye"></i> View Data Tables</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="../faculty/faculty-details.php">Faculty</a>
            <a class="dropdown-item" href="../academic_year/academic-details.php">Academic Year</a>
            <a class="dropdown-item" href="../department/department-details.php">Department</a>
            <a class="dropdown-item" href="../Program/Program-details.php">Program</a>
            <a class="dropdown-item" href="../semester/semester-details.php">Semester</a>
            <a class="dropdown-item" href="../class_semester/class-semester-details.php">Class Semester</a>
            <a class="dropdown-item" href="../division/division-details.php">Division</a>
            <a class="dropdown-item" href="../batch/batch-details.php">Batch</a>
            <a class="dropdown-item" href="../subject/subject-details.php">Subject</a>
            <a class="dropdown-item" href="../teacher/teacher-details.php">Teacher</a>
            <a class="dropdown-item" href="../subject_teacher/subject-teacher-details.php">Subject Teacher</a>
            <a class="dropdown-item" href="../location/location-details.php">Location</a>
            <a class="dropdown-item" href="../time_slot/time-slot-details.php">Time Durations</a>
            <a class="dropdown-item" href="../slot_duration/slot-duration-details.php">Time Slots</a>
            <a class="dropdown-item" href="../days/days-details.php">Days</a>
            <!-- <div class="dropdown-divider"></div> -->
            <!-- <a class="dropdown-item" href="../student/student-details.php">Student</a>
            <a class="dropdown-item" href="../student_elective/student-elective-details.php">Student Elective</a>
            <a class="dropdown-item" href="../dean/dean-details.php">Dean</a>
            <a class="dropdown-item" href="../hod/hod-details.php">HOD</a>
            <a class="dropdown-item" href="../time_table_manager/ttm-details.php">Time Table Manager</a>
            <a class="dropdown-item" href="../user/user-details.php">User</a> -->
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../time_table/time_table_details.php"><i class="bi bi-pencil-square"></i> Manage Time Tables</a>
        </li>
      </ul> 

      <div class="d-flex">
        <h6 class="text-white me-3 mt-2"><i class="bi bi-person-fill-up"></i> Admin</h6>
        <a href="../login/logout.php" class="btn btn-danger">
          Go to Login Page <i class="bi bi-box-arrow-up"></i>
        </a>
      </div>
      <!-- <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>