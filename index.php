<?php include("includes/connect.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TTMS Login</title>
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS link -->
    <link href="//cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style/index-style.css">
    <style>
        body {
            background-color: #ababab;
        }

        /* Background image for the left side */
        .left-half {
            background-image: url('images/techo.png'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            height: 100vh;
        }

        /* Styling to center the login box vertically */
        .login-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            max-width: 400px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Left Half with Background Image -->
            <div class="col-md-6 left-half d-none d-md-block">
                <!-- Empty div for the background -->
            </div>

            <!-- Right Half with Login Form -->
            <div class="col-md-6 login-container">
                <div class="login-box text-center">
                    <!-- Logo above card -->
                    <img src="https://msu-new-2023-ec2-ubuntu-unzip.s3.ap-south-1.amazonaws.com/asset/images/msulogo412.png" 
                         height="100" width="100" alt="Logo" class="logo">
                    <h5 class="text-center">The Maharaja Saiyajirao University</h5>
                    <h6 class="text-center"><b>Time Table Management System</b></h6>

                    <!-- Card with form -->
                    <div class="card mt-4 p-1">
                        <div class="card-body p-3">
                            <form action="/TTM/login/login.php" method="post">
                                <div class="mb-3 text-start">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" 
                                           placeholder="Enter your username" required>
                                </div>

                                <div class="mb-3 text-start">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" 
                                           placeholder="Enter your password" required>
                                </div>

                                <button type="submit" class="btn btn-dark w-100">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
            crossorigin="anonymous"></script>


    
    <!-- sweetalter file link -->
    <script src="js/sweetalert.js"></script>
    

<?php
      if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
        ?>
            <script>
              swal({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "OK!",
              });
            </script>
            
        <?php
        unset($_SESSION['status']);
        unset($_SESSION['status_code']);
      }
    ?>

    <!-- JS file for DataTables -->
    <script src="//cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>
</body>

</html>
