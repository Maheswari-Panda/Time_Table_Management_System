<?php

if (isset($_POST['faculty_id'])) {
    $faculty_id = $_POST['faculty_id'];

    $sql = "SELECT department_id, department_name FROM department WHERE faculty_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $faculty_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $departments = [];
    while ($row = $result->fetch_assoc()) {
        $departments[] = $row;
    }

    echo json_encode($departments);
    
exit();
}

if (isset($_POST['department_id'])) {
    $department_id = $_POST['department_id'];

    $sql = "SELECT program_id, program_name FROM program WHERE department_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $department_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $programs = [];
    while ($row = $result->fetch_assoc()) {
        $programs[] = $row;
    }

    echo json_encode($programs);
    
exit();
}

if (isset($_POST['program_id'])) {
    $program_id = $_POST['program_id'];

    $sql = "SELECT semester_id, semester_name FROM semester WHERE program_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $program_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $semesters = [];
    while ($row = $result->fetch_assoc()) {
        $semesters[] = $row;
    }

    echo json_encode($semesters);
    
exit();
}
?>
<script>
// When the faculty dropdown changes, load the departments for the selected faculty
document.getElementById('faculty_id').addEventListener('change', function() {
    var faculty_id = this.value;
    
    if (faculty_id !== "") {
        fetch('class-semester-code.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'faculty_id=' + faculty_id
        })
        .then(response => response.json())
        .then(data => {
            let departmentSelect = document.getElementById('department_id');
            departmentSelect.innerHTML = '<option value="">--Select Department--</option>';
            data.forEach(department => {
                departmentSelect.innerHTML += `<option value="${department.department_id}">${department.department_name}</option>`;
            });
        });
    }
});

// When the department dropdown changes, load the programs for the selected department
document.getElementById('department_id').addEventListener('change', function() {
    var department_id = this.value;

    if (department_id !== "") {
        fetch('class-semester-code.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'department_id=' + department_id
        })
        .then(response => response.json())
        .then(data => {
            let programSelect = document.getElementById('program_id');
            programSelect.innerHTML = '<option value="">--Select Program--</option>';
            data.forEach(program => {
                programSelect.innerHTML += `<option value="${program.program_id}">${program.program_name}</option>`;
            });
        });
    }
});

// When the program dropdown changes, load the classes for the selected program
document.getElementById('program_id').addEventListener('change', function() {
    var program_id = this.value;

    if (program_id !== "") {
        fetch('class-semester-code.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'program_id=' + program_id
        })
        .then(response => response.json())
        .then(data => {
            let semesterSelect = document.getElementById('semester_id');
            semesterSelect.innerHTML = '<option value="">--Select Class--</option>';
            data.forEach(cls => {
                semesterSelect.innerHTML += `<option value="${cls.semester_id}">${cls.semester_name}</option>`;
            });
        });
    } 
});
</script>