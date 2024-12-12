<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOD Dashboard</title>
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
          <a class="nav-link" href="../dashboards/hod_dashboard.php"><i class="bi bi-calendar3"></i> My Time table</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="../dashboards/hod_subject_teacher.php"><i class="bi bi-pencil-square"></i> Manage Subject Teacher</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="bi bi-eye"></i> View Details</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="../dashboards/hod_program.php"><i class="bi bi-card-text"></i> Program Details</a>
            <a class="dropdown-item" href="../dashboards/hod_teacher.php"><i class="bi bi-person-vcard"></i> Teacher Details</a>
            <a class="dropdown-item" href="../dashboards/hod_location.php"><i class="bi bi-geo-alt"></i> Location Details</a>
            <a class="dropdown-item" href="../dashboards/hod_subject.php"><i class="bi bi-journals"></i> Subject Details</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="bi bi-eye"></i> View Time Tables</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="../dashboards/hod_class_ttm.php"><i class="bi bi-people"></i> Class Time Table</a>
            <a class="dropdown-item" href="../dashboards/hod_teacher_ttm.php"><i class="bi bi-person-vcard"></i> Teacher Time Table</a>
            <a class="dropdown-item" href="../dashboards/hod_location_ttm.php"><i class="bi bi-geo-alt"></i> Location Time Table</a>
            <a class="dropdown-item" href="../dashboards/hod_subject_ttm.php"><i class="bi bi-journals"></i> Subject Time Table</a>
          </div>
        </li>

      </ul>


      <div class="d-flex">
        <h6 class="text-white me-3 mt-2"><i class="bi bi-person-fill-up"></i> Department HOD</h6>
        <a href="../login/logout.php" class="btn btn-danger">
          Logout <i class="bi bi-box-arrow-up"></i>
        </a>
      </div>
    </div>
  </div>
</nav>