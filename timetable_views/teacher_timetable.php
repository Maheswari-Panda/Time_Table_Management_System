<?php
// Fetch all teacher names from the 'teacher' table for the dropdown
$sql_teachers = "SELECT Teacher_Id, Teacher_Name FROM teacher";
$result_teachers = mysqli_query($conn, $sql_teachers);
?>
<div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-between bg-dark text-light">
                            <h4>VIEW TEACHER TIME TABLE</h4>
                        </div>
                        <div class="card-body">
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
                                    <label for="Teacher_Id">Select Teacher:</label>
                                    <select name="Teacher_Id" id="Teacher_Id" class="form-control">
                                        <option value="">-- Select a Teacher --</option>
                                        <?php while ($teacher = mysqli_fetch_assoc($result_teachers)): ?>
                                            <option value="<?php echo $teacher['Teacher_Id']; ?>"
                                                <?php echo (isset($_GET['Teacher_Id']) && $_GET['Teacher_Id'] == $teacher['Teacher_Id']) ? 'selected' : ''; ?>>
                                                <?php echo $teacher['Teacher_Name']; ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">View Timetable</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php
// Check if a teacher has been selected
if (isset($_GET['Teacher_Id']) && !empty($_GET['Teacher_Id'])) {
    
    $teacher_id = $_GET['Teacher_Id'];  // Get the selected teacher's ID

    // SQL query to fetch timetable data for the selected teacher
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
        b.Batch_Code   
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
        t.Teacher_Id = '$teacher_id'
    ORDER BY 
        sd.start_time, days.Day_Id
";


    $result = mysqli_query($conn, $sql);
    $timetable = [];
    $time_slots = [];
    $days = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY'];

    $faculty_name = '';
    $department_name = '';
    $teacher_name = '';
    $teacher_code = '';
    $programs = [];
    $departments = [];
    $subjects = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $time_key = $row['start_time'] . ' - ' . $row['end_time'];

            // Save details for displaying above timetable
            $teacher_name = $row['Teacher_Name'];
            $teacher_code = $row['Teacher_Code'];
            $faculty_name = $row['Faculty_Name'];
            $department_name = $row['Department_Name'];
            $program_name = $row['Program_Name'];
            $program_code = $row['Program_Code'];
            $semester_name = $row['Semester_Code'];
            $division_name = $row['Division_Name'];
            $batch_name = $row['Batch_Code'];

            // Save teacher codes and names for display later
            $teachers[$row['Teacher_Code']] = $row['Teacher_Name'];
            $subjects[$row['Subject_Code']] = $row['Subject_Name'];
            $programs[$row['Program_Code']] = $row['Program_Name'];
            $departments[$row['Department_Code']] = $row['Department_Name'];
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
            'batch' => $row['Batch_Code'],
            'program_code' => $row['Program_Code'],
            'semester_code' => $row['Semester_Code'],
            'department_code' => $row['Department_Code'],
            'division_code' => $row['Division_Name']
        ];

        }
    } else {
        echo '<div class="alert alert-warning">No timetable data found for tecaher id : ' . $teacher_id . '.</div>';
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
                <div class="row">
                    <div class="col-md-3">
                        <strong>Teacher Name:</strong>
                        <div><?php echo $teacher_name; ?></div>
                    </div>
                    <div class="col-md-3">
                        <strong>Department:</strong>
                        <div><?php echo $department_name; ?></div>
                    </div>
                    <div class="col-md-3">
                        <strong>Teacher Code:</strong>
                        <div><?php echo $teacher_code; ?></div>
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
                                                        
                                                        echo '<span style="color: brown;">' . $entry['department_code'] .' - ' . $entry['program_code'].'</span><br>';
                                                        echo '<span class="text-success teacher-name">' .$entry['semester_code'] .' '. $entry['division_code'] .'</span> <br>';
                                                        // Show location, subject, and teacher for each entry
                                                        echo '<span class="subject-name">' . $entry['subject'] . '</span><br>';
                                                        echo '<span class="location-name">' . $entry['location'] . '</span><br>';

                                                        // Show batch name if subject is a lab
                                                        if ($entry['subject_type'] === 'lab') {
                                                            echo '<span class="batch-name"> Batch - ' . $entry['batch'] . '</span><br>';
                                                        }

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
                            <li class="list-group-item" style="color:brown;">Brown - Department Code</li>
                            <li class="list-group-item text-success">Green - Class Division</li>
                            <li class="list-group-item" style="color:blue;">Blue - Subject Name</li>
                            <li class="list-group-item" style="color:red;">Red - Location Name</li>
                            <li class="list-group-item text-dark">BLACK - Batch</li>
                        </ul>
                    </div>
                </div>

                <!-- Display Teacher Codes and Names -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h5>Programs</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php foreach ($programs as $code => $name): ?>
                                <li class="list-group-item"><?php echo $code . ' - ' . $name; ?></li>
                            <?php endforeach; ?>
                        </ul>
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