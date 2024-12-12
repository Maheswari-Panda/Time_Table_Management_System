<?php
include("../includes/connect.php"); 

if (isset($_POST['subject_id'])) {
    $subjectId = $_POST['subject_id'];

    // Fetch the teacher assigned to the subject
    $query = "
        SELECT t.Teacher_Id, t.Teacher_Name, d.Department_Id, d.Department_Name
        FROM subject_teacher st
        JOIN teacher t ON st.Teacher_Id = t.Teacher_Id
        JOIN department d ON t.Department_Id = d.Department_Id
        WHERE st.Subject_Id = $subjectId
    ";

    $result = mysqli_query($conn, $query);
    $teachers = [];
    $department = null;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $teachers[] = [
                'id' => $row['Teacher_Id'],
                'name' => $row['Teacher_Name']
            ];
            // Since the department will be the same for all teachers of a subject, we fetch it once
            if ($department === null) {
                $department = [
                    'id' => $row['Department_Id'],
                    'name' => $row['Department_Name']
                ];
            }
        }
    }

    // Return JSON response
    echo json_encode(['teachers' => $teachers, 'department' => $department]);
}
?>
