<?php
include '../includes/connect.php';
$_SESSION['status'] = "Log Out Successfully!" . mysqli_error($conn);
$_SESSION['status_code'] = "success";
header("Location: ../index.php");
// session_destroy();
exit();
?>
