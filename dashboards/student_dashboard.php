<?php include("../includes/connect.php") ?>
<?php include("../includes/student-header.php") ?>

<!-- Form to select a class -->
<div class="container p-4">
    <form method="GET" action="">
        <div class="form-group mb-3">
            <label for="faculty">Select a faculty</label>
            <select id="faculty" name="faculty" class="form-select" required>
                <option selected value="">--Choose Faculty--</option>
                <?php
                $sql = "SELECT * FROM faculty";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['faculty_id']}'>{$row['faculty_name']}</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="department">Select a department</label>
            <select id="department" name="department" class="form-select" required>
                <option selected value="">--Choose Department--</option>
                <!-- Populated dynamically using AJAX -->
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="program-type" class="form-label">Select Program Type</label>
            <select id="program-type" name="program_type" class="form-select" required>
                <option selected>--Choose Program Type--</option>
                <!-- Populated dynamically using AJAX -->
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="program">Select a program</label>
            <select id="program" name="program" class="form-select" required>
                <option selected>--Choose Program--</option>
                <!-- Populated dynamically using AJAX -->
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="class">Select a class</label>
            <select id="semester" name="class" class="form-select" required>
                <option selected>--Choose Class--</option>
                <option value="FS BE-I" <?php echo (isset($_GET['semester']) && $_GET['semester'] == 'FS BE-I') ? 'selected' : ''; ?>>FS BE-I</option>
                <option value="SS BE-I" <?php echo (isset($_GET['semester']) && $_GET['semester'] == 'SS BE-I') ? 'selected' : ''; ?>>SS BE-I</option>
                <option value="SS BE-I" <?php echo (isset($_GET['semester']) && $_GET['semester'] == 'FS BE-II') ? 'selected' : ''; ?>>FS BE-II</option>
                <option value="SS BE-I" <?php echo (isset($_GET['semester']) && $_GET['semester'] == 'SS BE-II') ? 'selected' : ''; ?>>SS BE-II</option>
                <option value="SS BE-I" <?php echo (isset($_GET['semester']) && $_GET['semester'] == 'FS BE-III') ? 'selected' : ''; ?>>FS BE-III</option>
                <option value="SS BE-I" <?php echo (isset($_GET['semester']) && $_GET['semester'] == 'SS BE-III') ? 'selected' : ''; ?>>SS BE-III</option>
                <option value="SS BE-I" <?php echo (isset($_GET['semester']) && $_GET['semester'] == 'FS BE-I') ? 'selected' : ''; ?>>FS BE-IV</option>
                <!-- Add more options as needed -->
            </select>
        </div>

        <!--<div class="form-group">
            <label for="semester">Select Semester:</label>
            <select class="form-control" id="semester" name="semester" required>
                <option value="">-- Select Semester --</option>
             Populated dynamically using AJAX based on other selections
            </select>
        </div>-->
        <button type="submit" class="btn btn-primary mt-2">View Timetable</button>
    </form>
</div>

<?php
// Check if a semester is selected
if (isset($_GET['class']) && !empty($_GET['class'])) {
    $selected_semester = $_GET['class'];

    // Fetch the timetable data for the selected semester
    $sql = "
    SELECT 
        tt.Time_Table_Id, 
        f.Faculty_Code,
        f.Faculty_Name, 
        d.Department_Code, 
        d.Department_Name,  
        p.Program_Code, 
        p.Program_Name,      
        s.Semester_Code, 
        t.Teacher_Code, 
        t.Teacher_Name, 
        SUBSTRING(sub.Subject_Code, 1, 3) AS Subject_Code,  /* Modified to show first three letters */
        sub.Subject_Name, 
        tt.subject_type,  
        sd.start_time, 
        sd.end_time, 
        days.Day_Name, 
        days.Day_Id,  
        loc.Location_Name,
        divs.Division_Name,
        b.Batch_Name    
    FROM 
        time_table tt
    JOIN 
        faculty f ON tt.Faculty_Id = f.Faculty_Id
    JOIN 
        department d ON tt.Department_Id = d.Department_Id
    JOIN 
        program p ON tt.Program_Id = p.Program_Id
    JOIN 
        semester s ON tt.Semester_Id = s.Semester_Id
    JOIN 
        teacher t ON tt.Teacher_Id = t.Teacher_Id
    JOIN 
        subject sub ON tt.Subject_Id = sub.Subject_Id
    JOIN 
        days ON tt.Day_Id = days.Day_Id
    JOIN 
        location loc ON tt.Location_Id = loc.Location_Id
    JOIN 
        slot_durations sd ON tt.Duration_Id = sd.Duration_Id
    JOIN 
        division divs ON tt.Division_Id = divs.Division_Id 
    JOIN 
        batch b ON tt.Batch_Id = b.Batch_Id
    WHERE 
        s.Semester_Code = '$selected_semester'
    ORDER BY 
        sd.start_time, days.Day_Id
";

    $result = mysqli_query($conn, $sql);
    $timetable = [];
    $time_slots = [];
    $days = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY'];

    // Initialize variables to store the details for display
    $faculty_name = '';
    $department_name = '';
    $program_name = '';
    $semester_name = '';
    $division_name = '';
    $batch_name = '';
    $teachers = []; // Array to store teacher codes and names
    $subjects = [];

    // Process the results and organize data by time slot and day
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $time_key = $row['start_time'] . ' - ' . $row['end_time'];

            // Save details for displaying above timetable
            $faculty_name = $row['Faculty_Name'];
            $department_name = $row['Department_Name'];
            $program_name = $row['Program_Name'];
            $semester_name = $row['Semester_Code'];
            $division_name = $row['Division_Name'];
            $batch_name = $row['Batch_Name'];

            // Save teacher codes and names for display later
            $teachers[$row['Teacher_Code']] = $row['Teacher_Name'];
            $subjects[$row['Subject_Code']] = $row['Subject_Name'];

            // Save time slots
            if (!in_array($time_key, $time_slots)) {
                $time_slots[] = $time_key;
            }

            // Organize data by time slot and day
           // Assuming each row of your SQL result is stored in $row
        $timetable[$time_key][$row['Day_Name']][] = [
            'location' => $row['Location_Name'],
            'subject' => $row['Subject_Name'],
            'subject_code' => $row['Subject_Code'],
            'subject_type' => $row['subject_type'],
            'batch' => $row['Batch_Name'],
            'teacher_code' => $row['Teacher_Code']
        ];

        }
    } else {
        echo '<div class="alert alert-warning">No timetable data found for ' . $selected_semester . '.</div>';
    }
}
?>

<!-- Display the timetable if data is available -->
<?php if (!empty($faculty_name)): ?>
    <div class="container-fluid p-4" id="timetableTable">
        <div class="card mb-4">
            <div class="card-body text-center">
                <h5><b>The Maharaja Saiyajirao University of Baroda</b></h5>
                <h6 class="mb-3"><b><?php echo $faculty_name ?></b></h6>
                <p class="mb-3"><b><?php echo $program_name ?></b></p>
                <div class="row">
                    <div class="col-md-3">
                        <strong>Class:</strong>
                        <div><?php echo $semester_name; ?></div>
                    </div>
                    <div class="col-md-3">
                        <strong>Department:</strong>
                        <div><?php echo $department_name; ?></div>
                    </div>
                    <div class="col-md-3">
                        <strong>Division:</strong>
                        <div><?php echo $division_name; ?></div>
                    </div>
                    <div class="col-md-3">
                        <strong>Academic Year:</strong>
                        <div>2024-25</div>
                    </div>
                </div>
                <hr>
                <!-- Create the timetable table -->
                <div class="card">
                    <div class="card-header">
                        <h5>Timetable</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Time Slot</th>
                                    <?php foreach ($days as $day): ?>
                                        <th><?php echo $day; ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <!-- PHP code inside the table to display timetable -->
                                <tbody>
                                <?php foreach ($time_slots as $slot): ?>
                                    <tr>
                                        <td><?php echo $slot; ?></td>
                                        <?php foreach ($days as $day): ?>
                                            <td class="<?php echo !isset($timetable[$slot][$day]) ? 'no-class' : ''; ?>" style="vertical-align: top;">
                                                <?php
                                                if (isset($timetable[$slot][$day])) {
                                                    echo '<div style="display: flex; align-item:center; justify-content:center;">';

                                                    foreach ($timetable[$slot][$day] as $index => $entry) {
                                                        // Display each entry in a separate div, with a right border for vertical line separation
                                                        echo '<div style="flex: 1; padding: 5px;';
                                                        echo ($index < count($timetable[$slot][$day]) - 1) ? ' border-right: 1px solid #ddd;' : '';
                                                        echo '">';

                                                        // Show location, subject, and teacher for each entry
                                                        echo '<span class="subject-name">' . $entry['subject'] . '</span><br>';
                                                        echo '<span class="location-name">' . $entry['location'] . '</span><br>';

                                                        // Show batch name if subject is a lab
                                                        if ($entry['subject_type'] === 'lab') {
                                                            echo '<span class="batch-name">' . $entry['batch'] . '</span><br>';
                                                        }

                                                        echo '<span class="text-success teacher-name">' . $entry['teacher_code'] . '</span>';

                                                        echo '</div>';  // Close each entry container
                                                    }

                                                    echo '</div>';  // Close the main container for multiple entries
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                            </td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h5>Color-Pattern</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item text-success">Green - Teacher Code</li>
                            <li class="list-group-item" style="color:blue;">Blue - Subject Name</li>
                            <li class="list-group-item text-danger">Red - Location Name</li>
                            <li class="list-group-item text-dark">BLACK - Batch</li>
                        </ul>
                    </div>
                </div>

                <!-- Display Teacher Codes and Names -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h5>Teachers</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php foreach ($teachers as $code => $name): ?>
                                <li class="list-group-item"><?php echo $code . ' - ' . $name; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- Back Button -->
                    <div class="container mb-4">
                        <button class="btn btn-secondary no-print" onclick="window.history.back()">Back</button>
                    </div>

                    <div class="container mb-4">
                        <button class="btn btn-primary no-print" onclick="printTimetable()">Print Timetable</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<style>

    table {
        
        font-size: 78%;
        table-layout: fixed;
        width: 100%;
        padding: 10px;
        border-collapse: collapse;
    }
    th,
    td {
        border: 1.5px solid black;
        height: 80px;
        vertical-align: middle;
        text-align: center;
        word-wrap: break-word;
        overflow: hidden;
    }

    td.no-class {
        background-color: #f8d7da;
        color: #721c24;
    }

    .teacher-name {
        color: green;
    }

    .subject-name {
        color: blue;
    }
    .batch-name{
        color: black;
    }
    .location-name {
        color: red;
    }

    @media print {
        .btn-primary, .no-print {
            display: none;
        }
    }
</style>


<!-- Timetable content goes here -->

<script>
function printTimetable() {
    // Get the timetable element
    var timetableContent = document.getElementById('timetableTable').outerHTML;

    // Create a new print window
    var printWindow = window.open('', '', 'height=600,width=800');
    printWindow.document.write(`<!doctype html>
<html lang="en">
  <>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TTMS</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

      <!--Data tables css link-->
    <link href="//cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css" rel="stylesheet">`);
    printWindow.document.write(`</head><body>`);
    
    // Insert the timetable content
    printWindow.document.write(timetableContent);
    
    printWindow.document.write(`
    
<style>

    @media print {
        .btn-primary, .no-print {
            display: none;
        }
    }
    #timetabletable{
        font-size: 50%;
    }
    html{
        font-size: 50%;
    }   
    .teacher-name {
        color: green;
    }
    .subject-name {
        color: blue;
    }
    .batch-name{
        color: black;
    }
    .location-name {
        color: red;
    }
</style>
    </body></html>`);
    printWindow.document.close();

    // Trigger print
    printWindow.print();
}

</script>

<?php include("../includes/footer.php") ?>
