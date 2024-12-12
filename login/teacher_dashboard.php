<?php include("../includes/connect.php"); ?>
<?php include("../includes/header.php"); ?>
<!--Teacher TimeTable -->
<?php
// Fetch all teacher names from the 'teacher' table for the dropdown
$sql_teachers = "SELECT Teacher_Id, Teacher_Name FROM teacher";
$result_teachers = mysqli_query($conn, $sql_teachers);
?>

<div class="container p-3">
    <form method="GET" action="">
        <div class="form-group">
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

        <div class="form-group">
            <label for="department">Select a department</label>
            <select id="department" name="department" class="form-select" required>
                <option selected value="">--Choose Department--</option>
                <!-- Populated dynamically using AJAX -->
            </select>
        </div>

        <div class="form-group">
            <label for="teacher_id">Select Teacher:</label>
            <select name="teacher_id" id="teacher_id" class="form-control">
                <option value="">-- Select a Teacher --</option>
                <?php while ($teacher = mysqli_fetch_assoc($result_teachers)): ?>
                    <option value="<?php echo $teacher['Teacher_Id']; ?>"
                        <?php echo (isset($_GET['teacher_id']) && $_GET['teacher_id'] == $teacher['Teacher_Id']) ? 'selected' : ''; ?>>
                        <?php echo $teacher['Teacher_Name']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">View Timetable</button>
    </form>
</div>

<?php
// Check if a teacher has been selected
if (isset($_GET['teacher_id']) && !empty($_GET['teacher_id'])) {
    $teacher_id = $_GET['teacher_id'];  // Get the selected teacher's ID

    // SQL query to fetch timetable data for the selected teacher
    $sql = "
        SELECT 
            tt.Time_Table_Id, 
            t.Teacher_Name, 
            sub.Subject_Name, 
            sd.start_time, 
            sd.end_time, 
            days.Day_Name, 
            days.Day_Id,
            loc.Location_Name,
            p.Program_Code,
            s.Semester_Code
        FROM 
            time_table tt
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
            program p ON tt.Program_Id = p.Program_Id
        JOIN 
            semester s ON tt.Semester_Id = s.Semester_Id
        WHERE 
            tt.Teacher_Id = '$teacher_id'
        ORDER BY 
            sd.start_time, days.Day_Id
    ";

    $result = mysqli_query($conn, $sql);
    $timetable = [];
    $time_slots = [];
    $days = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY'];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $time_key = $row['start_time'] . ' - ' . $row['end_time'];
            if (!in_array($time_key, $time_slots)) {
                $time_slots[] = $time_key;
            }
            $teacher_name = $row['Teacher_Name'];
            $timetable[$time_key][$row['Day_Name']] = 'Class: ' . $row['Program_Code'] . '-' . $row['Semester_Code'] . '<br>Subject: ' . $row['Subject_Name'] . '<br>Location: ' . $row['Location_Name'];
        }
    } else {
        echo '<div class="alert alert-warning">No timetable data found for the selected teacher.</div>';
    }
} else {
    echo '<div class="alert alert-info">Please select a teacher to view their timetable.</div>';
}
?>

<!-- Display Timetable -->
<?php if (isset($teacher_name)): ?>
    <div class="container p-3">
        <h5 class="text-center">Teacher : <?php echo $teacher_name ?></h5>
    </div>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>Time Slot</th>
                <?php foreach ($days as $day): ?>
                    <th><?php echo $day; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($time_slots as $slot): ?>
                <tr>
                    <td><?php echo $slot; ?></td>
                    <?php foreach ($days as $day): ?>
                        <td>
                            <?php echo isset($timetable[$slot][$day]) ? $timetable[$slot][$day] : 'No Class'; ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php include("../includes/footer.php"); ?>