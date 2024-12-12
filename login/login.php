<?php
// session_start(); // Enable sessions for login

include '../includes/connect.php';  // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['username'];
    $password = $_POST['password'];

    // Query the database for the user
    $query = "SELECT * FROM teacher WHERE Teacher_Email = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            // Check if the password is correct (plain-text comparison)
            if ($password === $user['Teacher_Password']) {
                echo "Password is correct!";

                // Set session variables
                $_SESSION['email'] = $user['Teacher_Email'];
                $_SESSION['role'] = $user['role'];
                $teacherId = $user['Teacher_Id'];

                // Redirect based on the user's role
                switch ($user['role']) {
                    case 'Teacher':
                        header("Location: ../dashboards/teacher_dashboard.php?Teacher_Id=$teacherId");
                        break;
                    case 'TTM':
                        header("Location: ../dashboards/ttm_dashboard.php");
                        break;
                    case 'HOD':
                        header("Location: ../dashboards/hod_dashboard.php");
                        break;
                    case 'Dean':
                        header("Location: ../dashboards/dean_dashboard.php");
                        break;
                    default:
                        $_SESSION['status'] = "Invalid User id or Password" . mysqli_error($conn);
                        $_SESSION['status_code'] = "error";
                        header("Location: ../index.php");
                        break;
                }
                exit();
            } else {
                $_SESSION['status'] = "Invalid Password" . mysqli_error($conn);
                $_SESSION['status_code'] = "error";
                header("Location: ../index.php");
                exit();
            }
        } else {
            echo "invalid user";
            $_SESSION['status'] = "Invalid User or Password" . mysqli_error($conn);
            $_SESSION['status_code'] = "error";
            header("Location: ../index.php");
            exit();
        }
    }
}
?>