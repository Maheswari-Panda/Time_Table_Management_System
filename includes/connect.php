<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "ttm";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>ERROR!</strong> Sorry we are unable to connect to the database. error: '. mysqli_connect_error() .'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>
