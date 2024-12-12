<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-3">Facluty Timetable</h2>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Faculty</th>
                    <th>Department</th>
                    <th>Program Type</th>
                    <th>Program</th>
                    <th>Class</th>
                    <th>Division</th>
                    <th>Batch</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Subject</th>
                    <th>Subject Type</th>
                    <th>Teacher</th>
                    <th>Location</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample row -->
                <tr>
                    <td>FTE</td>
                    <td>CSE</td>
                    <td>PG</td>
                    <td>MCA</td>
                    <td>FS_MCA_CSE_1</td>
                    <td>A</td>
                    <td>-</td>
                    <td>Tuesday</td>
                    <td>10:00 AM - 12:00 PM</td>
                    <td>CSE_MCA_C++</td>
                    <td>Lecture</td>
                    <td>Dr. Smith</td>
                    <td>MCA_1</td>
                    <td><button class="btn btn-sm btn-primary">Edit</button></td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
