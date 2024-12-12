<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teacher Dashboard</title>
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
          <a class="nav-link" href="../dashboards/teacher_dashboard.php"><i class="bi bi-calendar3"></i> My Time Table</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="../dashboards/teacher_class_ttm.php"><i class="bi bi-people"></i> Class Time Tables</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="../dashboards/teacher_location_ttm.php"><i class="bi bi-geo-alt"></i> Location Time Tables</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="../dashboards/teacher_subject_ttm.php"><i class="bi bi-journals"></i> Subject Time Tables</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="../dashboards/view_assigned_subjects.php"><i class="bi bi-eye"></i> View Assigned Subjects</a>
        </li>
      </ul>

      
      <div class="d-flex">
        <h6 class="text-white me-3 mt-2">Teacher</h6>
        <a href="../login/logout.php" class="btn btn-danger">
          Logout <i class="bi bi-box-arrow-up"></i>
        </a>
      </div>

    </div>
  </div>
</nav>
